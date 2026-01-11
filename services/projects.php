<?php

$show = new Project("", "", "", "");
$output = $show->showall();

$searchTitle = $_GET['title'] ?? '';


$show = new Project("", "", "", "");
if (!empty($searchTitle)) {
    $output = $show->searchByTitle($searchTitle);
} else {
    $output = $show->showall();
}
