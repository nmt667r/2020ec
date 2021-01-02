<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>カート</title>
    </head>
    <body>
        <h1>カート</h1>
        <?php foreach ($err_msg as $read) { ?>
            <p><?php print $read; ?></p>
        <?php } ?>
        
        <?php if($carts !== NULL){ ?>        
            <?php foreach ($carts as $cart) { ?>
                <h4><?php print $cart['name'];?></h4>
                <p><?php print $cart['price'];?>円</p>
                <p><?php print $cart['amount']; ?>個</p>
                <p>小計：<?php print $cart['amount'] * $cart['price']; ?>円</p>
                <!-- <p><img src="<?php print ITEMS_IMG_DIR . $cart['img']; ?>"></p> -->
                <p>更新日時：<?php print $cart['update_datetime'];?></p>
                <form method="post">
                    <input type="submit" value="カートから削除">
                    <input type="hidden" name="item_id" value="<?php print $cart['item_id']; ?>"> 
                    <input type="hidden" name="action" value="delete">
                </form>           
                <?php $total = $total + $cart['amount'] * $cart['price'];?>
            <?php } ?>
            <h4>合計：<?php print $total?>円</h4>
            <form method="post">
                <input type="submit" value="購入">  
                <input type="hidden" name="action" value="buy">
            </form>
        <?php } else { ?>
            <p>カート内にアイテムがありません。</p>
        <?php } ?>
    </body>
</html>