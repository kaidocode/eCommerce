<?php 

session_start();
$pageTitle='Dashboard';
if (isset($_SESSION['Username'])) {
    include 'init.php';
    /* Start Dashboard */
    ?>
    
    <div class="container home-stats text-center">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="stat">
                    Total Members
                    <span>20</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat">
                    Pending Members
                    <span>15</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat">
                    Total Items
                    <span>1521</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat">
                    Total Comments
                    <span>1254</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container latest">
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Latest Register Users
                    </div>
                    <div class="panel-body">
                        Test
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-tag"></i> Latest Items
                    </div>
                    <div class="panel-body">
                        Test
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    /* Start Dashboard */
    include $tpl . 'footer.php';
}else{
    header('Location: index.php');
    exit();
}