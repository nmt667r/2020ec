<?php 

require_once '../model/common.php'; 
require_once '../model/items.php'; 

$err_msg = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //セッションからユーザーIDを取得
    $add_user_id = $_SESSION[SESSION_EC_ID];
    //カートに重複アイテムが無いかチェック
    $cart = find_already_item($dbh, $add_user_id, $_POST['item_id']);
    var_dump($cart);
    if($cart['id'] !== null){
        //重複アイテムの個数を更新
        $amount = $cart['amount'] + $_POST['amount'];
        update_cart($dbh, $cart['id'], $amount);
    } else {
        //カートに新規で追加
        add_cart($dbh, $add_user_id, $_POST['item_id'], $_POST['amount']);
    }        
}

//テストの為にあえてアイテム一覧を表示
$items = get_active_items($dbh);
include_once '../view/itemlist_view.php';