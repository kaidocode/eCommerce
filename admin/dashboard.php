<?php 

session_start();
$pageTitle='Main Dashboard';
if (isset($_SESSION['Username'])) {
    include 'init.php';
    /* Start Dashboard */
    
    ?>
    
    <div class="container home-stats text-center">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="stat st-members">
                    Total Members
                    <span><a href="members.php"> <?php echo countItems('userId','users') ?></a></span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat st-pending">
                    Pending Members
                    <span><a href="members.php?do=Manage&page=Pending"><?php echo cheakItem('regstatus','users',0)?></a></span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat st-items">
                    Total Items
                    <span>1521</span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat st-comments">
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
                    <?php $limit = 5?>
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Latest  <?php echo $limit ?> Register Users
                    </div>
                    <div class="panel-body">
                        <ul class='list-unstyled latest-users'>
                        <?php 
                            $Latest = getLatest('userId,username','users','userid',$limit);
                            foreach ( $Latest as $users) {
                                echo '<li>'.$users['username'] . 
                                '<span class="btn btn-success pull-right"><a href="members.php?do=Edit&userId='.$users['userId'] .'"><i class="fa fa-edit"></i>Edit</a></span>
                                </li>';
                            }
                        ?>
                        </ul>
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
