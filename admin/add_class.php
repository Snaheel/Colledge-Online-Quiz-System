<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add class</title>
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
    <form method="post">
      <div class="form-group" style="width:70%;margin:auto;">
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="teacher" placeholder="Complete Teacher name" class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="text" name="subject" placeholder="Enter Subject" class="form-control" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-6">
            <input type="email" name="email" placeholder="Enter email" class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="text" name="class" placeholder="Enter Class" class="form-control" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="branch" placeholder="Enter branch" class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="number" name="year" placeholder="Enter Year" class="form-control" required>
          </div>
        </div>
      <br><br><br><br>
      <div class="row">
        <div class="col-xs-5"></div>
        <div class="col-xs-6"></div>
        <div class="col-xs-1 text-left">
          <input type="submit" name="add" value="Add" class="btn btn-primary text-right">
        </div>
      </div>
      </div>
    </form>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php
  if(isset($_POST['add']))
  {
    $teacher=$_POST['teacher'];$subject=$_POST['subject'];$email=$_POST['email'];$branch=$_POST['branch'];$class=$_POST['class'];
    $year=$_POST['year'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="INSERT INTO `class`(`subject`, `teacher`, `class`, `branch`, `year`, `email`) VALUES ('$subject','$teacher','$class','$branch','$year','$email')";
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
