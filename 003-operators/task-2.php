<?php

echo "Введите фамилию: ";
$surname = trim(fgets(STDIN));
echo "Введите имя: ";
$firstName = trim(fgets(STDIN));
echo "Введите отчество: ";
$lastName = trim(fgets(STDIN));

$fullName = mb_convert_case($surname . ' ' . $firstName . ' ' . $lastName, MB_CASE_TITLE, "UTF-8");
$fio = mb_convert_case(mb_substr($surname, 0, 1) . mb_substr($firstName, 0, 1) . mb_substr($lastName, 0, 1), MB_CASE_UPPER, "UTF-8");
$surnameAndInitials = mb_convert_case(($surname), MB_CASE_TITLE, "UTF-8") . ' ' . mb_strtoupper(mb_substr($firstName, 0, 1) . '.' . mb_substr($lastName, 0, 1) . '.', "UTF-8");

fwrite(STDOUT, "Полное имя: " . $fullName . PHP_EOL);
fwrite(STDOUT, "Фамилия и инициалы: " . $surnameAndInitials . PHP_EOL);
fwrite(STDOUT, "Аббревиатура: " . $fio . "\\" . PHP_EOL);
