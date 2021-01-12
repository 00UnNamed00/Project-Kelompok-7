<?php
session_start();

include 'function.php';
include('config.php');
include "FaceDetector.php";

if ($_SESSION['status'] !="LOGIN") {
	header("Location: login.php");
	exit;
}
if (isset($_POST['uploadurl'])) {
	$url_to_image = $_POST['url'];
	$my_save_dir = 'img/';
	$filename = basename($url_to_image);
	$complete_save_loc = $my_save_dir.$filename;
	file_put_contents($complete_save_loc,file_get_contents($url_to_image));
 
	$detector = new svay\FaceDetector('detection.dat');
	$detector->faceDetect($complete_save_loc);
	$detector->toJpeg();
}
if (isset($_POST['upload'])) {
	$namafile = $_FILES['file']['name'];
	$error = $_FILES['file']['error'];
	$tmpname = $_FILES['file']['tmp_name'];
	$my_save_dir = 'img/';
	$complete_save_loc = $my_save_dir.$namafile;
    //gambar siap diupload
	move_uploaded_file($tmpname, $complete_save_loc);
	
	$detector = new svay\FaceDetector('detection.dat');
	$detector->faceDetect($complete_save_loc);
	$detector->toJpeg();
 
}
?>

<!DOCTYPE html>
<html>

<head>
	<link rel="shortcut icon" href="logo.svg">
	<link rel="stylesheet" href="style.css">
	<link href="gg.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="font-awesome">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<title>Face ID</title>
</head>

<body>
	<img class="logo" src="logo.svg" alt="">
	<div class="animation-area">
		<ul class="box-area">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<div class="dropdown">
		<button class="dropbtn"><?php  echo ucwords($_SESSION['username']); ?></button>
		<div class="dropdown-content">
			<a href="profile.php" align="center">My Profile</a>
			<a href="logout.php" align="center">Logout</a>
		</div>
	</div>

	<div class=" maindex">
		<form class="form2" action="" method="POST" enctype="multipart/form-data">
		<h2>Select input URL or Local File</h2>
			<input class="urldex" type="text" name="url" align="center" placeholder="Input URL">
			<button class="sub" type="text" name="uploadurl" align="center">SUBMIT</button>
			<br><br><br>
			<label for="file" align="center">Choose File</label>
			<input type="file" name="file" id="file" class="urldex" align="center" hidden>
			<br><br>
			<span id="btn-span" align="center">No file chosen</span>
			<br>
			<button class="sub" type="text" name="upload" align="center" style="margin-top : 20px">SUBMIT</button>
		</form>
	</div>

	<script>
		var actualBtn = document.getElementById('file');
        var fileChosen = document.getElementById('btn-span');
        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
		})
		
	</script>


</body>

</html>