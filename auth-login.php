<?php include "db.php" ?>

<?php
    
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
    } elseif (empty($_POST['email'])) {
      $_SESSION['message'] = "Email can not be empty";
      header('Location: login.php');
    } elseif (empty($_POST['password'])) {
      $_SESSION['message'] = "Password can not be empty";
      header('Location: login.php');
    }

    echo $email;
    echo $password;

    $query = 'SELECT email, nama, password, role 
            FROM silutel.user
            WHERE email = $1 AND password = $2
            LIMIT 1';

  $result = pg_query_params($db_con, $query, array($email, $password)) or die("Cannot execute query: $query\n"); 
  $result_row = pg_fetch_row($result);

  echo "result_row=";
  
  if ($result_row) {
    print_r($result_row);
    if(true) {
      $_SESSION['email'] = $result_row[0];
      $_SESSION['user_is_logged_in'] = true;
      $_SESSION['message'] = "Logged in.";
      header('Location: index.php');
    } else {
      $_SESSION['message'] = "Username & password don't match.";
      header('Location: login.php');
    }
  } else {
    $_SESSION['message'] = "User does not exist.";
    header('Location: login.php');
  }
