<?php
if(isset($_COOKIE['login'])){
    ?>
    <a href="/controllers/logout.php">Выход</a>
    <?
}else{
    ?>
    <a href="/authorize.php">Авторизация</a>
    <a href="/register.pрp">Регистрация</a>
    <?
}
?>


