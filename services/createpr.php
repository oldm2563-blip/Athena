<?php

    if($_SERVER['REQUEST_METHOD'] = $_POST){
        $name = $_POST['Project'];
        $type = $_POST['type'];
        if(!empty($name)){
            $pr = new Project($name, $type, $_SESSION['id']);
            $pr->add();
            header("Location: manage.php");
        }
        else{
            
        }
    }

?>