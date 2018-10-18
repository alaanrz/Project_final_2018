<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Agregar productos</title>
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
				<h3 class="text-center">INGRESO DE PRODUCTOS</h3>
			</div>
			<div class="col-md-12">
				<form class="form-group" accept-charset="utf-8"
					action="save_producto.php" enctype="multipart/form-data"
					method="post">
					<div class="form-group">
						<br /> <label class="control-label" for="modelo">MODELO</label> <input
							id="modelo" name="modelo" placeholder="MODELO"
							class="form-control" required="required" type="text"></input>
					</div>
					<div class="form-group">
						<br /> <label class="control-label" for="precio">PRECIO</label> <input
							id="precio" name="precio" placeholder="PRECIO"
							class="form-control" required="required" type="text"></input>
					</div>
					<div class="form-group">
						<br /> <label class="control-label" for="observacion">OBSERVACIÓN</label>
						<textarea name="observacion" id="observacion" rows="3"
							placeholder="OBSERVACION" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label class="control-label" for="marca">MARCA</label> <select
							name="marca" id="marca" class="form-control">
							<option value="" disabled="disabled" selected="selected">Seleccione
								marca</option>
						<?php
    header('Content-Type: text/html;charset=UTF-8');
    include_once "includes/bdd.php";
    $con = openCon('databases_productos.ini');
    $con->set_charset("utf8");
    $sql = "SELECT id_marca,descripcion FROM marcas ORDER BY descripcion";
    $result = $con -> query($sql);
    while ($row=$result -> fetch_assoc()){
        echo '<option value=" ' . $row['id_marca'] . ' ">'  .$row['descripcion']. '</option>';
    };

?>
						</select>
					</div>
				</form>
			</div>
		</div>
	</div>




	<script src="js/bootstrap.min.js"></script>
</body>
</html>
