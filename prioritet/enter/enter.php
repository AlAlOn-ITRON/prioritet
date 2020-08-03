<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>Вход в личный кабинет</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div class = "background"></div>
        <div class = "main content for-text column content-center">
            <form id = "request" method="post" class = "column w-60 backlist" action="entering.php">
                <div class="title"><h2>Вход</h2></div>
                <input required type = "text" placeholder="Введите ваш e-mail" name = "login">
                <input required type = "password" placeholder="Введите ваш пароль" name = "pass">
                <button type = "submit" name = "button" class = "w-40">Отправить</button>
                <?php if (isset($_GET["wrong"])) {
                    if ($_GET["wrong"] == 1) echo "<div class = 'wrong'>Неверно введен логин/пароль!</div>";
                    elseif ($_GET["wrong"] == 2) echo "<div class = 'wrong'>На ваш e-mail была отправлена ссылка на восстановление пароля. Если в течение 3 минут не приходит - проверите папку \"Спам\".</div>";
                }?>
                <span>Нет учетной записи? <a href = "https://itron.group/prioritet/register">Зарегистрируйтесь!</a></span>
            </form>
        </div>
    <script src="focus.js"></script>
    </body>
</html>