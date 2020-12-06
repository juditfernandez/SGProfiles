<?php
require_once 'posts.php';
class PostsDao{

    public function __construct(){
    }

    public function mostrar(){
        include '../model/connection.php';
        $query = "SELECT * FROM posts";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $id=-1;   
        $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach($lista as $posts) {
        echo "<div class='three-column'>";
            if ($id==$posts['id']) {
                $id=-1;
                continue;
        } else {
            echo "<br>";
        }
            $id=$posts['id'];
            if ($posts['user'] == $_SESSION['user']->getId()) {
                echo "<img class='img1' src='../{$posts['path']}'>";
            } else {
                echo "<img src='../{$posts['path']}'>";
            }
            echo "</div>";
        }
    }

    public function mostrarUsuarios(){
        include '../model/connection.php';
        $query = "SELECT * FROM users";
        $sentencia=$pdo->prepare($query);
        $sentencia->execute();
        $id=-1;   
        $lista=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        echo "<table style='width: 100%';>";
            echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Email</th>";
                echo "<th>Perfil</th>";
                echo "<th>Estado</th>";
            echo "</tr>";
        foreach($lista as $usuario) {
        echo "<tr style='text-align: center';>";
            if ($id==$usuario['id']) {
                $id=-1;
                continue;
        } else {
            echo "<br>";
        }
            $id=$usuario['id'];
            $status=$usuario['status'];
            echo "<td>{$usuario['name']}</td>";
            echo "<td>{$usuario['email']}</td>";
            echo "<td>{$usuario['profile']}</td>";
            if ($usuario['profile'] == 3) {
                echo "<td><i onclick='cambiarIcon()' class='fas fa-lock'></i></td>";
            } else if ($usuario['status'] == 1) {
                echo "<td><a href='../controller/actualizarEstado.php?id=".$id."&status=".$status."'><i onclick='cambiarIcon()'  class='fas fa-lock-open color1'></i></a></td>";
            } else if ($usuario['status'] == 0) {
                echo "<td><a href='../controller/actualizarEstado.php?id=".$id."&status=".$status."'><i onclick='cambiarIcon()'  class='fas fa-lock color2'></i></a></td>";
            }
            $id=$usuario['id'];
            $status=$usuario['status'];
            echo "</tr>";
        }
            echo "</table>";
    }
}