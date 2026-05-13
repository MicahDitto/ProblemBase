<?php

/*
 * Complete the 'biggerIsGreater' function below.
 *
 * The function is expected to return a STRING.
 * The function accepts STRING w as parameter.
 */
 // ABCZ. ACBZ. ACZB.  AZBC.  AZCB.  BACZ. BAZC. BCAZ. BCZA. BZAC. BZCA. 
function biggerIsGreater($w) {     // Sample $w   ::  ACZB -> AZCB -> AZBC
    // compare count($w) - 2 < count($w) - 1
    $arrLetters = str_split($w);
    $count = count($arrLetters);
    
    // count($w) - 1 = last letter in $w
    $i = $count - 2; 
    while ($i >= 0 && $arrLetters[$i] >= $arrLetters[$i+1]) {
        $i--;
    }
    // once you've found the next lowest base 
    // That will be $i
    if ($i < 0) return "no answer";
    
    // scan right to left to find char > $arrLetters[$i]
    $j = $count - 1; // Just need to get last in the array
    
    // compare from last in the array (right to left) to $arrLetters[$i]
    while ($arrLetters[$j] <= $arrLetters[$i]) {
        $j--; // right to left
    }
    // swap
    $temp = $arrLetters[$i];
    $arrLetters[$i] = $arrLetters[$j];
    $arrLetters[$j] = $temp;
    
    // reverse everything to the right of $i / the pivot
    $endReversed = array_reverse(array_slice($arrLetters, $i + 1 ));
    /* $i + 1 = The item after the pivot  -- At this point start the slice*/
    
    array_splice($arrLetters, $i + 1, $count - $i - 1, $endReversed);
    // Splicing $arrLetters
    // Start at: $i + 1 :: the next item after the pivot. 
    // Length: 
        // $count - 1 = last index of the arr.
        // - $i  : the pivot index. 
            // So if the pivot index was only 2 from the last 
            // We'd only want the length to be Last Index - Pivot index
    // Replacing : $endReversed
            
    
    // get array back to string
    return implode('', $arrLetters);  // Params: no separator '', array
    
    

}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$T = intval(trim(fgets(STDIN)));

for ($T_itr = 0; $T_itr < $T; $T_itr++) {
    $w = rtrim(fgets(STDIN), "\r\n");

    $result = biggerIsGreater($w);

    fwrite($fptr, $result . "\n");
}

fclose($fptr);
