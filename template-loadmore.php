<?php /* Template Name: Load More Post By Rasadin */ ?>

<?php get_header(); 


$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "easy_fashion_db";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass , $db) or die($con);

?>

<div class="container">
    <div class="postList">
      <?php
      $count_query = "SELECT count(*) as allcount FROM wp_posts";
      $count_result = mysqli_query($con,$count_query);
      $count_fetch = mysqli_fetch_array($count_result);
      $postCount = $count_fetch['allcount'];
      $limit = 3;

      $query = "SELECT * FROM wp_posts ORDER BY id desc LIMIT 0,".$limit;	
      $result = mysqli_query($con,$query);
      if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)){ 
          ?>
          <div class="post"><?php echo $row['post_title']; ?></div>
        <?php }
      } ?>	
    </div>
    <div class="loadmore">
      <input type="button" id="loadBtn" value="Load More">
      <input type="hidden" id="row" value="0">
      <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
    </div>	
  </div>

  <!-- <script>
    (function($) {
    $(document).ready(function () {
   
    });		
    });		
  </script> -->












<?php get_footer(); ?>
