<?php

/*
 * Complete the 'diagonalDifference' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts 2D_INTEGER_ARRAY arr as parameter.
 */

 function diagonalDifference($arr) {
    $d1 = 0;
    $d2 = 0; 
    $rows = count($arr);

    for ($i = 0; $i < $rows; $i++) {
        $d1 += $arr[$i][$i]; // Primary diagonal
        $d2 += $arr[$i][$rows - $i - 1]; // Secondary diagonal
    }
    
    return abs($d1 - $d2);
}



$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$n = intval(trim(fgets(STDIN)));

$arr = array();

for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = diagonalDifference($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
