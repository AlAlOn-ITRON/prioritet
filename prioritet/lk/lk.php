<?php
session_start();
include_once "../assets/bd.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <title>Личный кабинет</title>

    </head>
    <body>
    <div>
        <?php
        if (isset($_SESSION["user"]["type"])) {?>
            <span><?php echo $_SESSION["user"]["name"]." ".$_SESSION["user"]["surname"];?></span>
            <a href = "../change">Редактировать профиль</a>
            <?php $ar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `Cathegories` WHERE `Id` = ".$_SESSION["user"]["id"].";"));
            if ($ar["Learning"] || $ar["Staff"]) {
                if ($ar["Learning"] && $ar["Staff"]) echo "Выбрано: <a href = '../change?root=Learning'>Учеба</a>, <a href = '../change?root=Staff'>Кадры</a>";
                else {
                    echo "Выбрано: ";
                    if ($ar["Learning"]) echo "<a href = '../change?root=Learning'>Учеба</a>";
                    else echo "<a href = '../change?root=Staff'>Кадры</a>";
                }
            }
            ?>
            <a href = '../exit'>Выйти</a>
            <?php
        } else {
            echo "Вы не вошли в систему";
            echo "<a href = 'enter'>Войти</a>";
        }
        ?>
    </div>
    </body>
</html>