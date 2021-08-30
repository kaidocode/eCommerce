<?php
session_start();
$pageTitle='members';
if (isset($_SESSION['Username'])) {
    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] :'Manage'; // This If and Else Short ^_^



    switch ($do) {
        case 'Manage':/**********Manage Members Page******************/

         

        $stmt = $con -> prepare("SELECT * FROM users WHERE groupId != 1");

        $stmt -> execute();
        $rows = $stmt->fetchAll();

        ?>
          <h1 class="text-center">Manage Members</h1>
          <div class="container">
            <div class=".table-responsive">
              <table class="main-table text-center table">
                <tr>
                  <td>#ID</td>
                  <td>User Name</td>
                  <td>Email</td>
                  <td>Full Name</td>
                  <td>Register Date</td>
                  <td>Control</td>
                </tr>

                <?php

                  foreach ($rows as $row) {
                    echo "<tr>";
                    echo "<td>".$row['userId']."</td>";
                    echo "<td>".$row['Username']."</td>";
                    echo "<td>".$row['Email']."</td>";
                    echo "<td>".$row['FullName']."</td>";
                    echo "<td>12/12/2021</td>";
                    echo '<td>
                    <a href="?do=Edit&userId='.$row['userId'].'" class="btn btn-success"><i class="fa fa-edit"></i> Edit</a>
                    <a href="?do=Delete&userId='.$row['userId'].'"  class="btn btn-danger confirm"><i class="fa fa-times"></i> Delete</a>
                    </td>';
                    echo "</tr>";
                  }
                 ?>



              </table>
            </div>
            <a href='?do=Add' class="btn btn-primary"><i class="fa fa-plus"></i> New Members</a>
          </div>



        <?php
        break;
        case 'Add':
        ?>

        <h1 class="text-center">Add New Members</h1>
        <div class="container">
        <form class="form-horizontal" action="?do=Insert" method="Post">

            <!-- start username -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">User Name :</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text"  name="username" class="form-control" autocomplete="off" required="required">
                </div>
            </div>
            <!-- start password -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Password :</label>
                <div class="col-sm-10 col-md-6">

                    <input type="password" name="password" class="password form-control" autocomplete="new-password" required="required">
                    <i class="show-pass fa fa-eye fa-2x"></i>
                </div>
            </div>
            <!-- start email -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Email :</label>
                <div class="col-sm-10 col-md-6">
                    <input type="email" name="email" class="form-control" required="required">
                </div>
            </div>
            <!-- start fullame -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Fullame :</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="fullname" class="form-control" required="required">
                </div>
            </div>
            <!-- start submit -->
            <div class="form-group form-group-lg">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Add New Members" class="btn btn-primary btn-lg">
                </div>
            </div>
        </form>
        </div>
        <?php
        break;
        case 'Edit':
            $userId = isset($_GET['userId']) && is_numeric($_GET['userId']) ? intval($_GET['userId']) : 0 ;
            $stmt = $con -> prepare("SELECT * FROM users WHERE userId = ? LIMIT 1");
        $stmt -> execute(array($userId));
        $row = $stmt -> fetch();
        $count = $stmt->rowCount();

        if ($count > 0) {
            ?>

            <h1 class="text-center">Edit Members</h1>
            <div class="container">
            <form class="form-horizontal" action="?do=Update" method="Post">
            <input type="hidden" value="<?php echo $row['userId'] ?>" name="userid" >
                <!-- start username -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">User Name :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" value="<?php echo $row['Username'] ?>" name="username" class="form-control" autocomplete="off" required="required">
                    </div>
                </div>
                <!-- start password -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Password :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="hidden"  name="oldpassword" value="<?php echo $row['Password']  ?>">
                        <input type="password"  name="newpassword" class="form-control" autocomplete="new-password">
                    </div>
                </div>
                <!-- start email -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Email :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="email" value="<?php echo $row['Email'] ?>" name="email" class="form-control" required="required">
                    </div>
                </div>
                <!-- start fullame -->
                <div class="form-group form-group-lg">
                    <label class="col-sm-2 control-label">Fullame :</label>
                    <div class="col-sm-10 col-md-6">
                        <input type="text" value="<?php echo $row['FullName'] ?>" name="fullname" class="form-control" required="required">
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
            <?php
        } else {
            echo '<div class="container">';
            $theMsg = '<div class="alert alert-danger">There Is No Such User</div>';
            redirectHome($theMsg);
            echo '</div>';
        }


        break;

        case 'Insert':
        if ($_SERVER['REQUEST_METHOD']=='POST') {

            $User = $_POST['username'];
            $Password = sha1($_POST['password']);
            $Email = $_POST['email'];
            $Name = $_POST['fullname'];


            // Password Trick



            // Validate The Form
            $formErrors = array();

            echo "<h1 class='text-center'>Add New Members</h1>";
            echo '<div class="container">';



            if (strlen($User) < 4) {
              $formErrors[] = 'length cant be less than 4 character';
            }

            if (empty($User)) {
              $formErrors[] = 'User Name Cant Be Empty';
            }

            if (strlen($_POST['password']) < 4 ) {
              $formErrors[] = 'Password length cant be less than 8 character';
            }



            if (empty($Email)) {
              $formErrors[] = 'Email Cant Be Empty';
            }

            if (empty($Name)) {
              $formErrors[] = 'Full Name Cant Be Empty';
            }

            foreach ($formErrors as $error) {
              echo '<div class="alert alert-danger">'.$error . '</div>';
            }


            if (empty($formErrors) ) {

              $cheak = cheakItem('username','users',$User);

              if ($cheak == 1) {
                echo '<div class="alert alert-danger">Sorry The User Name Is Already Exist</div>';
              }else{

             
                $stmt = $con -> prepare("INSERT INTO users (username,email,fullname,password) VALUES (?,?,?,?)");

                $stmt -> execute(array($User, $Email, $Name, $Password));

                $theMsg = '<div class="alert alert-success">'.$stmt->rowCount() . ' Record Added</div>';

                redirectHome($theMsg,'back');
              }
            }
            echo "</div>";
          }else {
            echo "<h1 class='text-center'>Add New Members</h1>";
              echo '<div class="container">';
              $theMsg = '<div class="alert alert-danger">Sorry You Cant brows This Page Derictely</div>';
              redirectHome($theMsg,'back');
              echo "</div>";
          }

        break;
        case 'Update':
            if ($_SERVER['REQUEST_METHOD'] =='POST') {

                $Id = $_POST['userid'];
                $User = $_POST['username'];
                $Email = $_POST['email'];
                $Name = $_POST['fullname'];

                // Password Trick

                // condition ? true : false
                $pass = empty($_POST['newpassword']) ? $_POST['oldpassword'] : sha1($_POST['newpassword']);

                // Validate The Form
                $formErrors = array();

                echo "<h1 class='text-center'>Edit Members</h1>";
                echo "<div class='container'>";

                if (strlen($User) < 4) {
                  $formErrors[] = 'length cant be less than 4 character';
                }

                if (empty($User)) {
                  $formErrors[] = 'User Name Cant Be Empty';
                }

                if (empty($Email)) {
                  $formErrors[] = 'Email Cant Be Empty';
                }

                if (empty($Name)) {
                  $formErrors[] = 'Full Name Cant Be Empty';
                }

                foreach ($formErrors as $error) {
                  echo '<div class="alert alert-danger">'.$error . '</div>';
                }


                if (empty($formErrors)) {
                  $stmt = $con -> prepare("UPDATE users SET UserName= ?,Email = ?,FullName = ?,Password = ? WHERE userId = ?");

                  $stmt -> execute(array($User, $Email, $Name, $pass, $Id));

                  $theMsg = '<div class="alert alert-success">'.$stmt->rowCount() . " Record Updated</div>";
                  redirectHome($theMsg,'back');
                }

                } else {
                echo '<div class="container">';
                $theMsg = "<div class='alert alert-danger'>Sorry You Can't brows This Page</div> ";
                redirectHome($theMsg);
                echo "</div>";
            }
            echo "</div>";
        break;

        case 'Delete':

            $userId = isset($_GET['userId']) && is_numeric($_GET['userId']) ? intval($_GET['userId']) : 0 ;
            $stmt = $con -> prepare("SELECT * FROM users WHERE userId = ? LIMIT 1");
            $stmt -> execute(array($userId));
            
            $count = $stmt->rowCount();
            
          if ($count > 0) {
            $stmt = $con -> prepare("DELETE FROM users WHERE userId = :zuserId");
            $stmt -> bindParam(":zuserId",$userId); 
            $stmt -> execute();
              echo "<h1 class='text-center'>Delete Members</h1>";
              echo '<div class="container">';
              $theMsg =  '<div class="alert alert-success">'. $stmt->rowCount() . " Record Deleted</div>";
              redirectHome($theMsg,'back');
              echo "</div>";

          }else {
            echo '<div class="container">';
            $theMsg ="<div class='alert alert-danger'>There is no sush Id</div>";
            redirectHome($theMsg);
            echo "</div>";
          }
            
          
        break;

        default:
           echo "You are in invlide page";
    }

    include $tpl . 'footer.php';
}else{
    header('Location: index.php');
    exit();
}
