<?php

    session_start();
    include_once('sanitize.php');
    include_once('../classes/functionality.php');

    if (isset($_GET['post']) && isset($_SESSION['username'])){

        $likes = new control();

        $postid = sanitize($_GET['post']);
        $username = sanitize($_SESSION['username']);

        $row = $likes->liked($postid);

        $add_like = $likes->liking($postid, $username);

        if ($add_like > 0) {
            $newlikes = $row['likes'] - 1;
            if ($newlikes < 0) {
                $newlikes = 0;
            }
            $dlt_lk = $likes->dlt_lks($postid, $username);
        }
        else {
            $newlikes = $row['likes'] + 1;
            $ins = $likes->ins_lks($postid, $username);
        }

        $updte = $likes->update_lks($newlikes, $postid);
        header("Location: ../users/comments.php?post=" . $postid);
        exit();
    }

?>
