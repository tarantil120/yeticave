<?php
require_once "functions.php";
require_once "data.php";

$page_content = include_template('403.php', ['array' => $array, 'category_info'=>$category_info]);
$layout_content = include_template('layout.php', [
    'main' => $page_content,
    'array' => $array,
    'title' => '403 error'
]);
print($layout_content);
