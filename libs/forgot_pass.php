<?php

    session_start();
    include_once('../classes/functionality.php');
    include_once('sanitize.php');
    include_once('mail.php');

    if (isset($_POST['send'])) {

        $reset = new control();

        $email = sanitize($_POST['email']);
        $row = $reset->forgotmail($email);
        $username = $row['username'];

        if (empty($email)) {
            $error = 'Please fill in your email address';
        }
        else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = 'Email you entered is not valid';
        }
        else if ($row['email'] != $email) {
            $error = 'The email you entered is not registered to this site, pleas fill in the correct email';
        }
        else {
            $ver_code = md5(time().$username);
            $ver = $reset->ver_update($ver_code, $email);
            forgot_mail($email, $username);
            $success = 'Please check your email to reset your password';
        }
    }

    if (isset($_POST['sent'])) {

        $reset = new control();

        $username = sanitize($_POST['username']);
        $email = sanitize($_POST['email']);
        $ver_code = $_POST['verification'];
        //$row = $reset->filled($email);

        $password = sanitize($_POST['password']);
        $repass = sanitize($_POST['repass']);

        if (empty($password) || empty($repass)) {
            $error = 'All fields are required';
        }
        else if ($password != $repass) {
            $error = 'Your passwords do not match, please try again';
        }
        else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $_POST['password'])) {
            $error = 'Password must be at least 8 characters long, contain at least one uppercase, <br />
            one lowercase letter and contain a number and can contain specail characters if you feel the need to put them in...';
        }
        else {
            $row = $reset->slct_user($ver_code, $username);
            if ($row['username']) {
                $newpass = hash('whirlpool', $_POST['password']);
                if ($row['password'] == $newpass) {
                    $error = 'Did you really forget your password? Just log in cause it seems like you did not forget it';            
                }
                else {
                    $update = $reset->reseted($newpass, $username);
                    $success = 'Password has been resetted successfully, you can log in with your new password';
                }
            }
            else {
                $error = 'Not a valid user';
            }
        }
    }

?>