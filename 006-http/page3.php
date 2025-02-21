<?php

session_start();

$_SESSION['count'] = isset($_SESSION['count']) ? ++$_SESSION['count'] : 1;
if ($_SESSION['count'] > 3) {
    header('Location: page4.php');
}
echo 'Это страница 3' . "<br />";
echo 'Количество открытий страницы 3: ' . $_SESSION['count'];
