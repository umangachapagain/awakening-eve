<?php
	session_start();
	include_once 'modules/dbconnect.php';
// define variables and set to empty values
$unameErr = $passErr = $first_nameErr = $last_nameErr = $genderErr = $birth_cityErr = $birth_stateErr = $birth_countryErr = $birth_dateErr = $addressErr = $address_cityErr = $address_stateErr = $address_countryErr = $address_postal_codeErr = $telephoneErr = $mobile_phoneErr = $emailErr = $social_facebookErr = $social_twitterErr = $about_youErr = $why_joinErr = $registerMSG = NULL;

$uname = $pass = $first_name = $last_name = $gender = $birth_city = $birth_state = $birth_country = $birth_date = $address = $address_city = $address_state = $address_country = $address_postal_code = $telephone = $mobile_phone = $email = $social_facebook = $social_twitter = $about_you = $why_join = NULL;

	if(isset($_SESSION['user'])!="")
	{
	 header("Location: ../user_profiles/profile.php ");
	}
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
	$first_name = test_input($_POST["first-name"]);
	if (!isset($first_name)) {
    $first_nameErr = "Firstname is required";	
  } else {    
    if (!preg_match("/^[a-zA-Z]*$/",$first_name)) {
      $first_nameErr = "Only letters are allowed"; 	  
    }
  }
    $last_name = test_input($_POST["last-name"]);
	if (!isset($last_name)) {
    $last_nameErr = "Lastname is required";	
  } else {    
    if (!preg_match("/^[a-zA-Z]*$/",$last_name)) {
      $last_nameErr = "Only letters are allowed"; 	  
    }
  }
  $gender = test_input($_POST["gender"]);
  if (!isset($gender)) {
    $genderErr = "Gender is required";
  } else {
    //proceed
  }
  $birth_city = test_input($_POST["birth-city"]);
  $birth_state = test_input($_POST["birth-state"]);
  $birth_country = test_input($_POST["birth-country"]);
  $birth_date = test_input($_POST["birth-date"]);
  if (!isset($birth_date)) {
   $birth_dateErr = "Date of birth is required";
  }
  $address = test_input($_POST["address"]);
  $address_city = test_input($_POST["address-city"]);
  $address_state = test_input($_POST["address-state"]);
  $address_country = test_input($_POST["address-country"]);	
  $address_postal_code = test_input($_POST["address-postal-code"]);
  $telephone = test_input($_POST["telephone"]);	
  $mobile_phone = test_input($_POST["mobile-phone"]);	
  $email = test_input($_POST["email"]);
  if (!isset($email)) {
    $emailErr = "Email is required";
  } else {    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
  $social_facebook = test_input($_POST["social-facebook"]);
  $social_twitter = test_input($_POST["social-twitter"]);
  $about_you = test_input($_POST["about-you"]);
  if (!isset($about_you)) {
   $about_youErr = "Say atleast a line about you.";
  }
  $why_join = test_input($_POST["why-join"]);
  if (!isset($why_join)) {
   $why_joinErr = "Why do you want to join us? It's important that we know it.";
  }	
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
  } 
  if(!(isset($unameErr)||isset($passErr)||isset($emailErr)||isset($first_nameErr)||isset($last_nameErr)||isset($genderErr)||isset($birth_dateErr)||isset($about_youErr)||isset($why_joinErr)))
  {
	$sql = "INSERT INTO users (username, password, email, first_name, last_name, gender, birth_city, birth_state, birth_country, birth_date, address, address_city, address_state, address_country, address_postal_code, telephone, mobile_phone, social_facebook, social_twitter, about_you, why_join) VALUES ('$uname', '$pass', '$email' ,'$first_name', '$last_name', '$gender','$birth_city','$birth_state','$birth_country','$birth_date','$address','$address_city','$address_state','$address_country','$address_postal_code','$telephone','$mobile_phone','$social_facebook','$social_twitter','$about_you','$why_join')";

	if ($conn->query($sql) === TRUE) {
    	$registerMSG = "Registered successfully"; ?>
		<script>alert("Registered successfully.");</script>
	<?php header( "Refresh:1; url= logPage.php");	
			  exit;	
	
	} else {
    	$registerMSG = $conn->error;
	}
  }
  else{
	  	$registerMSG = "Data couldn't be submitted. Please re-check your submission.";
	  }
	$conn->close();
}  


