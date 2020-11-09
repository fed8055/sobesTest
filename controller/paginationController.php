<?php
    class paginationController{

        public function index($table, $fields, $postPerPage, $pageNum, $order){
            $page = new paginateList();

            $pageCount = $page->getPageCount($postPerPage, $pageNum, $table);
            $pageContent = $page->getPageContent($postPerPage, $pageNum, $table, $fields, $order);

            $parametersArray = ['pages' => $pageContent,
                    'pageCount' =>  $pageCount,
                    'currentPage' => $pageNum,
                    'orderButton' => $this->orderButton($order, $pageNum)];

            view::Render('view/paginateView.php', $parametersArray);
        }

        private function orderButton($order, $pageNum){
            //порядок сортировки хранится в гет
            //но сюда передаётся постом из контроллера

            if($order === 'asc' or is_null($order))
                return '<a href="index?page='.$pageNum.'&order=desc">Обратный порядок</a>';
            elseif($order === 'desc')
                return '<a href="index?page='.$pageNum.'&order=asc">Прямой порядок</a>';
            else
                return false;
        }

    }