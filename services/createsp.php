<?php

    if($_SERVER['REQUEST_METHOD'] = $_POST){
        $name = $_POST['sprint'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $id = $_GET['id'];
        if(!empty($name) && !empty($start) && !empty($end)){
            $pr = new Sprint($id, $name, $start, $end,  $_SESSION['id']);
            $pr->add();
            header("Location: viewpr.php?id=".$id);
            exit();
        }
        else{
            
        }
    }

?>