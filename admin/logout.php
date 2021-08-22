<?php

session_start(); //Start The Session

session_unset(); // Unset The Session 

session_destroy(); // Destroy The Session

header('Location: index.php');
exit();