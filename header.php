<?php
  include "db.php";
  include "helpers.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sistem Informasi Hotel</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/datatables.min.css">
  <link rel="stylesheet" href="css/silutel.css">
  <script src="js/jquery-2.2.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/angular.min.js"></script>
  <script src="js/datatables.min.js"></script>
</head>
<body>
  <div class="body-wrapper">
      <nav class="navbar navbar-default sl-nav">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">SILUTEL</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <?php
                if(isRoleEqual('IN')):?>
                  <li><a href="beli-inventori.php">Beli Inventori</a></li>
                <?php
                endif
              ?>
              <?php
                if(isRoleEqual('IN') || isRoleEqual('MG')):?>
                  <li><a href="lihat-inventori.php">Lihat Inventori</a></li>
                <?php
                endif
              ?>
              <?php
                if(isRoleEqual('LA') || isRoleEqual('MG')):?>
                  <li><a href="lihat-laundry.php">Lihat Laundry</a></li>
                <?php
                endif
              ?>
              <?php
                if(isRoleEqual('IN')):?>
                  <li><a href="#">Ganti Inventori</a></li>
                <?php
                endif
              ?>
              <?php
                if(isRoleEqual('MG')):?>
                  <li><a href="lihat-booking.php">Lihat Booking</a></li>
                <?php
                endif
              ?>
              <?php
                if(isRoleEqual('IN') && isRoleEqual('MG')):?>
                  <li><a href="#">Lihat Pembelian Inventory</a></li>
                <?php
                endif
              ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php
                if(isLoggedIn()):?>
                  <li><a href="auth-logout.php" class="">Log Out</a></li>
                <?php else:?>
                  <li><a href="login.php" class="">Log In</a></li>
                <?php
                endif
              ?>              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <?php
      if(isset($_SESSION['message']) && !empty($_SESSION['message'])):?>
        <div class="container">
          <div class="alert alert-warning alert-dismissible sl-alert" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$_SESSION['message']?></p>
          </div>          
        </div>
      <?php
        $_SESSION['message'] = "";
      endif
    ?>
