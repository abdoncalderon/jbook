<?php

function yesNo($value){
    if ($value==1){
        return __('content.yes');
    }else{
        return __('content.no');
    }
}

function checked($value){
    if ($value==1){
        return 'checked';
    }else{
        return '';
    }
}