<?php

$upload_dir = 'upload/'; // директория куда сохранится файл, относительный путь

if (!empty($_FILES['content']) && !empty($_POST['file_name'])) { // проверка, если поле выбора файла и имени не пустое
    $upload_file = $upload_dir . $_POST['file_name']; // путь до сохранённого файла
    $size = $_FILES['content']['size']; // нахождение размера в байтах
    $ext = pathinfo($_FILES['content']['name'], PATHINFO_EXTENSION); // расширение сохраняемого файла
    if (move_uploaded_file($_FILES['content']['tmp_name'], $upload_file . '.' . $ext)) { // перемещение временного файла
        echo 'Файл успешно загружен. Путь: ' . $upload_file . '.' . $ext . ' Размер: ' . $size . ' байт' . PHP_EOL;
        exit;
    }
}
header('Location: index.html');
