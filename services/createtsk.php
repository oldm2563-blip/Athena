<?php
    if($_SERVER['REQUEST_METHOD'] = $_POST){
        $s_id = $_GET['id'];
        $title = $_POST['Title'];
        $des = $_POST['Description'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        if(!empty($title)){
            $final = new Task($title,  $s_id, $des, $status, $priority, $_SESSION['id'], $_SESSION['id']);
            $final->add();
        }
    }
?>