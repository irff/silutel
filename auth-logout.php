<?php
  session_start();
  $_SESSION = array();
  session_destroy();
  session_start();
  $_SESSION['message'] = "Log out successful.";
  header('Location: login.php');
?>