<?php
    class paginateList {

        public function getPageContent($postPerPageCount, $currentPage, $table, $fields, $order){
            global $db;

            $startIndex = ($currentPage * $postPerPageCount) - $postPerPageCount;

            //todo не проебать при допиливании вывода удалённых
            if(isset($_POST['seeDeleted'])) return $db->query('ret',"select $fields from $table order by id $order limit $startIndex, $postPerPageCount");
                else return $db->Query('ret',"select $fields from $table where is_deleted = 0 order by id $order limit $startIndex, $postPerPageCount");
        }

        public function getPageCount($postPerPageCount, $currentPage, $table){//количество страниц
            global $db;

            $startIndex = ($currentPage * $postPerPageCount) - $postPerPageCount;
            $q = $db->Query('ret',"select count(id) from $table where is_deleted = 0");
            foreach($q as $row) {
                return ceil($row[0] / $postPerPageCount);
            }
        }
    }