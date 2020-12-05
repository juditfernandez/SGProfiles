<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">
  <title>Login</title>
  <script src="../js/code.js"></script>
</head>
<body>
<div class="login">
  <h2>Iniciar Sesion</h2>
  <!--Creamos el formulario del login, que nos servirá para recoger variables para el userDAO y la funcion del login -->
    <form class="login-container" action="../controller/loginController.php" method="POST">
        
        <p><input type="email" id="email" name="email" placeholder="Email"></p>
    
        <p><input type="password" id="password" name="password" placeholder="Contraseña"></p>
        <input style="margin-bottom: 10px;" type="submit" value="Iniciar Sesión">
        <button><a href="registro.php">Registrarse</a></button>
         
      </form>
    </div>
</body>
</html>