<?php

    session_start();
    include_once('../classes/manage_users.php');
    include_once('sanitize.php');

    if (isset($_POST['login'])) {

        $login = new manage_users();

        $username = sanitize($_POST['login_username']);
        $password = sanitize($_POST['login_password']);
        $password = hash('whirlpool', $password);

        if (empty($username) || empty($password)) {
            $error = 'All fields are required';
        }
        else {
            $auth_user = $login->login($username, $password);
            if ($auth_user != 0) {
                $row = $login->get_data($username);
                $verified = $row['verified'];
                $email = $row['email'];
                $date = strtotime($date);
                $date = date('M d Y', $date);

                if ($verified == 1) {
                    $_SESSION['username'] = $username;
                    header( 'Location: ../users/home.php' );
                }
                else {
                    $error = "This account has not yet been verified. An email was sent to $email on $date";
                }
            }
            else {
                $error = 'Invalid credentails';
            }
        }
    }

?>
