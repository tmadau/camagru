<?php

    session_start();
    
    include_once('../classes/manage_users.php');
    include_once('sanitize.php');

    if (isset($_GET['ver_code'])) {

        $users = new manage_users();

        $ver_code = sanitize($_GET['ver_code']);

        $validate = $users->verify($ver_code);

        if ($validate == 1) {
            $valid = $users->update($ver_code);
            if ($valid) {
                header( 'Location: ../notifs/success.php' );
            }
            else {
                header( 'Location: ../notifs/err_mail.php' );
            }
        }
        else {
            header( 'Location: ../notifs/error.php' );
        }
    }
    else {
        header( 'Location: ../notifs/error_log.php' );
    }

?>
