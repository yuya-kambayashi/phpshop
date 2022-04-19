<?php

function sanitize($before){
    foreach($before as $key=>$value){
        $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    return $after;
}

function get_ini(){
    
    $ini = parse_ini_file('../config/config.ini');
	return $ini;
}

?>