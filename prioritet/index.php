<?php
session_start();
include_once "assets/bd.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Prioritet-group</title>
    </head>
    <body>
    <div>
        <?php
        if (isset($_SESSION["user"]["type"])) {?>
            <span>Здравствуйте, <?=$_SESSION["user"]["name"]?></span>
            <a href = "lk">Личный кабинет</a>
            <a href = 'exit'>Выйти</a>
            <?php
        } else {
            echo "Вы не вошли в систему";
            echo "<a href = 'enter'>Войти</a>";
        }
        ?>

    </div>
    </body>
</html>