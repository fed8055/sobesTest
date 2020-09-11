<?php
    class Index{
        public function action_index(){
            //если я вызову отсюда вьюху, то во вьюхе будут доступны местные переменные
            //нетривиальная хуйня доложу я вам, еле допёр

            if(!isset($_GET['page']))
                $currentPage = 1;
            else
                $currentPage = $_GET['page'];

            $pages = $this->indexContentPage(5);

            include_once 'view/index.php';
        }

        private function indexContentPage($n){

            $page = new paginateList();
            return $page->getPage($n,'country','name');
        }
    }