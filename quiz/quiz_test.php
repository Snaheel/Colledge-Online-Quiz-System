<?php session_start();
ob_start();
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
    <style>
      body{
        -webkit-user-select: none; /* Chrome, Opera, Safari */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none; /* Standard syntax */
      }
    </style>
  </head>
  <body>
   <!--<?php include("header_quiz_student.php") ?>-->
   <?php
    $em=$_SESSION['email'];
    $subject=$_SESSION['subject'];
    $quiz_num=$_SESSION['quiz_num'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
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
      $query="SELECT `quiz_ID`, `question`, `op1`, `op2`, `op3`, `ans` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num'";
      $rs=mysqli_query($con,$query);
   ?>
   <div class="container"><br>
     <div style="text-align:right;font-size:25px;"><strong>Time left = <span id="timer"></span></strong></div>

     <!--Javascript counter-->
     <script type="text/javascript">
     document.getElementById('timer').innerHTML = 10+":"+00;
     startTimer();
     function startTimer()
     {
       var presentTime = document.getElementById('timer').innerHTML;
       var timeArray = presentTime.split(/[:]+/);
       var m = timeArray[0];
       var s = checkSecond((timeArray[1] - 1));
       if(s==59){m=m-1}
       if(m<0)
       {
         //alert("hi");
         document.getElementById("myform").submit();
       }

       document.getElementById('timer').innerHTML = m + ":" + s;
       setTimeout(startTimer, 1000);
     }
     function checkSecond(sec)
     {
       if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
       if (sec < 0) {sec = "59"};
       return sec;
      }
     </script>

     <?php while($row = mysqli_fetch_array($rs)) {?>
      <br><h4><?php echo $row['question']; ?></h4>
      <?php
      $array=array($row['op1'],$row['op2'],$row['op3'],$row['ans']);
      shuffle($array);
      //var_dump($array);
      ?>
      <form id="myform" method="post">
        <div class="radio">
          <label><input type="radio" name= "<?php echo $row['quiz_ID'] ?>" value= '<?php echo $array[0] ?>'><?php echo $array[0] ?></label>
        </div>
        <div class="radio">
          <label><input type="radio" name= '<?php echo $row['quiz_ID'] ?>' value= '<?php echo $array[1] ?>'><?php echo $array[1] ?></label>
        </div>
        <div class="radio">
          <label><input type="radio" name= "<?php echo $row['quiz_ID'] ?>" value= '<?php echo $array[2] ?>'><?php echo $array[2] ?></label>
        </div>
        <div class="radio">
          <label><input type="radio" name= "<?php echo $row['quiz_ID'] ?>" value= '<?php echo $array[3] ?>'><?php echo $array[3] ?></label>
        </div>
        <?php }?>
        <br>
        <div class="row">
          <div class="col-md-3">
            <input type="submit" name="submit" value="Submit" class="btn btn-success">
          </div>
        </div>
      </form>
    </div>
   <?php }?>
  </body>
</html>
<?php
  $ans=array();
  $query="SELECT `quiz_ID`, `question`, `op1`, `op2`, `op3`, `ans` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num'";
  $rs=mysqli_query($con,$query);
  while ($row = mysqli_fetch_array($rs))
  {
    $temp=$row['quiz_ID'];
    $ans[$temp]=$row['ans'];
  }
  if(isset($_POST['submit']))
  {
  //echo "<br>";
  //echo $_POST['4'];
  //var_dump($ans);
  $_SESSION['count']=0;
  $_SESSION['total']=0;
  $query="SELECT `quiz_ID`, `question`, `op1`, `op2`, `op3`, `ans` FROM `quiz` WHERE subject='$subject' and quiz_num='$quiz_num'";
  $rs=mysqli_query($con,$query);
  $val=array();
    while ($row = mysqli_fetch_array($rs))
    {
      $t=$row['quiz_ID'];
      $val[$t]=$_POST[$t];
      $_SESSION['total']++;
      if($ans[$t]==$val[$t])
        {
            $_SESSION['count']++;
        }
    }
    $marks=$_SESSION['count'];
    //$query="INSERT INTO `result`(`subject`, `quiz_num`, `marks`, `email`,`given`) VALUES ('$subject','$quiz_num','$marks','$em','true')";
    $query="UPDATE `result` SET `marks`='$marks',`given`='true' WHERE email='$em' and subject='$subject' and quiz_num='$quiz_num'";
    mysqli_query($con,$query);

    //$query="UPDATE `quiz` SET `given`='true' WHERE subject='$subject' and quiz_num='$quiz_num'";
    //mysqli_query($con,$query);
    //var_dump($val);//echo $_SESSION['count'];
    $_SESSION['val']= serialize($val);
    $_SESSION['ans']= serialize($ans);

    header("location:explain.php");
    //exit();
  }?>

  <?php include("../footer.php");
}
else {
  header("../location:index.php");
}?>
