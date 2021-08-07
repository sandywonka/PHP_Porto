
<?php
include ('functions.php');

if (!isUser()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index_signed_in.php');
}

if (!isAdmin2()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: admin.php');
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Canda</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7cPlayfair+Display:400i" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="inner-header"><a class="inner-link" href="index.php"><strong>Canda</strong></a></div>
	<div class="navigation"><li><a  class="nav-link"  href='index.php'>Home</li></a>
				<li><a class="nav-link" href='#'>Contact us</li></a>
				<li><a class="nav-link" href='login.php'>Login</li></a>
				<li><a class="nav-link active" href='register.php'>Register</li></a></li></div>
				<div class="navbar"></div>
		<!--ini menubar lama
		<div class="menubar">
			<ul>
				<li><a href='index.php'>Home</li></a>
				<li><a href='profile.php'>Profile</li></a>
				<li><a href='contact.php'>Contact Us</li></a>
				<li><a href='login2.php'>Login</li></a>
				<li><a href='regis.php'>Registration</li></a>
    			<div class="login-container">
    			<!--<li><form action="/action_page.php">
      			<input type="text" placeholder="Username" name="username">
      			<input type="text" placeholder="Password" name="psw">
      			<button type="submit">Login</button>
    			</form></li>-->
    		</div>
  </div>
			</ul>
		</div>

</head>
<body>
	<div class="bg"></div>

	<p class="reg"><form action="register.php" method="POST">
  <div class="container">
    <h1>Welcome to sign up page</h1>
    <p>Please fill in this form to create an account.</p>
        <?php echo display_error(); ?>
    <hr>

    <label for="username"><p>Username</p></label>
    <input type="text" minlength="5" placeholder="Enter Username" name="username" required>
    <label for="email"><p>Email</p></label>
    <input type="email" placeholder="Enter Email" name="email" required>

    <label for="password"><p>Password</p></label>
    <input type="password" minlength="8" placeholder="Enter Password" name="password_1" required>

    <label for="password"><p>Confirm Password</p></label>
    <input type="password" minlength="8" placeholder="Enter Password" name="password_2" required>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
    <button type="submit" name="register_btn" class="registerbtn">Register</button>


  </div>

    
  </div>
</form> 
			</div>
		</div>	
		
	</div>

</body>
</html></p>
	
		</body>
		</html>