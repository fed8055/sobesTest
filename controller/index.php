<?php
    class Index{
        public $pageCount;

        public function action_index(){
            if(!isset($_GET['page']))//распознавание номера страницы
                $currentPage = 1;
            else
                $currentPage = $_GET['page'];

            if(isset($_POST['asc'])) $order = 'asc';//какая сортировка списка выбрана
            if(isset($_POST['desc'])) $order = 'desc';

            $pages = $this->indexContentPage(5, is_null($order)?'asc':$order);//так параметры передадаутся во вьюху
            $pageCount = $this->pageCount;

            include_once 'view/index.php';//вызов вьюхи
        }

        private function indexContentPage($n, $order = 'asc'){
            $page = new paginateList();
            $a = $page->getPage($n,'content','content', $order);
            $this->pageCount = $page->getPageCount();//такая последовательность чтоб заполнялась переменная PageCount
            return $a;
        }
    }