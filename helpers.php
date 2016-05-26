<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function isLoggedIn() {
  if(isset($_SESSION['user_is_logged_in']) && !empty($_SESSION["user_is_logged_in"])) {
    return true;
  }
  return false;
}

function mustLoggedIn() {
  if(!isLoggedIn()) {
    header('Location: login.php');
  }
}

function isRoleEqual($role) {
  if(isset($_SESSION['role']) && $_SESSION['role'] == $role) {
    return true;
  }
  return false;
}