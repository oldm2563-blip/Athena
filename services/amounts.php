<?php
    require __DIR__ . "/../services/require.php";

    $am = new Member("" , "" , "");
    $amm = $am->amount();

    $mm = new Member("" , "" , "");
    $mmm = $mm->showalls();

    $pm = new Project("","","","");
    $pmm = $pm->amount();
    if($_SERVER['REQUEST_METHOD'] = $_GET){
    $sm = new Sprint("", "", "", "", "", "");
    $smm = $sm->amount($_GET['id']);
    }

    $ssm = new Sprint("", "", "", "", "", "");
    $ssmm = $ssm->amounts();

    $tm = new Task("", "", "", "", "", "", "");
    $ttm = $tm->count();
?>