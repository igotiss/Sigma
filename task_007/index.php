<?php
function averages ($arr) {
    $result = [];
    for($i=0; $i<count($arr)-1; $i++) {
        $result [] = ($arr[$i]+$arr[$i+1])/2;
    }
    return $result;
}
print_r(averages([1, 3, 5, 1, -10]));
print_r(averages([2, -2, 2, -2, 2]));