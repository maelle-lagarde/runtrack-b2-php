<?php

function my_is_mutiple(int $divider, int $multiple) : bool {
    if ($multiple == 0) {
        return false;
    }

    return $divider % $multiple === 0;
}

// exemple utilisation.
var_dump(my_is_mutiple(2, 4));