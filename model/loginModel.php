<?php
    class loginModel extends dbConnect{
        //авторизация
        public function login($username, $password){
            //вытаскиваем из базы пароль
            $sth = $this->Query(1, "select password, id from username where login = '$username'");

            //сравниваем, если совпало, генерируем хэш
            if($sth['0']['password'] == md5($password)){
                $hash = md5(openssl_random_pseudo_bytes(30));
                //пишем его в базу и в куки.
                $this->Query(2,"update username u set u.hash = '$hash' where u.id ='".$sth['0']['id']."'");
                setcookie("login", $username, time()+999999,'/');
                setcookie("hash", $hash, time()+999999,'/');
                $_SESSION['cookie'] = $_COOKIE['login'];//debug
                return $this->Query(1,"select u.id, u.login, u.firstname, u.surname, u.lastname, is_admin from username u where u.login = '$username'");//
            }else{//ну а если не совпало, то извините
                return false;
            }
        }

        //авто авторизация
        public function hashLogin(){
            $login = $_COOKIE['login'];
            if($sth = $this->Query(1,"select hash from username where login = $login")){
                $hash = $sth[0][0];
                if($hash === $_COOKIE['hash']){
                    return $this->Query(1,"select u.id, u.login, u.firstname, u.surname, u.lastname, is_admin from username u where u.login = '$login'");
                }else return false;
            }else return false;
        }

        //регистрация
        public function register(array $userData)
        {
            /* @var string $username*/
            /* @var string $password*/
            /* @var string $name*/
            /* @var string $surname*/
            /* @var string $lastname*/
            extract($userData);
            $password = md5($password);
            //проверить что такого юзера нет не надо, в базе уникальный индекс на поле login, оно не сработает
            //todo сделать проверку на то, занеслось ли
            //занести в базу внесённые данные, вернуть правду/лож
            return $this->Query(2, "insert into username (login, password, firstname, surname, lastname) values ('$username', '$password', '$name', '$surname', '$lastname')");
        }

        public function logout(){
            setcookie("login", "", -10, '/');//так ансетятся куки. сам прихуел.
            setcookie("hash", "", -10, '/');
            session_destroy();
            unset($_POST['userFIO']);
        }
    }