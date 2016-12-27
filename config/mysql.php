<?php
    /**
     * Ma connexion mysql
     */
    class connect
    {
        private $type = "mysql";
        private $servername = "localhost";
        private $database = "AngularJsCRUD";
        private $username = "root";
        private $password = "password";
        private static $db = NULL;


        private function __construct(){

            try {
                self::$db = new PDO(
                    $this->type .':host='. $this->servername .'; dbname='. $this->database, $this->username,
                    $this->password
                );
            }
            catch (Exception $e) {
                echo $e->getMessage();
                die();
            }

        }

        public static function getInstance(){
            if(self::$db == NULL){
                new connect();
            }
            return self::$db;
        }

    }

 ?>
