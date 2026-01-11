<?php
require __DIR__ . "/../services/require.php";
$tskid = $_GET['idts'];
    $delete = new Task("", "", "" , "" , "" , "", "");
    $delete->deletetask($tskid);
    header("Location: ../views/taskv.php?id=" . $_GET['id']);
?>