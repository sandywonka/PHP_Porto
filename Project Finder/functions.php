<?php 

session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'multi_login');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 









// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}












// CHECK USERNAME IS TAKEN OR NOT
  if (isset($_POST['username_check'])) {
  	$username = $_POST['username'];
  	$sql = "SELECT * FROM users WHERE username='$username'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }
  if (isset($_POST['email_check'])) {
  	$email = $_POST['email'];
  	$sql = "SELECT * FROM users WHERE email='$email'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }
  if (isset($_POST['save'])) {
  	$username = $_POST['username'];
  	$email = $_POST['email'];
  	$password = $_POST['password'];
  	$sql = "SELECT * FROM users WHERE username='$username'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "exists";	
  	  exit();
  	}else{
  	  $query = "INSERT INTO users (username, email, password) 
  	       	VALUES ('$username', '$email', '".md5($password)."')";
  	  $results = mysqli_query($db, $query);
  	  echo 'Saved!';
  	  exit();
  	}
  }



if (isset($_POST['delete_btn'])) {
	delete();
}
if (isset($_POST['simpan'])) {
	posting();
}
if (isset($_POST['save_profile'])) {
	save_profile();
}


//UPDATE USER PROFILE
function save_profile(){
  global $db, $sql, $sql_e, $sql_u, $res_e, $res_u, $errors, $username, $email;
  $msg = "";
  $msg_class = "";
  $conn = mysqli_connect("localhost", "root", "", "multi_login");



  if (isset($_POST['save_profile'])) {
    // for the database

    $live = ($_POST['live']);
    $working = ($_POST['working']);
    $education = ($_POST['education']);
    $dari = ($_POST['dari']);
    $profileImageName = time() . '-' . $_FILES["profileImage"]["name"];
    // For image upload
    $target_dir = "userimg/";
    $target_file = $target_dir . basename($profileImageName);
    // VALIDATION
    // validate image size. Size is calculated in Bytes
    if($_FILES['profileImage']['size'] > 200000) {
      $msg = "Image size should not be greated than 200Kb";
      $msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
      $msg = "File already exists";
      $msg_class = "alert-danger";
    }
    // Upload image only if no errors
    if (empty($error)) {
      if(move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
        $sql = "UPDATE users SET profile_image='$profileImageName', live='$live', working='$working', education='$education', dari='$dari' WHERE id ='".$_SESSION['user']['id']."' ";
        
        if(mysqli_query($conn, $sql)){
          $msg = "Image uploaded and saved in the Database";
          $msg_class = "alert-success";
        } else {
          $msg = "There was an error in the database";
          $msg_class = "alert-danger";
        }
      } else {
        $error = "There was an erro uploading the file";
        $msg = "alert-danger";
      }
    }
  }


}




  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...




// DELETE USER
function delete(){
if(isset($_POST['delete'])){
$checkbox = $_POST['check'];
for($i=0;$i<count($checkbox);$i++){
$del_id = $checkbox[$i];
mysqli_query($db,"DELETE FROM users WHERE id='".$del_id."'");
$message = "Data deleted successfully !";
}
}
$result = mysqli_query($db,"SELECT * FROM users");
}



//POSTING
function posting(){
global $db, $sql, $sql_e, $sql_u, $res_e, $res_u, $errors, $username, $email;

$judul=$_POST['judul'];
$deskripsi=$_POST['deskripsi'];
$budget=$_POST['budget'];
//$tgl= date('d-M-Y H:i:s');
$tgl = date('Y-m-d H:i:s');
//echo $tgl.$judu;

if (isset($_POST['simpan'])){
	$path = $_FILES['path']['name'];
	$postedby = $_SESSION['user']['username'];
	$email = $_SESSION['user']['email'];
	$working = $_SESSION['user']['working'];


    // Simpan ke Database
	$sql = "INSERT into images Values (NULL, '$judul', '$deskripsi', '$postedby', '$path', '$working', '$email', '$budget', now())";
	mysqli_query($db,$sql);
	// Simpan di Folder image (temporary)
	move_uploaded_file($_FILES['path']['tmp_name'], "upload/image/".$_FILES['path']['name']);
	echo"<script>history.go(-1);</script>";
}
}



// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $sql, $sql_e, $sql_u, $res_e, $res_u, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
/*	$live        =  e($_POST['live']);
	$working     =  e($_POST['working']);
	$education   =  e($_POST['education']);
	$dari        =  e($_POST['dari']);*/
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$sql_u = "SELECT * FROM users WHERE username='$username'";
	$sql_e = "SELECT * FROM users WHERE email='$email'";
	$res_u = mysqli_query($db, $sql_u);
	$res_e = mysqli_query($db, $sql_e);


	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users SET username='$username', email='$email', user_type='user', password='$password', profile_image='', live='', working='',  education='', dari=''";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created";
			header('location: manage.php');
		}
		else if (mysqli_num_rows($res_u) > 0) {
			array_push($errors, "Username/Email is already taken");
		}
		else if(mysqli_num_rows($res_e) > 0){
  	  		array_push($errors, "Username/Email is already taken");
  		}	

		else{
			$query = "INSERT INTO users SET username='$username', email='$email', user_type='user', password='$password', profile_image='', live='', working='',  education='', dari=''";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: home.php');				
		}
	}
}








// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users, admin WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	#$user = mysqli_fetch_assoc($result);
	#return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$query2 = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);
		$results2 = mysqli_query($db, $query2);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'user') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: home.php');		  
			}
		
		}else if(mysqli_num_rows($results) == 0) {
			$logged_in_user = mysqli_fetch_assoc($results2);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin.php');
		}
			array_push($errors, "Wrong username/password combination");
		
		}
	}
}
// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isUser()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
		return false;
	}else{
		return true;
	}
}

function isAdmin2()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return false;
	}else{
		return true;
	}
}
function isGuest()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'user' ) {
		return true;
	}else if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else {
		return false;
	}
}
