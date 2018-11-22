<?php
if (isset($_POST['id'])){
    $id_zapa=$_POST['id'];
    $modelo=$_POST['modelo'];
    $precio=$_POST['precio'];
    $obs=$_POST['observacion'];
    $marca=$_POST['marca'];
    $color=$_POST['color'];
header('Content-Type: text/html;charset=UTF-8');
include_once "includes/bdd.php";
$con = openCon('databases_productos.ini');
$con->set_charset("utf8");
$sql="UPDATE zapatillas
SET modelo='$modelo',precio='$precio',observacion='$obs',id_color='$color',id_marca='$marca'
WHERE id_zapatilla=".$id_zapa;
$con -> query($sql);
header('Location:list.php');
}
?>