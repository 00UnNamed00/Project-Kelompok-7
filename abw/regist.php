<?php 
include 'function.php';

if (isset($_POST["submit"]) ) {
	if (regist($_POST) > 0) {
		echo "
		<script>
		alert('Registrasi Anda Berhasil');
		document.location.href = 'login.php';
		</script>
		";
	}else {
		echo "
		<script>
		alert('Registrasi Anda Gagal');
		document.location.href = 'regist.php';
		</script>
		";
	}
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
	<title>Registrasi</title>
</head>

<body>
	<img src="logo.svg" alt="">
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
	<div class="main">
		<p class="sign" align="center">Sign Up</p>
		<form class="form1" action="" method="POST">
			<input class="un" type="text" name="username" align="center" placeholder="Username" required autocomplete="OFF">
			<input class="un" type="text" name="email" align="center" placeholder="Email" required autocomplete="OFF">
			<input class="pass" type="password" name="password1" align="center" placeholder="Password" id="password">
			<input class="pass" type="password" name="password2" align="center" placeholder="Confirm Password" id="confirmpassword"><br>
			<label class="show"> Show Password
			<input type="checkbox" name="checked" id="checkbox">
				<span class="checkmark"></span>
			</label>
			<button class="submit" name="submit" type="submit" align="center">Sign In</button>
			<center><p><a href="login.php">Have an account? <ins>Click here</ins></a></p></center>
		</form>
	</div>

</body>
</html>
