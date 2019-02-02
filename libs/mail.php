<?php

    function email_ver($addr, $ver_code, $username) {
        $subject = "Email Verification";
        $msg =  "
                    <center>
                        <a href='#' target='' style='text-decoration: none;'>
                            <img src='http://www.iconarchive.com/download/i83638/pelfusion/long-shadow-media/Camera.ico' alt='logo' height='7%' width='7%' />
                            <p style='line-height: 0.1cm; font-family: fantasy; font-size: 2vw;'>Camagru</p>
                        </a>
                        <p style='line-height: 0.4cm;'>
                            Welcome $username<br /><br />
                            The world is in a picture frenzy nowadays, and we saw the need as well as the <br />
                            desire that people have for taking pictures. We hope you enjoy using our website. <br />
                            Please verify your email by clicking the link below <br />
                            to begin your picture taking journey with our website. <br />
                            If you did not sign up please ignore this email.
                        </p>
                        <br />
                        <a style='background-color: #4CAF50; color: white; text-align: center; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 50%; opacity: 0.9; font-size: 1vw; text-decoration: none;' href='http://localhost:8080/cam/libs/verify.php?ver_code=$ver_code'>Register Account</a>
                    </center>
                ";
        $headers = "From: CamagruDoNotReply.com \r\n";
        $headers .= "Content-type:text/html;charset=UFT-8" . "\r\n"; //FOR GMAIL ACCOUNTS
        mail($addr, $subject, $msg, $headers);
    }

    function notify($email, $postid, $username) {
        $subject = "Comments";
        $msg =  "
                    <center>
                        <a href='#' target='' style='text-decoration: none;'>
                            <img src='http://www.iconarchive.com/download/i83638/pelfusion/long-shadow-media/Camera.ico' alt='logo' height='7%' width='7%' />
                            <p style='line-height: 0.1cm; font-family: fantasy; font-size: 2vw;'>Camagru</p>
                        </a>
                        <p style='line-height: 0.4cm;'>
                            Hello $username<br /><br />
                            One of your post just recieved a comment <br />
                            Just click the link below to review it. <br />
                        </p>
                        <br />
                        <a style='background-color: #4CAF50; color: white; text-align: center; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 50%; opacity: 0.9; font-size: 1vw; text-decoration: none;' href='http://localhost:8080/cam/users/comments.php?post=$postid'>view comment</a>
                    </center>
                ";
        $headers = "From: CamagruDoNotReply.com \r\n";
        //$headers .= "Content-type:text/html;charset=UFT-8" . "\r\n"; //FOR GMAIL ACCOUNTS
        mail($email, $subject, $msg, $headers);
    }

    function forgot_mail($email, $username) {
        $ver_code = md5(time().$username);
        $subject = "Forgot Password Verification";
        $msg =  "
                    <center>
                        <a href='#' target='' style='text-decoration: none;'>
                            <img src='http://www.iconarchive.com/download/i83638/pelfusion/long-shadow-media/Camera.ico' alt='logo' height='7%' width='7%' />
                            <p style='line-height: 0.1cm; font-family: fantasy; font-size: 2vw;'>Camagru</p>
                        </a>
                        <p style='line-height: 0.4cm;'>
                            Hello $username<br /><br />
                            A password reset was requested for your account, <br />
                            if this was not you just ignore this email, otherwise to change or reset your password <br />
                            just click the link below. It's that simple.... <br />
                        </p>
                        <br />
                        <a style='background-color: #4CAF50; color: white; text-align: center; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 50%; opacity: 0.9; font-size: 1vw; text-decoration: none;' href='http://localhost:8080/cam/forms/forgot.php?ver_code=$ver_code&username=$username'>Reset Password</a>
                    </center>
                ";
        $headers = "From: CamagruDoNotReply.com \r\n";
        //$headers .= "Content-type:text/html;charset=UFT-8" . "\r\n"; //FOR GMAIL ACCOUNTS
        mail($email, $subject, $msg, $headers);
    }

?>
