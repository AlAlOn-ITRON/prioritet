<?php
function black_list($s) {
    switch ($s) {
        case "id":
        case "password":
        case "pass":
        case "ava":
        {
            return true;
        }
    }
    return false;
}

function black_list_user($s) {
    switch ($s) {
        case "id":
        case "password":
        case "pass":
        case "type":
        case "created at":
        case "created":
        case "ava":
        {
            return true;
        }
    }
    return false;
}

function notinstr($arr) {
    if (count($arr) == 0) return "";
    $str = "NOT IN (".$arr[0];
    for ($i = 1; $i < count($arr); $i++) {
        $str .= ", ";
        $str .= $arr[$i];
    }
    $str .= ")";
    return $str;
}

function elinarr($el, $arr, $count) {
    for ($i = 0; $i < $count; $i++) {
        if ($el == $arr[$i]) return true;
    }
    return false;
}

function elinarrall($el, $arr) {
    for ($i = 0; $i < count($arr); $i++) {
        if ($el == $arr[$i]) return $i;
    }
    return -1;
}

function arrtostr($arr) {
    if (count($arr) == 0) return "";
    $str = "`".$arr[0]."`";
    for ($i = 1; $i < count($arr); $i++) {
        if (elinarr($arr[$i], $arr, $i)) continue;
        else {
            if ($arr[$i] != "") {
                $str = $str.", `".$arr[$i]."`";
            }
        }
    }
    return $str;
}

function torus($k) {
    switch ($k) {
        case "Type": return "Уровень доступа";
        case "First Name": return "Имя";
        case "Second Name": return "Отчество";
        case "Last Name": return "Фамилия";
        case "Email": return "Электронная почта";
        case "Birthday": return "День рождения";
        case "Phone": return "Телефон";
        case "Address Street": return "Улица, дом";
        case "Address City": return "Город";
        case "Address Zip": return "Индекс";
        case "Address Country": return "Страна";
        case "Created At": return "Аккаунт создан";
        case "Company": return "Компания";
        case "Status": return "Должность";
        case "TIN": return "ИНН";
        case "SSN": return "СНИЛС";
        case "Passport Num": return "Серия и номер паспорта";
        case "Passport String": return "Кем выдан";
        case "Name": return "Имя курса";
        case "Id_course": return "Номер курса";
        default: return $k;
    }
}

function keytodb($str) {
    $str = "`".$str."`";
    return $str;
}

function valuetodb($str) {
    if ($str == '') return "''";
    else {
        if (is_numeric($str)) return $str;
        else return "'".$str."'";
    }
}

function for_sort($str, &$arr, &$return) {
    $i = elinarrall($str, $arr);
    $return[] = $str;
    if ($i != -1) {
        unset ($arr[$i]);
    }
}

function sort1($arr) {
    $return = array();
    for_sort('First Name', $arr, $return);
    for_sort('Second Name', $arr, $return);
    for_sort('Last Name', $arr, $return);
    for_sort('Phone', $arr, $return);
    for_sort('Birthday', $arr, $return);
    for_sort('Email', $arr, $return);
    for_sort('Address Country', $arr, $return);
    for_sort('Address City', $arr, $return);
    for_sort('Address Zip', $arr, $return);
    for_sort('Address Street', $arr, $return);
    for_sort('Company', $arr, $return);
    for_sort('Status', $arr, $return);
    for_sort('TIN', $arr, $return);
    for_sort('SSN', $arr, $return);
    for_sort('Passport Num', $arr, $return);
    for_sort('Passport String', $arr, $return);
    return $return;
}