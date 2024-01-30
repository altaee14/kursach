<?php
//Безопасность
define('SEC', 1);
define('PATH', __DIR__);

//Создание сессии
session_start();




$path = explode("\\", PATH);

define('PROJECT', end($path));

//Соединение с БД
include PATH.'/config.php';

//Выход
if($_REQUEST['action'] === 'logout'){
    unset($_SESSION['login']);
    unset($_SESSION['password']);

    die(header('location:/'.PROJECT.'/?path=forum&message=reg_success'));
}


//Форум
if(!$_REQUEST['page'] || $_REQUEST['page'] === 'forum'){
    include PATH.'/forum.php';
    exit;
}

//Тема
if(!$_REQUEST['page'] || $_REQUEST['page'] === 'topic'){
    include PATH.'/topic.php';
    exit;
}

//Регистрация
if($_REQUEST['page'] === 'registration'){
    include PATH.'/registrarion.php';
    exit;
}

//Авторизация
if($_REQUEST['page'] === 'auth'){
    include PATH.'/auth.php';
    exit;
}

//Пустая страница
if(!$_REQUEST['page'] == ''){
    include PATH.'/forum.php';
    exit;
}
?>




