<?php

function sanitize($before){
    foreach($before as $key=>$value){
        $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    return $after;
}

function get_ini(){

    $path = $_SERVER['DOCUMENT_ROOT']. '/dumazon/configs/config.ini';
    //$path = $_SERVER['DOCUMENT_ROOT']. '/dumazon/configs/config_rds.ini';

    $ini = parse_ini_file($path);
	return $ini;
}