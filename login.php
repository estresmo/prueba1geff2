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
	    $query = "SELECT * FROM look_and_ask_iniciar_gratis WHERE email ='$_POST[email]'";
    $resultado = mysqli_query($conexion,$query) or die ("error" . mysqli_error($conexion));
	if ($user = mysqli_fetch_array($resultado)){
		if($_POST['contrasena'] == $user['confirmar']){
			?> 
			<form name="accion" action="gratis_003_final.php" method="POST">
<input type="hidden" name="NIF" value="<?php echo $user['NIF'] ?>">
</form>
<h1>Reedireccionando</h1>
    <script type="text/javascript">
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["accion"].submit();
    }
    </script>
			
			<?php
		}else{
		echo "<h1>Contrasena invalida</h1><meta HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=index.php\">";
		}
	}else{
		echo "<h1>No existe ese correo</h1><meta HTTP-EQUIV=\"REFRESH\" CONTENT=\"5;URL=index.php\">";
	} ?>