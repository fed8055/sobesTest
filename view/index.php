<?php
/* @var array $pages */
/* @var int $currentPage */ //шоб ошибку не кидало

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
foreach ($pages as $page):?>
    <p><?echo $page['a'] ?></p><br>
<?endforeach;?>

<a href = "index?page = <?=$currentPage - 1?>"><</a>
<a href = "index?page = <?=$currentPage + 1?>">></a>


