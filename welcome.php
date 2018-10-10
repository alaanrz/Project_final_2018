<?php
session_start();
if($_SESSION['logueado']==true){
 echo "</br>";
 echo 'Bienvenido/a,'.$_SESSION['username'];
 echo '</br>';
 echo 'Horario de conexion:'.$_SESSION['time'];
 echo '</br>';
 echo '<a href="logout.php">Logout</a>';
 echo '</br>';
 echo "<h1 style='text-align:center'>Menú de Opciones</h1>";
echo "<h3 style='text-align:center'><a href='form_insert.php'>Ingresar Producto Nuevo</a></h3>";
}
else {
    header("location:form_login.html");
    exit();
}
?>