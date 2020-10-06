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
<!------------------------пагинатор------------------------------>
<form name="order" method="post">
    <input type= "submit" name = "asc" value = "Прямой порядок">
    <input type= "submit" name = "desc" value = "Обратный порядок">
</form>

<?php foreach ($pages as $page):?>
    <p>
        <?php //todo переделать, чтоб и создатель мог удалить свою запись
        if($_SESSION['is_admin'] == 1):?>
            <form method="post" action="content/delete">
                <input type="hidden" name="table" value="content">
                <button type="submit" name="delete" value="<?=$page['id']?>">Удалить</button>
            </form>
        <?endif;
        echo $page['content'];
        ?>
    </p>
<?php endforeach;?>

<?php if($currentPage > 1):?>
    <a href = "index?page=<?=$currentPage - 1?>"><</a>
<?php endif;

if($currentPage < $pageCount):?>
    <a href = "index?page=<?=$currentPage + 1?>">></a>
<? endif;?>
<!------------------------пагинатор------------------------------>
<!-- ----------------------------контент------------------------ -->

