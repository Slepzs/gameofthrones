<?php
  include 'conn.php';
  if(isset($_POST['submit'])) {

  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) or die('Missing/Illegal E-mail parameter');
  $pwd = filter_input(INPUT_POST, 'pwd') or die('Missing/Illegal Age parameter');
  $pwdr = filter_input(INPUT_POST, 'pwd-repeat') or die('Missing/Illegal Age parameter');

  if ($pwd !== $pwdr) {
    $passmatch = 'Your Passwords are not matching';
  } else {

  if( empty($email) || empty($pwd)) {
    $fieldempty = 'Empty Email Field Or password Fields';
  } else {
    $sql = "SELECT email FROM got_users WHERE email='$email'";
    $stmt2 = $conn->prepare($sql);
    $stmt2->execute();
    $stmt2->store_result();
    $result = $stmt2->num_rows;
    if($result > 0) {
      $mail = 'E-mail already exists in the database';
    } else {
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO got_users(email, pwd) VALUES(?, ?)");
    $stmt->bind_param('ss', $email, $pwd);
    $stmt->execute();
    header("Location: index.php?signup=success");
    exit();
      }
    }
  }
}







 ?>
