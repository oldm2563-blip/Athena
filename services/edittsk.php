<?php
require __DIR__ . "/../services/session.php";
require __DIR__ . "/../services/require.php";
    if($_SERVER['REQUEST_METHOD'] = $_POST){
        $s_id = $_GET['idts'];
        $id = $_GET['id'];
        $title = $_POST['Title'];
        $des = $_POST['Description'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        if(!empty($title)){
            $final = new Task($title,  $s_id, $des, $status, $priority, $_SESSION['id'], $_SESSION['id']);
            $final->edit($s_id);
            header('Location: ../views/taskv.php?id=' . $_GET['id']);
        }
    }
?>