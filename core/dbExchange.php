<?php
    class dbExchange {

        private $db;

        function __construct()
        {
            $this->db = dbConnect::instance()->Connect();
        }

        public static function instance()  {
            return new self();
        }

        public function Query($type, $query){//ret - returning parameters; noret - nothing returns
            if($type === 'ret'){
                $sth = $this->db->Query($query);
                if($sth){
                    $res = [];
                    foreach ($sth as $row){
                        $res[] = $row;
                    }
                    return $res;
                }else return false;
            }elseif ($type === 'noret') {
                // var_dump($query);////////////////////////////////////для дебега
                $sth = $this->db->Prepare($query);
                return $sth->Execute();
            }
        }
    }