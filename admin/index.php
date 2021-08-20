<?php 

include "init.php";
include "include/languages/english.php";
include $tpl . "header.php";

?>


<form class="login">
<h4 class="text-center">Admin Login</h4>
<input class="form-control input-lg" type="text" name='user' placeholder="Username" autocomplete='off'>
<input class="form-control input-lg" type="password" name='password' placeholder="Password" autocomplete='new-password'>
<input class="btn btn-primary btn-block input-lg" type="submit" value="Login">
</form>

<?php include $tpl . "footer.php"?>