<?php
    if($_SERVER['REQUEST_METHOD'] = $_POST){
        $content = $_POST['content']; 
        $id = $_GET['id'];
        if(!empty($content)){
            $pr = new Comment($id, $content);
            $pr->add();
            header("Location: comment.php?id=" . $_GET['id'] . "&idcom=" . $_GET['idcom']);
        }
        else{

        }
    }

?>