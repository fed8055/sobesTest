<?php
    class contentManage extends dbExchange{
        public function add($table, $fields, $content){
            //инсерт в таблицу с занесением ид пользователя
            $createuserid = $_SESSION['id'];
            return $this->Query('noret',"insert into $table ($fields, createuserid) values ('$content', '$createuserid')");
        }

        public function delete($table, $rowID){
            $sth = $this->Query('ret', "select createuserid from $table where id = $rowID");
            $createuserid = $sth[0];
            if($_SESSION['id'] == $createuserid or $_SESSION['is_admin'] = 1){//проверка на пользователя, удалить может создатель или админ
                //апдэйт поля из_делитед в таблице на 1
                $this->Query('noret', "update $table set is_deleted = 1 where id = $rowID");
            }
        }
    }
