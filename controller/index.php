<?php
    class Index{
        public $pageCount;

        public function action_index(){
            if(!isset($_GET['page']))//распознавание номера страницы
                $currentPage = 1;
            else
                $currentPage = $_GET['page'];

            if(isset($_POST['asc'])) //какая сортировка списка выбрана
                $order = 'asc';
            elseif(isset($_POST['desc']))
                $order = 'desc';

            /* @var string $order */
            $pages = $this->indexContentPage(5, is_null($order)?'asc':$order);
            $pageCount = $this->pageCount;

            $a = ['pages'=> $pages,
                'pageCount'=>$pageCount,
                'currentPage'=>$currentPage];
            var_dump($_POST);
            view::Render('view/paginateView.php', $a);
        }

        private function indexContentPage($n, $order){
            $page = new paginateList();
            $a = $page->getPage($n,'content','id, content', $order);
            $this->pageCount = $page->getPageCount();//такая последовательность чтоб заполнялась переменная PageCount
            return $a;
        }
    }