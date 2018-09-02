<?php include_once 'dbconnect.php';  ?>

<div id="featured" style="margin-top:20px">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2>Featured Articles</h2>
      </div>
      <div class="panel-body">
        <div class="single-item">
        <?php 
$sql = "SELECT article_id, article_title, article_authorName, article_authorInfo, article_contents, article_timestamp FROM articles ORDER BY article_id DESC";
$result = $conn->query($sql);
echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			   echo '<div>
			   <div class="media">
			   <div class="media-left media-top"> 
				   <a href="/articles/article1.php"> 
				   <img class="media-object" src="/img/thumb.gif" alt="Awakening Eve"  style="width:100%">
				   </a> 
			   </div>
			   <div class="media-body" style="width:70%">';
               echo '<h4 class="media-heading">
			   		 <a href="modules/article_frame.php?id='.$row['article_id'].'">'.$row['article_title'].'</a>
			   		 </h4>';
                //echo '<p>Posted on '.date('jS M Y ', strtotime($row['article_timestamp'])).'</p>';
                echo '<i>Author: '.$row['article_authorName'].'</i><br />';                
                echo '<p><a href="modules/article_frame.php?id='.$row['article_id'].'">Read More</a></p>';                
            echo '</div>
			</div> 
			</div>';	
		}
	} else {
		echo "No contents to display.";
	}
	//$conn->close();

	?>
        </div>
      </div>
    </div>
</div>

