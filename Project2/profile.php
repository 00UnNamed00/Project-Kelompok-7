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
    <div class="mainprofil">
        <p class="sign" align="center">My Profile</p>
        <img class="profil"></img>
        <form class="form1" action="" method="POST">
            <div class="tulisan"> <label>Username</label></div>
            <p class="un" type="text" name="username" align="center" placeholder="Username" required autocomplete="OFF"></p>
            <div class="tulisan"> <label>Email</label></div>
            <p class="un" type="text" name="email" align="center" placeholder="Email" required autocomplete="OFF"></p>
            <div class="tulisan"> <label>Password</label></div>
            <p class="pass" type="text" name="password1" align="center" placeholder="Password" id="password"></p>
            <!--<button class="submit" name="submit" type="submit" align="center">Change My Profile</button>-->
            <center>
                <p><a href="index.php"><ins>Back</ins></a></p>
            </center>
        </form>
    </div>

</body>

</html>