<?php
    class dbConnect {
        private $username;
        private $password;
        private $dbname;
        private $host;
        private $dbh;
        private $errmsg;

        public function __construct($host, $dbname, $username, $password)
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
                    $this->dbh = new PDO('mysql:dbname=test;host=localhost', $this->username, $this->password);
                }catch(PDOException $e){
                    echo 'Не удалось подключиться к БД';
                    $this->errmsg = $e->getMessage();
                }
            }
        }

        public function Select($query, $mode = null){//да хуй него знает
           $sth = $this->dbh->query($query);
           if($mode){
               $sth -> setFetchMode($mode);
           }
           //return
        }

        /**
         * @return mixed
         */
        public function getDbh()
        {
            return $this->dbh;
        }


        public function __get($value) {
            $test =  'get' . $value;
            return($this->$test);
        }

    }