<?php

include 'includes/conn.php';
$cid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


$sql = ("DELETE FROM characters WHERE C_id=$cid");
$stmt = $conn->prepare($sql);
$stmt->execute();
header("Location: frontpage.php?=deletionsuccessful");
exit();
?>
