<?php

    include_once('../classes/functionality.php');

    $posting = new control();

    $user = $_SESSION['username'];

    $row = $posting->post($user);

    $allposts = sizeof($row);
    for ($webpage = 0; $webpage < $allposts; $webpage++) {
        echo '
        <a href="../users/comments.php?post=' . $row[$webpage]['id'] . '">
            <img src="../uploads/' . $row[$webpage]['pic'] . '" width=60 height=60>
        </a>';
    }

?>
