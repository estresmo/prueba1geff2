<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>Look and Ask / Describe</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/laa_favicon.jpg" type="image/x-icon">
		<link rel="stylesheet" href="assets/css/style.css">
	</head>

<?php
	require 'look_and_ask_conexion.php';

    $query = "SELECT * FROM user_$_POST[NIF] WHERE codigoplatillo = $_POST[codigoplatillo]";
    $resultado = mysqli_query($conexion,$query) or die("error" . mysqli_error($conexion));
 if($plato = mysqli_fetch_array($resultado)){
?>

<body>
	<div class="header">

		<?php require 'partials/header.php';?>

    
  <div class="container">
  
      <form action="gratis_003_modificado.php" method="POST" enctype="multipart/form-data">
			<fieldset>
                <p>Nombre del platillo: <input type="text"  REQUIRED name="platillo" value="<?php echo $plato['platillo'];?>"></p>
				<p><img width="100px" height="100px" src="data:<?php $plato['tipoimg']; ?>;base64,<?php echo base64_encode($plato['imagen']); ?>"/></p>
                <p style="font-size: 11px">NOTA: Para usar la función de realidad aumentada debe cargar su foto sin fondoo, <a href="#imagenmodal" id="btnModal">¿como hago esto?</a></p>
				<p><input type="file" name="imagen"/></p>
 <p>Precio: <input type="text"  REQUIRED name="precio" style="width:15%;" id="imgplato" accept="image/*" value="<?php echo $plato['precio']; ?>"></p>

			</fieldset>
	  <br><br>
			<fieldset>
			<h1>Carga tu platillo</h1>
        <input type="hidden" name="NIF" value="<?php echo $_POST['NIF'];?>">
		<input type="hidden" name="codigoplatillo" value="<?php echo $plato['codigoplatillo'];?>">
        <p>Ingrese descripcion del platillo: <br><textarea rows="3" cols="60" REQUIRED name="descripcionplatillo"><?php echo $plato['descripcionplatillo'];?></textarea></p>
        <p>Seleccione el tipo de platillo:</p>
          <select name="tipo" ">
            <option value="1">Desayunos</option>
            <option value="2">Bebidas</option>
            <option value="3">Entrantes</option>
            <option value="4">Almuerzos</option>
            <option value="5">Pinchos</option>
            <option value="6">Postres</option>
          </select></p>
		  </fieldset>	  <br><br>
			<fieldset>
        <h2>Ingredientes</h2><br>
        <textarea rows="3" cols="60" REQUIRED name="ingredientes"><?php echo $plato['ingredientes'];?></textarea>
		<h2>Alergenos</h2><br>
        <textarea rows="3" cols="60" REQUIRED name="alergenos"><?php echo $plato['alergenos'];?></textarea>
		<input type="checkbox" name="picante" value="1" <?php if ($plato['picante']==1){ echo "checked";} ?>>Picante</input>
		<input type="checkbox" name="dulce" value="1" <?php if ($plato['dulce']==1){ echo "checked";} ?>>Dulce</input>
		<input type="checkbox" name="acido" value="1" <?php if ($plato['acido']==1){ echo "checked";} ?>>Acido</input>
		<input type="hidden" name="activar" value=0></input>
        <p>Activar el plato: <input type="checkbox" name="activar" value="1" <?php if ($plato['activar']==1){ echo "checked";} ?>></p>
        <input type="submit" value="Actualizar plato"><br>
		 </fieldset>
      </form>

  </div>
 <?php }?>
  <!-- Inicio de modal quitar fondo imagen-->
<div id="tvesModal" class="modalContainer" >
 <div class="modal-content">
 <span class="close">×</span> <h2>Quitar fondo de tu imagen</h2>
 <p>PASO 1: Ingresa a <a target="_blank" href="https://www.remove.bg/">esta página</a></p><br>
 <p>PASO 2: Haz click en UPLOAD IMAGE y selecciona la imagen a quitar el fondo</p><br>
 <p>PASO 3: Una vez se cargue, haz click en Download</p><br>
 <p>PASO 4: Sube tu nueva imagen sin fondo aquí</p>
 </div>
 </div> 
<!-- Fin de modal quitar fondo imagen-->

<!-- JavaScript Modal Imagen Sin Fondo -->
    <script type="text/javascript">
    if(document.getElementById("btnModal")){
			var modal = document.getElementById("tvesModal");
			var btn = document.getElementById("btnModal");
			var span = document.getElementsByClassName("close")[0];
			var body = document.getElementsByTagName("body")[0];

			btn.onclick = function() {
				modal.style.display = "block";

				body.style.position = "static";
				body.style.height = "100%";
				body.style.overflow = "hidden";
			}

			span.onclick = function() {
				modal.style.display = "none";

				body.style.position = "inherit";
				body.style.height = "auto";
				body.style.overflow = "visible";
			}

			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";

					body.style.position = "inherit";
					body.style.height = "auto";
					body.style.overflow = "visible";
				}
			}
		}
    </script>
    <!-- FIN JavaScript Modal Imagen Sin Fondo -->
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