<html>
    <head>
        <link rel="stylesheet" href="http://localhost/sobestest/view/css/main_style.css">
        <script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://localhost/sobestest/JS/popUps.js"></script>
        <script src="http://localhost/sobestest/JS/auth.js"></script>
        <script src="http://localhost/sobestest/JS/pagination.js"></script>
    </head>
    <body>
        <div class="topbar">
            <div class="auth" style="position: absolute; right: 2% ">
                <?php
                    if(isset($_SESSION['login']))://todo переделать на забор данных из модели
                        echo 'Авторизован как '.$_SESSION['lastname'].'<br>';
                ?>
                    <button id="logout">Выход</button>
                <?php
                    else:
                ?>
                    <button onclick="popUpShow('#reg')">Регистрация</button>
                    <button onclick="popUpShow('#auth')">Авторизоваться</button>
                <?php endif;?>
            </div>
        </div>

        <div id="auth" class="b-popup">
            <div id="login_form" class="b-popup-content">
                <input type="text" id="login" name="login" placeholder="Логин"><br>
                <input type="password" id="password" name="password" placeholder="Пароль"><br>
                <button id="login_submit" name="login_submit" value="Авторизоваться">Авторизоваться</button>
                <span id = "error"></span>
                <button onclick="popUpHide('#auth')">Отмена</button>
            </div>
        </div>

        <div id="reg" class="b-popup">
            <div name="register_form"  class="b-popup-content">
                <input type="text" id="login" name="login" placeholder="логин"><br>
                <input type="password" id="password" name="password" placeholder="пароль"><br>
                <input type="text" id="name" name="name" placeholder="Имя"><br>
                <input type="text" id="surname" name="surname" placeholder="Фамилия"><br>
                <input type="text" id="lastname" name="lastname" placeholder="Отчество"><br>
                <button type="submit" id="register_submit" name="register_submit" value="Регистрация">Регистрация</button>
                <span id = "error"></span>
                <button onclick="popUpHide('#reg')">Отмена</button>
            </div>
        </div>
        <!----------------------------регистрация/авторизация---------------------------->

        <!-------------------------сайдбар------------------------>
        <div class = "sidebar">
            <p>
                главная
            </p>
            <p>
                не главная
            </p>
            <p>
                ну вы понели...
            </p>
        </div>
        <!-------------------------сайдбар------------------------>

        <!------------------------------контент------------------------>
        <div id="content" class="content">
            <div id="output"></div>
        </div>
        <!------------------------------контент-------------------------->

        <!------------------------------(бикини)боттом-------------------------->
        <div class="bottom">
            <p style="position: absolute; left: 10%">сделано с любовью</p>
            <p style="position: absolute; right: 10%">но через жопу</p>
        </div>
        <!-- ----------------------------(бикини)боттом-------------------------->
    </body>
</html>