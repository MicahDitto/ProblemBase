<?php

/*
 * Complete the 'staircase' function below.
 *
 * The function accepts INTEGER n as parameter.
 */

function staircase($n) {
    for($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($j >= ($n + 1) - $i) {
                echo '#';
            } else {
                echo ' ';
            }
        }
        echo PHP_EOL;
    }
}

$n = intval(trim(fgets(STDIN)));

staircase($n);
