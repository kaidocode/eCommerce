<?php 
session_start();
$pageTitle='members';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] :'Manage'; // This If and Else Short ^_^



    switch ($do) {
        case 'Manage':
            echo "You are in Manage page ";
            break;
        case 'Edit':?>

            <h2 class="text-center">Edit Members</h2>
            <div class="container">
            <form class="form-horizontal">
                <!-- start username -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">User Name :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="username" class="form-control" autocomplete="off">
                    </div>
                </div>
                <!-- start password -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Password :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="password" name="password" class="form-control" autocomplete="new-password">
                    </div>
                </div>
                <!-- start email -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Email :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <!-- start fullame -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Fullame :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" name="fullame" class="form-control">
                    </div>
                </div>
                <!-- start submit -->
                <div class="form-group form-group-lg">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Save" class="btn btn-primary btn-lg">
                    </div>
                </div>
            </form>
            </div>
            <?php break;
        default:
           echo "You are in invlide page";
    }

    include $tpl . 'footer.php';
}else{
    header('Location: index.php');
    exit();
}

