<?php
require_once 'profile.php';
class ProfileDao{

public function insertar(){
        include '../model/connection.php';
        try {
        //Comienza la transacción
            $pdo->beginTransaction();
            $email=$_POST['email'];
            $select = "SELECT * FROM users WHERE email = '$email'";
            $sentencia1=$pdo->prepare($select);
            $sentencia1->execute();
            if ($sentencia1->rowCount() == 0) {
                $query="INSERT INTO `users` (`id`, `name`, `surname` , `email`, `password`, `status`, `profile`) VALUES (NULL,?,?,?,?,'1','1');";
                $sentencia=$pdo->prepare($query);
                $nom=$_POST['nom'];
                $apelli=$_POST['apelli'];
                $email=$_POST['email'];
                $pass=md5($_POST['contra']);
                $sentencia->bindParam(1,$nom);
                $sentencia->bindParam(2,$apelli);
                $sentencia->bindParam(3,$email);
                $sentencia->bindParam(4,$pass);
                $sentencia->execute();
                $pdo->commit();
                header("Location: ../view/login.php");
            } else {
                echo "<div style='text-align: center; margin-top: -30px; background-color: white; width: 50%; margin-left: 330px;'>El email introducido ya existe</div>";
            }
        } catch (Exception $ex) {
            /* Reconocer un error y no hacer los cambios */
            $pdo->rollback();
            echo $ex->getMessage();
        }
    }

    public function insertarPosts(){
        require_once '../model/connection.php';
        include '../controller/sessionController.php';
        $id = $_SESSION['user']->getId();
        $title = $_POST['title'];
        $path = 'public/'.$_FILES['img']['name'];
            if (move_uploaded_file($_FILES['img']['tmp_name'], '../'.$path)) {
            /* el ID del user se ha de colocar de manera correcta y no de manera hardcodeada */
            $query = "INSERT INTO posts (title, path, user) VALUES(?,?,?)";
            $sentencia = $pdo->prepare($query);
            $sentencia->bindParam(1,$title);
            $sentencia->bindParam(2,$path);
            $sentencia->bindParam(3,$id);
            $sentencia->execute();
            //header("Location: ../view/home.php");
        }
    }

    public function actualizar($id, $status){
        try {
        include '../model/connection.php';
        $pdo->beginTransaction();
        if ($status == 1) {
            $query = "UPDATE users SET `status` = '0' WHERE id = ?";
            $sentencia1=$pdo->prepare($query);
            $sentencia1->bindParam(1,$id);
            $sentencia1->execute();
            $pdo->commit();
            header("Location: ../view/adminUsuario.php");
        } else {
            $query = "UPDATE users SET `status` = '1' WHERE id = ?";
            $sentencia1=$pdo->prepare($query);
            $sentencia1->bindParam(1,$id);
            $sentencia1->execute();
            $pdo->commit();
            header("Location: ../view/adminUsuario.php");
            }
        } catch (Exception $ex) {
            $pdo->rollback();
            echo $ex->getMessage();
        }
    }
}