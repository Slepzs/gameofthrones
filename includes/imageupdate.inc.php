<?php

include 'conn.php';
if (isset($_POST['submit'])) {
  $cid = $_GET['C_id'];
  $img_id = filter_input(INPUT_GET, 'id');
  $target = "../images/".basename($_FILES['image']['name']);

  $image = basename($_FILES['image']['name']);


  $sql = ("UPDATE cimages SET image=? WHERE img_id='$img_id'");
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $image);
  $stmt->execute();


  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    header("Location: ../usercharview.php?id=$cid");
    exit();
  } else {
    header("Location: ../usercharview.php");
    exit();
  }
}
 ?>
