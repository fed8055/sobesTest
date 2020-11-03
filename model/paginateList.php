<?php
    class paginateList extends dbExchange {

        public function getPageContent($postPerPageCount, $currentPage, $table, $fields, $order){
            $startIndex = ($currentPage * $postPerPageCount) - $postPerPageCount;

            //todo не проебать при допиливании вывода удалённых
            if(isset($_POST['seeDeleted'])) return $this->query('ret',"select $fields from $table order by id $order limit $startIndex, $postPerPageCount");
                else return $this->query('ret',"select $fields from $table where is_deleted = 0 order by id $order limit $startIndex, $postPerPageCount");
        }

        public function getPageCount($postPerPageCount, $currentPage, $table){//количество страниц
            $startIndex = ($currentPage * $postPerPageCount) - $postPerPageCount;
            $q = $this->Query('ret',"select count(id) from $table where is_deleted = 0");
            foreach($q as $row) {
                return ceil($row[0] / $postPerPageCount);
            }
        }
    }