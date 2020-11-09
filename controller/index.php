<?php
    class Index{

        public function action_index(){
            /*$_POST['table'] = 'content';
            $_POST['fields'] = 'id,content';
            $_POST['postPerPage'] = 5;
            $_POST['pageNum'] = $_GET['page'];
            $_POST['order'] = $_GET['order'];*/

            $table = 'content';
            $fields = 'id,content';
            $postPerPage = 5;
            $pageNum = isset($_GET['page'])?$_GET['page']:1;
            $order = isset($_GET['order'])?$_GET['order']:'asc';

            ob_start();
            $pag = new paginationController();
            $pag->index($table, $fields, $postPerPage, $pageNum, $order);
            $output = ob_get_contents();
            ob_clean();
            view::Render('view/index.php', ['output' => $output]);
        }
    }