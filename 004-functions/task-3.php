<?php
declare(strict_types = 1);

const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_CHANGE = 3;
const OPERATION_QUANTITY = 4;
const OPERATION_PRINT = 5;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_CHANGE => OPERATION_CHANGE . '. Изменить товар из списка покупок.',
    OPERATION_QUANTITY => OPERATION_QUANTITY . '. Добавить количество товара.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];

$items = [];

function getOperationNumber(array $items, array $operations): int
{
    do {
        if (count($items)) {
            echo 'Ваш список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";
        } else {
            echo 'Ваш список покупок пуст.' . PHP_EOL;
        }

        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system('clear');

            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }

    } while (!array_key_exists($operationNumber, $operations));

    return +$operationNumber;
}

 function addItems(array &$items, ? string &$itemName): array
{
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
    return $items;
}

function deleteItems(array &$items, string &$itemName): array
{
    echo 'Текущий список покупок:' . PHP_EOL;
    echo 'Список покупок: ' . PHP_EOL;
    echo implode("\n", $items) . "\n";

    echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
    } else {
        echo 'Данный товар отсутствует в списке товаров!!!' . PHP_EOL;
        echo 'Введите полное наименование товара из списка.' . PHP_EOL;
        echo 'Нажмите enter для продолжения';
        fgets(STDIN);
    }
  
    return $items;
}

function changeItems(array &$items, ? string &$itemName): array
{
    echo 'Текущий список покупок:' . PHP_EOL;
    echo 'Список покупок: ' . PHP_EOL;
    echo implode("\n", $items) . "\n";

    echo 'Введение название товара для замены:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
        echo 'Введение название нового товара:' . PHP_EOL . '> ';
        $itemName = trim(fgets(STDIN));
        $items[] = $itemName;
    } else {
        echo 'Данный товар отсутствует в списке товаров!!!' . PHP_EOL;
        echo 'Введите полное наименование товара из списка.' . PHP_EOL;
        echo 'Нажмите enter для продолжения';
        fgets(STDIN);
    }

    return $items;
}

function quantityItems(array &$items, ? string &$itemName): array
{
    echo "Введение название товара: \n>";
    $itemName = trim(fgets(STDIN));
  
    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
      
        echo "Введение количества едениц товара: \n> ";
        $value = trim(fgets(STDIN));
        $item = $itemName . ' ' . $value . " шт.";
        $items[] = $item;
    } else {
        if (!array_key_exists($itemName, $items)) {

            echo 'Данный товар отсутствует в списке товаров!!!' . PHP_EOL;
            echo 'Нажмите enter для продолжения';
            fgets(STDIN);
        }
    }
    
    return $items;
}

function printItems(array $items): void
{
    echo 'Ваш список покупок: ' . PHP_EOL;
    echo implode(PHP_EOL, $items) . PHP_EOL;
    echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}

do {
    // system('clear');
    system('cls'); // windows

    $operationNumber = getOperationNumber($items, $operations);
    echo 'Выбрана операция: ' . $operations[$operationNumber] . PHP_EOL;
  
    switch ($operationNumber) {
        case OPERATION_ADD:
            addItems($items, $itemName);
            break;

        case OPERATION_DELETE:
            // Проверить, есть ли товары в списке? Если нет, то сказать об этом и попросить ввести другую операцию
            deleteItems($items, $itemName);
            break;

        case OPERATION_CHANGE:
            changeItems($items, $itemName);
            break;

        case OPERATION_QUANTITY:
            quantityItems($items, $itemName);
            break;

        case OPERATION_PRINT:
            printItems($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;
