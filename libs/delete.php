<?php

    session_start();

    include_once('../classes/functionality.php');

    if (isset($_SESSION['username'], $_GET['post'], $_GET['user'])) {

        $dlt = new control();

        $postid = $_GET['post'];
        $username = $_GET['user'];

        $result = $dlt->hilight($postid, $username);
        if (isset($result['pic'])) {
            $picture = "../uploads/" . $result['pic'];
            echo $picture . "<br />";
            unlink($picture);

            $pic_dltd = $dlt->delete($postid, $username);
            header("Location: ../users/gallery.php?pic_deleted");
            exit();
        }
        else {
            header("Location: ../users/gallery.php?no_pic");
            exit();
        }
    }
    else {
        echo 'sorry could not delete, something is wrong';
        exit();
    }

?>
