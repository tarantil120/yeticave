<?php
$link = mysqli_connect('127.0.0.1','root','','yeticave');
mysqli_set_charset($link, utf8);

$sql1 = 'SELECT * FROM category';
$result1 = mysqli_query($link, $sql1);
$array = mysqli_fetch_all($result1, MYSQLI_ASSOC);


$sql2 = 'SELECT id_lot,lot_name,category.name,description,image,start_price FROM lot INNER JOIN category on lot.id_category = category.id_category';
$result2 = mysqli_query($link,$sql2);
$category_info = mysqli_fetch_all($result2,MYSQLI_ASSOC);



