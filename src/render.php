<?php

function render(string $tpl,?array $data=[]):string 
{
    if($data){
        extract($data,EXTR_OVERWRITE);
    }
    ob_start();
    require 'src/views/'.$tpl.'.tpl.php';
    $rendered=ob_get_clean();
    return (string)$rendered;
}