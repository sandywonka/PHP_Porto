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
<?php
if(isset($_POST['delete'])){
$checkbox = $_POST['check'];
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
mysqli_query($db,"DELETE FROM images WHERE id='".$del_id."'");
$message = "Data deleted successfully !";
}
}
$result = mysqli_query($db,"SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Canda</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7cPlayfair+Display:400i" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="inner-header"><a class="inner-link" href="index.php"><strong>Canda</strong></a></div>
	<div class="navigation"><li><a  class="" href='index.php'>Home</li></a>
				<li><a href="#">Signed in as : <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #343a40;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
						
					</small></a>

				<?php endif ?>
			</li>
			<li><a class="nav-link" href="manage.php">Manage users</a></li>
			<li><a class="nav-link active" href="delete_post.php">Manage posts</a></li>
			<li><a class="nav-link" href="index.php?logout='1'" style="">Logout</a></li></div>
	<div class="navbar"></div>
			<!--ini header-->
		
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
	<p class="reg"><form action="delete_post.php" method="post">
  	<div class="container4">
    <h1>Admin page - Manage Posts</h1>
    <?php echo display_error(); ?>
	<div><?php if(isset($message)) { echo $message; } ?></div>

	<form method="post" action="">
	<table class="table table-bordered">
		<thead>
		<tr>
			<td><div id="checkall"> Check Box</td>
			<td>ID</td>
			<td>Project name</td>
			<td>Project path</td>
			<td>Project description</td>
		</tr>
		</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
	<tr>
		<td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["id"]; ?>"></td>
		<td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["judul"]; ?></td>
		<td><?php echo $row["path"]; ?></td>
		<td><?php echo $row["deskripsi"]; ?></td>
	</tr>
<?php
$i++;
}
?>
	</table>
	<p align="center"><button type="submit" class="deletebtn" name="delete">DELETE</button></p>
	</form>
</body>
</html>