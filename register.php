<?php
 	 session_start();
   		include("connection.php");
  		include("functions.php");

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
		 	//somtiming was posting
    		$user_name = $_POST['user_name'];
	    	$password = $_POST['password'];

    		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    		{
    			//save to database
    			$user_id = random_num(20);
    			$query = "insert into users (user_id, user_name, password) values ('$user_id','$user_name','$password')";
        		mysqli_query($con, $query);

        		header("Location: login.php");
         		die;
	  		}
        	else
     	    {
      		    echo "Please enter some Valid information!";
    		}
  		}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="png" href="images/icon/FrenchVerse(12).png">
	<title>Login SignUp</title>
	<link rel="stylesheet" type="text/css" href="loginStyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <!-- It will redirect to the Home Page after submitting the form -->
  <script>
  $(document).ready(function(){
    $("form").submit(function(){
      alert("Great Job !");
    });
  });
  </script>
</head>
<body>
		<div class="form-box">
			<div class="button-box">
				<div id="btn"></div>
				<button type="button" class="toggle-btn" id="log" onclick="login()" style="color: #fff;">Log In</button>
				<button type="button" class="toggle-btn" id="reg" onclick="register()">Register</button>
			</div>
			<div class="social-icons">
				<img src="images/icon/fb2.png">
				<img src="images/icon/insta2.png">
				<img src="images/icon/tt2.png">
			</div>

			
			<!-- Registration Form -->
			<form id="register" class="input-group">
				<input type="text" class="input-field" placeholder="Full Name" required="required">
				<input type="email" class="input-field" placeholder="Email Address" required="required">
				<input type="password" class="input-field" placeholder="Create Password" name="psame" required="required">
				<input type="password" class="input-field" placeholder="Confirm Password" name="psame" required="required">
				<input type="checkbox" class="check-box" id="chkAgree" onclick="goFurther()">I agree to the Terms & Conditions
				<button type="submit" id="btnSubmit" class="submit-btn reg-btn">Register</button>
			</form>
		</div>
		<script type="text/javascript" src="script.js"></script>
</body>
</html>