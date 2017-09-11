<?php

include 'conn.php';
if (isset($_POST['statssubmit'])) {
  $cid = $_GET['C_id'];
  $stats_id = filter_input(INPUT_GET, 'id');

  $strength = filter_input(INPUT_POST, 'strength', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL Strength');
  $dexterity = filter_input(INPUT_POST, 'dexterity', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL dexterity');
  $constitution = filter_input(INPUT_POST, 'constitution', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL constitution');
  $intelligence = filter_input(INPUT_POST, 'intelligence', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL intelligence');
  $wisdom = filter_input(INPUT_POST, 'wisdom', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL wisdom');
  $charisma = filter_input(INPUT_POST, 'charisma', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL charisma');

  $aligment = filter_input(INPUT_POST, 'aligment') or die('MISSING/ILLEGAL aligment');

  $sql = ("UPDATE cstats SET Strength=?, Dexterity=?, Constitution=?, Intelligence=?, Wisdom=?, Charisma=?, Aligment=? WHERE stats_id='$stats_id'");
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssssss', $strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma, $aligment);
  $stmt->execute();

  header("Location: ../usercharview.php?id=$cid");
  exit();
}
 ?>
