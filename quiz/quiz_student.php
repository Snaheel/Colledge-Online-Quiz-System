<?php session_start();
if($_SESSION['front']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  <?php include("header_quiz_student.php") ?><br><br>
    <div class="container">
      <form method="post">
        <div class="form-group" style="width:50%;margin:auto;">
          <input type="text" name="subject" class="form-control" placeholder="Enter Subject" required><br>
          <input type="text" name="quiz_num" class="form-control" placeholder="Enter quiz number" required><br><br>
          <div class="row">
            <div class="col-xs-4"></div>
            <div class="col-xs-4"><input type="submit" name="start_quiz" value="Start Quiz" class="btn btn-primary"></div>
            <div class="col-xs-4 text-right"></div>
          </div>
        </div>
      </form>
    </div><br><br>
    <h2 style="width:60%;margin:auto;"><code>Quiz Results</code></h2>
    <?php
    $em =$_SESSION['email'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="SELECT  `subject`, `quiz_num`, `marks` FROM `result` WHERE email='$em'";
    $rs=mysqli_query($con,$query);

    echo ("<br><br><table class='table table-responsive table-striped table-bordered text-center table-hover' style='width:60%;margin:auto;'><tr>");
       while($field = mysqli_fetch_field($rs)){
           echo "<th class='text-center'>".$field->name."</th>";
              }
               echo '</tr>';
       while($row = mysqli_fetch_array($rs)){
           echo "<tr>";
             for($i = 0 ; $i < mysqli_num_fields($rs); $i++)
                echo '<td>'. $row[$i] . '</td>';
                echo "</tr>";
               }
         echo("</table>");
    ?>
   <?php include("../footer.php") ?>
  </body>
</html>
<?php
  if(isset($_POST['start_quiz']))
  {
    $subject=$_POST['subject'];
    $quiz_num=$_POST['quiz_num'];
    $query="SELECT `quiz_ID`, `question`, `op1`, `op2`, `op3`, `ans` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num' and visibility='true'";
    $rs=mysqli_query($con,$query);
    if(mysqli_fetch_array($rs)<1)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-danger alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      Quiz is not yet available.
      </div>
      </div>";
    }
    else{
      $query="SELECT * FROM `result` WHERE email='$em' and subject='$subject' and quiz_num='$quiz_num'";
      $rs=mysqli_query($con,$query);
      if(mysqli_fetch_array($rs)<1)
      {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-danger alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Quiz will be uploaded shortly.
        </div>
        </div>";
      }
      else{
      //$query="SELECT `quiz_ID`, `question`, `op1`, `op2`, `op3`, `ans` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num' and visibility='true' ";
      $query="SELECT * FROM `result` WHERE email='$em' and subject='$subject' and quiz_num='$quiz_num' and given='false'";
      $rs=mysqli_query($con,$query);
      if(mysqli_fetch_array($rs)<1)
      {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-danger alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        You have already given the quiz.
        </div>
        </div>";
      }
      else{
        $_SESSION['subject']=$subject;
        $_SESSION['quiz_num']=$quiz_num;
        header("location:quiz_test.php");
        exit();
      }
    }
    }
  }
}
else {
  header("../location:index.php");
}
 ?>
