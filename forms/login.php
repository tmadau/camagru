<?php
    include_once( '../libs/login_users.php' );
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
                    <form method="post" action="login.php">
                        <h2 style="text-align: center; font-family: fantasy;">Login</h2>
                        <?php
                            if (isset($error)) { echo ' <div class="alert"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$error.'</strong></div> '; }
                        ?>
                        <br />
                        <div class="form_elements">
                            <label for="Username">Username</label>
                            <input type="text" placeholder="Username" name="login_username" id="username" />
                        </div>
                        <br />
                        <div class="form_elements">
                            <label for="Username">Password</label>
                            <input type="password" placeholder="Password" name="login_password" id="password" />
                        </div>
                        <br />
                        <div class="form_elements">
                            <input type="submit" name="login" id="login" class="btn btn-success" value="login" />
                        </div>
                        <br /><br /><br />
                        <p> Don't have an account ?<a href="sign_up.php"> Sign up</a></p>
                        <center><a href="forgotten_pass.php">Forgot password?</p></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
