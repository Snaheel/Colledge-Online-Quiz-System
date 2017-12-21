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
   <?php include("header_quiz.php") ?><br><br>
   <form method="post">
     <div  class="form-group" style="width:50%;margin:auto;">
       <input type="text" name="year" placeholder="Enter year" class="form-control">
       <br>
       <input type="text" name="branch" placeholder="Enter branch" class="form-control">
       <br>
       <input type="text" name="class" placeholder="Enter class" class="form-control">
       <br>
       <input type="submit" name="result" value="Display Result" class="btn btn-primary">
     </div>
   </form>
   <?php include("../footer.php") ?>
  </body>
</html>
<?php
  if(isset($_POST['result']))
  {
    $_SESSION['y']=$_POST['year'];
    $_SESSION['b']=$_POST['branch'];
    $_SESSION['c']=$_POST['class'];
    header("location:quiz_result.php");
  }
}
else {
  header("../location:index.php");
}
 ?>
