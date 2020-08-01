<?php
    class autorize{

        //авторизация
        public function autorization($username, $password){
            //вытаскиваем из базы пароль
            $dbh = new dbConnect('localhost', 'test','root','root');
            $sth = $dbh->Query(1, "select password from username where username = $username");

            //сравниваем, если совпало, генерируем хэш
            if($sth['password'] = md5($password)){
                $hash = md5(openssl_random_pseudo_bytes(30));

                //пишем его в базу и в куки. или в сессию? хуй знает, думать надо.
                $dbh->Query("update username u set u.hash = $hash where u.id =".$sth['id']);

            }else{
                //todo
            }



        }

        //регистрация
    }