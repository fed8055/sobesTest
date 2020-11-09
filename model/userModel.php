<?php
    class userModel {

        protected $id;
        protected $login;
        protected $firstname;
        protected $surname;
        protected $lastname;
        protected $is_admin;
        private $db;
        private static $instance;

        public static function instance()  {
            if(self::$instance === null)
                self::$instance = new self;

            return self::$instance;
        }

        public function getLogin()
        {
            return $this->login;
        }

       private function __construct(){
           global $db;
           $this->db = $db;
           $this->hashLogin();
       }

        //авторизация
        public function login($login, $password){
            //вытаскиваем из базы пароль
            $sth = $this->db->Query('ret', "select password, id from username where login = '$login'");
            if($sth['0']['password'] == md5($password)){//сравниваем, если совпало, генерируем хэш
                $hash = md5(openssl_random_pseudo_bytes(30));
                //пишем его в базу и в куки.
                $this->db->Query('noret',"update username u set u.hash = '$hash' where u.id ='".$sth['0']['id']."'");
                setcookie("login", $login, time()+999999,'/');
                setcookie("hash", $hash, time()+999999,'/');
                $res = $this->db->Query('ret',"select u.id, u.login, u.firstname, u.surname, u.lastname, u.is_admin from username u where u.login = '$login'");
                foreach ($res[0] as $key => $val){
                    if(property_exists('userModel', $key))
                        utils::Session($key, $val);
                }
                return true;
            } else return false;
        }

        //авто авторизация
        private function hashLogin(){
            if(isset($_COOKIE['login']) and isset($_COOKIE['hash'])) {
                $login = $_COOKIE['login'];
                if ($sth = $this->db->Query('ret', "select hash from username where login = $login")) {
                    $hash = $sth[0][0];
                    if ($hash === $_COOKIE['hash']) {
                        $res = $this->db->Query('ret', "select u.id, u.login, u.firstname, u.surname, u.lastname, is_admin from username u where u.login = '$login'");
                        foreach ($res[0] as $key => $val) {
                            utils::Session($key, $val);
                        }
                        return true;
                    } else return false;
                } else return false;
            }
        }

        //регистрация
        public function register(array $userData)
        {
            /* @var string $login */
            /* @var string $password */
            /* @var string $name */
            /* @var string $surname */
            /* @var string $lastname */
            extract($userData);
            $password = md5($password);
            //проверить что такого юзера нет не надо, в базе уникальный индекс на поле login, оно не сработает
            if($res = $this->db->Query('noret', "insert into username (login, password, firstname, surname, lastname) values ('$login', '$password', '$name', '$surname', '$lastname')")){
                foreach ($res[0] as $key => $val) {
                    utils::Session($key, $val);
                }
                return true;
            }else return false;
        }

        public function logout(){
            setcookie("login", "", -10, '/');//так ансетятся куки. сам прихуел.
            setcookie("hash", "", -10, '/');
            session_unset();
            //todo не проебать
        }
    }
