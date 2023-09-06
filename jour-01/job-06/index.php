<?php

function my_array_sort(array $arrayToSort, string $order) : array {
    $length = 0;
    while (isset($arrayToSort[$length])) {
        $length++;
    }

    for ($i = 1; $i < $length; $i++) {
        $key = $arrayToSort[$i];
        $j = $i - 1;

        if ($order === 'ASC') {
            while ($j >= 0 && $arrayToSort[$j] > $key) {
                $arrayToSort[$j + 1] = $arrayToSort[$j];
                $j = $j - 1;
            }
        }

        elseif ($order === 'DESC') {
            while ($j >= 0 && $arrayToSort[$j] < $key) {
                $arrayToSort[$j + 1] = $arrayToSort[$j];
                $j = $j - 1;
            }
        }

        $arrayToSort[$j + 1] = $key;
    }

    return $arrayToSort;
}

// exemple utilisation.

$result1 = my_array_sort([2, 24, 12, 7, 34], 'ASC');
print_r($result1);

$result2 = my_array_sort([8, 5, 23, 89, 6, 10], 'DESC');
print_r($result2);

?>