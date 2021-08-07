<?php



// koneksi ke database
$db = mysqli_connect("localhost", "root", "", "multi_login");

$judul=$_POST['judul'];
$deskripsi=$_POST['deskripsi'];
//$tgl= date('d-M-Y H:i:s');
$tgl = date('Y-m-d H:i:s');
//echo $tgl.$judu;

if (isset($_POST['simpan'])){
	$fileName = $_FILES['path']['name'];
	$postedby = $_SESSION['user']['username'];


    // Simpan ke Database
	$sql = "INSERT into images Values (NULL, '$judul', '$deskripsi', '$fileName','$postedby', now())";
	mysqli_query($db,$sql);
	// Simpan di Folder image (temporary)
	move_uploaded_file($_FILES['path']['tmp_name'], "upload/image/".$_FILES['path']['name']);
	echo"<script>history.go(-1);</script>";
}
?>