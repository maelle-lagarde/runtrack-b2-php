<?php

function my_str_search(string $haystack, string $needle) : int {
    $count = 0;
    $i = 0;

    while (isset($haystack[$i])); {
        if($haystack[$i] == $needle) {
            $count++;
        }
        $i++;
    }
    return $count;
}

if (my_str_search('La Plateforme', 'a') === 2) {
    echo "Good job";
} else {
    echo "You failded";
}

?>