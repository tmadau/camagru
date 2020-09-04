<?php

    include_once( '../config/database.php' );

    class manage_users {
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
        //SIGN UP AND LOGIN METHODS
        function register($username, $email, $password, $ver_code) {
            try {
                $query = $this->link->prepare(" INSERT INTO users(username, email, password, ver_code) VALUES (?, ?, ?, ?) ");
                $values = array($username, $email, $password, $ver_code);
                $query->execute($values);
                return $query->rowCount();
                // return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function verify($ver_code) {
            try {
                $query = $this->link->prepare(" SELECT verified, ver_code FROM users WHERE verified = ? AND ver_code = ? LIMIT 1 ");
                $values = array("0", $ver_code);
                $query->execute($values);
                $counts = $query->rowCount();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function update($ver_code) {
            try {
                $query = $this->link->prepare(" UPDATE users SET verified = ? WHERE ver_code = ? ");
                $values = array("1", $ver_code);
                $query->execute($values);
                $counts = $query->rowCount();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function username_err($username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? ");
                $values = array($username);
                $query->execute($values);
                $counts = $query->rowCount();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function email_err($email) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE email = ? ");
                $values = array($email);
                $query->execute($values);
                $counts = $query->rowCount();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function login($username, $password) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? AND `password` = ? LIMIT 1 ");
                $values = array($username, $password);
                $query->execute($values);
                $counts = $query->rowCount();
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function get_data($username) {
            try {
                $query = $this->link->prepare(" SELECT * FROM users WHERE username = ? ");
                $values = array($username);
                $query->execute($values);
                $counts = $query->fetch(PDO::FETCH_ASSOC);
                return $counts;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function send($email) {
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
    }

?>
