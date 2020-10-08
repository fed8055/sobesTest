<?php
/* @var array $pages */
/* @var int $currentPage */
/* @var array $pageCount */

if(isset($_SESSION['login'])):?>
    <br>
    <a href="content/add/?name=content&field=content">Добавить</a>
<?php endif;?>

<!------------------------пагинатор------------------------------>
<form name="order" method="post" style="position: absolute; right: 0 ; top: 10pt ">
    <input type= "submit" name = "asc" value = "Прямой порядок"><!--todo перепиздячить в одну кнопку-->
    <input type= "submit" name = "desc" value = "Обратный порядок"><br>
    будет перепиздячено<br>
    в одну кнопку<br>
    потом<br>
    возможно
</form>

<table>
    <?php foreach ($pages as $page):?>
        <tr><td>
                <?php
                echo $page['content'];
                ?>
            </td>
            <td><?if($_SESSION['is_admin'] == 1)://todo переделать, чтоб и создатель мог удалить свою запись?>
                    <form method="post" action="content/delete">
                        <input type="hidden" name="table" value="content">
                        <button type="submit" name="delete" value="<?=$page['id']?>">Удалить</button>
                    </form>
                <? endif; ?>
            </td>
        </tr>
    <?php endforeach;?>
</table>

<?php if($currentPage > 1):?>
    <a href = "index?page=<?=$currentPage - 1?>"><</a>
<?php endif;

if($currentPage < $pageCount):?>
    <a href = "index?page=<?=$currentPage + 1?>">></a>
<? endif;?>
<!------------------------пагинатор------------------------------>