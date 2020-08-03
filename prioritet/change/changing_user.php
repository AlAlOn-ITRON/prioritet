<?php
session_start();
include_once "../assets/bd.php";
include_once "../assets/functions.php";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
if (isset($_POST)) {
    $str = "";
    $flag = 0;
    foreach ($_POST AS $key => $value) {
        if ($key == 'id') continue;
        if ($key == 'learning') continue;
        if ($key == 'staff') continue;
        if ($key == 'root') continue;
        if ($flag == 0) {
            $flag = 1;
            $str = keytodb($key);
            $str .= "=";
            $str .= valuetodb($value);
        } else {
            $str .= ", ";
            $str .= keytodb($key);
            $str .= "=";
            $str .= valuetodb($value);
        }
    }
    $query = mysqli_query($connect, "UPDATE ".$_POST["root"]." SET ".$str." WHERE `Id` = ".$_SESSION["user"]["id"].";");
    $ar = array();
    $ar[0] = (isset($_POST["learning"]) && ($_POST["learning"] == 1)) ? 1 : 0;
    $ar[1] = (isset($_POST["staff"]) && ($_POST["staff"] == 1)) ? 1 : 0;
    $query = mysqli_query($connect, "UPDATE `Cathegories` SET `Learning` = ".$ar[0].", `Staff` = ".$ar[1]." WHERE `Id` = ".$_SESSION["user"]["id"].";");
    $_SESSION["user"]["email"] = $_POST["Email"];
    $_SESSION["user"]["name"] = $_POST["Name"];
    $_SESSION["user"]["second_name"] = $_POST["Second_name"];
    $_SESSION["user"]["surname"] = $_POST["Surname"];
} ?><meta http-equiv="refresh" content="0; URL='https://itron.group/prioritet/lk'" />