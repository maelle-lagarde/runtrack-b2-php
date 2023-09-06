<?php

function my_str_reverse(string $string) : string {
    $reverseString = '';
    $i = 0;

    while (isset($string[$i])) {
        $i++;
    }

    $i--;

    while($i >= 0) {
        $reverseString .= $string[$i];
        $i--;
    }

    return $reverseString;
}

// exemple d'utilisation.

$string = "Hello";
$reverseString = my_str_reverse($string);
echo $reverseString;