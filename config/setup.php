<?php

    include_once( 'database.php' );
    
    $create = new database();
    try {
        $dbh = new PDO($create->db_dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE DATABASE IF NOT EXISTS `$create->db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ";
        $dbh->exec($query);
        echo "Database created successfully <br />";
    }
    catch (PDOException $e) {
        echo "Error creating Database: <br />" . $e->getMessage() . "<br /> Aborting process";
        exit(-1);
    }

    //Create table for users
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` varchar(50) NOT NULL,
            `email` varchar(50) NOT NULL,
            `password` varchar(255) NOT NULL,
            `ver_code` varchar(45) NOT NULL,
            `verified` tinyint(1) NOT NULL DEFAULT '0',
            `notifs` varchar(6) NOT NULL DEFAULT 'YES',
            `reg_date` timestamp(6) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "Users Table Created Successfully <br />";
    }
    catch (PDOException $e) {
        echo "Error Creating Table: " .$e->getMessage(). "<br /> Aborting process <br />";
    }

    //Create table for posts
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `posts` (
            `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `username` varchar(50) NOT NULL,
            `pic` text NOT NULL,
            `likes` int(11) UNSIGNED DEFAULT '0',
            `comments` int(11) UNSIGNED DEFAULT '0'
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "Posts Table Created Successfully<br />";
    }
    catch (PDOException $e) {
        echo "Error Creating Posts Table: " .$e->getMessage(). "<br />Aborting process<br />";
    }

    //Create table for comments
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `comments` (
            `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            `postid` int(11) NOT NULL,
            `username` varchar(50) NOT NULL,
            `commented` varchar(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "Comments Table Created Successfully<br />";
    }
    catch (PDOException $e) {
        echo "Error Creating Comments Table: " .$e->getMessage(). "<br />Aborting process<br />";
    }

    //Create table for likes
    try {
        $dbh = new PDO($create->dsn, $create->db_user, $create->db_pass);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "CREATE TABLE `likes` (
            `postid` int(11) NOT NULL,
            `username` varchar(50) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin";
        $dbh->exec($query);
        echo "Likes Table Created Successfully<br />";
    }
    catch (PDOException $e) {
        echo "Error Creating Likes Table: " .$e->getMessage(). "<br />Aborting process<br />";
    }

?>
