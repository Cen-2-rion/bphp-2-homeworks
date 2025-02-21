<?php

session_start();

$_SESSION['username'] = $_POST['user_name'];
header('Location: index.php');
