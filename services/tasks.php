<?php
    $iid = $_SESSION['id'];
    $id = $_GET['id'];
    $helli = new Task("", "" , "" , "" , "" , "", "");
    $hello = $helli->showall($id, $iid);

 