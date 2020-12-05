<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Social Gallery</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/code.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">
</head>
<?php
include '../controller/sessionController.php';
?>
<body>
    <!--Menu de navegación-->
    <ul>
        <div class="div2">
        <li><a><?php echo $_SESSION['user']->getEmail() ?></a></li>
        <li><a onclick="openModal()">+</a></li>
        <li><a href="../view/adminUsuario.php">Administrar Usuarios</a></li>
        <li><a href="../view/login.php">logout</a></li>
        </div>
    </ul>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeModal()">&times;</span>
                <h2>Crear posts</h2>
            </div>
            <div class="modal-body">
                <form action="adminHome.php" method="POST" enctype="multipart/form-data">
                    <input type="text" id="title" name="title" placeholder="título de la foto..">
                    <input type="file" id="img" name="img">
                    <input type="submit" value="Añadir">
                </form>
            </div>
        </div>
    </div>

    <!--Galería-->
    <div class="row padding-20"></div>
    <div class="row padding-lat">
        <?php
            require_once '../model/postsDAO.php';
            $posts = new PostsDao();
            $posts->mostrar();
        ?>
    </div>
</body>

</html>