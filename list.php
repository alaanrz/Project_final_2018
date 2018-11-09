<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Listado de Productos</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script>
function deleteProducto(cod_zapatilla){
	if(window.confirm("Desea usted eliminar realmente el id="+cod_zapatilla))
		{
		document.location.href="delete.php?q="+cod_zapatilla;
		}
;
}
function editProducto(cod_zapatilla){
	document.location.href="edit.php?q="+cod_zapatilla;
	}
</script>
</head>
<body>
<h1 style="margin:20px 0px" class="text-center">Listado de Productos</h1>

	<table class="table table-bordered table-striped">
		<thead class="thead-dark">
			<tr>
				<th>#</th>
				<th>Modelo</th>
				<th>Marca</th>
				<th>Precio</th>
				<th>Color</th>
				<th>Eliminar</th>
				<th>Actualizar</th>
</tr>
		</thead>
		<tbody>
		<?php
header('Content-Type: text/html;charset=UTF-8');
 include_once "includes/bdd.php";
 $con = openCon('databases_productos.ini');
 $con->set_charset("utf8");

$sql="SELECT 
z.modelo AS modelo,
z.precio AS precio,
z.id_zapatilla AS id,
c.descripcion AS color,
m.descripcion AS marca
FROM zapatillas z
INNER JOIN colores c
ON c.id_color=z.id_color
INNER JOIN marcas m
ON m.id_marca=z.id_marca";
$result=$con->query($sql);
while($row=$result->fetch_assoc()){
?>
			<tr>
				<td><?php echo $row['id'] ?></td>
				<td><?php echo $row['modelo'] ?></td>
				<td><?php echo $row['marca'] ?></td>
				<td><?php echo $row['precio'] ?></td>
				<td><?php echo $row['color'] ?></td>
				<td><a href="#" onclick="deleteProducto(<?php echo $row['id'] ?>)">Eliminar Producto</a></td>
                <td><a href="#" onclick="editProducto(<?php echo $row['id'] ?>)">Editar Producto</a></td>
			</tr>
			<?php
}
?>
		</tbody>
</table>
</body>
</html>