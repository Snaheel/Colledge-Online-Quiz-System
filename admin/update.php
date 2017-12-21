<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change Settings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php include "header.php"; ?><br><br><br><br>
      <form method="post" style="width:60%;margin:auto;">
        <div class="form-group">
          <label>New Username:</label>
          <input class="form-control" name="username">
        </div>
        <div class="form-group">
          <label for="pwd">New Password:</label>
          <input class="form-control" name="newpassword">
        </div>
        <div class="form-group">
          <label for="pwd">Old Password:</label>
          <input class="form-control" name="oldpassword">
        </div>
        <input type="submit" class="btn btn-primary" name="update" value="Update">
      </form>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php
if(isset($_POST['update']))
{
  $username=$_POST['username'];
  $newpassword=$_POST['newpassword'];
  $oldpassword=$_POST['oldpassword'];
  if($newpassword==$oldpassword)
  {
    echo "<br><div class='row' style='width:50%;margin:auto;'>
    <div class='alert alert-warning alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Error</strong>The new password is similar to the old password.
    </div>
    </div>";
  }
  else {

  $con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"colledge");
  $query="UPDATE `admin` SET `username`='$username',`password`='$newpassword' WHERE password='$oldpassword'";
  $rs=mysqli_query($con,$query);
  if($rs)
  {
    echo "<br><div class='row' style='width:50%;margin:auto;'>
    <div class='alert alert-success alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    Successfully changed the username and password.
    </div>
    </div>";
  }
  else {
    echo "<br><div class='row' style='width:50%;margin:auto;'>
    <div class='col-xs-4'></div><div class='alert alert-danger alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Sorry!</strong> Could not change the username and password.
    </div><div class='col-xs-4'>
    </div>
    </div>";
}
}
}
}
else {
  header("location:access_denied.php");
}
 ?>
