<?php

    include_once('../classes/functionality.php');
    include_once('../config/database.php');

    if (isset($_GET['post'])) {

        $selct = new control();
        $coms = new database();

        $post = $_GET['post'];
        $row = $selct->count($post);
        $dbh = $coms->connect();

        echo '
        <div>
            <center>
                <div>
                    <div>
                        <td colspan=2><img src="../uploads/' . $row['pic'] . '" class="postimages" </td>
                    </div>
                    <div>
                        <td>@' . $row['username'] . ' </td>
                    </div>
                    <div>
                        <td>' . $row['likes'] . ' <a class=picbtn href="../libs/likeinfo.php?post=' . $_GET['post'] . '&like ">Likes</a></td>
                        <td>' . $row['comments'] . ' <a class=picbtn href="../users/comments.php?post=' . $row['id'] . ' ">' . ' Comments</a></td><br /><br />
                    </div>
                </div>
            </center>
        </div>
        <div>
            <form action="../libs/comms.php?post=' . $row['id'] . '&comments " method=POST id="commentform" accept-charset="UTF-8">
                    <div>
                        <center>
                            <div class=cmt>
                                <textarea rows="5" style="background-color: #333; color: white; width: 97.5vw; box-sizing: border-box; margin-left: auto; margin-right: auto;" name="commented" form="commentform" required placeholder="Write a comment to '.$row['username'].'\'s post"></textarea>
                            </div>
                            <div>
                               <button class=picbtn style="width: 97.5vw; box-sizing: border-box;" type="submit" name="submit" required>comment</button>
                           </div>
                        </center>
                    </div>
            </form>
        </div>';

        $comts = $selct->count_cmt($post);
    }
    else {
        header("Location : ../index.php");
        exit();
    }

?>
