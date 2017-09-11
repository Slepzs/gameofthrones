<?php include 'conn.php';
 if(isset($_POST['submit'])) {
 $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

 $target = "images/".basename($_FILES['images']['name']);
 $images = basename($_FILES['images']['name']);

 $Cname = filter_input(INPUT_POST, 'Cname', FILTER_SANITIZE_STRING) or die('MISSING/ILLEGAL NAME');
 $Clast = filter_input(INPUT_POST, 'Clast', FILTER_SANITIZE_STRING) or die('MISSING/ILLEGAL lastname');
 $Crace = filter_input(INPUT_POST, 'Crace') or die('MISSING/ILLEGAL race');
 $house = filter_input(INPUT_POST, 'house') or die('MISSING/ILLEGAL House');
 $location = filter_input(INPUT_POST, 'location') or die('MISSING/ILLEGAL House');
 $bgstory = filter_input(INPUT_POST, 'bgstory') or die('MISSING/ILLEGAL House');

 $strength = filter_input(INPUT_POST, 'strength', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL Strength');
 $dexterity = filter_input(INPUT_POST, 'dexterity', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL dexterity');
 $constitution = filter_input(INPUT_POST, 'constitution', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL constitution');
 $intelligence = filter_input(INPUT_POST, 'intelligence', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL intelligence');
 $wisdom = filter_input(INPUT_POST, 'wisdom', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL wisdom');
 $charisma = filter_input(INPUT_POST, 'charisma', FILTER_VALIDATE_INT) or die('MISSING/ILLEGAL charisma');

 $aligment = filter_input(INPUT_POST, 'aligment') or die('MISSING/ILLEGAL aligment');

  $sqlcharacter = ("INSERT INTO characters(Cname, Clast, Crace, house, location, bgstory, user_id) VALUES(?, ?, ?, ?, ?, ?, ?)");
  $stmtChar = $conn->prepare($sqlcharacter);
  $stmtChar->bind_param('ssssssi', $Cname, $Clast, $Crace, $house, $location, $bgstory, $user_id);
  $stmtChar->execute();
  $charid = $stmtChar->insert_id;

  $sqlimg = ("INSERT INTO cimages(image, C_id) VALUES(?, ?)");
  $stmtimg = $conn->prepare($sqlimg);
  $stmtimg->bind_param('si', $images, $charid);
  $stmtimg->execute();

  $sqlstats = ("INSERT INTO cstats(Strength, Dexterity, Constitution, Intelligence, Wisdom, Charisma, Aligment, C_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
  $stmtstats = $conn->prepare($sqlstats);
  $stmtstats->bind_param("iiiiiisi", $strength, $dexterity, $constitution, $intelligence, $wisdom, $charisma, $aligment, $charid);
  $stmtstats->execute();


  if($stmtChar->affected_rows > 0) {
    if ($stmtstats->affected_rows > 0) {
      if (move_uploaded_file($_FILES['images']['tmp_name'], $target)) {
        header("Location: frontpage.php?=imagesucess");
        exit();
      } else {
        header("Location: frontpage.php?=failure");
        exit();
      }
    }
  }
} ?>
