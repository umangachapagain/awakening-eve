<?php 
session_start(); 
$event_name = $event_tagline = $event_organiser = $event_organiser_contact = $event_date = $event_time = $event_location = $event_details = $visitor_count =$postMSG = NULL;
include_once 'modules/dbconnect.php';
$event_id = $_GET["id"];
$sql = "SELECT * FROM events WHERE event_id = $event_id";
  	$result = $conn->query($sql);
		echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			  $title = $event_name = $row['event_name'];
			  $event_tagline = $row['event_tagline'];
			  $event_organiser = $row['event_organiser'];
			  $event_date = $row['event_date'];
			  $event_time =  $row['event_time'];
			  $event_location = $row['event_location'];
			  $event_details =  $row['event_details'];
			  $event_organiser_contact = $row["event_organiser_contact"];
			  $visitor_count = $row["visitor_count"];	   		
		}
	} else {
		//echo "No contents to display.";
		header("Location: events.php");
	}
	
if(isset($_GET["q"]))
{
	$visitor_count = $visitor_count+1;
	$sql = "INSERT INTO users.events (visitor_count) VALUES ($visitor_count)";
	if ($conn->query($sql) === TRUE) {
	 //header( 'Refresh:1; url= htmlspecialchars($_SERVER["PHP_SELF"]);');
			
    }
}

	//$conn->close();
?>
<?php
include("modules/header.php");
?>
<div class="container">
  <div class="col-sm-8">
    <article>
      <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="media-heading"><?php echo $event_name; ?></h4>
        <i><?php echo $event_tagline ?></i> <a style="float:right; margin-top:-27px;" <?php if(!isset($_SESSION['user'])){echo 'disabled="disabled"';} ?>>
        <form method="get" action="<?php echo 'event_frame.php?id='.$event_id.'&q=1'?>">
        <button id="visitorCount" class="btn btn-success" style="background:#5cb85c;">Join Event</button>
        </form>
        </a> </div>
      <div class="panel-body">
        <div class="media">
          <div class="media-body" style="width:70%">
            <div class="col-xs-8 col-xs-offset-2">
              <pre><i>
               Event Date : <?php echo $event_date; ?> <br>
               Event Time : <?php echo $event_time; ?> <br> 
               Event Location : <?php echo $event_location; ?> <br>
               Attending : <?php echo $visitor_count ?><br>
               </i></pre>
            </div>
            <div class="col-xs-12"> Details : <br>
              <?php echo $event_details; ?> <br>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer row" style="margin:0;">
        <div class="col-xs-12 col-lg-8">
          <div id="shareArticles" style="border:0"></div>
        </div>
        <div class="col-xs-12 col-lg-4"> Organiser: <?php echo $event_organiser; ?><br>
          Contact: <?php echo $event_organiser_contact; ?><br>
        </div>
      </div>
    </article>
    <?php include("modules/featured_events.php"); ?>
    </div>
  </div>
  <div class="col-sm-4">
    <?php include("modules/latest_articles.php"); ?>
    <?php include("modules/news_feed.php"); ?>
  </div>
</div>
<?php include('modules/footer.php') ?>
