<?php
require_once "functions.php";
require_once "data.php";

$page_content = include_template('add.php', ['array' => $array, 'category_info'=>$category_info]);
$layout_content = include_template('layout.php', [
    'main' => $page_content,
    'array' => $array,
    'title' => 'Добавление лота'
]);

if($_SERVER['REQUEST_METHOD']=='POST') {
    $lot_name = $_POST["lot-name"];
    $category = $_POST["category"];
    $description = $_POST["message"];
    $image = 'img/'. $_FILES['image']['name'];
    print_r($image);
    $start_price = $_POST["lot-rate"];
    $step_price = $_POST["lot-step"];
    $date_end = $_POST["lot-date"];
    $query_category = "SELECT id_category from category where name ='$category'";
    $query = "INSERT INTO lot (id_lot,id_user,id_category,id_winner,creation_date,lot_name,description,image,start_price,date_end,step_price)
    VALUES (NULL,1,($query_category),NULL,now(),'$lot_name','$description ','$image',$start_price,'$date_end',$step_price)";
    $link = mysqli_connect('127.0.0.1','root','','yeticave');
    mysqli_set_charset($link, utf8);
    $result4 = mysqli_query($link,$query);
    $result5 = move_uploaded_file($_FILES['image']['tmp_name'],'C:/OpenServer/domains/yeticave/img'. $_FILES['image']['name']);
    print_r($result5);

}

function is_empty($lot,$lot2,$lot3,$lot4,$lot5,$lot6){
    if(empty($_POST[$lot]) || empty($_POST[$lot2]) || empty($_POST[$lot3]) || empty($_POST[$lot4]) || empty($_POST[$lot5]) || empty($_POST[$lot6])){
        $form_name = "form--invalid";
    }
    else{
        $form_name = "";
    }
    return $form_name;
}

function is_empty2($lot){
    if(empty($_POST[$lot])){
        $form_name2 = "form__item--invalid";
    }
    else{
        $form_name2 = "";
    }
    return $form_name2;
}

function type_int_empty($lot1)
{
    settype($_POST[$lot1],"integer");
    if (!is_int($_POST[$lot1]) ||empty($_POST[$lot1])) {
        return "form__item--invalid";
    }
    else{
        return "";
    }
}



print($layout_content);
