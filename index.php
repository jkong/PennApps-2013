<?php require_once('inc/pre-scripts.php'); ?>
<?php
if (isset($_GET['login'])) {

  require_once('db.config.php');
  
  // Check if user is already in database
  $user_check = $mysqli->prepare('SELECT id FROM user WHERE fb_id = ?');
  $user_check->bind_param('s', $fbUserID);
  $user_check->execute();
  $user_check->bind_result($ID);
  $user_check->fetch();
  $user_check->close();
  
  if ($ID == null) {
      // User not in database; need to add him/her
      $user_add = $mysqli->prepare('INSERT INTO user (fb_id) VALUES (?)');
      $user_add->bind_param('s', $fbUserID);
      $user_add->execute();
      $user_add->close();
    }
  
  $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="google-site-verification" content="B-rELLAyRf5kaXynTQldI32HBFNxVttzgksoT6AqWA8" />
    <meta charset="utf-8">
    <title> Clipmob </title>
    <link rel="shortcut icon" type="image/png" href = "img/clipmobfavicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Find the best deals for you!">
    <meta name="author" content="JJTN">
    <!-- Le styles -->
    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet/less" type="text/css" href="m.less">
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
    include_once ('inc/navbar.inc.php');
    ?>
    <div class="container">
      <div id="body">
        <!-- Main hero unit for a primary marketing message or call to action -->
        <div class="hero-unit">
          <div class="hero-unit clearfix" align="center">
          	  <a href="index.php"> <img src = "img/clipmob.png" width="60%" align="center"></a>
              <h3>Join Clipmob and start saving!</h3>
				<div class="row-fluid">
					<div class="span4">Find Great Coupons</div>
              		<div class="span4">Share with Friends</div>
              		<div class="span4">Save to your Mobile Device</div>
				</div>
            </div>
          </div>
        </div>
      </div>
    <?php
    include_once ('inc/footer.inc.php');
    ?>
    <!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/less.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </script>
  
</body>
</html>

