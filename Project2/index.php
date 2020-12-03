<?php
session_start();

include 'function.php';
include('config.php');

if ($_SESSION['status'] !="LOGIN") {
	header("Location: login.php");
	exit;
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
	<title>Index</title>
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
		<form class="form2" action="" method="POST">
			<input class="urldex" type="text" name="urldex" align="center" placeholder="Input URL">
			<button class="sub" type="text" name="sub" align="center">SUBMIT</button>
			<input type="file" name="file" id="file" class="urldex">
			<button class="sub" type="text" name="sub" align="center">SUBMIT</button>
		</form>
	</div>



</body>

</html>
