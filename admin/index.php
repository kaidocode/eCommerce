<?php 

include "init.php";
include $tpl . "header.php";
include "include/languages/english.php";
include "connect.php";


?>
<form class="Login">
<input class="form-control" type="text" name='user' placeholder="User Name" autocomplete='off'>
<input class="form-control" type="password" name='password' placeholder="Password" autocomplete='new-password'>
<input class="btn btn-primary btn-block" type="submit" value="Login">
</form>

<?php include $tpl . "footer.php"?>