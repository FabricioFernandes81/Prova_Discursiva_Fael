<?php

function LogSys($p = [])
{
    echo '<pre>';
    print_r($p);
    echo '</pre>';
    die();
}

function ConvertMoeda($str_num){
    
    return number_format($str_num,2,",",".");
}

function resetMoeda($moenda)
{
  
    $moenda = str_replace('.', '', $moenda); 
    return str_replace(',', '.', $moenda); 
}
function getCurrentDate($formato = 'Y-m-d H:i:s')
{
    date_default_timezone_set('America/Sao_Paulo');
    return date($formato);
}