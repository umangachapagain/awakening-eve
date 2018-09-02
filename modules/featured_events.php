<?php 
$event_name = $event_tagline = $event_organiser = $event_date = $event_time = $event_location = $event_details = $postMSG = NULL;
include_once 'dbconnect.php';
?>

<div id="featured" class="row" style="margin:0">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Featured Events</h2>
    </div>
    <div class="panel-body">
      <div class="autoplay">
         <?php 
	$sql = "SELECT event_id, event_name, event_tagline, event_organiser, event_date, event_time, event_location, event_details FROM events ORDER BY event_id DESC";
  	$result = $conn->query($sql);
		echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) { 
			       
         echo '<div>
          <div class="media">
            <div class="media-body" style="width:70%">
              <div class="col-sm-12">
                <div class="thumbnail"> <img src="/img/thumb.gif" alt="Awakening Eve">
                  <div class="caption">
                    <h3><a href="/modules/event_frame.php?id='.$row['event_id'].'">'.$row['event_name'].'</a></h3>
                    <p>'.$row['event_tagline'].'</p>
                    <p><a href="/modules/event_frame.php?id='.$row['event_id'].'" class="btn btn-primary" role="button">Know More</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>';
	}
	} else {
		echo "No contents to display.";
	}

	//$conn->close();

	?>
        <!---->
    </div>
  </div>
</div>

