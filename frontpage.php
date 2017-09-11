<?php session_start(); ?>
<?php if(isset($_SESSION['s_id'])) { ?>
<?php include 'includes/head.php' ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/conn.php'; ?>

<div class="create">
  <a href="create.php">Create A Character</a>
</div>


<div class="characters">
  <h1>All Characters Created:</h1>
</div>
<?php

$sql = ("SELECT * FROM characters c LEFT JOIN cimages img ON c.C_id=img.C_id");
$stmt = $conn->prepare($sql);
$stmt->execute();
$stmt->bind_result($C_id, $Cname, $Clast, $Crace, $house, $location, $bgstory, $user_id, $img_id, $image, $C_ids);
while($stmt->fetch()) {
echo  '<div class="character-view">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-12">
            <a href="charview.php?id='.$C_id.'">
            <div class="col-md-4 character-img">
              <img src="images/'.$image.'">
            </div>
            <div class="col-md-2 stats">
              <ul>
                <li>Name: '.$Cname.' '.$Clast.'</li>
                <li>Race: '.$Crace.'</li>
                <li>House: '.$house.'</li>
                <li>Location: '.$location.'</li>
              </ul>
            </div>
            <div class="col-md-6 bgstory">
              <p>Background Story: '.$bgstory.'</p>
            </div>
            </a>
          </div>
        </div>
      </div>
  </div>';
  }; ?>
<?php } else { echo 'You cannot view this content'; } ?>
