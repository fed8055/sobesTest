<?php
    class dbExchange extends dbConnect{

        public function Query($type, $query){//ret - returning parameters; noret - nothing returns
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
        }
    }