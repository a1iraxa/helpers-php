<?php

/**
 * Return Checked
 */
function checked($checked, $current = true, $echo = true, $type='checked') {
    if ( (string) $checked === (string) $current ){
        $result = " $type='$type'";
    }else{
        $result = '';
    }

    return $result;
}

/**
 * Return Multiple Checked
 */
function multipleChecked($checked, $current) {

    if( in_array($current, $checked ) ){
        return 'checked';
    }
}