function test_input($data) {
if(!$data==""){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
else{
  return NULL;
}
}
?>
<?php $title="Join Us"; include('modules/header.php'); ?>

<img src="../img/awaking_1.jpg" class="bg" /> 
<!-- Multi Step Form -->

<div class="msf-container" style="color:#FFF">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 msf-title" style=""> <?php echo $registerMSG ?> </div>
    </div>
    <div class="row">
      <div class="col-sm-12 msf-form">
        <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-inline">
          <fieldset>
            <h4>Introduction <span class="step">(Step 1 / 7)</span></h4>
            <div class="form-group">
              <label for="first-name">First Name<span class="error">*</span>:</label>
              <br>
              <input type="text" name="first-name" class="first-name form-control <?php if(isset($first_nameErr))echo "has-error" ?>" id="first-name" value="<?php echo $first_name?>">
              <span class="error"><?php echo "<br>".$first_nameErr ?></span> </div>
            <div class="form-group">
              <label for="last-name">Last Name<span class="error">*</span>:</label>
              <br>
              <input type="text" name="last-name" class="last-name form-control" id="last-name" value="<?php echo $last_name ?>">
              <span class="error"><?php echo "<br>".$last_nameErr ?></span> </div>
            <br />
            <div class="form-group">
              <p>Gender<span class="error">*</span>:</p>
              <label class="radio-inline">
                <input type="radio" name="gender" value="male">
                Male </label>
              <label class="radio-inline">
                <input type="radio" name="gender" value="female">
                Female </label>
              <span class="error"><?php echo "<br>".$genderErr ?></span> </div>
            <br>
            <button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
          </fieldset>
          <fieldset>
            <h4>Place and Date of Birth <span class="step">(Step 2 / 7)</span></h4>
            <div class="form-group">
              <label for="birth-city">City:</label>
              <br>
              <input type="text" name="birth-city" class="birth-city form-control" id="birth-city" value="<?php echo $birth_city ?>">
            </div>
            <div class="form-group">
              <label for="birth-state">State / Province:</label>
              <br>
              <input type="text" name="birth-state" class="birth-state form-control" id="birth-state" value="<?php echo $birth_state ?>">
            </div>
            <div class="form-group">
              <label for="birth-country">Country:</label>
              <br>
              <input type="text" name="birth-country" class="birth-country form-control" id="birth-country" value="<?php echo $birth_country ?>">
            </div>
            <div class="form-group">
              <label for="birth-date">Date of Birth (YYYY/MM/DD)<span class="error">*</span>:</label>
              <br>
              <input type="text" name="birth-date" class="birth-date form-control" id="birth-date" value="<?php echo $birth_date?>">
              <span class="error"><?php echo "<br>".$birth_dateErr ?></span> </div>
            <br>
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
            <button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
          </fieldset>
          <fieldset>
            <h4>Address and Contact Information <span class="step">(Step 3 / 7)</span></h4>
            <div class="form-group">
              <label for="address">Address:</label>
              <br>
              <input type="text" name="address" class="address form-control" id="address" value="<?php echo $address ?>">
            </div>
            <div class="form-group">
              <label for="address-city">City:</label>
              <br>
              <input type="text" name="address-city" class="address-city form-control" id="address-city" value="<?php echo $address_city ?>">
            </div>
            <div class="form-group">
              <label for="address-state">State / Province:</label>
              <br>
              <input type="text" name="address-state" class="address-state form-control" id="address-state" value="<?php echo $address_state ?>">
            </div>
            <div class="form-group">
              <label for="address-country">Country:</label>
              <br>
              <input type="text" name="address-country" class="address-country form-control" id="address-country" value="<?php echo $address_country ?>">
            </div>
            <div class="form-group">
              <label for="address-postal-code">Postal Code:</label>
              <br>
              <input type="text" name="address-postal-code" class="address-postal-code form-control" id="address-postal-code" value="<?php echo $address_postal_code ?>">
            </div>
            <div class="form-group">
              <label for="telephone">Telephone:</label>
              <br>
              <input type="text" name="telephone" class="telephone form-control" id="telephone" value="<?php echo $telephone ?>">
            </div>
            <div class="form-group">
              <label for="mobile-phone">Mobile Phone:</label>
              <br>
              <input type="text" name="mobile-phone" class="mobile-phone form-control" id="mobile-phone" value="<?php echo $mobile_phone ?>">
            </div>
            <div class="form-group">
              <label for="email">Email<span class="error">*</span>:</label>
              <br>
              <input type="text" name="email" class="email form-control" id="email" value="<?php echo $email ?>">
              <span class="error"><?php echo "<br>".$emailErr ?></span> </div>
            <br>
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
            <button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
          </fieldset>
          <fieldset>
            <h4>Social Media Profiles <span class="step">(Step 4 / 7)</span></h4>
            <div class="form-group">
              <label for="social-facebook">Facebook:</label>
              <br>
              <input type="text" name="social-facebook" class="social-facebook form-control" id="social-facebook" value="<?php echo $social_facebook ?>">
            </div>
            <div class="form-group">
              <label for="social-twitter">Twitter:</label>
              <br>
              <input type="text" name="social-twitter" class="social-twitter form-control" id="social-twitter" value="<?php echo $social_twitter ?>">
            </div>
            <br>
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
            <button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
          </fieldset>
          <fieldset>
            <h4>About You <span class="step">(Step 5 / 7)</span></h4>
            <div class="form-group">
              <label for="about-you">Tell us a bit about yourself<span class="error">*</span>:</label>
              <br>
              <textarea name="about-you" class="about-you form-control" id="about-you" value="<?php echo $about_you ?>"></textarea>
              <span class="error"><?php echo "<br>".$about_youErr ?></span> </div>
            <br>
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
            <button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
          </fieldset>
          <fieldset>
            <h4>Why You Want To Join <span class="step">(Step 6 / 7)</span></h4>
            <div class="form-group">
              <label for="why-join">Tell us why you want to join<span class="error">*</span>:</label>
              <br>
              <textarea name="why-join" class="why-join form-control" id="why-join" value="<?php echo $why_join ?>"></textarea>
              <span class="error"><?php echo "<br>".$why_joinErr ?></span> </div>
            <br>
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
            <button type="button" class="btn btn-next">Next <i class="fa fa-angle-right"></i></button>
          </fieldset>
          <fieldset>
            <h4>Log in credentials<span class="step">(Step 7 / 7)</span></h4>
            <div class="form-group">
              <label for="username">Username<span class="error">*</span>:</label>
              <br>
              <input type="text" name="uname" class="username form-control" id="username" value="<?php echo $uname ?>">
              <span class="error"><?php echo "<br>".$unameErr ?></span> </div>
            <div class="form-group">
              <label for="password">Password<span class="error">*</span>:</label>
              <br>
              <input type="password" name="pass" class="password form-control" id="password" value="<?php echo $pass ?>">
              <span class="error"><?php echo "<br>".$passErr ?></span> </div>
            <br />
            <button type="button" class="btn btn-previous"><i class="fa fa-angle-left"></i> Previous</button>
            <button type="submit" class="btn">Submit</button>
          </fieldset>
        </form>
        <br />
        <a href="logPage.php" class="col-xs-6 col-xs-offset-3">
        <button class="btn btn-success">Log In</button>
        </a><br />
        <br />
        <style>
		.error{color:#ffff;font-size:16px;}
		</style>
      </div>
    </div>
  </div>
</div>
<?php include('modules/footer.php') ?>
