<?php
    class paginateList{
        private $dbh;

        public function __construct()
        {
            $tmp = new dbConnect();
            $this->dbh = $tmp->dbh;//ну так удобней будет. надеюсь сработает.
        }

        public function getListAll($table){
            //получать просто нумерованный массив. в виде индекс - ид записи. отдавать в контроллер.

        }

    }