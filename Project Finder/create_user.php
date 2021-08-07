<?php 
include('functions.php');

if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}
if (!isGuest()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
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
	<div class="navigation"><li><a  class="nav-link" href='index.php'>Home</li></a>
				<li><a class="nav-link" href="#">Signed in as : <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #343a40;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						
					</small></a>

				<?php endif ?>
			</li>
			<li><a class="nav-link active" href="manage.php">Manage users</a></li>
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
	<div class="bg"></div>

	<p class="reg"><form action="create_user.php" method="post">
  <div class="container">
    <h1>Admin page - Create user</h1>
    <?php echo display_error(); ?>
    <hr>
    <label for="username"><b>Username</b></label>
    <input  type="text" placeholder="Enter Username" name="username" required>
    <label for="email"><b>Email</b></label>
    <input  type="email" placeholder="Enter Email" name="email" required>
    <label>User type</label>
		<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
		</select>
    <label for="password"><b>Password</b></label>
    <input  type="password" placeholder="Enter Password" name="password_1" required>
    <label for="password"><b>Confirm Password</b></label>
    <input  type="password" placeholder="Enter Password" name="password_2" required>

    <button name="register_btn" type="submit" class="registerbtn">Create User</button>
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