<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Look and Ask / Menú</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    	<link rel="shortcut icon" href="img/laa_favicon.png" type="image/x-icon">
		<link rel="stylesheet" href="assets/CSS/style.css">
	</head>
	

	<!--Estructura visual-->
    <body>
	<header>
		<div class="header">
			<?php require 'partials/header.php';
				 ?>
		</div>
	</header>
		<div class="wrapper1">
			<div class="title">
				<h4><span>Tu menú a la mano</span></h4>
			</div>
			<div class="menu">
			<?php require 'look_and_ask_conexion.php';
			$query="SELECT * FROM user_$_REQUEST[NIF]";
				$consulta=$conexion->query($query); //$consulta=mysqli_query($conexion, $query); //algoritmo para consultar base de datos y generar platillo //$ss=mysqli_query($conexion, "SELECT * FROM look_and_ask_2 INNER JOIN look_and_ask ON NIF"); //while ($fila=mysqli_fetch_array($ss))
				while ($fila = mysqli_fetch_array($consulta)) //fecth_assoc()
				{ ?>
				<div class="single-menu">
					<img src="data:<?php $fila['tipoimg']; ?>;base64,<?php echo base64_encode($fila['imagen']); ?>" >
					<div class="menu-content">
						<h4><?php echo $fila['platillo'];?> <span><?php echo $fila['precio'] . " €";?></span></h4>
						 <p><?php echo $fila['descripcionplatillo'];?></p>
						 <a href="Realidad_aumentada.php?NF=<?php echo $_REQUEST['NIF'];?>&CP=<?php echo $fila['codigoplatillo']?>" target="_blank">Ver en realidad aumentada</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
    </body>
</html>