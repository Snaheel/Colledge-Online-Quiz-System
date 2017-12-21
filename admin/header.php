<?php
if($_SESSION['login']=="true")
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
    <style >

    </style>
  </head>
  <body style="margin:0px;padding:0px;">
    <nav class="navbar navbar-inverse" style="margin:0px;padding:0px;">
      <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand" href="admin_panel.php">Admin Panel</a>
      </div>
      <ul class="nav navbar-nav">
        <!---<li><a href="#">Pages</a></li>-->
        <li><a href="student.php" class="stud">Students</a></li>
        <li><a href="teacher.php">Teachers</a></li>
        <li><a href="class.php">Classes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog"></span> Settings<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add_admin.php">Add admin</a></li>
          <li><a href="update.php">Change settings</a></li>
          <li><a href="delete.php">Delete Admin</a></li>
        </ul>
      </li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  </body>
</html>
<?php
}
else {
  header("location:posix_access_denied.php");
}
 ?>
