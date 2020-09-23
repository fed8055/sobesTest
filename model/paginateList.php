<?php
    class paginateList extends dbConnect {
        private $pageCount;

        public function getPage($postCount, $table, $fields, $order = 'asc'){
            if(!isset($_GET['page']))
                $currentPage = 1;
            else
                $currentPage = $_GET['page'];

            $startIndex = ($currentPage * $postCount) - $postCount;

            $q = $this->Query(1,"select count(id) from $table");
            foreach($q as $row) {
                $this->pageCount = ceil($row[0] / $postCount);//количество страниц
            }
            return $this->query(1,"select $fields from $table order by id $order limit $startIndex, $postCount");
        }

        public function getPageCount()
        {
            return $this->pageCount;
        }
    }