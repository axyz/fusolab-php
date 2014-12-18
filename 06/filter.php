<?php

function filter($data, $fn)
    {
        $ret = [];
        foreach($data as $el) {
            if($fn($el)) array_push($ret, $el);
        }
        return $ret;
    }

print_r(filter(array(1, 2, 3, 4), function($el) {
    return $el <> 3;
}));