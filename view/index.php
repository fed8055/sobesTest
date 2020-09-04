<?php
if(isset($_COOKIE['login'])){
    echo 'Авторизован как '.$_POST['userFIO'];
    ?>
    <a href="login/logout">Выход</a>
    <?
}else{
    ?>
    <a href="login/login">Авторизация</a>
    <a href="login/register">Регистрация</a>
    <?
}
?>


