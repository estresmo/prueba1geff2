
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>Look and Ask / Regístrate</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/laa_favicon.jpg" type="image/x-icon">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>
	<body>
	<div class="header">
		<?php require 'partials/header.php'?>

			<?php if (!empty($message)):?>
				<p><?= $message ?></p>
			<?php endif; ?>

			<h1>Regístrate</h1>
			<span>o <a href="index.php">Ingresa</a></span>
			
			<!--formulary-->
			<div class="container">
			<br><br>
				<form action="gratis_001_procesar.php" method="POST" enctype="multipart/form-data">
				<fieldset>
					<h2>Datos Básicos</h2>
					<p>Nombre o Razón Social: <input type="text" name= "NRS" placeholder="Ingresa tu Nombre o Razón Social"></p>
					<p>Logo del negocio (si posee):</p>
					<p><input type="file" name="logo" id="imgplato" accept="image/*" ></p>
					<p><img width="100px" height="100px" id="imgcargado" class="input" src="img/sin-fondo.jpg"></p>
					<p>Dirección: <input type="text"  REQUIRED name="pais" placeholder="País">
					<input type="text"  REQUIRED name="provincia" placeholder="Provincia">
					<input type="text"  REQUIRED name="municipio" placeholder="Municipio">
					<input type="text" name= "direccion" placeholder="Dirección especifíca"></p>
					<p>Horario: <input type="text" name= "horario" placeholder="Ingresa tu horario"></p>
					<p>N.I.F.(Número de Identificación Fiscal): <input type="text" name="NIF" placeholder="Ingresa tu N.I.F (solo números)" REQUIRED></p>
					<p>Nombre de persona autorizada: <input type="text" name= "NPA" placeholder="Ingresa Nombre de persona autorizada"></p>
					<p>D.N.I (Documento Nacional de Identificación): <input type="text" name= "DNI"placeholder="Ingresa D.N.I."></p>
				</fieldset><br><br>
				<fieldset>
					<h2>Crea tu usuario</h2>
					<input type="text" name= "email" placeholder="Ingresa tu email">
					<input type="password" name= "contrasena" placeholder="Ingresa contraseña">
					<input type="password" name= "confirmar" placeholder="Confirma tu contraseña">
</fieldset>
					<input type="submit" value="Registrar">
				</form>
			</fieldset>
			<div class="container">
		</div>
		
		<!-- JavaScript cargar Imagen -->
			<script type="text/javascript">
      		const $seleccionArchivos = document.querySelector("#imgplato"),
        	$imagenPrevisualizacion = document.querySelector("#imgcargado");
          	$seleccionArchivos.addEventListener("change", () => {
        	const archivos = $seleccionArchivos.files;
        	if (!archivos || !archivos.length) {
          	$imagenPrevisualizacion.src = "";
          	return;
        	}
        	const primerArchivo = archivos[0];
        	const objectURL = URL.createObjectURL(primerArchivo);
        	$imagenPrevisualizacion.src = objectURL;
      		});
      		</script>
			
    	<!-- FIN JavaScript Cargar imagen -->
	</body>
</html>