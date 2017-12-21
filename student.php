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
  <?php include("header_user.php") ?>
   <?php
    $table = $_SESSION['table'];
    $email = $_SESSION['email'];

    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="SELECT * FROM `$table` WHERE email= '$email' ";
    $rs=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($rs))
      { ?>
    <div class="container"><br><br><br>
      <div class="col-xs-3 img-circle"><img src="people.png" style="width:100%;height:100%;"></div>
      <div class="col-xs-1"></div>
      <div class="col-xs-6">
        <h1 style="display:inline;">Hello </h1><h3 style="display:inline;"><?php echo $row['fname']." ".$row['sname'] ?></h3><br>
        <hr >
        <h2>Your Details</h2>
        <div class="row">
          <div class="col-xs-4"><h4>Date of Birth</h4></div>
          <div class="col-xs-6"><h4><?php echo $row['dob'] ?></h4></div>
        </div>
        <div class="row">
          <div class="col-xs-4"><h4>Current Year</h4></div>
          <div class="col-xs-6"><h4><?php echo $row['year'] ?></h4></div>
        </div>
        <div class="row">
          <div class="col-xs-4"><h4>Branch</h4></div>
          <div class="col-xs-6"><h4><?php echo $row['branch'] ?></h4></div>
        </div>
        <div class="row">
          <div class="col-xs-4"><h4>Section</h4></div>
          <div class="col-xs-6"><h4><?php echo $row['class'] ?></h4></div>
        </div>
        <div class="row">
          <div class="col-xs-4"><h4>Email</h4></div>
          <div class="col-xs-6"><h4><?php echo $row['email'] ?></h4></div>
        </div>
        <div class="row">
          <div class="col-xs-4"><h4>Contact Number</h4></div>
          <div class="col-xs-6"><h4><?php echo $row['number'] ?></h4></div>
        </div>
      </div>
    </div>
   <?php } include("footer.php") ?>
  </body>
</html>
<?php
}
else {
  header("location:index.php");
}
 ?>
