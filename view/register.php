<form name="register_form" method="post">
    <input type="text" name="username" placeholder="логин"></br>
    <input type="password" name="password" placeholder="пароль"></br>
    <input type="text" name="name" placeholder="Имя"></br>
    <input type="text" name="surname" placeholder="Фамилия"></br>
    <input type="text" name="lastname" placeholder="Отчество"></br>
    <input type="hidden" name="prevPage" value="<?=$_SERVER['HTTP_REFERER']?>">
    <input type="submit" name="register_submit" value="Регистрация">
</form>