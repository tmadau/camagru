<?php

    include_once('../classes/functionality.php');

    $pages = new control();

    $row = $pages->paged();

    $postnumber = 5;
    $totalposts = sizeof($row);

    if (isset($_GET['page'])) {

        if ($_GET['page'] < 0)
            $page = 0;
        else {
            $page = 0;
            if ($page * $postnumber > $totalposts)
                $page = ($_GET['page'] - 1);
            else
                $page = $_GET['page'];
        }
    }
    else
        $page = 0;

    $begin = $page * $postnumber;

    for ($webpage = $begin; ($webpage < ($begin + 5)) && ($webpage < $totalposts); $webpage++) {
        echo '
        <div class="postflexbox">
                <img src="../uploads/' . $row[$webpage]['pic'] . '">
                <div class="postoptionsflexbox">
                    <options><flextext>' . $row[$webpage]['username'] . ' </flextext></options><br />
                    <options><flextext>' . $row[$webpage]['likes'] . ' <a class=picbtn href="../libs/likeinfo.php?post=' . $row[$webpage]['id'] . '&like ">Likes</a></options>
                    <options><flextext>' . $row[$webpage]['comments'] . ' <a class=picbtn href="../users/comments.php?post=' . $row[$webpage]['id'] . '">Comments</a></flextext></options><br /><br />
                </div>
        </div>';    
    }

    echo '<br />
        <div class="postoptionsflexbox">
            <options><flextext><a class=picbtn href=home.php?page=0>First</a></flextext></options>
            <options><flextext><a class=picbtn href=home.php?page=' . ($page - 1) . '>Back</a></flextext></options>
            <options><flextext>' . $page . '</flextext></options>
            <options><flextext><a class=picbtn href=home.php?page=' . ($page + 1) . '>next</a></flextext></options>
        </div><br />';

?>
