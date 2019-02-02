<?php
    include('../libs/login_users.php');

    if (!isset($_SESSION['username'])) {
        header("Location: ../forms/login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/home.css" />
        <title>&copy; Post</title>
    </head>
    <body>
        <div class="topnav">
            <a class="bar" href="home.php">Home</a>
            <a class="bar" href="post.php" target="">Post</a>
            <a class="bar" href="gallery.php" target="">Gallery</a>
            <a class="bar" href="profile.php"><?php echo $_SESSION['username'];?></a>
            <a style="font-size: 1.5vw; float: right; font-size: 1.5vw;" href="../forms/logout.php" target="">Log Out</a>
        </div>
        <br />
        <a href="home.php" target="" style="text-decoration: none;">
            <center><img src="http://www.iconarchive.com/download/i83638/pelfusion/long-shadow-media/Camera.ico" alt="logo" height="3%" width="3%" /></center>
            <p class="logo">Camagru</p>
        </a>
        <br />
        <center>
            <div class="mainbox">
                <div class="subbox" style="flex-direction: column;">
                    <div class="camtopflexbox">
                        <nvcam id=nvcam>
                            <nvli><a class="picbtn" id=webcam>webcam</a></nvli>
                            <nvli><a class="picbtn" id=picupload>upload</a></nvli>
                        </nvcam>
                    </div>
                    <br />
                    <div class="cammidflexbox">
                        <form action=uploadpic.php id=submitform method=POST enctype=multipart/form-data>
                            <div id="picmethod">
                                <video id="video" name=file>
                                    There was an error in getting the camera feed.<br>
                                </video>
                            </div>
                            <br />
                            <div class="separationflexbox">
                                <div class="stickerflexbox" style="align-items: flex-start">
                                    <table>
                                        <tr>
                                            <td>
                                                <select name="sticker0" form=submitform>
                                                    <option value="none">pick a frame</option>
                                                    <option value="../Resources/frame1.png">frame1</option>
                                                    <option value="../Resources/frame2.png">frame2</option>
                                                    <option value="../Resources/frame3.png">frame3</option>
                                                    <option value="../Resources/frame4.png">frame4</option>
                                                    <option value="../Resources/frame5.png">frame5</option>
                                                    <option value="../Resources/frame6.png">frame6</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="sticker1" form=submitform>
                                                    <option value="none">pick a sticker</option>
                                                    <option value="../Resources/fingers.png">fingers</option>
                                                    <option value="../Resources/idea.png">idea</option>
                                                    <option value="../Resources/wow.png">wow</option>
                                                    <option value="../Resources/hello.png">hello</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="cambotflexbox">
                                <button class="picbtn" id="camshot">capture</button>
                                <button class="picbtn" id="submit" type=submit name="submit">save</button>
                            </div>
                            <br />
                            <div class="campicflexbox">
                                <input type=text name=webcampic id=base64imglink value="empty" style="display:none;">
                                <canvas id="canvas"></canvas>
                            </div>
                            <div class="thumbnailflexbox">
                                <?php
                                    include_once('../libs/posted.php');
                                ?>
                            </div>
                            <script src="../js/photo.js"></script>
                        </form>
                    </div>
                </div>   
            </div>
        </center>
        <div class="footer">
            <center><p class="ter">all rights reserved Camagru &copy; in property of tmadau</p></center>
        </div>
    </body>
</html>
