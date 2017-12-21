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
    <?php include "header.php"; ?>
    <?php
    $class=$_SESSION['class'];
    $e=$_SESSION['e'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="SELECT `subject`, `teacher`, `class`, `branch`, `year`, `email` FROM `class` where class='$class' and email='$e'";
    $rs=mysqli_query($con,$query);
    while ($row=mysqli_fetch_array($rs)) {
    ?>
    <div class="container" style="width:60%;margin:auto;"><br><br>
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
            <input type="text" name="teacher" value='<?php echo $row['teacher'] ?>' class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="text" name="subject" value=<?php echo $row['subject'] ?> class="form-control" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-6">
            <input type="email" name="email" value=<?php echo $row['email'] ?> class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="text" name="class" value=<?php echo $row['class'] ?> class="form-control" required>
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-6">
            <input type="text" name="branch" value=<?php echo $row['branch'] ?> class="form-control" required>
          </div>
          <div class="col-xs-6">
            <input type="number" name="year" value=<?php echo $row['year'] ?> class="form-control" required>
          </div>
        </div>
      <br><br><br><br>
      <div class="row">
        <div class="col-xs-5"></div>
        <div class="col-xs-6"></div>
        <div class="col-xs-1 text-left">
          <input type="submit" name="update" value="Update" class="btn btn-primary text-right">
        </div>
      </div>
      </div>
    </form>
    <?php } include "footer.php"; ?>
  </body>
</html>
<?php
  if (isset($_POST['update'])) {
    $teacher=$_POST['teacher'];$subject=$_POST['subject'];$email=$_POST['email'];$branch=$_POST['branch'];$class=$_POST['class'];
    $year=$_POST['year'];
    $query="UPDATE `class` SET `subject`='$subject',`teacher`='$teacher',`class`='$class',`branch`='$branch',`year`='$year',`email`= '$email' WHERE class='$class' and email='$e'";
    $rs=mysqli_query($con,$query);

    if($rs)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-success alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      Successfully updated entry.
      </div>
      </div>";
    }
    else {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-danger alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      Could not update the Entry.
      </div>
      </div>";
    }
  }
}
else {
  header("location:access_denied.php");
}
 ?>
