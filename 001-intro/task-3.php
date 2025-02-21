<?php

//$variable = 1;
$variable = 'one';
//$variable = true;
//$variable = 3.14;
//$variable = null;
//$variable = [];

if (is_bool($variable)) {
    $type = "bool";
    echo "type is $type";
}
elseif (is_float($variable)) {
    $type = "float";
    echo "type is $type";
}
elseif (is_int($variable)) {
    $type = "int";
    echo "type is $type";
}
elseif (is_string($variable)) {
    $type = "string";
    echo "type is $type";
}
elseif (is_null($variable)){
    $type = "null";
    echo "type is $type";
} else {
    $type = "other";
    echo "type is $type";
}
echo "\n";

// Дополнительное задание:

switch (true) {
    case is_bool($variable):
        $type = "bool";
        echo "type is $type";
        break;
    case is_float($variable):
        $type = "float";
        echo "type is $type";
        break;
    case is_int($variable):
        $type = "int";
        echo "type is $type";
        break;
    case is_string($variable):
        $type = "string";
        echo "type is $type";
        break;
    case is_null($variable):
        $type = "null";
        echo "type is $type";
        break;
    default:
        $type = "other";
        echo "type is $type";
}
