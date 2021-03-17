<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>Look and Ask / Describe</title>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/laa_favicon.jpg" type="image/x-icon">
		<link rel="stylesheet" href="assets/CSS/style.css">
	</head>


<body>
	<div class="header">

		<?php require 'partials/header.php'?>
</div>


  <div class="container">
      <form action="gratis_002_procesar.php" method="POST" enctype="multipart/form-data">
      <fieldset>
      <h2>Carga tu platillo</h2>
	  <p>Nombre del platillo: <input type="text"  REQUIRED name="platillo" placeholder="Nombre del platillo" value=""/></p>
		<p>Foto del platillo:</p>
		<p><img width="100px" height="100px" id="imgcargado"><input type="file" REQUIRED name="imagen" id="imgplato" accept="image/*"></p>
		<p style="font-size: 11px">NOTA: Para usar la función de realidad aumentada debe cargar su foto sin fondoo, <a href="#imagenmodal" id="btnModal">¿como hago esto?</a></p>
    <p>Precio: <input type="text"  REQUIRED name="precio" placeholder="0.00 €" style="width:15%;"></p>
		</fieldset>
		 <br><br>
		<fieldset>
      <h2>Detalles del platillo</h2>
        <input type="hidden" name="NIF" value=<?php echo $_POST['NIF'];?>>
        <p>Ingrese descripcion del platillo: <br><textarea rows="3" cols="60" REQUIRED name="descripcionplatillo"></textarea></p>
        <p>Seleccione el tipo de platillo:</p>
          <select name="tipo">
            <option value="1">Desayunos</option>
            <option value="2">Bebidas</option>
            <option value="3">Entrantes</option>
            <option value="4">Almuerzos</option>
            <option value="5">Pinchos</option>
            <option value="6">Postres</option>
          </select></p>
          <p></p>
      </fieldset>
      <br><br>
      <fieldset>
        <h2>Ingredientes</h2><br>
        <textarea rows="3" cols="60" REQUIRED name="ingredientes"></textarea>
		<h2>Alergenos</h2><br>
        <textarea rows="3" cols="60" REQUIRED name="alergenos"></textarea>
		<input type="checkbox" name="picante" value="1">Picante</input>
		<input type="checkbox" name="dulce" value="1">Dulce</input>
		<input type="checkbox" name="acido" value="1">Acido</input>
		<input type="hidden" name="activar" value=0></input>
        <p>Activar el plato: <input type="checkbox" name="activar" value="1" required></p>
        <input type="submit" value="Crear plato"><br>
      </fieldset>
      </form>
	   <br><br>
  </div>
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
              // Obtener referencia al input y a la imagen
      const $seleccionArchivos = document.querySelector("#imgplato"),
        $imagenPrevisualizacion = document.querySelector("#imgcargado");

              // Escuchar cuando cambie
          $seleccionArchivos.addEventListener("change", () => {
              // Los archivos seleccionados, pueden ser muchos o uno
        const archivos = $seleccionArchivos.files;
              // Si no hay archivos salimos de la función y quitamos la imagen
        if (!archivos || !archivos.length) {
          $imagenPrevisualizacion.src = "";
          return;
        }
               // Ahora tomamos el primer archivo, el cual vamos a previsualizar
        const primerArchivo = archivos[0];
              // Lo convertimos a un objeto de tipo objectURL
        const objectURL = URL.createObjectURL(primerArchivo);
              // Y a la fuente de la imagen le ponemos el objectURL
        $imagenPrevisualizacion.src = objectURL;
      });
      </script>
    <!-- FIN JavaScript Cargar imagen -->
	</body>
	</HTML>

