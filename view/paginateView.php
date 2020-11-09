<?php
/* @var array $pages */
/* @var int $currentPage */
/* @var array $pageCount */
/* @var array $orderButton */

global $user;
if($user->getLogin()):?>
    <br>
    <a href="content/add/?name=content&field=content">Добавить</a>
<?php endif;?>

<script src="http://localhost/sobestest/JS/pagination.js"></script>

<!------------------------пагинатор------------------------------>
<!--кнопка смены сортировки-->
<div id="orderDiv"><?=$orderButton?></div>

<!--собственно вывод всей хуйни. и её удаление. при желании. и возможности.-->
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
    <a href = "index?page=<?=$currentPage - 1?>&order=<?=$_GET['order']?>"><</a>
<?php endif;

if($currentPage < $pageCount):?>
    <a href = "index?page=<?=$currentPage + 1?>&order=<?=$_GET['order']?>">></a>
<? endif;?>
<!------------------------пагинатор------------------------------>