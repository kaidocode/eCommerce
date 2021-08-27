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
**  redirect to page home
**  except parametres
**  default values 3 second 
*/

function returnHome($error,$second = 3)
{
    echo '<div class="alert alert-danger">'.$error.'</div>';
    echo '<div class="alert alert-info">You Will be direct in : '.$second.' Second</div>';
    header("refresh:$second,url=index.php");
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