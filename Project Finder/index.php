
<?php
include ('functions.php');

if (!isUser()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: home.php');
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="script.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7cPlayfair+Display:400i" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div class="inner-header"><li><a class="inner-link" href="index.php">Canda</a></li></div>
	<div  class="navigation"><li><a class="nav-link active"  href='index.php'>Home</li></a>
				<li><a class="nav-link" href='#'>Contact us</li></a>
				<li><a class="nav-link" href='login.php'>Login</li></a>
				<li><a class="nav-link" href='register.php'>Register</li></a></div>
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
<div class="bgindex"></div>
</head>
<body>


	<div class="box"><strong>We Helps You<br>Developing<br>Your Great Ideas.</strong></div>
	<p class="paragraf">Create, Develop, Share, Earn your project is easier with us by your side. </p>
	<div class="contentbtn"><a href="register.php">Get Started</a></div>
	<div class="contentheader"><p class="lead">Create Your Project.</p>
							<p>We make sure that user experience is our highest priority.<br>We always trying to be more powerful, more unique and more pleasing than other competitors.</p>
							 <img src="assets/mockup4.png" class="mockup" alt="Flowers in Chania"> </img>

	<div class="content"><li><img src="assets/ico5.svg" class="icon"><p class="iconheader">Develop your ideas.</p></img>		
							 <p class="icondesc">Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet</p></li>
							 <li><img src="assets/ico1.svg" class="icon2"><p class="iconheader2">Build a team.</p></img>
							 <p class="icondesc2">Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet</p></li>
							 <li><img src="assets/ico3.svg" class="icon3"><p class="iconheader3">Increase popularity.</p></img>
							 <p class="icondesc3">Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet</p></li>
							 <li><img src="assets/ico2.svg" class="icon4"><p class="iconheader4">Start earning.</p></img>
							 <p class="icondesc4">Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet Lorem ipsum dolor sit amet consectetuer adipiscing elit sed diam lorem ipsum amet</p></li></div>

	<div class="contentheader"><p class="lead">Most Favorited Projects.</p>
							<p>Check our customer fresh latest and most favorited projects</p>
	<div class="item"><div class="itemcontent"><p class="itemname">Keen Beer<p>
							<div class="itemdesc">A Beer that made from honey</div>


	</div>
	
		</body>
		</html>