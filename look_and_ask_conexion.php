<?php 
$Prueba = true;
    if ($Prueba == false) {
        $host = 'localhost';
        $dbname = 'lookandask';
        $username = 'root';
        $password = '';
    }else{
        $host = 'mysql5044.site4now.net';
        $dbname = 'db_a0b737_lookask';
        $username = 'db_a0b737_jesusl';
        $password = 'Ab123456**';
    }
    $conexion = new mysqli($host, $username, $password,$dbname);
    if($conexion->connect_error){
        echo "Error al conectar";
    }
    /*
    //$conexion = mysqli_connect("mysql5044.site4now.net", "db_a0b737_jesusl", "Ab123456**", "db_a0b737_lookask") or
    //die("Problemas con la conexión");
	 $conexion = mysqli_connect("localhost", "root", "", "base1") or
    die("Problemas con la conexión"); */
?>