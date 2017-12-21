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
  <?php include("header_quiz.php") ?>
  <br><br>
  <br><br>
  <form method="post">
    <div class="form-group" style="width:50%;margin:auto;">
      <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required><br>
      <input type="text" name="quiz_num" class="form-control" placeholder="Enter quiz number" required><br>
      <input type="text" name="class" class="form-control" placeholder="this quiz is for which class" required><br><br>
      <div class="row">
        <div class="col-xs-3"><input type="submit" name="add" value="Add Question" class="btn btn-primary"></div>
        <div class="col-xs-3"><input type="submit" name="change" value="Change Question" class="btn btn-primary"></div>
        <div class="col-xs-3 text-right"><input type="submit" name="delete" value="Delete Question" class="btn btn-primary"></div>
        <div class="col-xs-3 text-right"><input type="submit" name="preview" value="Preview Qustion" class="btn btn-primary"></div>
      </div>
    </div>
  </form>
   <?php include("../footer.php") ?>
  </body>
</html>
<?php
  if(isset($_POST['add']))
  {
    $_SESSION['subject']=$_POST['subject'];
    $_SESSION['quiz_num']=$_POST['quiz_num'];
    $_SESSION['cl']=$_POST['class'];
    header("location:add_question.php");
  }
  if(isset($_POST['change']))
  {
    $_SESSION['subject']=$_POST['subject'];
    $_SESSION['quiz_num']=$_POST['quiz_num'];$_SESSION['cl']=$_POST['class'];
    header("location:update_question.php");
  }
  if(isset($_POST['delete']))
  {
    $_SESSION['subject']=$_POST['subject'];
    $_SESSION['quiz_num']=$_POST['quiz_num'];$_SESSION['cl']=$_POST['class'];
    header("location:delete_question.php");
  }
  if(isset($_POST['preview']))
  {
    $_SESSION['subject']=$_POST['subject'];
    $_SESSION['quiz_num']=$_POST['quiz_num'];$_SESSION['cl']=$_POST['class'];
    header("location:preview.php");
  }
}
else {
  header("../location:index.php");
}
 ?>
