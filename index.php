<!DOCTYPE html>
<html>
        <head>
	<meta charset="utf-8">	
        <title>Look and Ask / Bienvenido</title>
        <!--Font link from "Google Fonts". Select the Font and copy the link and agree font family in "Style.css"-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="img/laa_favicon.jpg" type="image/x-icon">
        <link rel="stylesheet" href="assets/CSS/style.css">
	</head>
<body>
	<div class="header">
                <?php require 'partials/header.php'?>
                
                <div class="container">
                        <div class="tb-register-cart pull-right">
								<a href="gratis_004_restaurantes.php">Ver Restaurantes disponibles</a><br><br>
                                <a>¿No tienes cuenta aún? </a><a href="gratis_001_signup.php">Regístrate</a>
                        </div><br><br>
                        <?php if(!empty($user)): ?>
                                <br>Bienvenido 
                                <br>Has ingresado satifactoriamente
                                <a href="logout.php"></a>
                        <?php else: ?>
                                <div class="box-login">
                                        
                                        <form action="login.php" method="POST">
						<fieldset>
                                                        <h1>Ingrese</h1>
                                                        <a>Email</a>
                                                        <input type="email" name= "email" placeholder="Ingrese su email">
                                                        <a>Contraseña</a>
                                                        <input type="password" name="contrasena" placeholder="Ingrese tu contraseña"><br>
                                                        <input type="submit" value="Adelante">
						</fieldset>
                                        </form>
                                </div>
                        <?php endif; ?>
                </div>
        </div>
</body>
</html>