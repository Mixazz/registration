<?php

function get_user_by_email($email)
{
    // Получает емаил и проверяет его в базе и выводит массив
    require 'configDB.php';
    $sql = 'SELECT * FROM users WHERE login = ?';
    $query = $pdo->prepare($sql);
    $query->execute([$email]);
    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
};

function add_user($email, $password)
{
    //Получает емейл и пароль, добавляет в базу
    // Возвращает user_id (int)
    require 'configDB.php';
    $sql = 'INSERT INTO users (login, password) VALUES (:login, :password)';
    $query = $pdo->prepare($sql);
    $query->execute([
        "login" => $email,
        "password" => password_hash($password, PASSWORD_DEFAULT)
    ]);

    return $pdo->lastInsertId();
};

function set_flash_message($name, $message)
{
    // name - ключ, message - значение, текст сообщения
    // Подготавливает флеш сообщение
    // Возврящает null
    $_SESSION[$name] = $message;
};

function display_flash_message($name)
{
    // name - ключ
    // Выводит флеш сообщение
    // Возвращает null
    if (isset($_SESSION[$name])) {
        echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
        unset($_SESSION[$name]);
    }
}

function redirect_to($path)
{
    // Получает путь
    // Перенаправляет на другую страницу
    header('Location: ' . $path);
}

function login($email, $password)
{
    $user = get_user_by_email($email);

    if (!empty($user)) {
        if (password_verify($password, $user['password'])) {
            set_flash_message('success', 'Добро пожаловать, вы авторизировались!');
            $_SESSION['login'] = $email;
            return true;
        }
    }
    set_flash_message('danger', 'Неверный логин или пароль');
    return false;
};
