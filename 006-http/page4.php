<?php

session_start();

$_SESSION['count'] = isset($_SESSION['count']) ? $_SESSION['count'] : 0;

echo 'Это страница 4' . "<br />";
echo 'Количество открытий страницы 3: ' . $_SESSION['count'];
