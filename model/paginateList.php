<?php
    class paginateList{
        private $dbh;

        public function __construct()
        {
            $tmp = new dbConnect();
            $this->dbh = $tmp->dbh;//ну так удобней будет. надеюсь сработает.
        }


        public function getPage($postCount, $table, $fields){
            $q = "select count(id) from $table";
            $sth = $this->dbh->prepare($q);
            $sth->execute($sth);
            $res = $sth->fetchall(PDO::FETCH_COLUMN);
            $pageCount = $res[0];//количество страниц

            $startIndex = ($_GET['page'] * $postCount) - $postCount;

            $q = "select $fields from $table limit $startIndex, $postCount";
            return $this->dbh->query($q);//получается массив с ассоциативными массивами, самое то для форича
        }

    }