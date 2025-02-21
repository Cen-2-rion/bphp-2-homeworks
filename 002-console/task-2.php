<?php

echo "Введите первое число: ";
$num1 = trim(fgets(STDIN));
echo "Введите второе число: ";
$num2 = trim(fgets(STDIN));

if ($num2 == 0) {
    fwrite(STDERR, "Делить на 0" . PHP_EOL);
}
elseif (is_numeric($num1) && is_numeric($num2)) {
    fwrite(STDOUT, "Результат: " . $num1 / $num2 . PHP_EOL);
} else {
    fwrite(STDERR, "Введите, пожалуйста, число" . PHP_EOL);
}
