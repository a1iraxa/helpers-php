<?php

/*
 * Convert string to int ('0') to int (1)
 * e.g: '7' convert to 7
*/
function castToNumber($value) {
    if ( preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $value) ) {
        return $value+0;
    }
}
