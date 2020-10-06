<form method="post">
    <input type="text" name="login" placeholder="Логин"></br>
    <input type="password" name="password" placeholder="Пароль"></br>
    <input type="hidden" name="prevPage" value="<?=$_SERVER['HTTP_REFERER']?>">
    <input type="submit" name="login_submit" value="Авторизоваться">
</form>