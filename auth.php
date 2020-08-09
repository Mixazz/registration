<?php
session_start();
require 'functions.php';

//Получаем данные с формы
$email = $_POST['email'];
$password = $_POST['password'];

$login = login($email, $password);

if (!empty($login)) {
    set_flash_message('success', 'Добро пожаловать, вы авторизировались!');
    redirect_to('/list_users.php');
    exit;
}
set_flash_message('danger', 'Неправильный имя пользователь или пароль ');
redirect_to('/login.php');

