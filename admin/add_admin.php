<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Admin</title>
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
        <label for="email">Username:</label>
        <input class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="password">
      </div>
      <input type="submit" value="Add" class="btn btn-primary" name="add">
    </form>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php
 if(isset($_POST['add']))
 {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="INSERT INTO `admin`(`username`, `password`) VALUES ('$username','$password')";
    $rs=mysqli_query($con,$query);
    if($rs)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-success alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    Successfully added this admin.
  </div>
  </div>";
    }
    else {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='col-xs-4'></div><div class='alert alert-danger alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Sorry!</strong> Could not add this admin.
  </div><div class='col-xs-4'>
  </div>
  </div>";
    }
 }
}
else {
  header("location:access_denied.php");
}
 ?>
