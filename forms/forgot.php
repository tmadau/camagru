<?php
    session_start();
    include('../libs/login_users.php');
    include_once( '../libs/forgot_pass.php' );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/forms.css" />
    <style>
        a {
            color: royalblue;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="bg"></div>
    <br /><br /><br />
    <div class="bg-text">
        <div id="content">
            <div class="login_form">
                <div id="form">
                    <form method="post" action="forgot.php">
                        <h2 style="text-align: center; font-family: fantasy;">Forgot password</h2>
                        <?php
                            if (isset($error)) { echo ' <div class="alert"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$error.'</strong></div> '; }
                            else if (isset($success)) { echo ' <div class="success"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$success.'</strong></div> '; }
                        ?>
                        <br />
                        <div class="form_elements">
                            <input type="text" placeholder="Enter a new Password" name="verification" id="verification" hidden value="<?php echo $_GET['ver_code']; ?>" />
                            <input type="text" placeholder="Enter a new Password" name="username" id="username" hidden value="<?php echo $_GET['username']; ?>" />
                        </div>
                        <br />
                        <div class="form_elements">
                            <label for="Username">Password</label>
                            <input type="password" placeholder="Enter a new Password" name="password" id="password" />
                        </div>
                        <br />
                        <div class="form_elements">
                            <label for="Username">Repeat Password</label>
                            <input type="password" placeholder="Repeat the new Password again" name="repass" id="repass" />
                        </div>
                        <br />
                        <div class="form_elements">
                            <input type="submit" name="sent" id="sent" value="send" />
                        </div>
                        <br /><br />
                        <p> Remember your password just <a href="login.php"> Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
