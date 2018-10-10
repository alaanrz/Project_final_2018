<?php 
/*Ingresamos dos array tomando
los datos del formulario por el metodo post*/
$user = $_POST['username'];
$contra = $_POST['password'];

//conectar base de datos
include_once 'includes/bdd.php';

//Guardamos la conexion en una variable
$con = openCon();

//Los datos viajan en utf8
$con -> set_charset('utf8');

//Encriptamos la contraseña
$contra = md5($contra);

/*Ejecutamos el sql a la base de datos*/

$sql = "select count(*) from usuarios where (username='$user' or email='$user') and password='$contra'";

/*$con abre la conexion y query la consulta base de dato*/
$result = $con -> query($sql);

/*row almacena 0 error o 1 exito*/
$row = $result -> fetch_assoc();


//Si es igual 0
if($row['count(*)'] == 0){

	echo "<h1 style='text-align:center'>Ingreso invalido del sistema</h1>";
	echo "<br>";
	echo "<a style='text-align:center' href='index.html'>Volver a Intentarlo</a>";

}

else {
    session_start();
    $_SESSION['username']=$user;
    $_SESSION['time']=date('H:i:s');
    $_SESSION['logueado']=true;
	//Nos manda a welcome.php
  header("location: welcome.php");
}


?>