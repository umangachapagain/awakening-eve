<?php 
$event_name = $event_tagline = $event_organiser = $event_date = $event_time = $event_location = $event_details =$event_organiser_contact = $postMSG = NULL;

session_start(); 
include_once 'modules/dbconnect.php';
if(!isset($_SESSION['user'])!="")
	{
	 header("Location: logPage.php");
	}
$title="Post an Event";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $event_name = test_input($_POST["event_name"]); 
   $event_tagline = test_input($_POST["event_tagline"]);
   $event_organiser = test_input($_POST["event_organiser"]);
   $event_date = test_input($_POST["event_date"]);
   $event_time = test_input($_POST["event_time"]);
   $event_location = test_input($_POST["event_location"]);
   $event_details = test_input($_POST["event_details"]);
   $event_organiser_contact = test_input($_POST["event_organiser_contact"]);
   
  if(isset($event_name)&&isset($event_organiser)&&isset($event_date)&&isset($event_time)&&isset($event_location)&&isset($event_details)&&isset($event_organiser_contact))
  {
	$sql = "INSERT INTO users.events (event_name, event_tagline, event_organiser, event_organiser_contact,event_date, event_time, event_location, event_details) VALUES ('$event_name', '$event_tagline', '$event_organiser','$event_organiser_contact','$event_date', '$event_time', '$event_location', '$event_details')";

	if ($conn->query($sql) === TRUE) {
    	$postMSG = '<span class="help-class col-xs-6 col-xs-offset-2" style="color:#29a628;">Posted successfully</span>';
	
	} else {
    	$postMSG = $conn->error;
		echo $postMSG;
	}
  }
  else{
	  	$postMSG = '<span class="help-class col-xs-6 col-xs-offset-2" style="color:#a94442;">Event couldn\'t be posted.</span>';
	  }
	$conn->close();
}  
function test_input($data) {
if(!$data==""){
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}
else{
  return NULL;
}
} 
include('modules/header.php') ?>
<br />
<form class="form-horizontal col-sm-10" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" style="margin-top:60px; color:#fff" name="eventForm">
      <?php echo $postMSG ?><br />
        <div class="form-group">
          <label for="event_name" class="col-sm-2 control-label">Event Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_name" name="event_name" placeholder="Event Name">
          </div>
        </div>
        <div class="form-group">
          <label for="event_organiser" class="col-sm-2 control-label">Organiser</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_organiser" name="event_organiser" value="<?php echo $uname ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="event_organiser_contact" class="col-sm-2 control-label">Organiser contact</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_organiser_contact" name="event_organiser_contact" value="<?php echo $event_organiser_contact ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="event_tagline" class="col-sm-2 control-label">Tagline</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_tagline" name="event_tagline" placeholder="Event tagline">
          </div>
        </div>
          <div class="form-group">
          <label for="event_date" class="col-sm-2 control-label">Event Date</label>
          <div class="col-sm-10">
            <input type="date" class="form-control" id="event_date" name="event_date" placeholder="Event Date">
          </div>
        </div>
          <div class="form-group">
          <label for="event_time" class="col-sm-2 control-label">Event Time</label>
          <div class="col-sm-10">
            <input type="time" class="form-control" id="event_time" name="event_time" placeholder="Event Time">
          </div>
        </div>
          <div class="form-group">
          <label for="event_location" class="col-sm-2 control-label">Event Location</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="event_location" name="event_location" placeholder="Event Location">
          </div>
        </div>
        
        <div class="form-group">
         <label for="event_details" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
          <textarea class="form-control editor" id="event_details" name="event_details" ></textarea>
          </div>
        </div>
         <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default btn-success">Submit</button>
          </div>
        </div>
      </form>
<?php include('modules/footer.php') ?>