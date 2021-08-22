<?php 

$tpl = "include/templetes/";
$lang = "include/languages/";
$fanc = "include/functions/";
$css = "layout/css/";
$js = "layout/js/";


// import the main files
include $lang.'english.php';
include $fanc.'functions.php';
include $tpl . 'header.php';
include 'connect.php';

if (!isset($nonavbar)) {include $tpl . 'navbar.php';}