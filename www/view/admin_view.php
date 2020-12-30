<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>商品管理一覧</title>
    </head>
    <body>
        <h1>商品管理一覧</h1>
        <?php foreach ($items as $item) { ?>
            <p><?php print $item['name']; print $item['price']; print $item['create_datetime'];?></p>
        <?php } ?>

        <form method="post" enctype="multipart/form-data">
            <input type="text" name="item_name" id="name">
            <input type="text" name="price">
            <input type="file" name="img" id="image">
            <select name="status" id="status">
                <option value="close">非公開</option>
                <option value="open">公開</option>                
            </select>
            <input type="submit" value="商品追加">
            <input type="hidden" name="action" value="insert">
        </form>
    </body>
</html>
