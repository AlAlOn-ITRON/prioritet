<?php session_start();
require_once "../assets/user.php";
include_once "../assets/bd.php";
include_once "../assets/functions.php";?>
<!DOCTYPE html>
<html>
<head>
    <title>sertificationstudy.ru</title>
    <link rel = stylesheet href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>
<div>

</div>
 <?php
 if (!isset($_GET["root"])) $root = '`Required`';
 else $root = "`".$_GET["root"]."`";
         $res = mysqli_query($connect, "SHOW COLUMNS FROM ".$root.";");
         $arr = array();
         while ($row = mysqli_fetch_array($res)) {
             if (black_list_user(strtolower($row[0]))) continue;
             $arr[] = $row[0];
         }
        $str = arrtostr($arr);

        $query = mysqli_fetch_array(mysqli_query($connect, "SELECT ".$str." FROM ".$root." WHERE `Id` = ".$_SESSION["user"]["id"].";"));
        ?>
<!--<form id="js-form" method="post" class="for-text column indent w-30">
            <div id = "logo"><?php
                $photo = mysqli_fetch_array(mysqli_query($connect, "SELECT `Photo` FROM `Required` WHERE `Id` = ".$_SESSION["user"]["id"].";"))[0];
                if ($photo != '') {
                    ?><img width = "100%" src="https://itron.group/prioritet/uploads/<?php echo $photo;?>"><?php
                }
                ?>
            </div>
            <input id="js-file" type="file" name="file">
        </form>-->
        <form id="edit" class="column" action="changing_user.php" method="post">
            <input type = "hidden" name = 'root' value="<?php echo $root; ?>">
                    <fieldset id = "common-fieldset">
                        <legend>&nbsp;Общие данные&nbsp;</legend>
                    <?php
                        for ($i = 0; $i < count($query) / 2; $i++) {
                            echo "<label><span>".torus($arr[$i]).":</span><input type = 'text' value='".$query[$i]."' name = '".$arr[$i]."'></label>";
                        }
                    ?>
                    </fieldset>
            <?php $ar = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `Cathegories` WHERE `Id` = ".$_SESSION["user"]["id"].";"));?>
            <label><input type="checkbox" value="1" name="learning" <?php if ($ar["Learning"] == 1) echo "checked";?>>&nbsp;Учеба</label>
            <label><input type="checkbox" value="1" name="staff" <?php if ($ar["Staff"] == 1) echo "checked";?>>&nbsp;Кадры</label>
            <button>Сохранить</button>
        </form>


    <div id="result">
        <!-- Сюда выводится результат из upload_ajax.php -->
    </div>
    <script>
        $('#js-file').change(function() {
            $('#js-form').ajaxSubmit({
                type: 'POST',
                url: 'https://itron.group/prioritet/change/upload_ajax.php',
                success: function(result) {
                    // После загрузки файла очистим форму.
                    $('#js-form')[0].reset();
                    $('#logo').html('<img width = "100%" src="../uploads/' + result + '" />');
                }
            });
        });
    </script>
</body>
</html>