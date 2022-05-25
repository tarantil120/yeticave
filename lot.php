<?php
require_once "functions.php";
require_once "data.php";


if(isset($_GET["id_lot"])){
    $id = $_GET["id_lot"];
    $sql3 = 'SELECT id_lot,lot_name,category.name,description,image,start_price FROM lot INNER JOIN category on lot.id_category = category.id_category WHERE id_lot ='.$id;
    $result3 = mysqli_query($link,$sql3);
    $lot_site = mysqli_fetch_array($result3,MYSQLI_ASSOC);
    $page_content = include_template('lot.php', ['array' => $array, 'category_info'=>$category_info , 'lot_site'=>$lot_site]);
    $layout_content = include_template('layout.php', [
        'main' => $page_content,
        'array' => $array,
        'title' => $lot_site["lot_name"]
    ]);
    if($lot_site["id_lot"] != $id ){
        header("Location: 404.php");
    }
    else {
        print($layout_content);
    }
}


?>


