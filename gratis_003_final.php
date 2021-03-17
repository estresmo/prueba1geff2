<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>Look and Ask / Visualice</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/laa_favicon.jpg" type="image/x-icon">
		<link rel="stylesheet" href="assets/CSS/style.css">
	</head>
	<?php
	require 'look_and_ask_conexion.php'; 
	$NIF = $_REQUEST['NIF'];
	?>

<body>
	<header>
		<div class="header">
		<?php require 'partials/header.php'?>
		<h2> Tu plato listo</h2>
		<form action="gratis_002_iniciar.php" method="POST">
			<input type="hidden" name="NIF" value="<?php echo $NIF;?>">
        	<input type="submit" value="Agregar plato" ><br>
    	</form>
		<form action="gratis_005_menu.php" method="POST" class="Prev">
			<input type="hidden" name="NIF" value="<?php echo $NIF;?>">
        	<input type="submit" value="Previsualizar menu" class="Prev"><br>
    	</form>
		
		</div>
	</header>

	<section>
		<!-- viene de "gratis_003_iniciar.php -->
		<table width="90%" style="border:1pt" rules="all">
			<thread>
				<tr>
					<th class="pad-basic">imagen</th>
					<th class="pad-basic">platillo</th>
					<th class="pad-basic">descripción platillo</th>
					<th class="pad-basic">tipo</th>
					<th class="pad-basic">alergenos</th>
					<th class="pad-basic">ingredientes</th>
					<th class="pad-basic">sabor</th>
					<th class="pad-basic">precio</th>
					<th class="pad-basic">activado</th>
					<th class="pad-basic"></th>
				</tr>
			</thread>
			<tbody>
				<?php

				$query="SELECT * FROM user_$NIF";
				$consulta=$conexion->query($query); //$consulta=mysqli_query($conexion, $query); //algoritmo para consultar base de datos y generar platillo //$ss=mysqli_query($conexion, "SELECT * FROM look_and_ask_2 INNER JOIN look_and_ask ON NIF"); //while ($fila=mysqli_fetch_array($ss))
				while ($fila= mysqli_fetch_array($consulta)) //fecth_assoc()
				{
					?>
					<tr>
						<td><img width="100px" height="100px" src="data:<?php $fila['tipoimg']; ?>;base64,<?php echo base64_encode($fila['imagen']); ?>"/>
						<br><a href="Realidad_aumentada.php?NF=<?php echo $_REQUEST['NIF'];?>&CP=<?php echo $fila['codigoplatillo']?>" target="_blank">Ver en realidad aumentada</a></td>
						<td><?php echo $fila['platillo'];?></td>
						<td><?php echo $fila['descripcionplatillo'];?></td>
						<td><?php echo $fila['tipo']; //fila?></td>
						<td><?php echo $fila['alergenos']; //fila?></td>
						<td><?php echo $fila['ingredientes']; //fila?></td>
						<td>
						<input type="checkbox" onclick="return false;" <?php if ($fila['picante']==1){ echo "checked";} ?> >picante</input><br>
						<input type="checkbox" onclick="return false;" <?php if ($fila['dulce']==1){ echo "checked";} ?>>dulce</input><br>
						<input type="checkbox" onclick="return false;" <?php if ($fila['acido']==1){ echo "checked";} ?>>acido</input><br>						
						</td>
						<td><?php echo $fila['precio'] . " €";?></td>
						<td><input type="checkbox" onclick="return false;" <?php if ($fila['activar']==1){ echo "checked";} ?>></td>
						<td>
						<form action="gratis_003_modificar_plato.php" method="POST">
						<input type="hidden" name="codigoplatillo" value="<?php echo $fila['codigoplatillo'];?>"></input>
						<input type="hidden" name="NIF" value="<?php echo $NIF ;?>"></input>
						<input type="submit" class="editar" id="editar" value=""></input>
						</form>
						<br><br>
						<form action="gratis_003_eliminar.php" method="POST">
						<input type="hidden" name="codigoplatillo" value="<?php echo $fila['codigoplatillo'];?>"></input>
						<input type="hidden" name="NIF" value="<?php echo $NIF ;?>"></input>
						<input type="submit" class="eliminar" id="eliminar" value=""></input>
						</form>
						</td>
					</tr>
				<?php						
				}
				?><br><br>
			</tbody>
		</table>
	</section>
	<script type="text/javascript">
		var button = document.getElementById("eliminar");
	button.onclick = function(){
	var opcion = confirm("Estas seguro de eliminar este platillo?");
	if (opcion == true) {
        return true
	} else {
	   return false
	}
	}
	</script>
</body>