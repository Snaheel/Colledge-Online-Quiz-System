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
          <a href="add_class.php" class="btn btn-primary">Add</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="update_i.php" class="btn btn-primary">Change</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="delete_class.php" class="btn btn-primary">Delete</a>
        </div>
      </div>
      </div><br><br>
      <form method="post" style="width:45%;margin:auto;">
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Enter Email">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="class" placeholder="Enter Class">
        </div>
        <input type="submit" value="Update" class="btn btn-primary" name="update">
      </form>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php
if(isset($_POST['update']))
{
  $_SESSION['class']=$_POST['class'];
  $_SESSION['e']=$_POST['email'];
  header("location:update_class.php");
}
}
else {
  header("location:access_denied.php");
}
 ?>
