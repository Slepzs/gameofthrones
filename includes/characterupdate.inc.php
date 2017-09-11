<?php
include 'conn.php';
if(isset($_POST['charsubmit'])) {

$cid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);


$Cname = filter_input(INPUT_POST, 'Cname', FILTER_SANITIZE_STRING) or die('MISSING/ILLEGAL NAME');
$Clast = filter_input(INPUT_POST, 'Clast', FILTER_SANITIZE_STRING) or die('MISSING/ILLEGAL lastname');
$Crace = filter_input(INPUT_POST, 'Crace') or die('MISSING/ILLEGAL race');
$house = filter_input(INPUT_POST, 'house') or die('MISSING/ILLEGAL House');
$location = filter_input(INPUT_POST, 'location') or die('MISSING/ILLEGAL House');
$bgstory = filter_input(INPUT_POST, 'bgstory') or die('MISSING/ILLEGAL House');


$sql = ("UPDATE characters SET Cname=?, Clast=?, Crace=?, house=?, location=?, bgstory=? WHERE C_id='$cid'");
$stmt = $conn->prepare($sql);
$stmt->bind_param('ssssss', $Cname, $Clast, $Crace, $house, $location, $bgstory);
$stmt->execute();

header("Location: ../usercharview.php?id=$cid");
exit();
}

 ?>
