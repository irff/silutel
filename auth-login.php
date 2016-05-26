<?php include "db.php" ?>
<?php include "helpers.php" ?>

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
    $_SESSION['email'] = $result_row[0];
    $_SESSION['role'] = $result_row[3];
    $_SESSION['user_is_logged_in'] = true;
    $_SESSION['message'] = "Logged in.";
    header('Location: index.php');
  } else {
    $_SESSION['message'] = "Login information is not valid.";
    header('Location: login.php');
  }
