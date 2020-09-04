<?php
    class login{
        public function action_login(){
            //вызвать вьюху
            //поймать с неё данные. через пост массив.
            //передать данные в модель
            //поймать ответ модели
            //если ответ положительный, то обратно на индекс
            //если отрицительный, то на авторизацию
            //не забывать ансетать переменные
            if (!isset($_POST['login'])){
                include_once 'view/login.php';
            } else{
                $login = new login();
                if($_POST['userFIO'] = $login->login($_POST['login'], $_POST['password'])){
                    include_once 'view/index.php';
                    unset($_POST['login']);
                    unset($_POST['password']);
                }else{
                    echo 'Неверный логин/пароль!';
                    unset($_POST['login']);
                    unset($_POST['password']);
                }
            }
        }

        public function action_register(){
            //вызвать вьюху
            //поймать с неё данные
            //передать данные в модель. метод регистер принимает ассоциативный массив userData. его нужно сделать.
            //поймать ответ модели. через пост массив.
            //если ответ положительный, то обратно на индекс
            //если отрицительный, то на регистрацию
            //не забывать ансетать переменные
            if (!isset($_POST['login'])) {
                include_once 'view/register.php';
            }else{
                $login = new login();
                $userData = ['username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'lastname' => $_POST['lastname']];
                if($_POST['userFIO'] = $login->register($userData)){
                    include_once 'view/index.php';
                    unset($_POST['login']);
                    unset($_POST['password']);
                    unset($_POST['name']);
                    unset($_POST['surname']);
                    unset($_POST['lastname']);
                }else{
                    echo 'Такой логин уже существует!';
                    unset($_POST['login']);
                    unset($_POST['password']);
                    unset($_POST['name']);
                    unset($_POST['surname']);
                    unset($_POST['lastname']);
                }
            }
        }

        public function action_logout(){
            //ансетнуть переменные
            //перезапустить вьюху
            $login = new login();
            $login->logout();
            include_once 'view/index.php';
        }
    }
