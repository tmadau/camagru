<?php
    include_once( '../libs/register_users.php' );
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
        <div class="register_form">
            <div id="form">
            <form method="post" action="sign_up.php">
                <h2 style="text-align: center; font-family: fantasy;">SignUp</h2>
                <?php
                    if (isset($error)) { echo ' <div class="alert"><span class="closebtn" onclick=this.parentElement.style.display="none";>&times;</span><strong>'.$error.'</strong></div> '; }
                ?>
                <br />
                <div class="form_elements">
                    <label for="Username">Username</label>
                    <input type="text" placeholder="Enter Username" name="username" id="username" />
                </div>
                <br />
                <div class="form_elements">
                    <label for="Username">Email</label>
                    <input type="text" placeholder="Enter Email" name="email" id="email" />
                </div>
                <br />
                <div class="form_elements">
                    <label for="Username">Password</label>
                    <input type="password" placeholder="Enter Password" name="password" id="password" />
                </div>
                <br />
                <div class="form_elements">
                    <label for="Username">Repeat Password</label>
                    <input type="password" placeholder="Repeat Password" name="repassword" id="repassword" />
                </div>
                <br />
                <div class="form_elements">
                    <input type="submit" name="register" id="register" class="btn" value="signup" />
                </div>
            </form>
            <br /><br /><br />
            <p> Already have an account ?<a href="login.php"> Login</a></p>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
