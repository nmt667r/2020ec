<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品一覧</title>
    </head>
    <body>
        <h1>商品一覧</h1>
        <?php foreach ($err_msg as $read) { ?>
            <p><?php print $read; ?></p>
        <?php } ?>

        <?php foreach ($items as $item) { ?>
            <h4><?php print $item['name'];?></h4>
            <p><?php print $item['price'];?>円</p>
            <p><?php print $item['stock']; ?>個</p>
            <!-- <p><img src="<?php print ITEMS_IMG_DIR . $item['img']; ?>"></p> -->
            <p>作成日時：<?php print $item['create_datetime'];?></p>
            <form action="./cart.php" method="post">
                <input type="submit" value="カートに追加">
                <input type="hidden" name="amount" value="1"> 
                <input type="hidden" name="item_id" value="<?php print $item['id']?>">
                <input type="hidden" name="action" value="insert">   
            </form>
        <?php } ?>

    </body>
</html>