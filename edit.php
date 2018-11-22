<?php
if (isset($_GET['q'])){
    $id=$_GET['q'];
    header('Content-Type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('databases_productos.ini');
    $con->set_charset("utf8");
    $sql="SELECT 
z.id_zapatilla as id,
z.modelo as modelo,
z.precio as precio,
z.observacion as observacion,
c.descripcion as color,
m.descripcion as marca,
m.id_marca as id_marca,
c.id_color as id_color
FROM zapatillas z INNER JOIN colores c ON
z.id_color=c.id_color
INNER JOIN marcas m ON
z.id_marca=m.id_marca
WHERE z.id_zapatilla=".$id;
    $result=$con -> query($sql);
    $row=$result -> fetch_assoc();
}
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Edición de productos</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<style>
form {
	max-width: 600px;
	width: 100%;
	padding: 15px 35px 45px 35px;
	margin: 20px auto;
	background-color: #fff;
	border: 1px solid rgba(0, 0, 0, 0.1);
}
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 class="text-center">EDICIÓN DE PRODUCTOS</h3>
			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8"
					action="update_producto.php" enctype="multipart/form-data"
					method="post">
					<div class="form-group">
				 <input type="hidden" name="id" value="<?php echo $row['id']?>">
				 </input>
					</div>
					<div class="form-group">
						<br /> <label class="control-label" for="modelo">MODELO</label> <input 
						type="text" name="modelo" value="<?php echo $row['modelo']?>"></input>
					</div>
					<div class="form-group">
						<br /> <label class="control-label" for="precio">PRECIO</label> <input
					 type="text" name="precio" value="<?php echo $row['precio']?>"></input>
					</div>
					<div class="form-group">
						<br /> <label class="control-label" for="observacion">OBSERVACIÓN</label>
						<textarea name="observacion" id="observacion" rows="3"
						 class="form-control" ><?php echo $row['observacion']?></textarea>
					</div>
					<div class="form-group">
						<label class="control-label" for="marca">MARCA</label> <select
							name="marca" id="marca" class="form-control" >
							
						<?php
    header('Content-Type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('databases_productos.ini');
    $con->set_charset("utf8");
    $sql = "SELECT id_marca,descripcion FROM marcas ORDER BY descripcion";
    $result = $con -> query($sql);
    echo '<option value="' . $row['id_marca'] . '" >' .$row['marca'].'</option>';
    while ($row_marca=$result -> fetch_assoc()){
        echo '<option value=" ' . $row_marca['id_marca'] . ' ">'  .$row_marca['descripcion']. '</option>';
    };

?>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label" for="color">COLOR</label> <select
							name="color" id="color" class="form-control" >
							
						<?php
    header('Content-Type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('databases_productos.ini');
    $con->set_charset("utf8");
    $sql = "SELECT id_color,descripcion FROM colores ORDER BY descripcion";
    $result = $con -> query($sql);
    echo '<option value=" ' . $row['id_color'] . ' " >' .$row['color'].'</option>';
    while ($row_color=$result -> fetch_assoc()){
        
        echo '<option value=" ' . $row_color['id_color'] . ' ">'  .$row_color['descripcion']. '</option>';
    };

?>
						</select>
					</div>
					<div class="text-center">
					<br />
					<input type="submit"  class="btn btn-success" value="Editar Producto"/>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="js/bootstrap.min.js"></script>
</body>
</html>
