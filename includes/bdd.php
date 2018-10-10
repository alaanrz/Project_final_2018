<?php
function openCon(){
    $config=parse_ini_file('databases.ini');
    
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