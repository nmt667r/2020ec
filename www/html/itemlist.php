<?php

require_once '../model/common.php'; 
require_once '../model/items.php'; 

//アイテム全件取得
$items = get_all_items($dbh);

$err_msg = [];

include_once '../view/itemlist_view.php';