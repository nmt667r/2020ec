<?php 

require_once '../model/common.php'; 


if(!empty($_SESSION['ec_name'])){
    var_dump($_SESSION['ec_name']);
} else {
    require_once '../view/login_view.php';
    exit;
}

?>