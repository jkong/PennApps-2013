<table class="coupons" width="100%" border="1px	"><tbody>
	<tr>
		<th>Coupon Image</th>
		<th>Retailer</th>
		<th>Title</th>
		<th>Description</th>
		<th>Author</th>
		<th>Date Added</th>
		<th></th>
	</tr>
<?php
require_once('db.config.php');

$coupons = $mysqli->query('SELECT * FROM coupon ORDER BY id DESC');

while ($coupon = $coupons->fetch_array()) {
  echo '<tr>';
  echo '<a href="coupon.php?id=' . $coupon['id'] . '">';
  echo '<div class="coupon">';
  echo '<td><img src="' . $coupon['url'] . '" width="100px" /></td>';
  echo '<td>' . $coupon['vendor'];
  echo '</td>';
  echo '<td>' . $coupon['title'];
  echo '</td>';
  echo '<td>' . $coupon['description'];
  echo '</td>';
  $user = $facebook->api('/' . $coupon['author']);
  echo '<td><img src="http://graph.facebook.com/' . $coupon["author"] . '/picture" style="padding-right:10px"/>' . $user['name'];
  echo '</td>';
  $datetime = strtotime($coupon['createDate']);
  echo '<td>Date Added: ' . date('m/d/y g:i A', $datetime);
  echo '</td></div>';
  echo '</a>';
  
  echo '<td><a href="saveToDropbox.php?id=' . $coupon['id'] . '&return_url=browse.php">Save to Dropbox</a>';
  echo '</td>';
  echo '</tr>';
}

$mysqli->close();
?>
</tbody>
</table>
