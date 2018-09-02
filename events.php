<?php 
session_start(); 
$event_name = $event_tagline = $event_organiser = $event_date = $event_time = $event_location = $event_details = $postMSG = NULL;
include_once 'modules/dbconnect.php';
?>
<?php $title = "Events" ?>
<?php include("modules/header.php") ?>

<div class="container">
  <section>
    <div class="col-sm-8">
      <div id="featured" class="row" style="margin:0">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h2>Events</h2>
          </div>
          <div class="panel-body">
            <div class="media">
              <div class="media-body" style="width:70%">
                <?php 
	$sql = "SELECT event_id, event_name, event_tagline, event_organiser, event_date, event_time, event_location, event_details FROM users.events ORDER BY event_id DESC";
  	$result = $conn->query($sql);
		echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			   echo '<div class="col-xs-12 col-sm-6 col-md-4">
			  <div class="thumbnail">
				<img src="img/thumb.gif" alt="Awakening Eve">
				<div class="caption">';
                echo '<h3><a href="event_frame.php?id='.$row['event_id'].'">'.$row['event_name'].'</a></h3>';
                echo '<p>'.$row['event_tagline'].'</p>';
                echo '<p><a href="event_frame.php?id='.$row['event_id'].'" class="btn btn-primary" role="button">Know More</a></p>';       
				echo '</div>
			  </div>
			</div>  ';         
            	
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
      </div>
    </div>
  </section>
  <aside>
    <div class="col-sm-4">
      <?php include("modules/latest_articles.php") ?>
      <?php include("modules/news_feed.php") ?>
    </div>
  </aside>
</div>
<!--container ends here-->
<?php include("modules/footer.php") ?>
