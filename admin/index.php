<?php 

session_start();
$nonavbar = '';
$pageTitle='Login';

if (isset($_SESSION['Username'])) {
    header('Location: dashboard.php');
}

include 'init.php';

?>

<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['user'];
        $password = $_POST['pass'];
        $hashpass = sha1($password);
       
        // cheak if user exist in db

        $stmt = $con -> prepare("SELECT userId, Username, Password FROM users WHERE Username = ? AND Password = ? AND GroupID = 1 LIMIT 1");
        $stmt -> execute(array($username, $hashpass));
        $row = $stmt -> fetch();
        $count = $stmt->rowCount();

        if ($count>0) {
            $_SESSION['Username'] = $username;
            $_SESSION['Id'] = $row['userId'];
            header('Location: dashboard.php');
            exit();
            
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