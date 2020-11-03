<?php
    class dbConnect {
        private $username;
        private $password;
        private $dbname;
        private $host;
        protected $dbh;
        private $errmsg;

        public function __construct(){
            if($file = file($_SERVER['DOCUMENT_ROOT'].'/sobestest/config.conf')) {
                foreach ($file as $value){
                    $a = explode('=', $value);
                    $val = trim($a[0]);
                    $this->$val = trim($a[1]);
                }
            }else echo 'файл не найден ';
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

        /*public function Query($type, $query){//ret - returning parameters; noret - nothing returns
            if($type === 'ret'){
                $sth = $this->dbh->Query($query);
                if($sth){
                    $res = [];
                    foreach ($sth as $row){
                        $res[] = $row;
                    }
                    return $res;
                }else return false;
            }elseif ($type === 'noret') {
               // var_dump($query);////////////////////////////////////для дебега
                $sth = $this->dbh->Prepare($query);
                return $sth->Execute();
            }
        }*/

        public function getErrmsg()
        {
            return $this->errmsg;
        }

        public function getDbh()
        {
            return $this->dbh;
        }

       /* public function __get($value) {//yay, magic!
            $test =  'get' . $value;
            return($this->$test);
        }*/

    }