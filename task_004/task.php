<?php

function retArr ($str, $num) {

    $arr = explode(' ', $str);
   // $result=[];


    $result = array_filter($arr, function($item) use($num) {
        if (strlen($item) < $num) {
            return $item;
        }}
    );

/*    foreach ($arr as $item) {
        if( strlen($item) < $num) {
            $result[] = $item;
        }
    }*/


    var_dump($result);
}


retArr("assdgdgd sd dds", 3);



