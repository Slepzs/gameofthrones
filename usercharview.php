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
          <form action="includes/characterupdate.inc.php?id=<?= $C_id ?>" method="post">
            <h1><?= $Cname.' '. $Clast ?></h1>
            <input type="text" name="Cname" placeholder="First Name" value="<?=$Cname ?>"><input type="text" name="Clast" placeholder="Last Name" value="<?=$Clast ?>">
            <ul>
              <li><label>Race:</label> <?= $Crace ?></li>
              <select name="Crace">
                <option value="<?= $Crace ?>"><?= $Crace ?></option>
                <option value="Human">Human</option>
                <option value="Giant">Giant</option>
                <option value="Children-Of-The-Forest">Children Of the forest</option>
                <option value="WhiteWalker">White Walkers</option>
                <option value="Dwarf">Dwarf</option>
              </select>
              <li><label>House:</label> <?= $house ?></li>
              <select name="house">
                <option selected="selected" value="<?= $house ?>">House <?= $house ?></option>
                <option value="Arryn">House Arryn</option>
                <option value="Frey">House Frey</option>
                <option value="Greyjoy">House Greyjoy</option>
                <option value="Lannister">House Lannister</option>
                <option value="Stark">House Stark</option>
                <option value="Targaryen">House Targaryen</option>
                <option value="None">None, Houseless</option>
              </select>
              <li><label>Location:</label> <?= $location ?></li>
              <select name="location">
              <option value="<?= $location ?>"><?= $location ?></option>
              <option value="Beyond The Wall">Beyond The wall</option>
              <option value="The Wall">The Wall</option>
              <option value="North">The North</option>
              <option value="The Vale">The Vale of Arryn</option>
              <option value="The Riverlands">The RiverLands</option>
              <option value="The Iron Islands">The Iron Islands</option>
              <option value="The Westerlands">The Westerlands</option>
              <option value="The Crownlands">The Crownlands</option>
              <option value="The Reach">The Reach</option>
              <option value="The Stormlands">The Stormlands</option>
              <option value="Dorne">Dorne</option>
              <option value="The Stormlands">The Stormlands</option>
              </select>
              <label>Background</label><p><?= $bgstory ?>
              <textarea name="bgstory" rows="8" cols="80"><?= $bgstory ?></textarea></p>
              <button type="submit" name="charsubmit">Update</button>
            </ul>
          </form>
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
            <tr>
              <form action="includes/statsupdate.inc.php?id=<?= $stats_id ?>&C_id=<?=$C_id?>" method="post">
              <td><input type="number" min="1" max="10" name="strength" value="<?= $Strength ?>"></td>
              <td><input type="number" min="1" max="10" name="dexterity" value="<?= $Dexterity ?>" ></td>
              <td><input type="number" min="1" max="10" name="constitution" value="<?= $Constitution ?>"></td>
              <td><input type="number" min="1" max="10" name="intelligence" value="<?= $Intelligence ?>"></td>
              <td><input type="number" min="1" max="10" name="wisdom" value="<?= $Wisdom ?>"></td>
              <td><input type="number" min="1" max="10" name="charisma" value="<?= $Charisma ?>"></td>
              <td><select name="aligment">
                <option value="<?= $Aligment ?>"><?= $Aligment ?></option>
                <option value="Neutral Good">Neutral Good</option>
                <option value="Chaotic Good">Chaotic Good</option>
                <option value="Lawful Good">Lawful Good</option>
                <option value="Lawful Neutral">Lawful Neutral</option>
                <option value="True Neutral">True Neutral</option>
                <option value="Chaotic Neutral">Chaotic Neutral</option>
                <option value="Lawful Evil">Lawful Evil</option>
                <option value="Neutral Evil">Neutral Evil</option>
                <option value="Chaotic Evil">Chaotic Evil</option>
              </select></td>
            </tr>
            <button type="submit" name="statssubmit">Change Stats</button>
            </form>
          </table>
        </div>
      </div>
      <div class="col-xs-12 col-md-8 col-lg-8">
        <div class="charview-img pull-right">
          <img class="img_responsive" src="images/<?= $image ?>" alt="">
          <form action="includes/imageupdate.inc.php?id=<?= $img_id ?>&C_id=<?=$C_id?>" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <button type="submit" name="submit">Update Image</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } }?>
