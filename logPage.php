<?php
session_start();
	include_once 'modules/dbconnect.php';
// define variables and set to empty values
$unameErr = $passErr = $loginMSG = NULL;
$uname = $pass = NULL;

	if(isset($_SESSION['user'])!="")
	{
	 header("Location: ../user_profiles/profile.php ");
	}
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
	$uname = test_input($_POST["uname"]);

	if (!isset($uname)) {
    $unameErr = "Name is required";
	
  } else {
    
    if (!preg_match("/^[a-zA-Z0-9]*$/",$uname)) {
      $unameErr = "Only letters and numbers allowed"; 
	  
    }
	
  }
  
  $pass = test_input($_POST["pass"]);
   if (!isset($pass)) {
    $passErr = "Password is required";
  } else {
   
    if (!preg_match("/^[a-zA-Z0-9]*$/",$pass)) {
      $passErr = "Only letters and numbers allowed"; 
    }
  }
  
   if(!(isset($unameErr)||isset($passErr)))
  {
  	$sql = "SELECT userID, username, password, email FROM users";
  	$result = $conn->query($sql);
	echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if($row['username'] == $uname && $row['password'] == $pass)
			 {
			  $loginMSG = "";
			  $_SESSION['user'] = $row['username'];
			  $loginMSG = 'Logged in successfully';
			  //echo $loginMSG; ?>
              <script>alert("Logged In Successfully.");</script>
			  <?php header( "Refresh:0; url=user_home.php");	
			  exit;	
			 }
			else
			{
				$loginMSG = "Username and Password do not match.";
				
			}
		}
	} else {
		echo "Unable to fetch data. Try again later.";
	}
  }
  else{
	  $loginMSG = "Invalid details";
	  }
	$conn->close();
  
}

function test_input($data) {
if(!$data=="")
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
else return NULL;
}

?>
<?php 
$title="Sign in";
include('modules/header.php') ?>

<!-- Top content -->
<img src="../img/awaking_1.jpg" class="bg" />
<div class="top-content">
<div class="inner-bg">
<div class="container">
  
    <div class="row">
      <div class="col-sm-6 form-box">
        <div class="form-top">
          <div class="form-top-left">
            <h3>Login</h3>
          </div>
          <div class="form-top-right"><a><i class="fa fa-user" aria-hidden="true"></i></a> </div>
        </div>
        
        <div class="form-bottom">
          <span class="help-block col-xs-8 col-xs-offset-3" style="color:#a94442;"><?php echo $loginMSG ?></span>
          <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="login-form">
            <div class="form-group <?php if(isset($unameErr)||isset($loginMSG))echo "has-error" ?>">
              <label class="sr-only" for="form-username">Username</label>
              <input type="text" name="uname" placeholder="Username" class="form-username form-control" id="form-username" value="<?php echo $uname;?>">
              <span class="help-block"><?php echo $unameErr;?></span>
            </div>
            <div class="form-group <?php if(isset($unameErr)||isset($loginMSG))echo "has-error" ?>">
              <label class="sr-only" for="form-password">Password</label>
              <input type="password" name="pass" placeholder="Password" class="form-password form-control" id="form-password" value="<?php echo $pass;?>">
               <span class="help-block"><?php echo $passErr;?></span>
            </div>
            <button type="submit" id="LogIn" class="btn btn-success" name="LogIn" value="submit" style="margin-bottom:1px;">Sign in</button>
           
          </form>
          <a href="join.php"><button class="btn btn-success col-xs-12">Join Us</button></a><br /><br />
          </div>
         </div>
      </div>
    </div>
 
</div>


<?php include('modules/footer.php') ?>
