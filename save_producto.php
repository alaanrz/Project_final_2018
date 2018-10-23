<?php
session_start();
if($_SESSION['logueado']==true){
  include_once 'includes/upload_image.php';
  $modelo=$_POST['modelo'];
  $precio=$_POST['precio'];
  $obs=$_POST['observacion'];
  $marca=$_POST['marca'];
  $color=$_POST['color'];
 $img=$_POST['imagen'];
 
 header('Content-Type: text/html;charset=UTF-8');
 include_once "includes/bdd.php";
 $con = openCon('databases_productos.ini');
 $con->set_charset("utf8");
 
 
 $sql="INSERT INTO zapatillas(modelo,precio,observacion,id_marca,id_color,imagen) VALUES(?,?,?,?,?,?)";
}
else {
    header("location:form_login.html");
    exit();
}
?>