
<?php
	require 'look_and_ask_conexion.php';
	if (isset($_POST['picante'])){$picante=1;}else{$picante=0;} 
if (isset($_POST['dulce'])){$dulce=1;}else{$dulce=0;} 
if (isset($_POST['acido'])){$acido=1;}else{$acido=0;} 
	$tipo = $_POST['tipo'];
		switch ($tipo){ 
		case 1: $labeltipo = "Desayunos";break;
		case 2: $labeltipo = "Bebidas";break;
		case 3: $labeltipo = "Entrantes";break;
		case 4: $labeltipo = "Almuerzos";break;
		case 5: $labeltipo = "pinchos";break;
		case 6: $labeltipo = "Postres";break;
	}
$query = "UPDATE user_$_POST[NIF] SET  
						descripcionplatillo='$_POST[descripcionplatillo]',
   						tipo='$labeltipo', 
						ingredientes='$_POST[ingredientes]', 
						precio='$_POST[precio]',
						dulce='$dulce',
						acido='$acido',
						picante='$picante',
						alergenos='$_POST[alergenos]' 
						WHERE codigoplatillo=$_POST[codigoplatillo]
						";
	$consulta = $conexion->query($query);
	if(!$consulta) {echo mysqli_error($conexion);}
	
	if($_FILES['imagen']['tmp_name']){
    $platillo = $_POST['platillo'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $tipoImagen = $_FILES['imagen']['type'];
    $permitido = array("image/jpeg","image/png");
    if (in_array($tipoImagen, $permitido) == false) {
      die("Archivo no permitido");
    }
    $query = "UPDATE user_$_POST[NIF] SET 
	platillo='$platillo', 
	imagen='$imagen', 
	tipoimg='$tipoImagen'
	WHERE codigoplatillo='$_POST[codigoplatillo]'";
    $resultado = $conexion->query($query);
	}else{
		$query = "UPDATE user_$_POST[NIF] SET 
		platillo='$_POST[platillo]'
		WHERE codigoplatillo='$_POST[codigoplatillo]'";
		$resultado = $conexion->query($query);
	}
		?>
	
	<!DOCTYPE HTML>
	<html>
<form name="accion" action="gratis_003_final.php" method="POST">
<input type="hidden" name="NIF" value="<?php echo $_POST['NIF'] ?>">
</form>
    <script type="text/javascript">
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["accion"].submit();
    }
    </script>
	</html>