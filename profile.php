<?php 
session_start(); 
include_once 'modules/dbconnect.php';
if(!isset($_SESSION['user'])!="")
	{
	 header("Location: modules/logPage.php");
	}
$uname = $pass = $first_name = $last_name = $gender = $birth_city = $birth_state = $birth_country = $birth_date = $address = $address_city = $address_state = $address_country = $address_postal_code = $telephone = $mobile_phone = $email = $social_facebook = $social_twitter = $about_you = $why_join = NULL;

$uname=$_SESSION['user'];
$title="Profile: ".$_SESSION['user'];

    $sql = "SELECT * FROM users.users";
  	$result = $conn->query($sql);
		//echo $conn->error;
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		if($uname == $row['username']){
		$pass = $row['password'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$gender = $row['gender'];
		$birth_city = $row['birth_city'];
		$birth_state = $row['birth_state'];
		$birth_country = $row['birth_country'];
		$birth_date = $row['birth_date'];
		$address = $row['address'];
		$address_city = $row['address_city'];
		$address_state = $row['address_state'];
		$address_country = $row['address_country'];
		$address_postal_code = $row['address_postal_code'];
		$telephone = $row['telephone'];
		$mobile_phone = $row['mobile_phone'];
		$email = $row['email'];
		$social_facebook = $row['social_facebook']; 
		$social_twitter = $row['social_twitter'];
		$about_you = $row['about_you'];
		$why_join = $row['why_join'];	  			  
		}
		else
		  echo "No information to display.";
		}		
	} else {
		echo "No information to display.";
		
	}
	$conn->close();
include('modules/header.php') ?>
  <style>
  fieldset{
  background:#333;
  padding:20px;
  margin-bottom:5px;
  }
  </style>

<div class="container" style="color:#FFF;">
  <fieldset>
    <h4>Introduction</h4>
    <div class="form-group">
      <label for="first-name">First Name:</label>
      <br>
      <input type="text" name="first-name" class="first-name form-control id="first-name" value="<?php echo $first_name?>">
    </div>
    <div class="form-group">
      <label for="last-name">Last Name:</label>
      <br>
      <input type="text" name="last-name" class="last-name form-control" id="last-name" value="<?php echo $last_name ?>">
    </div>
    <br />
    <div class="form-group">
      <p>Gender:</p>
      <label class="radio-inline">
        <input type="radio" name="gender" value="male" <?php if($gender == "male"){ echo "checked";} ?>>
        Male </label>
      <label class="radio-inline">
        <input type="radio" name="gender" value="female" <?php if($gender == "female"){ echo "checked";} ?>>
        Female </label>
    </div>
    <br>
  </fieldset>
  <fieldset>
    <h4>Place and Date of Birth</h4>
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
      <label for="birth-date">Date of Birth (YYYY/MM/DD):</label>
      <br>
      <input type="text" name="birth-date" class="birth-date form-control" id="birth-date" value="<?php echo $birth_date?>">
    </div>
    <br>
  </fieldset>
  <fieldset>
    <h4>Address and Contact Information</h4>
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
      <label for="email">Email:</label>
      <br>
      <input type="text" name="email" class="email form-control" id="email" value="<?php echo $email ?>">
    </div>
    <br>
  </fieldset>
  <fieldset>
    <h4>Social Media Profiles</h4>
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
  </fieldset>
  <fieldset>
    <h4>About You</h4>
    <div class="form-group">
      <label for="about-you">Tell us a bit about yourself:</label>
      <br>
      <textarea name="about-you" class="about-you form-control" id="about-you" placeholder="<?php echo $about_you ?>"></textarea>
    </div>
    <br>
  </fieldset>
  <fieldset>
    <h4>Why You Want To Join</h4>
    <div class="form-group">
      <label for="why-join">Tell us why you want to join:</label>
      <br>
      <textarea name="why-join" class="why-join form-control" id="why-join" placeholder="<?php echo $why_join ?>"></textarea>
    </div>
    <br>
  </fieldset>
  <fieldset>
    <h4>Log in credentials</h4>
    <div class="form-group">
      <label for="username">Username:</label>
      <br>
      <input type="text" name="uname" class="username form-control" id="username" value="<?php echo $uname ?>">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <br>
      <input type="password" name="pass" class="password form-control" id="password" value="<?php echo $pass ?>">
    </div>
    <br />
  </fieldset>
  <fieldset>
  <a><button class="btn btn-info">Update</button></a>
  </fieldset>

  
</div>
<?php include('modules/footer.php') ?>