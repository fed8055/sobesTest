<?php
    class content{
        public function action_add(){
            if(!isset($_POST['add_content'])){
                var_dump($_POST);
                include_once 'view/addContent.php';
            }else{
                $content = new contentManage();
                if($content->add($_GET['name'],$_GET['field'],$_POST['content'])){
                    header("Location: /sobestest/index");
                }else{
                    var_dump($_SESSION);
                    echo 'ошибка';
                }
            }
        }

        public function delete(){

        }
    }