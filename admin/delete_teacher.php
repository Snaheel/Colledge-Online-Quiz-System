<?php session_start();
if($_SESSION['login']=="true")
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
    <?php include "header.php"; ?><br><br>
    <div class="container" style="width:60%;margin:auto;">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="add_teacher.php" class="btn btn-primary">Add</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="update_int.php" class="btn btn-primary">Change</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="delete_teacher.php" class="btn btn-primary">Delete</a>
        </div>
      </div>
    </div><br><br>
    <div class="container" style="padding:100px;">
      <form method="post">
        <div class="row">
          <div class="col-xs-4"></div>
          <div class="col-xs-4">
            <input type="email" name="email" placeholder="Email" class="form-control" required>
          </div><div class="col-xs-4"></div>
        </div>
        <div class="row">
          <div class="col-xs-4"></div>
          <div class="col-xs-4 text-center" style="padding:50px;"><input type="submit" name="delete" value="Delete" class="btn btn-primary"></div>
          <div class="col-xs-4"></div>
        </div>
      </form>
  </div>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php
  if(isset($_POST['delete']))
  {
    $email=$_POST['email'];
    //echo "".$username;echo "".$password;

    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="DELETE FROM `teacher` WHERE email = '$email'";
    $rs=mysqli_query($con,$query);

    if($rs)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-success alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    Successfully deleted this teacher.
  </div>
  </div>";
    }
    else {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='col-xs-4'></div><div class='alert alert-danger alert-dismissable col-sx-4'>
    <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
    <strong>Sorry!</strong> Could not delete this teacher.
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
