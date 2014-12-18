<?php

function map($data, $fn)
{
    $ret = [];
    foreach($data as $el) {
        array_push($ret, $fn($el));
    }
    return $ret;
}

print_r(map(array(1, 2, 3), function($el) {
    return $el * 2;
}));