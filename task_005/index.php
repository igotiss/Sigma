<?php

function sortValue ($int) {
$arr = (str_split($int));
    rsort($arr);

$num = (int)implode($arr);
    return ($num );
}

printf(sortValue(123456789));