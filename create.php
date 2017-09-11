<?php session_start() ?>
<?php include 'includes/conn.php'; ?>
<?php include 'includes/creating.inct.php'; ?>
<?php if (isset($_SESSION['s_id'])) { ?>


<?php include 'includes/head.php' ?>
<?php include 'includes/nav.php'; ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
      <fieldset>
        <legend>Create Character!</legend>
          <form class="charactersheet" action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= $_SESSION['s_id'] ?>">

            <label>Character First Name</label><input type="text" name="Cname" placeholder="First Name" Value="Defaultname"><br />
            <label>Character Last Name</label><input type="text" name="Clast" placeholder="Last Name" Value="Defaultname"><br />
            <label>Race</label>
            <select name="Crace">
              <option value="Human">Human</option>
              <option value="Giant">Giant</option>
              <option value="Children-Of-The-Forest">Children Of the forest</option>
              <option value="WhiteWalker">White Walkers</option>
              <option value="Dwarf">Dwarf</option>
            </select><br/>
            <label>House: </label>
            <select name="house">
              <option value="Arryn">House Arryn</option>
              <option value="Frey">House Frey</option>
              <option value="Greyjoy">House Greyjoy</option>
              <option value="Lannister">House Lannister</option>
              <option value="Stark">House Stark</option>
              <option value="Targaryen">House Targaryen</option>
              <option value="None">None, Houseless</option>
            </select><br/>
            <label>Location: </label>
            <select name="location">
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
            <hr>
            <h2>His/Her/It's Background Story</h2>
            <textarea name="bgstory" rows="7" cols="70">Something</textarea>
            <hr>
            <h2>Starting Stats</h2>
            <p>You can max give 30 points to a character</p>
            <label>Strength</label><input type="number" min="1" max="10" name="strength" value="<?= $Strength ?>" ><br />
            <label>Dexterity</label><input type="number" min="1" max="10" name="dexterity" ><br />
            <label>Constitution</label><input type="number" min="1" max="10" name="constitution"><br />
            <label>Intelligence</label><input type="number" min="1" max="10" name="intelligence"><br />
            <label>Wisdom</label><input type="number" min="1" max="10" name="wisdom"><br />
            <label>Charisma</label><input type="number" min="1" max="10" name="charisma"><br />
            <label>Aligment</label>
            <select name="aligment">
              <option value="Neutral Good">Neutral Good</option>
              <option value="Chaotic Good">Chaotic Good</option>
              <option value="Lawful Good">Lawful Good</option>
              <option value="Lawful Neutral">Lawful Neutral</option>
              <option value="True Neutral">True Neutral</option>
              <option value="Chaotic Neutral">Chaotic Neutral</option>
              <option value="Lawful Evil">Lawful Evil</option>
              <option value="Neutral Evil">Neutral Evil</option>
              <option value="Chaotic Evil">Chaotic Evil</option>
            </select>
            <h2>Select Picture for character</h2>
            <label>Image</label><input type="file" name="images">
            <hr>
            <button type="submit" name="submit">Create Character</button>
          </form>
      </fieldset>
    </div>
  </div>
</div>
<?php } ?>
