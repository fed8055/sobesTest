<?php
    class Index{
        public $pageCount;

        public function action_index(){
            //если я вызову отсюда вьюху, то во вьюхе будут доступны местные переменные
            //нетривиальная хуйня доложу я вам, еле допёр

            if(!isset($_GET['page']))
                $currentPage = 1;
            else
                $currentPage = $_GET['page'];

            if(isset($_POST['asc'])) $order = 'asc';//какая сортировка списка выбрана
            if(isset($_POST['desc'])) $order = 'desc';

            $pages = $this->indexContentPage(5, is_null($order)?'asc':$order);
            $pageCount = $this->pageCount;

            include_once 'view/index.php';
        }

        private function indexContentPage($n, $order = 'asc'){
            $page = new paginateList();
            $a = $page->getPage($n,'content','content', $order);
            $this->pageCount = $page->getPageCount();//такая последовательность чтоб заполнялась переменная PageCount
            return $a;
        }
    }