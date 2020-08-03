<?php
include_once "../assets/bd.php";
$query = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(`Email`) FROM `Required` WHERE `Email` = '".$_POST["email"]."';"))[0];
if ($query > 0) {
    ?><meta http-equiv="refresh" content="0; URL='https://itron.group/prioritet/register?wrong=wrong_email&surname=<?php echo $_POST["surname"];?>&name=<?php echo $_POST["name"];?>&second_name=<?php echo $_POST["second_name"];?>&phone=<?php echo $_POST["phone"];?>&company=<?php echo $_POST["company"];?>'" /><?php
} else {
    if ($_POST["pass1"] !== $_POST["pass2"]) {
        ?><meta http-equiv="refresh" content="0; URL='https://itron.group/prioritet/register?wrong=wrong_pass&surname=<?php echo $_POST["surname"];?>&name=<?php echo $_POST["name"];?>&second_name=<?php echo $_POST["second_name"];?>&email=<?php echo $_POST["email"];?>&phone=<?php echo $_POST["phone"];?>&company=<?php echo $_POST["company"];?>'" /><?php
    } else {
        $query = mysqli_query($connect, "INSERT INTO `Required` VALUES (DEFAULT,'".$_POST["name"]."','".$_POST["second_name"]."','".$_POST["surname"]."', '".$_POST["phone"]."','".strtolower($_POST["email"])."', '', '".md5($_POST["email"].$_POST["pass1"]."!")."','".$_POST["birthday"]."', 0);");
        ?><meta http-equiv="refresh" content="0; URL='https://itron.group/prioritet/enter'" /><?php
    }
}