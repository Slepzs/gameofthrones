<?php session_start();
include 'conn.php';
if(isset($_POST['submit'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) or die('MISSING/ILLEGAL E-Mail');
  $pwd = filter_input(INPUT_POST, 'pwd') or die('MISSING/ILLEGAL Password');

  if(empty($email) || empty($pwd)) {
    $empty = 'Empty e-mail field or password field';
  } else {
    $sql = "SELECT * FROM got_users WHERE email=?";
    if (!$stmt = $conn->prepare($sql)) {
      echo 'sql failed';
    } else {
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
      $hash = $row['pwd'];
      if(password_verify($pwd, $hash)) {
        $_SESSION['s_id'] = $row['user_id'];
        $_SESSION['s_pwd'] = $row['pwd'];
        $_SESSION['s_email'] = $row['email'];
        header("Location: frontpage.php?login=loginsuccess");
        exit();
      } else {
        $unsucessful = 'Something went wrong';
      }
    } else {
      $fetcherror = 'could not find user in database';
        }
      }
    }
  } ?>
