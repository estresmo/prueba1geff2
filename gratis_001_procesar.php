<?php
        require 'look_and_ask_conexion.php';
		$verif = mysqli_query ($conexion,"Select * from look_and_ask_iniciar_gratis WHERE NIF='$_REQUEST[NIF]'") or die ("error al conectar el servidor");
		$verif2 = mysqli_query ($conexion,"Select * from look_and_ask_iniciar_gratis WHERE email='$_REQUEST[email]'") or die ("error al conectar el servidor");
		if(!mysqli_fetch_array($verif) && !mysqli_fetch_array($verif2)) {
		mysqli_query ($conexion, "create table if not exists user_$_REQUEST[NIF] (codigoplatillo int AUTO_INCREMENT, 
		descripcionplatillo varchar(200),
		tipoimg varchar(200), 
		ingredientes varchar(200),
		platillo varchar(200), 
		imagen longblob, 
		tipo varchar(200),
		precio float,
		alergenos varchar(200),
		activar boolean,
		picante boolean,
		dulce boolean,
		acido boolean,
		PRIMARY KEY (codigoplatillo)
		);") or die("Problemas al crear la tabla" . mysqli_error($conexion));
		if(!empty($_FILES['logo']['tmp_name'])){
    	$logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
    	$tipoimg = $_FILES['logo']['type'];
		}else{
			$logo = addslashes(file_get_contents("img/sin-logo.jpg"));
			$tipoimg = "image/jpeg";
		}
        mysqli_query($conexion, "INSERT into look_and_ask_iniciar_gratis (logo, tipoimg, NRS, direccion, pais, provincia, 
								municipio, horario, NIF, NPA, DNI, email, contrasena, confirmar)
                            	VALUES ('$logo', '$tipoimg', '$_REQUEST[NRS]', '$_REQUEST[direccion]', '$_REQUEST[pais]', '$_REQUEST[provincia]', '$_REQUEST[municipio]', '$_REQUEST[horario]', '$_REQUEST[NIF]',
                            '$_REQUEST[NPA]', '$_REQUEST[DNI]', '$_REQUEST[email]', '$_REQUEST[contrasena]', '$_REQUEST[confirmar]')")
        or die("Problemas en el select" . mysqli_error($conexion));
?>
<!DOCTYPE HTML>
<html>
<form name="accion" action="gratis_002_iniciar.php" method="POST">
<input type="hidden" name="NIF" value="<?php echo $_POST['NIF'] ;?>">
</form>
    <script type="text/javascript">
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["accion"].submit();
    }
    </script>
	</html>
		<?php }else{ echo "NIF o correo ya registrado, por favor regrese e inicie sesion o regrese y verifique el correo y/o NIF";}?>