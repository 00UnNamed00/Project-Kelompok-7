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
	<title>Regist</title>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>
	<h3>Register</h3>
	<?php if(isset($_SESSION['gagal_login'])) {
		echo "<p>".$_SESSION['gagal_login']."</p>";
	} ?>

	<form action="" method="POST">
		<input type="text" name="username" placeholder="Nama lengkap" autocomplete="OFF" autofocus required><br>
		<input type="text" name="email" placeholder="Email" autocomplete="OFF" required><br>
		<input type="password" name="password1" placeholder="Password" id="password" autocomplete="OFF" required><br>
		<!-- <input type="checkbox" name="checkbox" id="checkbox">Show Password<br> -->
		<input type="password" name="password2" placeholder="Verifikasi Password" autocomplete="OFF" required ><br>
		<input type="checkbox" id="checkbox">Show Password<br>


		<button type="submit" name="submit">Daftar</button><br>
		<p><a href="login.php">Sudah punya akun? Klik Disini</a></p>
	</form>
</body>
</html>
