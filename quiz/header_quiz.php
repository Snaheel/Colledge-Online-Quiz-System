<?php
if($_SESSION['front']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body style="margin:0px;padding:0px;">
    <nav class="navbar navbar-inverse" style="margin:0px;padding:0px;">
      <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="../teacher.php">Profile</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="../Student_list.php">Students</a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href="quiz_result_initial.php">Quiz Result</a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li><a href="quiz.php">Quiz</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Settings<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="../change.php">Change settings</a></li>
          <li><a href="../delete_account.php">Delete Account</a></li>
        </ul>
      </li>
        <li><a href="../logout_user.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  </body>
</html>
<?php
}
else {
  header("../location:index.php");
}
 ?>
