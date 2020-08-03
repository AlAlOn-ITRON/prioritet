<?php
$connect = mysqli_connect("localhost", "u0895087_default", "L9be_z6l", "u0895087_prioritet")or die ('Нет связи с Базой Данных');;
mysqli_query($connect, "SET NAMES utf8");