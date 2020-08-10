<?php
session_start();
require 'functions.php';
if (empty($_SESSION['login'])) {
    redirect_to('/login.php');
    exit();
}

display_flash_message('success');
$login = $_SESSION['login'];
echo "Данные страници для пользователя - $login";
