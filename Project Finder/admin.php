<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Canda</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7cPlayfair+Display:400i" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<div class="inner-header"><a href="index.php"><strong>Canda</strong></a></div>
	<div class="navigation"><li><a  class="active inner-link" href='#'>Home</li></a>
				<li><a href="#">Signed in as : <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #343a40;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						
					</small></a>

				<?php endif ?>
			</li>
			<li><a class="nav-link" href="manage.php">Manage users</a></li>
			<li><a class="nav-link" href="delete_post.php">Manage posts</a></li>
			<li><a class="nav-link" href="index.php?logout='1'" style="">Logout</a></li></div>
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

	<div class="box">Project Manager</div>
	<p class="paragraf">Lorem ipsum dolor sit</p>
	
		</body>
		</html>