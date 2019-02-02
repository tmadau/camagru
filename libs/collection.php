<?php

    include_once('../classes/functionality.php');

    $gallery = new control();

    $user = $_SESSION['username'];
    $row = $gallery->page($user);
    $postnumber = 5;
    $allposts = sizeof($row);
    
    if (isset($_GET['page'])) {
        if ($_GET['page'] < 0)
            $page = 0;
        else {
            $page = 0;
            if ($page * $postnumber > $allposts)
                $page = ($_GET['page'] - 1);
            else
                $page = $_GET['page'];
        }
    }
    else
    $page = 0;

    $begin = $page * $postnumber;
    for ($webpage = $begin; ($webpage < ($begin + 5)) && ($webpage < $allposts); $webpage++) {
        echo '
        <div>
            <img src="../uploads/' . $row[$webpage]['pic'] . '">
            <div class="postoptionsflexbox">
                <options><flextext>' . $row[$webpage]['username'] . ' </flextext></options><br />
                <options><flextext>' . $row[$webpage]['likes'] . ' <a class=picbtn href="likeinfo.php?post=' . $row[$webpage]['id'] . '&like ">Likes</a></options>
                <options><flextext>' . $row[$webpage]['comments'] . ' <a class=picbtn href="../users/comments.php?post=' . $row[$webpage]['id'] . '">Comments</a></flextext></options><br /><br />
                <options><flextext><a class=picbtn href="../libs/delete.php?post=' . $row[$webpage]['id'] . '&user=' . $row[$webpage]['username'] . '">Delete post</a></flextext></options><br /><br />
            </div>
        </div>';
    }

    echo '<br />
        <div class="postoptionsflexbox">
            <options><flextext><a class=picbtn href=gallery.php?page=0>First</a></flextext></options>
            <options><flextext><a class=picbtn href=gallery.php?page=' . ($page - 1) . '>Back</a></flextext></options>
            <options><flextext>' . $page . '</flextext></options>
            <options><flextext><a class=picbtn href=gallery.php?page=' . ($page + 1) . '>next</a></flextext></options>
        </div><br />';

?>
