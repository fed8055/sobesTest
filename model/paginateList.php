<?php
    class paginateList extends dbConnect {
        public $pageCount;

        public function getPage($postCount, $table, $fields){
            if(!isset($_GET['page']))
                $currentPage = 1;
            else
                $currentPage = $_GET['page'];

            $startIndex = ($currentPage * $postCount) - $postCount;

            $q = $this->Query(1,"select count(id) from $table");
            //$sth = $this->dbh->prepare($q);
            //$sth->execute($sth);
            //$res = $sth->fetchall(PDO::FETCH_COLUMN);
            $this->pageCount = $q['count'];//количество страниц

            return $this->dbh->query("select $fields from $table limit $startIndex, $postCount");//получается массив с ассоциативными массивами, самое то для форича.вроде бы.
        }
    }

/*$sth = [
'1'=>['a'=>1],
'2'=>['a'=>2],
'3'=>['a'=>3],
'4'=>['a'=>4],
'5'=>['a'=>5],
'6'=>['a'=>6],
'7'=>['a'=>7],
'8'=>['a'=>8],
'9'=>['a'=>9]
];*/