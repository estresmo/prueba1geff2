
	<!DOCTYPE HTML>
	<html>
<form name="accion" action="gratis_004_final.php" method="POST">
<input type="hidden" name="NIF" value="<?php echo $_REQUEST['NIF'] ?>">
<?php 
require 'look_and_ask_conexion.php';
$query = "DELETE FROM user_$_POST[NIF] WHERE codigoplatillo='$_POST[codigoplatillo]'";
	$consulta = $conexion->query($query);
?>
</form>
    <script type="text/javascript">
    window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["accion"].submit();
    }
    </script>
	</html>
	
