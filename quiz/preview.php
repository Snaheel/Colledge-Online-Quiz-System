<?php session_start();
if($_SESSION['front']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Quiz Preview</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
   <?php include("header_quiz.php") ?>
   <?php
    $subject=$_SESSION['subject'];
    $quiz_num=$_SESSION['quiz_num'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="SELECT `quiz_ID`, `question`, `op1`, `op2`, `op3`, `ans` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num'";
    $rs=mysqli_query($con,$query);
    if(mysqli_fetch_array($rs)<1)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-danger alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      No questions have been added to this quiz.
      </div>
      </div>";
    }
    else{
      $query="SELECT `quiz_ID`, `question`, `op1`, `op2`, `op3`, `ans` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num'";
      $rs=mysqli_query($con,$query);
   ?>
   <div class="container">
     <?php while ($row = mysqli_fetch_array($rs)) { ?>
      <h3><?php echo $row['question']; ?></h3>
      <?php $array=array($row['op1'],$row['op2'],$row['op3'],$row['ans']);
      shuffle($array);
      //var_dump($array);
      ?>
      <form method="post">
        <div class="radio">
          <label><input type="radio" name="<?php echo $row['quiz_ID'] ?>" value= '<?php echo $array[0] ?>' ><?php echo $array[0] ?></label>
        </div>
        <div class="radio">
          <label><input type="radio" name="<?php echo $row['quiz_ID'] ?>" value= '<?php echo $array[1] ?>' ><?php echo $array[1] ?></label>
        </div>
        <div class="radio">
          <label><input type="radio" name="<?php echo $row['quiz_ID'] ?>" value= '<?php echo $array[2] ?>' ><?php echo $array[2] ?></label>
        </div>
        <div class="radio">
          <label><input type="radio" name="<?php echo $row['quiz_ID'] ?>" value= '<?php echo $array[3] ?>' ><?php echo $array[3]?></label>
        </div>
        <?php } ?><br>
        <div class="row">
          <div class="col-md-3">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
          </div>
          <div class="col-md-3 text-left">
            <a href="add_question.php" class="btn btn-primary">Add Question</a>
          </div>
          <div class="col-md-3 text-left">
            <a href="update_question.php" class="btn btn-primary">Change Question</a>
          </div>
          <div class="col-md-3 text-left">
            <a href="delete_question.php" class="btn btn-primary">Delete Question</a>
          </div>
        </div>
      </form>
   </div>
   <?php } include("../footer.php") ?>
  </body>
</html>
<?php
  if(isset($_POST['submit']))
  {
    $cl=$_SESSION['cl'];
    $query="SELECT `email` FROM `student` WHERE class='$cl'";
    $rs=mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($rs))
    {
        $e=$row['email'];
        $query="INSERT INTO `result`(`subject`, `quiz_num`, `email`) VALUES ('$subject','$quiz_num','$e') ";
        mysqli_query($con,$query);
    }

    $query="UPDATE `quiz` SET `visibility`='true' WHERE subject='$subject' and quiz_num='$quiz_num'";
    $rs=mysqli_query($con,$query);
    if($rs)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-success alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      Successfully uploaded the quiz.
      </div>
      </div><br><br>";
    }
    else{
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-danger alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      Could not upload the quiz.
      </div>
      </div><br><br>";
    }
  }
}
else {
  header("../location:index.php");
}
 ?>
