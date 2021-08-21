<?php

    $dsn = 'mysql:host=localhost;port=3306;dbname=shop';

    $user = 'root';
    $pass = '123456';
    $option =  array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    );

    try {
        $con=new PDO($dsn,$user,$pass,$option);
        //$q = "INSERT INTO users (UserName,Password,Email,FullName)VALUES('Ahmed','123456','O@gmail.com','nacer')";
        //$con -> exec($q);
        //echo 'Connected';
    } catch (PDOException $e) {
        echo 'Failed to connction : Error !!';
    }