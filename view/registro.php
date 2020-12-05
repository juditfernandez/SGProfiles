<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/code.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
  <form action="registro.php" method="POST" onsubmit="return validarFor()">
    <label for="nom">Nombre </label>
    <input type="text" id="nom" name="nom" class="validarFor" placeholder="Pon tu nombre..">

    <label for="apelli">Apellido </label>
    <input type="text" id="apelli" name="apelli" class="validarFor" placeholder="Pon tu apellido..">

    <label for="email">Email </label>
    <input type="email" id="email" name="email" class="validarFor" placeholder="Pon tu email..">

    <label for="contra">Contraseña </label>
    <input type="password" id="contra" name="contra" class="validarFor" placeholder="Pon tu contraseña..">

    <label for="contra1">Confirmar contraseña </label>
    <input type="password" id="contra1" name="contra1" class="validarFor" placeholder="Repite la contraseña..">

    <div style="text-align: center; margin-bottom: 3px;" id="pass"></div>
    
    <input type="submit" value="Crear Cuenta" name="submit">
  </form>
  <?php
  if (isset($_POST['submit'])){
    require_once '../model/profileDAO.php';
    $user = new profileDao();
    $user->insertar();
  }
  ?>

</body>
</html>