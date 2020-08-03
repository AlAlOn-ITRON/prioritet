<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
include '../assets/bd.php';
$res = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `Required` WHERE `Email` = '".strtolower($_POST["login"])."' AND `Password` = '".md5($_POST["login"].$_POST["password"]."!")."';"));
if (isset($res["Id"])) {
    $_SESSION["user"]["email"] = $_POST["login"];
    $_SESSION["user"]["name"] = $res["Name"];
    $_SESSION["user"]["second_name"] = $res["Second_name"];
    $_SESSION["user"]["surname"] = $res["Surname"];
    $_SESSION["user"]["id"] = $res["Id"];
    $_SESSION["user"]["type"] = $res["Type"];
?><meta http-equiv="refresh" content="0; URL='https://itron.group/prioritet/'" /><?php
} else {
    ?><meta http-equiv="refresh" content="0; URL='https://itron.group/prioritet/enter?wrong=1'" /><?php

}
