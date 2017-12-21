<?php session_start();
if($_SESSION['front']=="true")
{
  if($_SESSION['subject']==""||$_SESSION['quiz_num']=="")
  {
    header("location:quiz.php");
  }
  else {
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
  <div class="container" style="width:60%;margin:auto;">
    <div class="row">
      <div class="col-xs-4 text-center">
        <a href="add_question.php" class="btn btn-primary">Add Question</a>
      </div>
      <div class="col-xs-4 text-center">
        <a href="update_question.php" class="btn btn-primary">Change Question</a>
      </div>
      <div class="col-xs-4 text-center">
        <a href="delete_question.php" class="btn btn-primary">Delete Question</a>
      </div>
    </div>
  </div><br><br><br>
    <form method="post">
      <div class="form-group" style="width:50%;margin:auto;">
        <input type="text" name="question" placeholder="Enter the question to delete" class="form-control">
        <br><br><br>
        <div class="row">
          <div class="col-xs-4 text-left"><input type="submit" name="delete" value="Delete Question" class="btn btn-primary"></div>
          <div class="col-xs-4 text-center"><input type="submit" name="delete_quiz" value="Delete Quiz" class="btn btn-primary"></div>
          <div class="col-xs-4 text-right"><a href="preview.php" class="btn btn-primary">Preview</a></div>
        </div>
      </div>
    </form>
   <?php include("../footer.php") ?>
  </body>
</html>
<?php
  if(isset($_POST['delete']))
  {
    $question=$_POST['question'];
    $subject=$_SESSION['subject'];
    $quiz_num=$_SESSION['quiz_num'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="DELETE FROM `quiz` WHERE question='$question' and subject='$subject' and quiz_num='$quiz_num'";
    $rs=mysqli_query($con,$query);
    if($rs)
      {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-success alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Successfully deleted the question.
        </div>
        </div>";
      }
      else {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-danger alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Could not delete the question.
        </div>
        </div>";
      }
    }
      if(isset($_POST['delete_quiz']))
      {
        $subject=$_SESSION['subject'];
        $quiz_num=$_SESSION['quiz_num'];
        $con=mysqli_connect("localhost","root","");
        mysqli_select_db($con,"colledge");
        $query="DELETE FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num'";
        $rs=mysqli_query($con,$query);
        if($rs)
          {
            echo "<br><div class='row' style='width:50%;margin:auto;'>
            <div class='alert alert-success alert-dismissable col-sx-4'>
            <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
            Successfully deleted '$quiz_num' of '$subject'.
            </div>
            </div>";
          }
          else {
            echo "<br><div class='row' style='width:50%;margin:auto;'>
            <div class='alert alert-danger alert-dismissable col-sx-4'>
            <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
            Could not delete '$quiz_num' of '$subject'.
            </div>
            </div>";
          }
      }
}
}
else {
  header("../location:index.php");
}
 ?>
