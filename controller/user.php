<?php
    class user{

        public function action_login(){
            require_once 'core/application.php';
            /* @var $user */
            if($user->login($_POST['login'], $_POST['password'])){
                unset($_POST['login']);
                unset($_POST['password']);
                return true;
            }else{
                unset($_POST['login']);
                unset($_POST['password']);
                return false;
            }
        }

        public function action_register(){
            require_once 'core/application.php';
            /* @var $user */
            $userData = ['username' => $_POST['username'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'lastname' => $_POST['lastname']];
            if($user->register($userData)){//если ответ положительный - сделать, чтоб юзер сразу авторизован
                $user->login($_POST['login'], $_POST['password']);
                unset($_POST['login']);
                unset($_POST['password']);
                unset($_POST['name']);
                unset($_POST['surname']);
                unset($_POST['lastname']);
                return true;
            }else{//если отрицительный, то на регистрацию
                unset($_POST['login']);
                unset($_POST['password']);
                unset($_POST['name']);
                unset($_POST['surname']);
                unset($_POST['lastname']);
                return false;
            }
        }

        public function action_logout(){
            require_once 'core/application.php';
            /* @var $user */
            $user->logout();
        }
    }