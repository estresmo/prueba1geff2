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
		<div class="wrapper">
			<div class="title">
				<h4><span>Restaurantes disponibles</span></h4>
			</div>
			<div class="menu">
			<?php require 'look_and_ask_conexion.php';
			$query="SELECT * FROM look_and_ask_iniciar_gratis";
				$consulta=$conexion->query($query); //$consulta=mysqli_query($conexion, $query); //algoritmo para consultar base de datos y generar platillo //$ss=mysqli_query($conexion, "SELECT * FROM look_and_ask_2 INNER JOIN look_and_ask ON NIF"); //while ($fila=mysqli_fetch_array($ss))
				while ($fila = mysqli_fetch_array($consulta)) //fecth_assoc()
				{ ?>
				<a href="gratis_005_menu.php?NIF=<?php echo $fila['NIF']; ?>" class="head"><div class="single-menu" style="background-color: rgba(0, 0, 0, 0.6);border-radius: 1em;">
					<img src="data:<?php $fila['tipoimg']; ?>;base64,<?php echo base64_encode($fila['logo']); ?>" >
					<div class="menu-content" >
						<h4><?php echo $fila['NRS'];?></h4> <br><span><?php echo $fila['horario'];?></span>
						<p><?php echo $fila['direccion'] . "<br>" . $fila['municipio'] . "<br>" . 
						$fila['provincia'] . "<br>" .$fila['pais']; ?></p>
					</div>
				</div></a>
				<?php } ?>
			</div>
		</div>
    </body>
</html>