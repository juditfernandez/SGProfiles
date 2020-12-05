<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page | Social Gallery</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/code.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">
</head>
    <?php
        require_once '../controller/sessionController.php';
    ?>

<body>
    <!--Menu de navegación-->
    <ul>
        <li><a href="#home"><?php echo $_SESSION['user']->getEmail() ?></a></li>
        <li><a href="#news" onclick="openModal()">+</a></li>
        <li><a href="../view/login.php">logout</a></li>
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
                <form action="home.php" method="POST" enctype="multipart/form-data">
                    <input type="text" id="title" name="title" placeholder="título de la foto..">
                    <input type="file" id="img" name="img">
                    <input type="hidden" id="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value="Añadir">
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    require_once '../model/profileDAO.php';
                    $profile1 = new ProfileDao();
                    $profile1->insertarPosts($id);
                }
                ?>

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

    <!---<div class="row padding-20"></div>
    <div class="row padding-lat">
        <div class="three-column">
            <img src="../public/2880px-Naruto_logo_.svg.png" alt="">
        </div>
        <div class="three-column">
            <img src="../public/2880px-Naruto_logo_.svg.png" alt="">
        </div>
        <div class="three-column">
            <img src="../public/2880px-Naruto_logo_.svg.png" alt="">
        </div>
        <div class="three-column">
            <img src="../public/2880px-Naruto_logo_.svg.png" alt="">
        </div>
        <div class="three-column">
            <img src="../public/2880px-Naruto_logo_.svg.png" alt="">
        </div>
        <div class="three-column">
            <img src="../public/2880px-Naruto_logo_.svg.png" alt="">
        </div>
    </div>
    
    <div class="row" id="section-2">
        <div class="one-column">
            <h1>Subscríbete</h1>
        </div>
    </div>
    <div class="row">
        <div class="two-column">
            <h1>Mi insti.</h1>
        </div>
        <div class="two-column">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23960.114190626755!2d2.091259510397125!3d41.35204347309832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a498d0aa1634f1%3A0xefe8634923d754!2sBellvitge%2C%2008907%20L&#39;Hospitalet%20de%20Llobregat%2C%20Barcelona!5e0!3m2!1sca!2ses!4v1606925269368!5m2!1sca!2ses"
                width="100%" height="auto" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>-->
</body>

</html>