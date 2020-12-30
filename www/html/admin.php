<?php

require_once '../model/common.php'; 
require_once '../model/upload_image.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if($_POST['action'] ==='insert'){
        $img_name = upload_image($_FILES);
        insert_item($dbh, $_POST['item_name'], $_POST['price'], $img_name, $_POST['status']);
    }
}

//アイテム全件取得
$items = get_all_items($dbh);

include_once '../view/admin_view.php';