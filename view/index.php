<html>
    <head>
        <link rel="stylesheet" href="view/css/main_style.css">
    </head>
    <body>
        <div class="topbar">
            <div style="position: absolute; right: 2% ">
                <?php
                    if(isset($_SESSION['login'])):
                        echo 'Авторизован как '.$_SESSION['lastname'].'<br>';
                ?>
                    <a href="user/logout">Выход</a>
                <?php
                    else:
                ?>
                    <a href="user/login">Авторизация</a>
                    <a href="user/register">Регистрация</a>
                <?php endif;?>
            </div>
        </div>
        <!----------------------------регистрация/авторизация---------------------------->

        <!-------------------------сайдбар------------------------>
        <div class = "sidebar">
            <p>
                главная
            </p>
            <p>
                other shit
            </p>
        </div>
        <!-------------------------сайдбар------------------------>

        <!------------------------------контент------------------------>
        <div class="content">
            <?php
                Route::Start();//todo так это работат не будет, заголовки мешают
            ?>
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