<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Teacher</title>
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
    <form method="post">
      <div class="form-group" style="width:70%;margin:auto;">
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="fname" placeholder="First Name" class="form-control" >
          </div>
          <div class="col-xs-6">
            <input type="text" placeholder="Last name" name="sname" class="form-control" >
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-6">
            <input type="email" name="email" placeholder="Email" class="form-control" >
          </div>
          <div class="col-xs-6">
            <input type="text" name="number" placeholder="Phone Number" class="form-control" >
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="branch" placeholder="Enter Branch" class="form-control">
          </div>
          <div class="col-xs-6">
            <input type="text" name="password" placeholder="Enter Random Password" class="form-control" >
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6">
            <input type="date" name="dob" placeholder="Date Of Birth" class="form-control">
          </div>
          <div class="col-xs-6 checkbox">
            <label><code>Sex:</code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label class="radio-inline"><input type="radio" name="sex" value="male"><code>Male</code></label>
            <label class="radio-inline"><input type="radio" name="sex" value="female"><code>Female</code></label>
          </div>
        </div><br><br><br><br>
        <div class="row">
          <div class="col-xs-5"></div>
          <div class="col-xs-6"></div>
          <div class="col-xs-1">
            <input type="submit" name="add" value="Add" class="btn btn-primary text-right">
          </div>
        </div>
        </div>
    </form>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php
  if (isset($_POST['add']))
  {
    $fname=$_POST['fname'];$sname=$_POST['sname'];$email=$_POST['email'];$number=$_POST['number'];
    $password=$_POST['password'];$branch=$_POST['branch'];$sex=$_POST['sex'];
    $dob =$_POST['dob'];
    $date=date_create($dob);
    date_format($date,"Y/m/d");

    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="INSERT INTO `teacher`(`fname`, `sname`, `number`, `email`, `sex`, `dob`, `branch`, `password`) VALUES ('$fname','$sname','$number','$email','$sex','$dob','$branch','$password')";
    $rs=mysqli_query($con,$query);
    if($rs)
      {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-success alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Successfully added a new entry.
        </div>
        </div>";
      }
      else {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-danger alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Could not add the Entry.
        </div>
        </div>";
      }
  }
}
else {
  header("location:access_denied.php");
}
 ?>
