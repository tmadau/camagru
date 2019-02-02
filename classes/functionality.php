<?php

    include_once( '../config/database.php' );

    class control {
        public $link;

        //CONSTRUCT FUNCTION TO CONNECT TO THE DATABASE
        function __construct() {
            try {
                $db_connection = new database();
                $this->link = $db_connection->connect();
                return $this->link;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function reseted($newpass, $username) {
            try {
                $query = $this->link->prepare(" UPDATE users SET `password` = ? WHERE username = ? ");
                $values = array($newpass, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //forgot password
        function filled($email) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE email = ? ");
                $values = array($email);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function reset($newpass, $username) {
            try {
                $query = $this->link->prepare(" UPDATE users SET password = ? WHERE username = ? ");
                $values = array($newpass, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function forgotmail($email) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE email = ? ");
                $values = array($email);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function updated_pass($password) {
            try {
                $query = $this->link->prepare(" UPDATE users SET `password` = $password ");
                $values = array($password);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //home page functions for website functionality
        function paged() {
            try {
                $query = $this->link->prepare(" SELECT * FROM posts ORDER BY id DESC ");
                $values = array();
                $query->execute($values);
                $counts = $query->fetchAll();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //post page functions for website functionality
        function post($user) {
            try {
                $query = $this->link->prepare(" SELECT * FROM posts WHERE username = ? ORDER BY id DESC ");
                $values = array($user);
                $query->execute($values);
                $count = $query->fetchAll();
                return $count;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //gallery page functions for website functionality
        function page($user) {
            try {
                $query = $this->link->prepare(" SELECT * FROM posts WHERE username = ? ORDER BY id DESC ");
                $values = array($user);
                $query->execute($values);
                $counts = $query->fetchAll();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //upload images function form the webpage
        function save($username, $image_storage_name) {
            try {
                $query = $this->link->prepare(" INSERT INTO posts(username, pic) VALUES (?, ?) ");
                $values = array($username, $image_storage_name);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //delete pics from the gallery page functions
        function hilight($postid, $username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM posts WHERE id = ? AND username = ? ORDER BY id DESC ");
                $values = array($postid, $username);
                $query->execute($values);
                $count = $query->fetch();
                return $count;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function delete($postid, $username) {
            try {
                $query = $this->link->prepare(" DELETE FROM posts WHERE id = ? AND username = ? ");
                $values = array($postid, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //comments function to add and display comments on the webpage
        function insert_cmt($username, $commented, $postid) {
            try {
                $query = $this->link->prepare(" INSERT INTO comments(username, commented, postid) VALUES (?, ?, ?) ");
                $values = array($username, $commented, $postid);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function cmt_num($postid) {
            try {
                $query = $this->link->prepare(" SELECT * FROM posts WHERE id = ? ");
                $values = array($postid);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function add_cmt($newcomments, $postid) {
            try {
                $query = $this->link->prepare(" UPDATE posts SET comments = ? WHERE id = ? ");
                $values = array($newcomments, $postid);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function notify_cmt($postusername) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? ");
                $values = array($postusername);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function count($post) {
            try {
                $query = $this->link->prepare(" SELECT * FROM posts WHERE id = ? ");
                $values = array($post);
                $query->execute($values);
                $count = $query->fetch();
                return $count;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function count_cmt($post) {
            try {
                $query = $this->link->prepare(" SELECT * FROM comments WHERE postid = ? ");
                $values = array($post);
                $query->execute($values);
                while ($com = $query->fetch()) {
                    echo '<div class="dialogbox">
					        <div class="body">
					            <span class="tip tip-left"></span>
					            <div class="message">
						            <span style="float: left;">
                                        ' . $com['username'] . ': ' . $com['commented'] . '
                                    </span>
                                </div>
                            </div>
                        </div>';
                }
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //add likes to the pics in the website functions
        function liked($postid) {
            try {
                $query = $this->link->prepare(" SELECT * FROM posts WHERE id = ? AND username = ? ORDER BY id DESC ");
                $values = array($postid);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function liking($postid, $username) {
            try {
                $query = $this->link->prepare(" SELECT COUNT(*) FROM likes WHERE postid = ? AND username = ? ");
                $values = array($postid, $username);
                $query->execute($values);
                $counts = $query->fetchcolumn();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function dlt_lks($postid, $username) {
            try {
                $query = $this->link->prepare(" DELETE FROM likes WHERE postid = ? AND username = ? ");
                $values = array($postid, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function ins_lks($postid, $username) {
            try {
                $query = $this->link->prepare(" INSERT INTO likes(postid, username) VALUES(?, ?) ");
                $values = array($postid, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update_lks($newlikes, $postid) {
            try {
                $query = $this->link->prepare(" UPDATE posts SET likes = ? WHERE id = ? ");
                $values = array($newlikes, $postid);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        //user profile the website methods
        function notification($username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? ");
                $values = array($username);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update_pass($newpass, $username) {
            try {
                $query = $this->link->prepare(" UPDATE users SET password = ? WHERE username = ? ");
                $values = array($newpass, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function set($username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? ");
                $values = array($username);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update_user($newusername, $username) {
            try {
                $query = $this->link->prepare(" UPDATE users SET username = ? WHERE username = ? ");
                $values = array($newusername, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update_post($newusername, $username) {
            try {
                $query = $this->link->prepare(" UPDATE posts SET username = ? WHERE username = ? ");
                $values = array($newusername, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update_like($newusername, $username) {
            try {
                $query = $this->link->prepare(" UPDATE likes SET username = ? WHERE username = ? ");
                $values = array($newusername, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update_comm($newusername, $username) {
            try {
                $query = $this->link->prepare(" UPDATE comments SET username = ? WHERE username = ? ");
                $values = array($newusername, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function errno($newusername) {
            try {
                $query = $this->link->prepare(" UPDATE COUNT(*) username FROM users WHERE username = ? ");
                $values = array($newusername);
                $query->execute($values);
                $counts = $query->fetchColumn();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function check($username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? ");
                $values = array($username);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function mail_user($username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? ");
                $values = array($username);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function new_mail($newemail) {
            try {
                $query = $this->link->prepare(" SELECT COUNT(*) email FROM users WHERE email = ? ");
                $values = array($newemail);
                $query->execute($values);
                $counts = $query->fetchColumn();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function com_updated($mode, $username) {
            try {
                $query = $this->link->prepare(" UPDATE users SET notifs = ? WHERE username = ? ");
                $values = array($mode, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update_email($email, $username) {
            try {
                $query = $this->link->prepare(" UPDATE users SET email = ? WHERE username = ? ");
                $values = array($email, $username);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function ver_update($ver_code, $email) {
            try {
                $query = $this->link->prepare(" UPDATE users SET ver_code = ? WHERE email = ? ");
                $values = array($ver_code, $email);
                $query->execute($values);
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function slct_user($ver_code, $username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE ver_code = ? AND username = ? ");
                $values = array($ver_code, $username);
                $query->execute($values);
                $counts = $query->fetch();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }