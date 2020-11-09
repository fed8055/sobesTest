<?php
    class dbConnect {
        private $username;
        private $password;
        private $dbname;
        private $host;
        protected $dbh;
        private $errmsg;
        private static $instance;

        private function __construct(){
            if($file = file($_SERVER['DOCUMENT_ROOT'].'/sobestest/config.conf')) {
                foreach ($file as $value){
                    $a = explode('=', $value);
                    $val = trim($a[0]);
                    $this->$val = trim($a[1]);
                }
            }else echo 'файл не найден ';
//            self::Connect();
        }

        public static function instance()  {
            if(self::$instance === null)
                self::$instance = new self;

            return self::$instance;
        }

        public function Connect(){
            if(!$this->dbh){
                try{
                    $this->dbh = new PDO("mysql:dbname=$this->dbname;host=$this->host", $this->username, $this->password);
                }catch(PDOException $e){
                    echo 'Не удалось подключиться к БД';
                    $this->errmsg = $e->getMessage();
                    var_dump($this->errmsg);
                }
            }

            if($this->dbh)
                return $this->dbh;
        }

        public function getErrmsg()
        {
            return $this->errmsg;
        }

        public function getDbh()
        {
            return $this->dbh;
        }
    }