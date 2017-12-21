<?php
  session_start();
  session_unset($_SESSION['front']);
  header('location:index.php');
 ?>
