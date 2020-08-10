<?php
session_start();
require 'functions.php';

//Получаем данные с формы
$email = $_POST['email'];
$password = $_POST['password'];

$login = login($email, $password);

if (!empty($login)) {
    redirect_to('/list_users.php');
    exit;
}

redirect_to('/login.php');
