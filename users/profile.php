<?php

    include_once('../libs/login_users.php');
    include_once('../libs/change.php');

    if (!isset($_SESSION['username'])) {
        header("Location: ../forms/login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/home.css" />
        <title>&copy; Profile</title>
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
        <div class="pfl">
            <form action="profile.php" method="POST">
                <hr/>
                <h3>Change Username</h3>
                <table class=table>
                    <?php
                        if (isset($error1)) { echo ' <div class="alert"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$error1.'</strong></div> '; }
                    ?>
                    <div class="form_elements">
                        <label for="Username">New Username</label>
                        <input type="text" placeholder="Enter New Username" name="newusername" id="email" required />
                    </div>
                    <div class="form_elements">
                        <label for="Username">Password</label>
                        <input type="password" placeholder="Enter Your Password" name="password" id="password" required />
                    </div>
                    <div class="form_elements">
                        <input type="submit" name="submit" id="login" class="btn btn-success" value="change" />
                    </div>
                </table>
            </form>
            <form action="profile.php" method="POST">
                <hr/>
                <h3>Change Password</h3>
                <table class=table>
                    <?php
                        if (isset($error)) { echo ' <div class="alert"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$error.'</strong></div> '; }
                        elseif (isset($passed)) { echo ' <div class="success"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$passed.'</strong></div> '; }
                    ?>
                    <div class="form_elements">
                        <label for="Username">Current Password</label>
                        <input type="password" placeholder="Enter Current Password" name="password" id="password" required />
                    </div>
                    <div class="form_elements">
                        <label for="Username">New Password</label>
                        <input type="password" placeholder="Enter New Password" name="newpass" id="newpass" required />
                    </div>
                    <div class="form_elements">
                        <label for="Username">Repeat Password</label>
                        <input type="password" placeholder="Enter New Password Again" name="repass" id="repass" required />
                    </div>
                    <div class="form_elements">
                        <input type="submit" name="submit" id="login" class="btn btn-success" value="change" />
                    </div>
                </table>
            </form>
            <form action="profile.php" method="POST">
                <hr/>
                <h3>Change Email</h3>
                <table class=table>
                    <?php
                        if (isset($error2)) { echo ' <div class="alert"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$error2.'</strong></div> '; }
                        elseif (isset($passed1)) { echo ' <div class="success"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$passed1.'</strong></div> '; }
                    ?>
                    <div class="form_elements">
                        <label for="Username">New Email</label>
                        <input type="text" placeholder="Enter New Email" name="newemail" id="password" required />
                    </div>
                    <div class="form_elements">
                        <label for="Username">Password</label>
                        <input type="password" placeholder="Enter Your Password" name="password" id="password" required />
                    </div>
                    <div class="form_elements">
                        <input type="submit" name="submit" id="login" class="btn btn-success" value="change" />
                    </div>
                </table>
            </form>
            <form action="profile.php?" method="POST">
                <hr/>
                <table class=table>
                    <?php
                        if (isset($passed2)) { echo ' <div class="success"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$passed1.'</strong></div> '; }
                    ?>
                    <h3>Change Email Notifications</h3>
                    <tr>
                        <td>Notifications :</td>
                        <td>
                            <?php
                                include_once('../libs/status.php');
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <center><td><button class="picbtn" type="submit" name="update">change</button></td><center>
                    </tr>
                </table>
            </form>
        </div>
    </center>
    <br />
    <div class="footer">
        <center><p class="ter">all rights reserved Camagru &copy; in property of tmadau</p></center>
    </div>
</body>
</html>
