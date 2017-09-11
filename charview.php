<?php session_start(); ?>
<?php if(isset($_SESSION['s_id'])) { ?>
<?php include 'includes/head.php' ?>
<?php include 'includes/nav.php'; ?>
<?php include 'includes/conn.php'; ?>
<?php
  $cid = $_GET['id'];



  $sql = ("SELECT * FROM characters c LEFT JOIN cimages img ON c.C_id = img.C_id LEFT JOIN cstats cst ON
  c.C_id = cst.C_id WHERE c.C_id=$cid;");
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $stmt->bind_result($C_id, $Cname, $Clast, $Crace, $house, $location, $bgstory, $user_id, $img_id, $image, $c_idimg,
  $stats_id, $Strength, $Dexterity, $Constitution, $Intelligence, $Wisdom, $Charisma, $Aligment, $C_idstat);
  while($stmt->fetch()) {
 ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-6 col-md-4 col-lg-4">
        <div class="charview-infomation">
            <h1><?= $Cname.' '. $Clast ?></h1>
            <ul>
              <li><label>Race:</label> <?= $Crace ?></li>
              <li><label>House:</label> <?= $house ?></li>
              <li><label>Location:</label> <?= $location ?></li>
              <label>Background</label><p><?= $bgstory ?></p>
            </ul>
        </div>
      </div>
      <div class="col-md-8 col-lg-8">
        <div class="char-stats">
          <h1>Character Stats</h1>
          <table>
            <tr>
              <th>Strength</th>
              <th>Dexterity</th>
              <th>Constitution</th>
              <th>Intelligence</th>
              <th>Wisdom</th>
              <th>Charisma</th>
              <th>Aligment</th>
            </tr>
            <tr>
              <td><?= $Strength ?></td>
              <td><?= $Dexterity ?></td>
              <td><?= $Constitution ?></td>
              <td><?= $Intelligence ?></td>
              <td><?= $Wisdom ?></td>
              <td><?= $Charisma ?></td>
              <td><?= $Aligment ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-8">
        <div class="charview-img pull-right">
          <img class="img_responsive" src="images/<?= $image ?>" alt="">
        </div>
      </div>
    </div>
  </div>
<?php } }?>
