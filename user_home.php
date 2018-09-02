<?php 
session_start(); 
include_once 'modules/dbconnect.php';
$sessionUser = $_SESSION['user'];
$count=0;
if(!isset($_SESSION['user'])!="")
	{
	 header("Location: modules/logPage.php");
	}
$title="Home: ".$_SESSION['user'];
include('modules/header.php') ?>
<div class="container">

<div class="col-sm-8">
<div  style="margin-right:0;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Articles posted by you</h3>
    </div>
    <div class="panel-content" style="padding:15px;">
      <?php 
	$sql = "SELECT * FROM users.articles";
  	$result = $conn->query($sql);
		//echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		$count=0;
		while($row = $result->fetch_assoc()) {
			if($row['article_authorName'] == $sessionUser){
			    echo '<div class="row" style="margin:0 0 1px 10px;">';
                echo '<h3><a href="article_frame.php?id='.$row['article_id'].'">'.$row['article_title'].'</a></h3>';
                echo '<p>Posted on '.date('jS M Y', strtotime($row['article_timestamp'])).'</p>';
                echo '<p>Author: '.$row['article_authorName'].'</p>';                
                echo '<p><a href="article_frame.php?id='.$row['article_id'].'">Read More</a></p>';                
                echo '</div><hr />';	
			}
			else
				++$count;				
		}
	} else {
		echo "No contents to display.";
	}
	if($count > 0) //echo "You haven't posted any article yet.<br>";

	?>
    </div>
  </div>
</div>


<div  style="margin-right:0;">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3>Events posted by you</h3>
    </div>
    <div class="panel-content" style="padding:15px;">
      <?php 
	$sql = "SELECT event_id, event_name, event_tagline, event_organiser, event_organiser_contact,event_date, event_time, event_location, event_details FROM users.events";
  	$result = $conn->query($sql);
		//echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		$count=0;
		while($row = $result->fetch_assoc()) {
			if($row['event_organiser'] == $sessionUser){
			   echo '<div class="row" style="margin:0 0 1px 10px;">';
                echo '<h3><a href="event_frame.php?id='.$row['event_id'].'">'.$row['event_name'].'</a></h3>';
                echo '<p>'.$row['event_tagline'].'</p>';
				echo '<p><a href="event_frame.php?id='.$row['event_id'].'">Read More</a></p>';                
            echo '</div><hr />';	
			}
			else
				++$count;
				
		}
	} else {
		echo "No contents to display.";
	}
	if($count > 0) //echo "You haven't posted any event yet.<br>";

	?>
    </div>
  </div>
</div>
</div>
<div class="col-sm-4">
<?php include('modules/news_feed.php'); ?>
</div>
</div>
<?php include('modules/footer.php') ?>