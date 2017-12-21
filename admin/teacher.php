<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php include "header.php";?><br><br>
    <div class="container" style="width:60%;margin:auto;">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="add_teacher.php" class="btn btn-primary">Add</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="update_int.php" class="btn btn-primary">Change</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="delete_teacher.php" class="btn btn-primary">Delete</a>
        </div>
      </div>
    </div><br><br>
    <!--<h1 class='container text-center'>List of all <code>Teachers</code></h1>-->
    <?php
      $con=mysqli_connect("localhost","root","");
      mysqli_select_db($con,"colledge");
      $query="SELECT `fname`, `sname`, `number`, `email`, `sex`, `dob`, `branch` FROM `teacher` order by fname,sname";
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

     include "footer.php"; ?>
  </body>
</html>
<?php
}
else {
  header("location:access_denied.php");
}
 ?>
