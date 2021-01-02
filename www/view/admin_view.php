<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品管理一覧</title>
    </head>
    <body>
        <h1>商品管理一覧</h1>
        <?php foreach ($err_msg as $read) { ?>
            <p><?php print $read; ?></p>
        <?php } ?>

        <form method="post" enctype="multipart/form-data">
            名前：<input type="text" name="item_name" id="name">
            価格：<input type="text" name="price">
            個数：<input type="text" name="stock">
            画像：<input type="file" name="img" id="image">
            <select name="status" id="status">
                <option value="close">非公開</option>
                <option value="open">公開</option>                
            </select>
            <input type="submit" value="商品追加">
            <input type="hidden" name="action" value="insert">
        </form>

        <?php foreach ($items as $item) { ?>
            <h4><?php print $item['name'];?></h4>
            <p><?php print $item['price'];?>円</p>
            <p><?php print $item['stock']; ?>個</p>
            <!-- <p><img src="<?php print ITEMS_IMG_DIR . $item['img']; ?>"></p> -->
            <p>作成日時：<?php print $item['create_datetime'];?></p>
            <form method="post">
                <input type="submit" value="商品削除">
                <input type="hidden" name="img" value="<?php print $item['img']; ?>">
                <input type="hidden" name="item_id" value="<?php print $item['id']; ?>">
                <input type="hidden" name="action" value="delete">
            </form>
        <?php } ?>

    </body>
</html>
