<?php 

require_once '../model/common.php'; 
require_once '../model/items.php'; 

$err_msg = [];
$total = 0;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //セッションからユーザーIDを取得
    $user_id = $_SESSION[SESSION_EC_ID];
    if($_POST['action'] ==='insert'){
        $find_item = find_item_by_id($dbh, $_POST['item_id']);        
        //カートに重複アイテムが無いかチェック
        $cart = find_already_item($dbh, $user_id, $_POST['item_id']);
        if($cart['id'] !== null){
            //重複アイテムの個数を更新
            $amount = $cart['amount'] + $_POST['amount'];
            if(empty($err_msg = stock_check_item($find_item['stock'], $amount))){
                update_cart($dbh, $cart['id'], $amount);
                $carts = get_user_cart($dbh, $user_id);
                include_once '../view/cart_view.php';
                exit;
            }        
        } else {
            if(empty($err_msg = stock_check_item($find_item['stock'], $_POST['amount']))){
                //カートに新規で追加
                add_cart($dbh, $user_id, $_POST['item_id'], $_POST['amount']);
                $carts = get_user_cart($dbh, $user_id);
                include_once '../view/cart_view.php';
                exit;
            }
        }
    } else if($_POST['action'] ==='buy'){
        $carts = get_user_cart($dbh, $user_id);
        buy_item($dbh, $user_id, $carts);       
        header('Location: itemlist.php');
        exit;
    } else if($_POST['action'] ==='delete'){
        delete_cart_item($dbh, $user_id, $_POST['item_id']);        
    }   
}

$cart = get_user_cart($dbh, $user_id);
include_once '../view/cart_view.php';
exit;