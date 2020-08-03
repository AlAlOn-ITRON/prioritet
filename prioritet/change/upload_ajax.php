<?php
session_start();
include "../assets/bd.php";
$file = @$_FILES['file'];
$error = $success = '';

// Разрешенные расширения файлов.
$allow = array('jpg', 'jpeg', 'png', 'gif');

// Директория, куда будут загружаться файлы.
$path = $_SERVER["DOCUMENT_ROOT"] . '/prioritet/uploads/';

if (!empty($file)) {
    // Проверим на ошибки загрузки.
    if (!empty($file['error']) || empty($file['tmp_name'])) {
        switch (@$file['error']) {
            case 1:
            case 2: $error = 'Превышен размер загружаемого файла.'; break;
            case 3: $error = 'Файл был получен только частично.'; break;
            case 4: $error = 'Файл не был загружен.'; break;
            case 6: $error = 'Файл не загружен - отсутствует временная директория.'; break;
            case 7: $error = 'Не удалось записать файл на диск.'; break;
            case 8: $error = 'PHP-расширение остановило загрузку файла.'; break;
            case 9: $error = 'Файл не был загружен - директория не существует.'; break;
            case 10: $error = 'Превышен максимально допустимый размер файла.'; break;
            case 11: $error = 'Данный тип файла запрещен.'; break;
            case 12: $error = 'Ошибка при копировании файла.'; break;
            default: $error = 'Файл не был загружен - неизвестная ошибка.'; break;
        }
    } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
    } else {
        // Оставляем в имени файла только буквы, цифры и некоторые символы.

        $pattern = "[^a-zа-яё0-9,~!@#%^-_$\?\(\)\{\}\[\]\.]";
        $name = mb_eregi_replace($pattern, '-', $file['name']);
        $name = mb_ereg_replace('[-]+', '-', $name);
        $name = mb_ereg_replace('.*\.', 'ava_'.$_SESSION["user"]["id"].".", $name);
        $parts = pathinfo($name);
        if (empty($name) || empty($parts['filename'])) {
        } elseif(!in_array(explode('.', $file["name"])[1], $allow)) {
        } else {
            // Перемещаем файл в директорию.
            if (move_uploaded_file($file['tmp_name'], $path . $name)) {
                // Далее можно сохранить название файла в БД и т.п.
                $query = mysqli_query($connect, "UPDATE `Required` SET `Photo` = '".$name."' WHERE `Id` = ".$_SESSION["user"]["id"].";");
                echo $name;
            }
        }
    }

}