<?php

/**
 * Return Selected
 */
function selected($selected, $current = true, $echo = true, $type='selected') {
    if ( (string) $selected === (string) $current ){
        $result = " $type='$type'";
    }else{
        $result = '';
    }

    return $result;
}

/**
 * Return Multiple Selected
 */
function multipleselected($selected, $current) {

    if( in_array($current, $selected ) ){
        return 'selected';
    }
}
