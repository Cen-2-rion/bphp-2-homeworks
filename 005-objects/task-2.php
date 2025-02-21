<?php

$date = new DateTime(date('Y-m-01')); // создаём объект даты

function isWorkDay($date) {
    $day_week = $date->format('N'); // находим номер дня недели от 1(пн.) до 7(вс.)
    if ($day_week > 5) { // если выпадает на выходной
        echo "\033[31m {$date->format('Y-m-d')} \033[0m" . PHP_EOL; // выделяем дату красным
        $shift = 8 - $day_week; // определяем кол-во дней для сдвига
        return $date->modify("+{$shift} day"); // возвращаем изменённую дату
    } else {
        echo "\033[32m {$date->format('Y-m-d')} \033[0m" . PHP_EOL; // выделяем дату зелёным
        return $date->modify('+3 day'); // если не выходной, сдвигаем дату
    }
}

$time = new DateTime('+1day'); // кол-во для расчёта
while ($date < $time) {
    $date = isWorkDay($date);
}
