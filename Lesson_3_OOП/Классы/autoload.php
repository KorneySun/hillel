<?php

function loader($class){

    $file = __DIR__.DIRECTORY_SEPARATOR.str_replace('\\',DIRECTORY_SEPARATOR,$class).'.php';

//    var_dump($file);


    if(is_file($file)){
        include_once($file);
        return true;
    } else {
        return false;
    }

}
spl_autoload_register('loader');