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
	<title>Index</title>
</head>
<body>
	<a href="logout.php">Logout</a>

</body>
</html><?php
session_start();

include 'function.php';

if ($_SESSION['status'] != "LOGIN") {
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
	<!--<img src="logo.svg" alt="">-->
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
	<i class="far fa-user"></i>
	<div class="dropdown">
		<button class="dropbtn">nama user</button>
		<div class="dropdown-content">
			<a href="logout.php">Logout</a>
			<a href="profile.php">My Profile</a>
		</div>
	</div>
	<div class=" maindex">
		<?php if (isset($_SESSION['gagal_login'])) {
			echo "<p class='error' align='center'>" . $_SESSION['gagal_login'] . "</p>";
		} ?>
		<form class="form2" action="" method="POST">
			<input class="urldex" type="text" name="urldex" align="center" placeholder="Input URL">
			<button class="sub" type="text" name="sub" align="center">Submit</button>
			<input type="file" name="file" id="file" class="urldex">
			<button class="sub" type="text" name="sub" align="center">Submit</button>
		</form>
	</div>



</body>

</html>