<div  style="margin-right:0;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Latest Articles</h3>
    </div>
    <div class="panel-content" style="padding:15px;">
   
      <?php 
	$sql = "SELECT article_id, article_title, article_authorName, article_authorInfo, article_contents, article_timestamp FROM articles ORDER BY article_id DESC";
  	$result = $conn->query($sql);
		echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			   echo '<div class="row" style="margin:0 0 1px 10px;">';
                echo '<h3><a href="article_frame.php?id='.$row['article_id'].'">'.$row['article_title'].'</a></h3>';
                echo '<p>Posted on '.date('jS M Y', strtotime($row['article_timestamp'])).'</p>';
                echo '<p>Author: '.$row['article_authorName'].'</p>';                
                echo '<p><a href="article_frame.php?id='.$row['article_id'].'">Read More</a></p>';                
            echo '</div><hr />';	
		}
	} else {
		echo "No contents to display.";
	}


	?>
   
    </div>
  </div>
</div>
