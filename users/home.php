<?php

    include('../libs/login_users.php');

    if (!isset($_SESSION['username'])) {
        header("Location: ../forms/login.php");
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/home.css" />
        <title>&copy; Home</title>
    </head>
    <body>
        <div class="topnav">
            <a class="bar" href="home.php">Home</a>
            <a class="bar" href="post.php" target="">Post</a>
            <a class="bar" href="gallery.php" target="">Gallery</a>
            <a class="bar" href="profile.php"><?php echo $_SESSION['username'];?></a>
            <a style="font-size: 1.5vw; float: right;" href="../forms/logout.php" target="">Log out</a>
        </div>
        <br />
        <a href="home.php" target="" style="text-decoration: none;">
            <center><img src="http://www.iconarchive.com/download/i83638/pelfusion/long-shadow-media/Camera.ico" alt="logo" height="3%" width="3%" /></center>
            <p class="logo">Camagru</p>
        </a>
        <br />
        <center>
            <div class="columnflexbox">
                <?php
                    include_once('../libs/pagination.php');
                ?>
            </div>
        <center>
        <div class="footer">
            <center><p class="ter">all rights reserved Camagru &copy; in property of tmadau</p></center>
        </div>
    </body>
</html>
