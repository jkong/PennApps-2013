<?php require_once('inc/pre-scripts.php'); ?>
<?php

$consumerKey = 'yloxv4myo44esd2';
$consumerSecret = '08frgq05u2t3r3c';
include 'lib/dropbox-php-sdk/autoload.php';
$oauth = new Dropbox_OAuth_PEAR($consumerKey, $consumerSecret);
$dropbox = new Dropbox_API($oauth, 'sandbox');

if ($fbUserID == 0) {
  header('Location: index.php');
}

session_start();
require_once('db.config.php');
// Check if user is already in database
$db_check = $mysqli->prepare('SELECT * FROM user WHERE fb_id = ?');
$db_check->bind_param('s', $fbUserID);
$db_check->execute();
$db_check->bind_result($id, $fb_id, $db_token, $db_secret);
$db_check->fetch();
$db_check->close();

if ($db_token !== null && $db_secret !== null) {
  // Dropbox app already given permision to access user's dropbox
  $tokens = array(
      token => $db_token,
      token_secret => $db_secret
  );
  $oauth->setToken($tokens);

  // Download image to dropbox
  $coupon_id = $_GET['id'];
  $coupon = $mysqli->prepare('SELECT * FROM coupon WHERE id = ?');
  $coupon->bind_param('i', $coupon_id);
  $coupon->execute();
  $coupon->bind_result($id, $code, $author, $vendor, $expiration, $title, $description, $upvotes, $downvotes, $url, $createDate);
  $coupon->fetch();
  $coupon->close();

  $dropbox->putFile($vendor . '_' . $title . '_' . $id . '.png', $url);
  
  $return_url = $_GET['return_url'];
  header('Location: ' . $return_url);

} else {
  // Dropbox app needs user's permision
  // There are multiple steps in this workflow, we keep a 'state number' here
  if (isset($_SESSION['state'])) {
      $state = $_SESSION['state'];
  } else {
      $state = 1;
  }

  switch($state) {

      /* In this phase we grab the initial request tokens
        and redirect the user to the 'authorize' page hosted
        on dropbox */
      case 1 :
          //echo "Step 1: Acquire request tokens\n";
          $tokens = $oauth->getRequestToken();
          //print_r($tokens);

          // Note that if you want the user to automatically redirect back, you can
          // add the 'callback' argument to getAuthorizeUrl.
          $_SESSION['state'] = 2;
          $_SESSION['oauth_tokens'] = $tokens;
          $callback_url = 'http://jobcoll.com/saveToDropbox.php';
          header('Location: ' . $oauth->getAuthorizeUrl($callback_url));
          die();

      /* In this phase, the user just came back from authorizing
        and we're going to fetch the real access tokens */
      case 2 :
          echo "Step 3: Acquiring access tokens\n";
          $oauth->setToken($_SESSION['oauth_tokens']);
          $tokens = $oauth->getAccessToken();
          print_r($tokens);
          $_SESSION['state'] = 3;
          $_SESSION['oauth_tokens'] = $tokens;

          $token = $tokens[token];
          $token_secret = $tokens[token_secret];

          //require_once('db.config.php');
          $add_dropbox = $mysqli->prepare('UPDATE user SET db_oath_token = ?, db_oath_secret = ? WHERE fb_id = ?');
          $add_dropbox->bind_param('sss', $token, $token_secret, $fbUserID);
          $add_dropbox->execute();
          $add_dropbox->close();
          $mysqli->close();

          // There is no break here, intentional

      /* This part gets called if the authentication process
        already succeeded. We can use our stored tokens and the api 
        should work. Store these tokens somewhere, like a database */
      case 3 :
          //echo "The user is authenticated\n";
          //echo "You should really save the oauth tokens somewhere, so the first steps will no longer be needed\n";
          //print_r($_SESSION['oauth_tokens']);
          //$oauth->setToken($_SESSION['oauth_tokens']);
          header('Location: saveToDropbox.php');
          break;
    }
}

?>
