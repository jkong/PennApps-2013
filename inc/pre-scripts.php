<?php

// FACEBOOK -----------------------------------------------------
define('YOUR_APP_ID', '479471488739276');
require 'lib/fb-php-sdk/facebook.php';
$facebook = new Facebook(array(
  'appId'  => '479471488739276',
  'secret' => '3fff44039c9aa1ff89155fd418443a4b',
));
$fbUserID = $facebook->getUser();
// ---------------------------------------------------------------------

// If user is not logged in to Facebook, they are not allowed to view the rest of the site
/*if ($fbUserID == 0) {
  header('Location: index.php');
}*/

?>
