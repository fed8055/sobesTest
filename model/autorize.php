<?php
    class autorize{

        private $dbh;

        public function __construct()
        {
            $this->dbh = new dbConnect('localhost', 'test','root','root');
        }

        //авторизация
        public function authorization($username, $password){
            //вытаскиваем из базы пароль
            //$dbh = new dbConnect('localhost', 'test','root','root');
            $sth = $this->dbh->Query(1, "select password from username where username = $username");

            //сравниваем, если совпало, генерируем хэш
            if($sth['password'] = md5($password)){
                $hash = md5(openssl_random_pseudo_bytes(30));

                //пишем его в базу и в куки. почему куки? потому что иди нахуй, вот почему.
                $this->dbh->Query(2,"update username u set u.hash = $hash where u.id =".$sth['id']);

                setcookie("login", $username);
                setcookie("hash", $hash);

                $sth = $this->dbh->Query(1,"select u.name, u.surname, u.lastname from username u where u.username = $username");
                return $sth;
            }else{//ну а если не совпало, то извините
                return 'Неверный пароль!';
            }
        }

        //регистрация
        public function registration(array $userData)
        {
            // todo чтоб был просто отвал жопы - запилить проверку на корректность данных.
            //проверить что такого юзера нет
            $sth = $this->dbh->Query(1, "select 1 from username u where u.username =" . $userData['username']);
            if (is_null($sth['username'])) {
                //занести в базу внесённые данные
                $this->dbh->Query(2, 'insert into username (username, password, name, surname, lastname) values (' . $sth['username'] . ',' .
                    md5($sth['password']) . ',' . $sth['name'] . ',' . $sth['surname'] . ',' . $sth['lastname'] . ')');//хуйня собачья. но не мого придумать, как сделать лучше.

                // ну и сделать, чтоб юзер сразу авторизован.
                return $this->authorization($sth['username'], $sth['password']);
            } else {
                //если такой пользователь есть, то извините
                return 'Такой логин уже есть';
            }
        }
        public function logout(){

        }
    }