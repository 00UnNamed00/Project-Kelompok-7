<?php 
$koneksi = mysqli_connect('localhost','root','','db_abw');

function regist($data) {
	global $koneksi;

	$username = htmlspecialchars($_POST["username"]);
	$email = htmlspecialchars($_POST["email"]);
	$password1 = mysqli_real_escape_string($koneksi, $_POST["password1"]);
	$password2 = mysqli_real_escape_string($koneksi, $_POST["password2"]);

// mengecek username sudah ada atau belum
	$data = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$username' ");
	if (mysqli_num_rows($data) > 0) {
		echo "<script>
		alert('Username Telah Digunakan !');
		</script>";
		return false;
	}
	
// mengecek email sudah ada atau belum
	$data = mysqli_query($koneksi, "SELECT email FROM tb_user WHERE email = '$email' ");
	if (mysqli_num_rows($data) > 0) {
		echo "<script>
		alert('Email Telah Digunakan !');
		</script>";
		return false;
	}

// mengecek konfirmasi password
	if ($password1 !== $password2) {
		echo "<script>
		alert('Konfirmasi Password Tidak Sesuai !');
		</script>";
		return false;
	}

//enskripsi password
	$password = md5($password1);
	mysqli_query($koneksi, "INSERT INTO tb_user VALUES('', '$username', '$email','$password') ");

	return mysqli_affected_rows($koneksi);

}

?>
