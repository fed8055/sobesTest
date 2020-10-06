<?php
    class user{

        public function __construct()
        {
            $this->isAuthorized();
        }

        private function isAuthorized(){
            //если есть куки с логином и хеш тот, что в базе - проставить авторизацию
            if(isset($_COOKIE['login']) and isset($_COOKIE['hash'])){
                $model = new loginModel();
                if($userData = $model->hashLogin()){
                    foreach ($userData[0][0] as $key => $val){
                        $_SESSION[$key] = $val;
                    }
                }
            }
        }

        public function action_login(){

            if (!isset($_POST['login_submit'])){
                include_once 'view/login.php';
            } else{
                $login = new loginModel();
                if($res = $login->login($_POST['login'], $_POST['password'])){//поймать ответ модели. если ответ положительный, то обратно на индекс
                    foreach ($res[0] as $key => $val){
                        $_SESSION[$key] = $val;
                    }
                    unset($_POST['login']);
                    unset($_POST['password']);
                    header("Location: " . $_POST['prevPage']);
                }else{//если отрицительный, то на авторизацию
                    unset($_POST['login']);
                    unset($_POST['password']);
                    unset($_POST['login_submit']);
                    echo 'Неверный логин/пароль!';
                }
            }
        }

        public function action_register(){
            if (!isset($_POST['register_submit'])) {
                include_once 'view/register.php';
            }else{
                $login = new loginModel();
                $userData = ['username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'lastname' => $_POST['lastname']];
                if($login->register($userData)){//если ответ положительный, то обратно на индекс. ну и сделать, чтоб юзер сразу авторизован
                    $login = new loginModel();
                    $res = $login->login($_POST['login'], $_POST['password']);
                    foreach ($res[0] as $key => $val){
                        $_SESSION[$key] = $val;
                    }
                    unset($_POST['login']);
                    unset($_POST['password']);
                    unset($_POST['name']);
                    unset($_POST['surname']);
                    unset($_POST['lastname']);
                    header("Location: " .  $_POST['prevPage']);
                }else{//если отрицительный, то на регистрацию
                    echo 'Такой логин уже существует!';
                    unset($_POST['login']);
                    unset($_POST['password']);
                    unset($_POST['name']);
                    unset($_POST['surname']);
                    unset($_POST['lastname']);
                    unset($_POST['register_submit']);
                }
            }
        }

        public function action_logout(){
            $login = new loginModel();
            $login->logout();
            header("Location: " . $_SERVER['HTTP_REFERER']);
        }
    }