<?php 

require_once '../model/common.php'; 
require_once '../model/items.php'; 

$err_msg = [];

//テストの為にあえてアイテム一覧を表示
$items = get_active_items($dbh);
include_once '../view/itemlist_view.php';