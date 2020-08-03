<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <title>Регистрация</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class = "background"></div>
<div class = "main content for-text column content-center">
    <form id = "request" method="post" class = "column w-60 backlist" action="registering.php">
        <div class="title"><h2>Регистрация</h2></div>
        <div class="row">
            <input required type = "text" placeholder="Фамилия" name = "surname" value="<?php echo $_GET["surname"];?>">
            <input required type = "text" placeholder="Имя" name = "name" value="<?php echo $_GET["name"];?>">
            <input required type = "text" placeholder="Отчество" name = "second_name" value="<?php echo $_GET["second_name"];?>">
        </div>
        <input required type = "date" placeholder="Дата рождения" name = "birthday" value="<?php echo $_GET["birthday"];?>">
        <input required type = "email" placeholder="Адрес электронной почты" name = "email" value="<?php echo $_GET["email"];?>">
        <input required type = "text" placeholder="Телефон" name = "phone" value="<?php echo $_GET["phone"];?>">
        <input required type = "password" placeholder="Пароль" name = "pass1">
        <input required type = "password" placeholder="Повторите пароль" name = "pass2">
        <button type = "submit" name = "button" class = "w-40">Отправить</button>
        <?php if (isset($_GET["wrong"])) {
            switch ($_GET["wrong"]) {
                case 'wrong_email': {
                    echo "<div class = 'wrong'>Пользователь с таким e-mail уже существует!</div>";
                    break;
                }
                case 'wrong_pass': {
                    echo "<div class = 'wrong'>Пароли не совпадают!</div>";
                    break;
                }
            }
        }?>
        <span>Есть учетная запись? <a href = "http://молодежь-за.рф/sertificationstudy/enter">Войти!</a></span>
    </form>
</div>
</body>
</html>