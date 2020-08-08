<?php
session_start();
require 'functions.php';
$email = $_POST['email'];
$password = $_POST['password'];

$user = get_user_by_email($email);

if (!empty($user)) {
    set_flash_message('danger', 'Этот эл. адрес уже занят другим пользователем.');
    redirect_to('/');
    exit;
}

add_user($email, $password);

set_flash_message('success', 'Регистрация успешна');
redirect_to('/login.php');

// Получаем данные из формы ++
// Проверяем есть ли введенный email в базе данных ++
// Если есть возвращаем пользователя на форму и выводим сообщение об этом ++
// Если нет то сохраняем в базу и подготавливаем сообщение о успешной регистрации ++
//  Переводим на страницу логина и выводим сообщение о успешной регистрации ++
