<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Student</title>
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
          <a href="add_student.php" class="btn btn-primary">Add</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="update_initial.php" class="btn btn-primary">Change</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="delete_student.php" class="btn btn-primary">Delete</a>
        </div>
      </div>
    </div><br><br>
    <form method="post">
      <div class="form-group" style="width:70%;margin:auto;">
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="fname" placeholder="First Name" class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="text" placeholder="Last name" name="sname" class="form-control" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-6">
            <input type="email" name="email" placeholder="Email" class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="text" name="number" placeholder="Phone Number" class="form-control" required>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6">
            <input type="number" name="year" placeholder="Current Year" class="form-control">
          </div>
          <div class="col-xs-6">
            <input type="text" name="password" placeholder="Enter Random Password" class="form-control" required>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="branch" placeholder="Enter Branch" class="form-control">
          </div>
          <div class="col-xs-6">
            <input type="text" name="class" placeholder="Enter Section eg: branch-section" class="form-control">
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6 checkbox">
            <label><code>Sex:</code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label class="radio-inline"><input type="radio" name="sex" value="male"><code>Male</code></label>
            <label class="radio-inline"><input type="radio" name="sex" value="female"><code>Female</code></label>
          </div>
          <div class="col-xs-6">
            <input type="date" name="dob" placeholder="Date Of Birth" class="form-control">
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
    $fname=$_POST['fname'];$sname=$_POST['sname'];$email=$_POST['email'];$number=$_POST['number'];$year=$_POST['year'];
    $password=$_POST['password'];$branch=$_POST['branch'];$class=$_POST['class'];$sex=$_POST['sex'];

    $dob =$_POST['dob'];
    $date=date_create($dob);
    date_format($date,"Y/m/d");


    //$dob = ("d-m-y" , strtotime($originalDate));
    //echo $dob;
   if($year<1)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-warning alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      <strong>Error</strong>The value year cannot be less than 1.
      </div>
      </div>";
    }
    else{
      $con=mysqli_connect("localhost","root","");
      mysqli_select_db($con,"colledge");
      
      $query="INSERT INTO `student`( `fname`, `sname`, `year`, `number`, `email`, `branch`, `sex`, `dob`, `class`, `password`) VALUES ('$fname','$sname',$year,'$number','$email','$branch','$sex','$dob','$class','$password')";
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
}
else {
  header("location:access_denied.php");
}
 ?>
