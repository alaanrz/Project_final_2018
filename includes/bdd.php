<?php

function openCon($ini_file){
    $config=parse_ini_file($ini_file);
    $conexion=new mysqli(
        $config['NOMSERVER'],
        $config['USER'],
        $config['PASS'],
        $config['NOMBDD']);
    
    if($conexion->connect_errno>0){
        die("Error de conexion");
    }
    return $conexion;
}
function closeCon($conexion){
    $conexion->close();
}