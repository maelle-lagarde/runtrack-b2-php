<?php

function my_is_prime(int $number) : bool {
    if ($number <= 1) {
        return false;
    }

    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }

    return true;
}

// exemple utilisation.

$result1 = my_is_prime(3);
$result2 = my_is_prime(12);

var_dump($result1);
var_dump($result2);