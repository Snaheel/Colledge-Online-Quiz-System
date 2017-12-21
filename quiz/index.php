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
  if($_SESSION['table']=="teacher")
  {
    header("location:../teacher.php");
  }
  else if($_SESSION['table']=="student"){
    header("location:../student.php");
  }
  ?>
  </body>
</html>
<?php
}
else {
  header("../location:index.php");
}
 ?>
