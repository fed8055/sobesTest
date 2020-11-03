<?php
    class Index{

        public function action_index(){
            view::Render('view/index.php');
            echo '<script>pagination('.$_GET['page'].');</script>';
        }
    }