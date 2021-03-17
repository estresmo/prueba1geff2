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
			<?php require 'partials/header.php'?>
		</div>
	</header>
		<div class="wrapper">
			<div class="title">
				<h4><span>Tu menú a la mano</span></h4>
			</div>
			<div class="menu">
				<div class="single-menu">
					<img src="img/carne_y_papas.jpg" name="carne_y_papas" alt="">
					<div class="menu-content">
						<h4>Carne y papas <span>45$</span></h4>
						<p>Preparado de carne y papas con salsa barbicue acompañado de
						arroz, plátano maduro frito, ensalada de repollo y jugo al gusto.</p>
					</div>
				</div>
				<div class="single-menu">
					<img src="img/sushi.jpg" name="sushi" alt="">
					<div class="menu-content">
						<h4>Sushi<span>30$</span></h4>
						<p>Arroz aderezado con vinagre de arroz, azúcar y sal y combinado
						con pescado tempurizado, mariscos frescos y verduras.</p>
					</div>
				</div>
				<div class="single-menu">
					<img src="img/cola_de_langosta_con_mantequilla_y_ajo.jpg" name="cola_de_langosta_con_mantequilla_y_ajo" alt="">
					<div class="menu-content">
						<h4>Cola de langosta con mantequilla y ajo<span>83$</span></h4>
						<p>Preparado de carne y papas con salsa barbicue acompañado de
						arroz, plátano maduro frito, ensalada de repollo y jugo al gusto.</p>
					</div>
				</div>
				<div class="single-menu">
					<img src="img/quesillo.jpg" name="quesillo" alt="">
					<div class="menu-content">
						<h4>Quesillo<span>35$</span></h4>
						<p>Compañero inseparable de la torta de cumpleaños, contiene una variedad
							con huevos y leche condensada, parte de ese sabor, textura y cremosidad que lo caracteriza.</p>
					</div>
				</div>
				<div class="single-menu">
					<img src="img/paella_venezolana.jpg" name="paella_venezolana" alt="">
					<div class="menu-content">
						<h4>Paella venezolana<span>50$</span></h4>
						<p>o arroz a la marinera  es una variación de la receta original la Paella Española.
						Es una comida muy completa para deleitar todos los sentidos.</p>
					</div>
				</div>
				<div class="single-menu">
					<img src="img/ramen.jpg" name="ramen" alt="">
					<div class="menu-content">
						<h4>Ramen<span>45$</span></h4>
						<p>Caldo preparado de pollo o cerdo, combinada con pasta de miso, salsa
						de soya, y rebanadas de carne de cerdo como guarnición.</p>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>