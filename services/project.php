<?php
    $id = $_GET['id'];
    $show = new Project("" , "" , "" , "");
    $outpit = $show->showone($id);