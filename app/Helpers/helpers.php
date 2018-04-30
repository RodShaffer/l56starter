<?php

function format_phone($phone)
{
    if(strlen($phone) == 14) {
        return preg_replace("/(\()([2-9]{1}[0-9]{2})(\))(\s)([0-9]{3})([-])([0-9]{4})/", "$2$5$7", $phone);
    } else {
        return $phone;
    }
}