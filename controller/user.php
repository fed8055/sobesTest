<?php
    class user{
        private $login;
        private $firstname;
        private $surname;
        private $lastname;
        private $is_admin;

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
                        $this->$$key = $val;
                    }
                }
            }
        }

        public function action_login(){
            //вызвать вьюху
            //поймать с неё данные. через пост массив.
            if (!isset($_POST['login_submit'])){
                include_once 'view/login.php';
            } else{
                //передать данные в модель
                $login = new loginModel();
                if($res = $login->login($_POST['login'], $_POST['password'])){//поймать ответ модели. если ответ положительный, то обратно на индекс
                    foreach ($res[0][0] as $key => $val){
                        $this->$$key = $val;
                    }
                    header("location: /sobestest/index");//для возврта на главную страницу
                    unset($_POST['login']);
                    unset($_POST['password']);
                }else{//если отрицительный, то на авторизацию
                    include_once 'view/login.php';
                    echo 'Неверный логин/пароль!';
                    unset($_POST['login']);
                    unset($_POST['password']);
                    unset($_POST['login_submit']);
                }
            }
        }

        public function action_register(){
            //вызвать вьюху
            //поймать с неё данные
            if (!isset($_POST['register_submit'])) {
                include_once 'view/register.php';
            }else{
                //поймать ответ модели. через пост массив.
                $login = new loginModel();
                $userData = ['username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'name' => $_POST['name'],
                    'surname' => $_POST['surname'],
                    'lastname' => $_POST['lastname']];
                //передать данные в модель. метод регистер принимает массив userData.
                if($login->register($userData)){//если ответ положительный, то обратно на индекс. ну и сделать, чтоб юзер сразу авторизован
                    $login = new loginModel();
                    $res = $login->login($_POST['login'], $_POST['password']);
                    foreach ($res[0][0] as $key => $val){
                        $this->$$key = $val;
                    }
                    header("location: /sobestest/index");//для возврта на главную страницу
                    unset($_POST['login']);
                    unset($_POST['password']);
                    unset($_POST['name']);
                    unset($_POST['surname']);
                    unset($_POST['lastname']);
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
            //ансетнуть переменные
            //перезапустить вьюху
            $login = new loginModel();
            $login->logout();
            header("location: /sobestest/index");//для возврта на главную страницу
        }

        /**
         * @return mixed
         */
        public function getLogin()
        {
            return $this->login;
        }

        /**
         * @return mixed
         */
        public function getFirstname()
        {
            return $this->firstname;
        }

        /**
         * @return mixed
         */
        public function getSurname()
        {
            return $this->surname;
        }

        /**
         * @return mixed
         */
        public function getLastname()
        {
            return $this->lastname;
        }

        /**
         * @return mixed
         */
        public function getIsAdmin()
        {
            return $this->is_admin;
        }
    }