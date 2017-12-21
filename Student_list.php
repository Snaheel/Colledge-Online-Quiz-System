<?php session_start();
if($_SESSION['front']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  <?php include("header_teacher.php") ?><br><br>

  <?php
  $email= $_SESSION['email'];
  $con=mysqli_connect("localhost","root","");
  mysqli_select_db($con,"colledge");
  $query="SELECT `class_id`,`class` FROM `class` WHERE email='$email'";
  $rs=mysqli_query($con,$query);
  ?>
  <div style="width:50%;margin:auto;" class="text-left">
    <form method="post">
      <div class="dropdown" style="display:inline;">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Class<span class="caret"></span></button>
        <ul class="dropdown-menu">
          <?php while($row=mysqli_fetch_array($rs)){ ?>
          <li><input type="submit" name="class" value=<?php echo $row['class'] ?> style="background-color:white;border:1px solid white;"></li>
          <hr style="margin:0px;padding:0px;">
        <?php } ?>
        </ul>
      </div>
    </form>
  </div>
  <?php
    if(isset($_POST['class']))
    {
          $class=$_POST['class'];

    $query="SELECT `branch` FROM `teacher` WHERE email='$email'";
    $rs=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($rs))
    {
      $branch=$row['branch'];
    }

    //echo $branch."<br>";
    //echo $class;
    $query="SELECT `fname`, `sname`, `number`, `email`, `sex`, `dob`, `branch` FROM `student` WHERE branch='$branch' and class='$class' order by fname,sname ";
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
       }
   include("footer.php"); ?>
  </body>
</html>
<?php
}
else {
  header("location:index.php");
}
 ?>
