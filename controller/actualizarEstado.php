<?php
    $id=$_GET['id'];
    $status=$_GET['status'];
    require_once '../model/profileDAO.php';
    $profile = new ProfileDao();
    $profile->actualizar($id, $status);
?>