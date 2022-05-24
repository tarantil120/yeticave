<?php
require_once "functions.php";
require_once "data.php";

$form_name3 = "Введите пароль";
$form_name4 = "";

if($_SERVER['REQUEST_METHOD']=='POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $sql3 = "SELECT id_user,email,password from users WHERE email='$email'";
    $result1 = mysqli_query($link, $sql3);
    $info_users = mysqli_fetch_all($result1, MYSQLI_ASSOC);

    foreach ($info_users as $info) {
        if ($info["email"] == $email && $info["password"] == $password) {
            session_start();
            $user_name = "SELECT name FROM users WHERE email = '$email'";
            header("Location:index.php");
        } else if ($password != $info["password"]) {
            $form_name4 = "form__item--invalid";
            $form_name3 = 'Вы неверно ввели пароль!';
        }
    }

    $page_content = include_template('login.php', ['array' => $array, 'category_info' => $category_info, 'info_users' => $info_users, 'form_name3' => $form_name3
    , 'form_name4'=>$form_name4]);
    $layout_content = include_template('layout.php', [
        'main' => $page_content,
        'array' => $array,
        'title' => 'Авторизация'
    ]);
}
$page_content = include_template('login.php', ['array' => $array, 'category_info' => $category_info, 'info_users' => $info_users, 'form_name3' => $form_name3
    , 'form_name4'=>$form_name4]);
$layout_content = include_template('layout.php', [
    'main' => $page_content,
    'array' => $array,
    'title' => 'Авторизация'
]);
function is_empty1($email,$password){
    if(empty($_POST[$email]) || empty($_POST[$password])){
        $form_name1 = "form--invalid";
    }
    else{
        $form_name1 = "";
    }
    return $form_name1;
}
function is_empty2($pass){
    if(empty($_POST[$pass])){
        $form_name2 = "form__item--invalid";
    }
    else{
        $form_name2 = "";
    }
    return $form_name2;
}

function isAuth() {
    if (isset($_SESSION["is_auth"])) {
        return $_SESSION["is_auth"];
    }
    else {
        $email = $_POST["email"];
        return false;
    }
}

print($layout_content);

