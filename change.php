<?php session_start();
if($_SESSION['front']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change</title>
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
      <div class="col-xs-6"><input type="email" name="email" placeholder="Change email" class="form-control"></div> <div class="col-xs-3"></div>
    </div>
    <div class="row form-group">
      <div class="col-xs-3"></div>
      <div class="col-xs-6"><input type="password" name="password" placeholder="Change password" class="form-control"></div> <div class="col-xs-3"></div>
    </div>
    <div class="row">
      <div class="col-xs-3"></div>
      <div class="col-xs-4"><input type="submit" name="change" value="Change" class="btn btn-primary"></div>
      <div class="col-xs-4"></div>
    </div>
    </form>
    </div>
   <?php include("footer.php") ?>
  </body>
</html>
<?php
  if(isset($_POST['change']))
  {
    $table=$_SESSION['table'];
    $em=$_SESSION['email'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");

    if($table=="student"){
    $query="UPDATE `$table` SET `email`= '$email' , `password`= '$password' WHERE email='$em'";
    $rs=mysqli_query($con,$query);
    if($rs)
      {
        $_SESSION['email']=$email;
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-success alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Successfully change entry.
        </div>
        </div>";
      }
      else {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-danger alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Could not change the entry.
        </div>
        </div>";
      }
    }
    if($table=="teacher")
    {
      $query="UPDATE `$table` SET `email`= '$email' , `password`= '$password' WHERE email='$em'";
      $rs=mysqli_query($con,$query);
      if($rs)
        {
          $query="UPDATE `class` SET `email`='$email' WHERE email='$em'";
          $r=mysqli_query($con,$query);
          if($r)
            {
              $_SESSION['email']=$email;
              echo "<br><div class='row' style='width:50%;margin:auto;'>
              <div class='alert alert-success alert-dismissable col-sx-4'>
              <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
              Successfully change entry.
              </div>
              </div>";
            }
            else {
              echo "<br><div class='row' style='width:50%;margin:auto;'>
              <div class='alert alert-danger alert-dismissable col-sx-4'>
              <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
              Could not change the entry.
              </div>
              </div>";
            }
        }
        else {
          echo "<br><div class='row' style='width:50%;margin:auto;'>
          <div class='alert alert-danger alert-dismissable col-sx-4'>
          <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
          Could not change the entry.
          </div>
          </div>";
        }
    }
  }
}
else {
  header("location:index.php");
}
 ?>
