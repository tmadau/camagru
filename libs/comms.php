<?php

    session_start();
    include_once('mail.php');
    include_once('sanitize.php');
    include_once('../classes/functionality.php');

    if (isset($_GET['post']) && isset($_SESSION['username'])) {

        $cmts = new control();

        try {
            $postid = sanitize($_GET['post']);
            $username = sanitize($_SESSION['username']);
            $commented = substr(trim(sanitize($_POST['commented'])), 0, 255);

            if ($postid == '') {
                header("Location: ../index.php?");
                exit();
            }

            $insert = $cmts->insert_cmt($username, $commented, $postid);
            $row = $cmts->cmt_num($postid);

            $newcomments = $row['comments'] + 1;
            $postusername = $row['username'];

            $cmtd = $cmts->add_cmt($newcomments, $postid);
            $notifs = $cmts->notify_cmt($postusername);

            $email = $notifs['email'];
            if ($notifs['notifs'] != 'NO') {
                notify($email, $postid, $username);
            }
            header("Location: ../users/comments.php?post=" . $postid);
            exit();
        }
        catch (PDOException $e) {
            header("Location: ../users/comments.php?post=" . $postid . "&error");
            exit();
        }
    }
    else {
        header("Location: ../login/login.php?");
        exit();
    }

?>
