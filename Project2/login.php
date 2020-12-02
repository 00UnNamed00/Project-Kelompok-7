<?php 
session_start();
include('config.php');
/*Client ID : 177727695476-hi7ld41ak5e241cp0r9ed06gh94tkd2r.apps.googleusercontent.com */
/*Client secret : lOVTx9DP39gJckk_igPuS-5f */

$koneksi = mysqli_connect('localhost','root','','db_abw');

$google_button = '';
if(isset($_GET["code"])){
	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
	if(!isset($token['error'])){
		$google_client->setAccessToken($token['access_token']);
		$_SESSION['access_token'] = $token['access_token'];
		$google_service = new Google_Service_Oauth2($google_client);
		$data = $google_service->userinfo->get();

		$_SESSION['status'] = "LOGIN";
		if(!empty($data['given_name'])){
			$_SESSION['user_name'] = $data['given_name'];
		}
		if(!empty($data['email'])){
			$_SESSION['user_email'] = $data['email'];
		}
		if(!empty($data['picture'])){
			$_SESSION['user_image'] = $data['picture'];
		}
	}
}
if(!isset($_SESSION['access_token'])){
	$google_button = '<a href="'.$google_client->createAuthUrl().'"><img src="sign-in-with-google.png" alt=""></a>';
}

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$cek_user = mysqli_query($koneksi,
		"SELECT * FROM tb_user WHERE tb_user.username = '$username' AND tb_user.password = '$password' LIMIT 1");

	$cek = mysqli_num_rows($cek_user);

	if ($cek > 0) {
		$data_user = mysqli_fetch_assoc($cek_user);

		$_SESSION['status'] = "LOGIN";
		$_SESSION['username'] = $username;
		$_SESSION['id_user'] = $data_user['id_user'];
		header('Location: index.php');
		exit();

	} else {
		$_SESSION['gagal_login'] = "Username atau Password Anda Salah";
		header('Location: login.php');
		exit();
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
	<div class="main">
		<p class="sign" align="center">Sign In</p>
		<?php if(isset($_SESSION['gagal_login'])) {
			echo "<p class='error' align='center'>".$_SESSION['gagal_login']."</p>";
		} ?>
		<form class="form1" action="" method="POST">
			<input class="un" type="text" name="username" align="center" placeholder="Username" >
			<input class="pass" type="password" name="password" align="center" placeholder="Password" id="password"><br>
			<label class="show"> Show Password
			<input type="checkbox" name="checked" id="checkbox">
				<span class="checkmark"></span>
			</label>
			<button class="submit" name="submit" type="submit" align="center">Sign In</button>
			<p class="or" align="center">OR</p>
			<?php 
			if($google_button == ''){
				header('Location: index.php');
				exit();
			}
			else{
				echo '<div class="google" align="center">'.$google_button . '</div>';
			}
			?>
			<p class="create" align="center">
				<ins><a href="regist.php">Create Account</a></ins>	
			</p>
		</form>
	</div>

</body>


</html>
