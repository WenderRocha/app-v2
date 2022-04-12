<?php

function dbug($array, int $type = 1) {
    echo '<pre>';
    if($type != 1) {
        var_dump($array);
    }else{
        print_r($array);
    }
    echo '</pre>';
}