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
    <?php
    $year=$_SESSION['y'];
    $class=$_SESSION['c'];
    $branch=$_SESSION['b'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"colledge");
//to display the column names of the query
    $query="SELECT student.fname, student.sname,student.number,student.email,result.subject,result.quiz_num ,result.marks
            FROM `student`
            inner join result
            WHERE student.email=result.email order by fname,sname";
    $rs=mysqli_query($con,$query);

    echo ("<br><br><table class='table table-responsive table-striped table-bordered text-center table-hover' style='width:60%;margin:auto;'><tr>");
       while($field = mysqli_fetch_field($rs)){
           echo "<th class='text-center'>".$field->name."</th>";
              }
               echo '</tr>';

//to display the value in each row corresponding to each email
    $query="SELECT  `email` FROM `student` WHERE year='$year' and branch='$branch' and class='$class'";
    $rsw=mysqli_query($con,$query);
//Running loop for each value of email
    while($r=mysqli_fetch_array($rsw))
    {
    $email=$r['email'];
    $query="SELECT student.fname, student.sname,student.number,student.email,result.subject,result.quiz_num ,result.marks
            FROM `student`
            inner join result
            WHERE student.email=result.email and student.email='$email' order by fname,sname";
    $rs=mysqli_query($con,$query);

       while($row = mysqli_fetch_array($rs))
       {
           echo "<tr>";
             for($i = 0 ; $i < mysqli_num_fields($rs); $i++)
                echo '<td>'. $row[$i] . '</td>';
                echo "</tr>";
        }

       }
       echo("</table>");
     ?>
   <?php include("../footer.php") ?>
  </body>
</html>
<?php
}
else {
  header("../location:index.php");
}
 ?>
