<!DOCTYPE html>
<html>
        <head>
	<meta charset="utf-8">	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Look and Ask / Bienvenido</title>
        <!--Font link from "Google Fonts". Select the Font and copy the link and agree font family in "Style.css"-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/laa_favicon.jpg" type="image/x-icon">
        <link rel="stylesheet" href="assets/CSS/style.css">
    </head>
<body>
<?php require 'look_and_ask_conexion.php';
			$query="SELECT imagen, tipoimg FROM user_$_REQUEST[nf] WHERE codigoplatillo =$_REQUEST[co]";
				$consulta=$conexion->query($query); //$consulta=mysqli_query($conexion, $query); //algoritmo para consultar base de datos y generar platillo //$ss=mysqli_query($conexion, "SELECT * FROM look_and_ask_2 INNER JOIN look_and_ask ON NIF"); //while ($fila=mysqli_fetch_array($ss))
				echo $query;
                if ($plato = mysqli_fetch_array($consulta)) { ?>
<!-- Cabecera -->
<h1>Capturar Webcam con HTML5 y Javascript</h1>
<h2>Raúl Prieto Fernández</h2>
<div>
		<select name="listaDeDispositivos" id="listaDeDispositivos"></select>
		<button id="boton">Tomar foto</button>
		<p id="estado"></p>
</div>

<!-- Mensaje de error -->
<span name="errorMsg"></span>

<!-- Cargar Frame de TV y cargar el video de la webcam -->
<div id="video_wrap">
    <div id="video_overlays">

    <div class="img-div-center">
      <img src="data:<?php $plato['tipoimg']; ?>;base64,<?php echo base64_encode($plato['imagen']); ?>" class="img-centro-vert-hor" alt="" style="width:30%;height:30%">
    </div>

    </div> 
    <video id="video_frame" playsinline autoplay  muted="muted"></video>
</div>

<!-- Capturamos la imagen a través de la API web y lo mostramos en el canvas -->
<div class="button_controller">
    <!-- Botón para capturar -->
    <button id="snap_frame">Capturar Imagen</button>
    <br/><br/>
    <!-- Imagen de la Webcam -->
    <canvas id="canvas_frame"></canvas>
</div>
<?php } ?>


<!-- Cargamos el Javascript -->
<script type="text/javascript">
'use strict'; // Para hacer que el código sea mas seguro.

// Definimos las constantes que vamos a utilizar
const videoFrame = document.getElementById('video_frame');
const canvasFrame = document.getElementById('canvas_frame');
const snapFrame = document.getElementById("snap_frame");
const errorMsgElement = document.querySelector('span#errorMsg');

// Definimos tamaño del video y si queremos audio o no
const constraints = {
    audio: true,
    video: {
        width: 720, height: 405
    }
};

// Comprobamos acceso a la Webcam
async function init() {
    try {
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
    } catch (e) {
        errorMsgElement.innerHTML = `navigator.getUserMedia error:${e.toString()}`;
    }
}

// En caso de que el acceso sea correcto, cargamos la webcam
async function handleSuccess(stream) {
    window.stream = stream;
    videoFrame.srcObject = stream;
}

// Iniciamos JS
init();

// Hacemos captura de pantalla al hacer click
var context = canvasFrame.getContext('2d');
snapFrame.addEventListener("click", function() {
    context.drawImage(videoFrame, 0, 0, 320, 140);
});

const $listaDeDispositivos = document.querySelector("#listaDeDispositivos");
 
 // La función que es llamada después de que ya se dieron los permisos
 // Lo que hace es llenar el select con los dispositivos obtenidos
 const llenarSelectConDispositivosDisponibles = () => {
  
     navigator
         .mediaDevices
         .enumerateDevices()
         .then(function (dispositivos) {
             const dispositivosDeVideo = [];
             dispositivos.forEach(function (dispositivo) {
                 const tipo = dispositivo.kind;
                 if (tipo === "videoinput") {
                     dispositivosDeVideo.push(dispositivo);
                 }
             });
  
             // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
             if (dispositivosDeVideo.length > 0) {
                 // Llenar el select
                 dispositivosDeVideo.forEach(dispositivo => {
                     const option = document.createElement('option');
                     option.value = dispositivo.deviceId;
                     option.text = dispositivo.label;
                     $listaDeDispositivos.appendChild(option);
                     console.log("$listaDeDispositivos => ", $listaDeDispositivos)
                 });
             }
         });
 }
</script>

</body>
</html>