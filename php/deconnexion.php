<?php
  session_start();
  unset($_SESSION['id']);
  if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
  }
  echo "<script>window.location.replace('../index.php')</script>";
?>