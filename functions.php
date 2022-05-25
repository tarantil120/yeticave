<?php
session_start();
function include_template($name, $data) {
    $is_auth = isset($_SESSION['user_name']);
    $user_name = $_SESSION['user_name']??"";
    $avatar = $_SESSION['avatar']??"";
    $data['is_auth'] = $is_auth;
    $data['user_name']=$user_name;
    $data['avatar'] = $avatar;
    $name = 'templates/'.$name;
    $result = '!!!';
    if(!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require($name);
    $result = ob_get_clean();
    return $result;
}

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
    if($interval ->format('%i')<10){
        return $interval->format('%h:0%i');
    }
    else {
        return $interval->format('%h:%i');
    }
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

