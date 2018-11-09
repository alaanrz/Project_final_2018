<?php
if (isset($_GET['q'])){
$id=$_GET['q'];
header('Content-Type: text/html;charset=UTF-8');
include_once "includes/bdd.php";
$con = openCon('databases_productos.ini');
$con->set_charset("utf8");
$sql="DELETE FROM zapatillas WHERE id_zapatilla=".$id;
$con -> query($sql);
header('Location:list.php');
}
?>
