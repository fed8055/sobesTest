<?php
/* @var array $pages */
/* @var int $currentPage */
/* @var array $pageCount */
/*----------------------------регистрация/авторизация--------------------------*/
if(isset($_SESSION['login'])):
    echo 'Авторизован как '.$_SESSION['lastname'];
    ?>
    <p>
        <a href="user/logout">Выход</a>
    </p>
    <?
else:
    ?>
    <a href="user/login">Авторизация</a>
    <a href="user/register">Регистрация</a>
    <?
endif;?>

<!----------------------------регистрация/авторизация---------------------------->

<!-- ----------------------------контент------------------------>
<?php if(isset($_SESSION['login'])):?>
    <br>
    <a href="content/add/?name=content&field=content">Добавить</a>
<?php endif;?>

<form name="order" method="post">
    <input type= "submit" name = "asc" value = "Прямой порядок">
    <input type= "submit" name = "desc" value = "Обратный порядок">
</form>

<? foreach ($pages as $page):?>
    <p><?echo $page['content'] ?></p>
<?endforeach;?>

<?if($currentPage > 1):?>
    <a href = "index?page=<?=$currentPage - 1?>"><</a>
<? endif;

if($currentPage < $pageCount):?>
    <a href = "index?page=<?=$currentPage + 1?>">></a>
<? endif;?>
<!-- ----------------------------контент------------------------ -->

