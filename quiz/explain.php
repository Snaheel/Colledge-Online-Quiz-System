<?php session_start();
if($_SESSION['front']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
   <?php include("header_quiz_student.php") ?>
   <div class="container">
     <h1 class="text-center">You have scored <code><?php echo  $_SESSION['count'] ?></code>  out of <code><?php echo $_SESSION['total'] ?></code></h1>
     <br><h2>Explanation:</h2>
   </div>

   <?php
    $subject=$_SESSION['subject'];
    $quiz_num=$_SESSION['quiz_num'];
    $ans=$_SESSION['ans'];
    $a=unserialize($ans);
    //var_dump($a);
    $val=$_SESSION['val'];
    $v=unserialize($val);
    //var_dump($v);
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
    $query="SELECT `quiz_ID`, `question` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num' and visibility='true'";
    $rs=mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($rs)) {
      $quiz_ID=$row['quiz_ID'];
    ?>
    <div class="container">
      <h3><?php echo $row['question'] ?></h3>
      <h4>Selected: <code><?php echo $v[$quiz_ID] ?></code> </h4>
      <h4>Answer: <code><?php echo $a[$quiz_ID] ?></code></h4>
    </div>
  <?php } include("../footer.php") ?>
  </body>
</html>
<?php
}
else {
  header("../location:index.php");
}
 ?>
