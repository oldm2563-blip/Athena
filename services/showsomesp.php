<?php
    $id = $_GET['id'];
    $show = new Sprint("", "", "", "", "", "");
    $output = $show->showsome($id);