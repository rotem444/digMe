<?php

require_once 'db_config.php';

if(! function_exists('old')){
    function old($fn){
        return $_REQUEST[$fn] ?? '';
    }
}
