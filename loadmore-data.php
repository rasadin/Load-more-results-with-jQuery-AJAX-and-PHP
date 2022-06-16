<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "easy_fashion_db";
$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);

if (isset($_POST['row'])) {
  $start = $_POST['row'];
  $limit = 3;
  $query = "SELECT * FROM wp_posts ORDER BY id desc LIMIT ".$start.",".$limit;	
  $result = mysqli_query($con,$query);
  if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="post"><?php echo $row['post_title']; ?></div>
    <?php }  
  }	
}
?>
