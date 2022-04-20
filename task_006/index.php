<?php

function leftRotation($word) {
    $arr = str_split($word);
    $exit[] = $arr;

    for ($i=1; $i<strlen($word); $i++){
        $arr[] = array_shift($arr);
        $exit[] = $arr;
    }
    return($exit);
}

function rightRotation($word) {
    $arr = str_split($word);
    $exit[] = $arr;

    for ($i=1; $i<strlen($word); $i++){
        $lastEll = array_pop($arr);
        array_unshift($arr, $lastEll);
        $exit[] = $arr;
    }
    return($exit);
}

print_r(rightRotation("abc"));
