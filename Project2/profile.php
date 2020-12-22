<?php 
session_start();
include('function.php');
$email = $_SESSION['email'];
$result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$email' ");
$result2 = mysqli_fetch_assoc($result);
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
    <title>My Profile</title>
</head>

<body>
    <img class="logo" src="logo.svg" alt="" style="margin-top:-5px">
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
    <div class="mainprofil">
        <p class="sign" align="center">My Profile</p>
        <?php echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail profil" />';?>
        <?php if(isset($_SESSION['gagal_login'])) {
			echo "<p class='error' align='center'>".$_SESSION['gagal_login']."</p>";
		} ?>
        <form class="form3" action="" method="POST">
            <div class="tulisan"> <label>Username</label></div>
            <input class="un" type="text" name="username" align="center" placeholder="Username" value="<?php echo $result2['username']; ?>">
            <div class="tulisan"> <label>Email</label></div>
            <input class="un" type="text" name="email" align="center" placeholder="Email" value="<?php echo $result2['email']; ?>">
            <div class="tulisan"> <label>Password</label></div>
            <input class="pass" type="password" name="password1" align="center" placeholder="Password" id="password" value="<?php echo $result2['password']; ?>">
            <label class="show"> Show Password
			<input type="checkbox" name="checked" id="checkbox">
				<span class="checkmark"></span>
			</label>
            <button class="submit" name="submit" type="submit" align="center">CONFIRM</button>
            <center>
                <p><a href="index.php"><ins>Back</ins></a></p>
            </center>
        </form>
    </div>

</body>

</html>