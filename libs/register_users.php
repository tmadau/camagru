<?php

    session_start();
    
    include_once('../classes/manage_users.php');
    include_once('sanitize.php');
    include_once('mail.php');

    if (isset($_POST['register'])) {

        $users = new manage_users();

        $username   = sanitize($_POST['username']);
        $email      = sanitize($_POST['email']);
        $password   = sanitize($_POST['password']);
        $repassword = sanitize($_POST['repassword']);
        $date       = date("Y-m-s H:i");

        $err_user   = $users->username_err($username);
        $err_mail   = $users->email_err($email);

        if ($err_user > 0) {
            $error = 'Username already exists. Please try a different one';
        }
        elseif ($err_mail > 0) {
            $error = 'Email already in use. Please try a different one';
        }
        else if (empty($username) || empty($email) || empty($_POST['password']) || empty($_POST['repassword'])) {
            $error = 'All fields are required';
        }
        else if ($password !== $repassword) {
            $error = 'Passwords do not match, please try again';
        }
        else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = 'Email you entered is not valid';
        }
        else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $_POST['password'])) {
            $error = 'Password must be at least 8 characters long, contain at least one uppercase, <br />
            one lowercase letter and contain a number and can contain specail characters if you feel the need to put them in...';
        }
        else if (!preg_match("/^[a-zA-Z_0-9]*$/", $username)) {
            $error = 'Usersnames characters are a-z A-Z 0-9 and underscore _.';
        }
        else if (strlen($username) > 50) {
            $error = 'You cannot exceed 50 characters on your username, please try again';
        }
        else if (strlen($username) < 5) {
            $error = 'Your username cannot be less than 5 characters';
        }
        else {
            $ver_code = md5(time().$username);
            
            $password = hash('whirlpool', $password);

            $insert = $users->register($username, $email, $password, $ver_code);
            if ($insert == 1) {
                //SEND MAIL
                $addr = $email;
                email_ver($addr, $ver_code, $username);
                header( 'Location: ../notifs/sent.php' );
            }
            else {
                $error = "User alread exists";
            }
        }
    }

?>
