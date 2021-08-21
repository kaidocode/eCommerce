<?php 

session_start();
print_r($_SESSION);
include "init.php";
include "connect.php";
include "include/languages/english.php";
include $tpl . "header.php";

?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $hashpass = sha1($password);
       
        // cheak if user exist in db

        $stmt = $con -> prepare("SELECT UserName, Password FROM users WHERE UserName = ? AND Password = ? AND groupId = 1 ");
        $stmt -> execute(array($username, $hashpass));
        $count = $stmt->rowCount();

        if ($count>0) {
            echo 'Welcome ' . $username;
        }
        
    };
?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<h4 class="text-center">Admin Login</h4>
<input class="form-control input-lg" type="text" name='user' placeholder="Username" autocomplete='off'>
<input class="form-control input-lg" type="password" name='pass' placeholder="Password" autocomplete='new-password'>
<input class="btn btn-primary btn-block input-lg" type="submit" value="Login">
</form>

<?php include $tpl . "footer.php"?>