<?php

    class database {
        protected $db_conn;
        public $db_name = 'camagru';
        public $db_user = 'root';
        public $db_pass = 'projects';
        public $db_host = 'localhost';
        public $db_dsn = 'mysql:host=localhost';
        public $dsn = 'mysql:host=localhost;dbname=camagru';

        function connect() {
            try {
                $this->db_conn = new PDO($this->dsn,$this->db_user,$this->db_pass);
                $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->db_conn;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        function link() {
            try {
                $this->db_conn = new PDO($this->dsn, $this->db_user, $this->db_pass);
                $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->db_conn;
            }
            catch (PDOException $e) {
                return $e->getMessage();
            }
        }
    }

?>
