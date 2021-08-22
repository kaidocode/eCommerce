<?php



    $do = '';

    if (isset($_GET['do'])) {
        $do = $_GET['do'];
    }else{
        $do = 'Manage';
    }

    switch ($do) {
        case 'Manage':
            echo "You are in Manage page ";
            echo "<a href='?do=Insert'>Add new category</a>";
            break;
        case 'Add':
            echo "You are in add page";
            break;
        case 'Insert':
            echo "You are in Insert page";
            break;
        default:
           echo "You are in invlide page";
    }


