<?php 

session_start();
$pageTitle='Dashboard';
if (isset($_SESSION['Username'])) {
    include 'init.php';
    /* Start Dashboard */
    ?>
    
    <div class="container home-stats">
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

    <?php
    /* Start Dashboard */
    include $tpl . 'footer.php';
}else{
    header('Location: index.php');
    exit();
}