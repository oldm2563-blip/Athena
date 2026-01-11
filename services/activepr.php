<?php
require __DIR__ . "/../services/require.php";
    $id = $_GET['id'];
    $a = new Project("" , "", "" , "" , "");
    $a->changeactivation(1 , $id);
     header("Location: ../views/admin.php");