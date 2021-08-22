<?php 

session_start();
$pageTitle='Dashboard';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    echo 'Welcome In Dashboard';

    include $tpl . 'footer.php';
}else{
    header('Location: index.php');
    exit();
}