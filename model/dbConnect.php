<?php
    class dbConnect {
        private $username;
        private $password;
        private $dbname;
        private $host;
        private $dbh;
        private $errmsg;

        public function __construct($host = '127.0.0.1', $dbname = 'yiitest', $username = 'root', $password = 'root')
        {
            $this->host = $host;
            $this->dbname = $dbname;
            $this->username = $username;
            $this->password = $password;

            self::Connect();
        }

        private function Connect(){
            if(!$this->dbh){
                try{
                    $this->dbh = new PDO("mysql:dbname=$this->dbname;host=$this->host", $this->username, $this->password);
                }catch(PDOException $e){
                    echo 'Не удалось подключиться к БД';
                    $this->errmsg = $e->getMessage();
                }
            }
        }

        public function Query($type, $query){//1-select, 2-anything else
            if($type === 1){
                $sth = $this->dbh->Query($query);
                $sth -> Fetch(PDO::FETCH_ASSOC);
                return $sth;
            }elseif ($type === 2) {
                $sth = $this->dbh->Prepare($query);
                $sth->Execute();
            }
        }

        public function getErrmsg()
        {
            return $this->errmsg;
        }

        public function getDbh()
        {
            return $this->dbh;
        }

        public function __get($value) {//yay, magic!
            $test =  'get' . $value;
            return($this->$test);
        }

    }