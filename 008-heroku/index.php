<?php

session_start();

if (!empty($_SESSION['username'])) {
    echo "Здравствуйте, {$_SESSION['username']}!";
    echo '<br /><a href="exit.php" style="text-decoration: none">Очистить</a>';
} else {
    include 'index.html';
}
