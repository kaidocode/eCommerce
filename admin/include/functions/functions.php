<?php

function getTitle()
{
    global $pageTitle;
    if (isset($pageTitle)) {
        echo $pageTitle;
    }else{
        echo 'Default';
    }
        
}

/*
**  redirect to page home v 2.0
**  except parametres
**  default values 3 second 
*/

function redirectHome($theMsg,$url = null,$second = 3)
{
    if ($url === null) {
        $url = 'index.php';
        $link = 'Home Page';
    }else{
        if (isset($_SERVER["HTTP_REFERER"])&& $_SERVER["HTTP_REFERER"] !== '') {
            $url = $_SERVER["HTTP_REFERER"];
            $link = 'Previus Page';    
        }else {
            $url = 'index.php';
            $link = 'Home Page';
        }
        

    }
    echo $theMsg;
    echo "<div class='alert alert-info'>You Will be direct To $link in : $second Second</div>";
    header("refresh:$second,url=$url");
    exit();
    
}

/* 
** function cheak items from database 
*/

function cheakItem($select,$from,$value)
{
    global $con;
    $statment = $con -> prepare("SELECT $select FROM $from WHERE $select = ?");
    $statment -> execute(array($value));
    $count = $statment -> rowCount();
    return $count;
}

/* 
** Function Count Items 
*/

function countItems($items,$table)
{
    global $con;
    $stmt2 = $con -> prepare("SELECT COUNT($items) FROM $table");
    $stmt2 -> execute();
    return $stmt2 -> fetchColumn();
}
