<?php
    class user{

        private $user;
        function __construct()
        {
            global $user;
            $this->user = $user;
        }

        public function action_login(){
            if( $this->user->login($_POST['login'], $_POST['password'])){
                unset($_POST['login']);
                unset($_POST['password']);
                echo json_encode(['success' => true, 'error' => false]);
                return true;
            }else{

                unset($_POST['login']);
                unset($_POST['password']);
                return false;
            }
        }

        public function action_register(){
            $userData = ['username' => $_POST['username'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'surname' => $_POST['surname'],
                'lastname' => $_POST['lastname']];
            if($this->user->register($userData)){//если ответ положительный - сделать, чтоб юзер сразу авторизован
                $this->user->login($_POST['login'], $_POST['password']);
                unset($_POST['login']);
                unset($_POST['password']);
                unset($_POST['name']);
                unset($_POST['surname']);
                unset($_POST['lastname']);
                return true;
            } else {//если отрицительный, то на регистрацию
                unset($_POST['login']);
                unset($_POST['password']);
                unset($_POST['name']);
                unset($_POST['surname']);
                unset($_POST['lastname']);
                return false;
            }
        }

        public function action_logout(){
            /* @var $user */
            $this->user->logout();
        }
    }