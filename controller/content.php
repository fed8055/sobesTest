<?php
    class content{
        public function action_add(){
            if(!isset($_POST['add_content'])){
                include_once 'view/addContent.php';
            }else{
                $content = new contentManage();
                if($content->add($_GET['name'],$_GET['field'],$_POST['content'])){
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                }else{
                    echo 'ошибка';
                }
            }
        }

        public function action_delete(){
            $killer = new contentManage();
            $killer->delete($_POST['table'], $_POST['delete']);
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }