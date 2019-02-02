<?php

    //session_start();
    include_once('sanitize.php');
    include_once('../classes/functionality.php');

    //Change password on profile page
    if (isset($_POST['newpass'])) {

        $info = new control();

        $username = sanitize($_SESSION['username']);
        $row = $info->check($username);

        $password = hash('whirlpool', $_POST['password']);
        $newpass = hash('whirlpool', $_POST['newpass']);
        $repass = hash('whirlpool', $_POST['repass']);
        
        if ($password != $row['password']) {
            $error = 'Please fill in your password, not a different one';
        }
        else if ($newpass == $password) {
            $error = 'Why you putting in the same password, you might as well not change';
        }
        else if ($newpass != $repass) {
            $error = 'Passwords do not match, please try again';
        }
        else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $_POST['newpass'])) {
            $error = 'Password must be at least 8 characters long, contain at least one uppercase, <br />
            one lowercase letter and contain a number and can contain specail characters if you feel the need to put them in...';
        }
        else {
            $success = $info->update_pass($newpass, $username);
            $passed = 'Your password has been successfully changed, do not forget it. <br />if you do you can always reset...';
        }
    }

    //change username on profile page
    else if (isset($_POST['newusername'])) {

        $info = new control();

        $username = sanitize($_SESSION['username']);
        $newusername = sanitize($_POST['newusername']);
        $pass = hash('whirlpool', $_POST['password']);

        $row = $info->set($username);

        if ($pass != $row['password']) {
            $error1 = 'Please fill in your password, not a different one';
        }
        else if (!preg_match("/^[a-zA-Z_0-9]*$/", $newusername)) {
            $error1 = 'Usersnames characters are a-z A-Z 0-9 and underscore _.';
        }
        else if ($newusername == 'Admin' || $newusername == 'admin') {
            $error1 = 'Username cannot be Admin or admin';
        }
        else if ($newusername == $username) {
            $error1 = 'Username already exists, please try a different one';
        }
        else {
            $errs = $info->errno($newusername);

            if ($errs > 0) {
                $error1 = 'Username already exists. Please try a different one';
            }
            $userSet = $info->update_user($newusername, $username);
            $postSet = $info->update_post($newusername, $username);
            $likeSet = $info->update_like($newusername, $username);
            $commSet = $info->update_comm($newusername, $username);
            require_once('../forms/logout.php');
            header('Location: ../forms/login.php?success');
        }
    }

    //change email on profile page
    else if (isset($_POST['submit'])) {

        $info = new control();

        $username = $_SESSION['username'];
        $newemail = $_POST['newemail'];
        $password = hash('whirlpool', $_POST['password']);
        
        $row = $info->mail_user($username);

        if ($password != $row['password']) {
            $error2 = 'Please fill in your password, not a different one';
        }
        else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/", $_POST['password'])) {
            $error2 = 'Password must be at least 8 characters long, contain at least one uppercase, <br />
            one lowercase letter and contain a number and can contain specail characters if you feel the need to put them in...';
        }
        else if (!filter_var($newemail, FILTER_VALIDATE_EMAIL)) {
            $error2 = 'Email you entered is not valid';
        }
        else {
            $res = $info->new_mail($newemail);
            if ($res > 0) {
                $error2 = 'Email already in use. Please try a different one';
            }
            else {
                $change = $info->update_email($newemail, $username);
                $passed1 = 'Your email has been successfully changed';
            }
        }
    }

    else if (isset($_POST['update'])) {
        $info = new control();
        $username = $_SESSION['username'];
        $mode = $_POST['notifs'];
        $update = $info->com_updated($mode, $username);
    }

?>