<?php
if (isset($_GET['q'])){
    $id=$_GET['q'];
    header('Content-Type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('databases_productos.ini');
    $con->set_charset("utf8");
}
?>
$sql=SELECT 
z.id_zapatilla,
z.modelo,
z.precio,
z.observacion,
c.descripcion,
m.descripcion
FROM zapatillas z INNER JOIN colores c ON
z.id_color=c.id_color
INNER JOIN marcas m ON
z.id_marca=m.id_marca
WHERE z.id_zapatilla=7