<?php 

$tpl = "include/templetes/";
$css = "layout/css/";
$js = "layout/js/";
$lang = "include/languages/";

// import the main files
include $lang.'english.php';
include $tpl . 'header.php';
include 'connect.php';

if (!isset($nonavbar)) {include $tpl . 'navbar.php';}