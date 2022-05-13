<?php
$is_auth = rand(0, 1);

$user_name = 'tarantil120';
$array = array(
    array("Category"=>"Доски и лыжи","Image"=>"boards"),
    array("Category"=>"Крепления","Image"=>"attachment"),
    array("Category"=>"Ботинки","Image"=>"boots"),
    array("Category"=>"Одежда","Image"=>"clothing"),
    array("Category"=>"Инструменты","Image"=>"tools"),
    array("Category"=>"Разное","Image"=>"other")
);

$category_info = array(
    array("Title"=>"2014 Rossignol District Snowboard", "Category"=>"Доски и лыжи","Price"=>"10999","Image URL"=>"img/lot-1.jpg"),
    array("Title"=>"DC Ply Mens 2016/2017 Snowboard","Category"=>"Доски и лыжи","Price"=>"159999","Image URL"=>"img/lot-2.jpg"),
    array("Title"=>"Крепления Union Contact Pro 2015 года размер L/XL","Category"=>"Крепления","Price"=>"8000","Image URL"=>"img/lot-3.jpg"),
    array("Title"=>"Ботинки для сноуборда DC Mutiny Charocal","Category"=>"Ботинки","Price"=>"10999","Image URL"=>"img/lot-4.jpg"),
    array("Title"=>"Куртка для сноуборда DC Mutiny Charocal","Category"=>"Одежда","Price"=>"7500","Image URL"=>"img/lot-5.jpg"),
    array("Title"=>"Маска Oakley Canopy","Category"=>"Разное","Price"=>"5400","Image URL"=>"img/lot-6.jpg")
);

function sub_format ($number){
    $number = ceil($number);
    if($number<1000){
        $result = $number;
    }
    else{
        $result = number_format($number,0,","," ");
    }
    return $result.'<b class="rub">р</b>';
}

function timer (){
    $present = new DateTime('now');
    $future = new DateTime('24:00:00');
    $interval = $present->diff($future);
    return $interval->format('%h:%i');
}

function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}
?>
