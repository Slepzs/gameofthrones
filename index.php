<?php include 'includes/login.inc.php'; ?>
<?php $empty = '';
$fetcherror = '';
$unsucessful = '';
?>
<?php include 'includes/head.php'; ?>
<div class="clearfix"></div>
<div class="login-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 md-12 col-lg-12">
        <h1>Game Of Thrones RPG</h1>
      </div>
      <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="login-box">
          <form class="login-form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>E-mail</label><input type="email" name="email" placeholder="E-Mail">
            <label>Password</label><input type="password" name="pwd" placeholder="Password"><br />
            <p><?php echo $empty; echo $fetcherror; echo $unsucessful; ?></p>
            <button type="submit" name="submit">Log in</button><br />
            <a href="signup.php">Sign up</a>
          </form>
        </div>
        </div>
      </div>
    </div>
</div>












<?php include 'includes/bootscript.php'; ?>
</body>
