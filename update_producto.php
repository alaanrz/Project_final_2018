<?php
if (isset($_POST['id'])){
    $id_zapa=$_POST['id'];
header('Content-Type: text/html;charset=UTF-8');
include_once "includes/bdd.php";
$con = openCon('databases_productos.ini');
$con->set_charset("utf8");
$sql="UPDATE zapatillas
SET modelo= ,precio= ,observacion= ,id_color= ,id_marca=
WHERE id_zapatilla=".$id_zapa;
$con -> query($sql);
header('Location:list.php');
}
?>