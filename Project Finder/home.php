<?php 
include('functions.php');

if (!isGuest()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: index.php');
}


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}







$conn = mysqli_connect("localhost", "root", "", "multi_login");
$results = mysqli_query($conn, "SELECT * FROM users_info");
$users = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html>
<head>

	<script type="text/javascript">
				function PreviewImage() {
				var oFReader = new FileReader();
				oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

				oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
				};
				};



				</script>

				    <script>
        var cleaveNumeral = new Cleave('.form4', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});

            $('#select-country').change(function(){
        cleave.setPhoneRegionCode(this.value);
        cleave.setRawValue('');
    });




var file_data = $('.inputfile').prop('files')[0];
var form_data = new FormData();                     // Create a form
form_data.append('inputfile', file_data);           // append file to form

$.ajax({
        url: "home.php",
        type        : 'post',
        cache       : false,
        contentType : false,
        processData : false,
        data        : form_data,                         
        success     : function(response){
            alert(response);
        }
 });







</script>
	<title>Canda</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="cleave.js"></script>
    <script src="cleave-phone.i18n.js"></script>
	<script src="script.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7cPlayfair+Display:400i" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<div class="inner-header-home"><a class="inner-link" href="index.php"><strong>Canda</strong></a></div>
	<div class="navigation-home"><li><a  class="active nav-link" href='home.php'>Home</li></a>
				<li><a href='#'>Contact us</li></a>
				<li><a href="#">Signed in as : <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>

					</small></a></li>

				<?php endif ?>
				<li><a  href="index.php?logout='1'">Logout</li></a></div>
			

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
	<div class="bghome"></div>
	<div class="wrap">
		<div class="box-profil"><p class="profil-description">Hello  <?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>
					<?php endif ?></p><p class="more-desc">This is User Description. Lorem ipsum dolor sit.</p></div>

			<div class="profile-photo"><img src="assets/default.png" type="" class="icon-default" title="Add photos/videos">
				<?php
				echo "<div class='img_prfl'>";
				echo "<img src=userimg/". $_SESSION['user']['profile_image']." >";
				echo "</div>";
				?>
			
				
			</div>

				<div class="box-profil-photo-cover"><div class="cover"><img src="assets/fav1.jpg" class="cover-img">
					<form name="form_data" method="post" action="home.php" enctype="multipart/form_data">
					<div class="chg-cover"><label class=""><a class="">Change cover</a>
						<input type='file' name='inputfile' class='inputfile'>
					
						
					</label></div></form></div>
					
				</div>

					<div class="box-posting"><div class="box-posting-konten">
  					<?php
  						$db = mysqli_connect("localhost", "root", "", "multi_login");
  						$sql = "SELECT * FROM images ORDER BY waktu DESC";
  						$sort = "SELECT * FROM images ORDER BY budget DESC";
  						$result = mysqli_query($db,$sql);
  						$hello = "Posted by : ";
  						$pada = "at : ";
  						$cp = "Email : ";
  						$cmp = "Company : ";
  						$bud = "Budget : ";
  						$idr = " IDR";

    					while ($row = mysqli_fetch_array($result)) {
      					echo "<div class='img_div'>";
      					echo "<h3>".$row['judul']."</h3>";
        				echo "<img src='upload/image/".$row['path']."' >";
        				echo "<h4>". $row['deskripsi']."</h4>";
        				echo "<h5>". $hello .$row['postedby']."</h5>";
        				echo "<h5>". $pada .$row['waktu']."</h5>";
        				echo "<h6>". $cp .$row['email']."</h6>";
        				echo "<h6>". $cmp .$row['working']."</h6>";
        				echo "<h6>". $bud .$row['budget']. $idr . "</h6>";
        				
      					echo "</div>";
    					}

  					?>
        			</div></div>

						<div class="posting-box-top">
							<form name="visi" method="post" action="home.php" enctype="multipart/form-data">
							<input class="form" type="text" minlength="3"  maxlength="999" placeholder="New project name" name="judul" required>
							<textarea class="form2" type="text" rows="10" cols="40" minlength="15" maxlength="999" placeholder="Project description" name="deskripsi" required></textarea>
							<input class="form3" type="text" minlength=""  maxlength="100" placeholder="Approx budget (IDR)" name="budget" onkeypress="return isNumberKey(event)" required>
							        <script src="cleave.js"></script>
									    <script src="cleave-phone.i18n.js"></script>
									    <script>
									        var cleaveNumeral = new Cleave('.form3', {
									    numeral: true,
									    
									});

									            $('#select-country').change(function(){
									        cleave.setPhoneRegionCode(this.value);
									        cleave.setRawValue('');
									    });
									</script>
							<button type="image" src="assets/nav-ico.svg" class="registerb" name="simpan" title="Submit"><img src="assets/nav-ico.svg">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
							<label class="entr"><a class="file-enter">Add photos</a>
    						<input type="file" id="uploadImage" name="path" onchange="PreviewImage()"   size="60" multiple required>
    						</label><p class="req">You need to provide atleast 1 photo.</p>
							<img src="assets/iconupload.svg" type="" class="icon7" title="Add photos/videos" required>
							<img id="uploadPreview" style="width: 30px; height: 30px; margin: 40px 160px; color: #111;" /><br>


							</a></form></a></div>

							<div class="sponsor"><div class="spn"><img src="assets/spon2.jpg" class="spn-img" title="Sponsored">Sponsored Project</div><p class="spn-head">Lorem ipsum dolor sit.</p><p class="spn-desc">This is only the demo text that shows description. Lorem Lorem Lorem? Lorem ipsum dolor sit.</p><div class="buy"><a href="#">Show More</a></div></div>

									<div class="tes"></div>

										<div class="about-us"><div class="abt-us"><img src="" class="abt-us-img" title="About us">About us</div></div>

											<div class="about-you"><div class="abt"><img src "" class="abt-img">About<a class="edit" href="form.php">Edit</a></div>
											<div class="abt-header">
												
												<div class="abt-desc1">Lives in  :<?php  if (isset($_SESSION['user'])) : ?>
												<strong><?php echo $_SESSION['user']['live']; ?></strong>
												<?php endif ?><p class="icon8"><img src="assets/iconhome.svg" type="" class="icon8" title=""></p>
												</div>
												<div class="abt-desc1">Company  :<?php  if (isset($_SESSION['user'])) : ?>
												<strong><?php echo $_SESSION['user']['working']; ?></strong>
												<?php endif ?><p class="icon9"><img src="assets/icongear.png" type="" class="icon9" title=""></p></div>
												<div class="abt-desc1">Education :<?php  if (isset($_SESSION['user'])) : ?>
												<strong><?php echo $_SESSION['user']['education']; ?></strong>
												<?php endif ?><p class="icon10"><img src="assets/iconschool3.svg" type="" class="icon10" title=""></p></div>
												<div class="abt-desc1">From :<?php  if (isset($_SESSION['user'])) : ?>
												<strong><?php echo $_SESSION['user']['dari']; ?></strong>
												<?php endif ?><p class="icon11"><img src="assets/iconplace.png" type="" class="icon11" title=""></p></div>
												<div class="abt-desc1">Email :<?php  if (isset($_SESSION['user'])) : ?>
												<strong><?php echo $_SESSION['user']['email']; ?></strong>
												<?php endif ?><p class="icon11"><img src="assets/mailico.svg" type="" class="icon11" title=""></p></div>
												
										

										</div>
									</div>
												<div class="ads"><div class="advert"><div class="advertise"><img src="assets/ads.jpg" class="ads-img" title="Advertisement">Advertisement</div></div></div>
	</div>





</body>