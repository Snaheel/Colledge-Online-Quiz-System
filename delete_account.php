<?php session_start();
if($_SESSION['front']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  <?php
  if($_SESSION['table']=="student")
  {
      include("header_user.php");
  }
  else if($_SESSION['table']=="teacher")
  {
    include("header_teacher.php");
  }
   ?>
    <div class="container">
    <form method="post" style="margin-top:70px;">
    <div class="row form-group">
      <div class="col-xs-3"></div>
      <div class="col-xs-6"><input type="password" name="password" placeholder="Enter Your password" class="form-control"></div> <div class="col-xs-3"></div>
    </div>
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-4"><input type="submit" name="delete_account" value="Delete Account" class="btn btn-danger"></div>
      <div class="col-xs-4"></div>
    </div>
    </form>
    </div>
   <?php include("footer.php") ?>
  </body>
</html>
<?php
  if(isset($_POST['delete_account']))
  {
    $table=$_SESSION['table'];
    $email=$_SESSION['email'];
    $password=$_POST['password'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="SELECT * FROM `$table` WHERE email='$email' and password='$password'";
    $rs=mysqli_query($con,$query);
    if($row=mysqli_fetch_array($rs))
    {
      $query="DELETE FROM `$table` WHERE email='$email' and password='$password' ";
      $r=mysqli_query($con,$query);
      if($r)
      {
        session_unset($_SESSION['front']);
        //echo "deleted";
        header("location:index.php");
      }
    }
    else{
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='col-xs-4'></div><div class='alert alert-danger alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Error!</strong> Could not find the user to delete.
  </div><div class='col-xs-4'>
  </div>
  </div>";

    }
  }
}
else {
  header("location:index.php");
}
 ?>
