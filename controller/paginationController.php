<?php
    class paginationController{

        public function action_index(){
            $page = new paginateList();

            $table = $_POST['table'];
            $fields = $_POST['fields'];
            $order = $_POST['order'];
            $postPerPage = $_POST['postPerPage'];
            $pageNum = (is_null($_POST['pageNum']))?1:$_POST['pageNum'];
            $pageCount = $page->getPageCount($postPerPage, $pageNum, $table);
            $pageContent = $page->getPageContent($postPerPage, $pageNum, $table, $fields, $order);

            $parametersArray = ['pages' => $pageContent,
                    'pageCount' =>  $pageCount,
                    'currentPage' => $pageNum];

            view::Render('view/paginateView.php', $parametersArray);

            //var_dump($_SERVER['REQUEST_URI']);
        }
    }