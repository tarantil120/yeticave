<?php
require_once "functions.php";
require_once "data.php";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $email = $_POST['email'];
    $password=$_POST['password'];
    $errors = array();
    $e =0;
    foreach ($_POST as $index=>$value)
    {
        if($value==="")
        {
            $errors[$index]="Введите $index";
            $e=1;
        }
        else
        {
            $errors[$index]=0;
        }
    }
    $query = "SELECT user_name,password,avatar from user where email='$email'";
    $result = mysqli_query($link,$query);
    if($result->num_rows===0 && $errors['email']===0)
    {
        $errors['email']="Пользователь с такой почтой не найден";
        $e=1;
    }
    $user = $result->fetch_array();
    if(!password_verify($password,$user['password']) && $errors['password']===0)
    {
        $errors['password']="Неверный пароль";
        $e=1;
    }
    if(!$e)
    {
        $user_name = $user['user_name'];
        $avatar = $user['avatar'];
        setcookie('user_name',$user_name);
        setcookie('avatar', $avatar);
        header("location:index.php");
    }
    else
    {
        $main_page = include_template('login.php', ['array'=>$array,'categories' => $categories, "errors"=>$errors]);
        print_r(
            include_template(
                "layout.php",
                ['main' => $main_page,
                    'array' => $array,
                    'title' => 'Авторизация']
            )
        );
    }
}
else
{

    $main_page = include_template('login.php', ['array'=>$array,'categories' => $categories]);
    print_r(
        include_template(
            "layout.php",
            ['main' => $main_page,
                'array' => $array,
                'title' => 'Авторизация']
        )
    );
}

