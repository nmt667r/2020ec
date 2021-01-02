<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
    </head>
    <body>
        <h1>ログイン</h1>
        <?php foreach ($err_msg as $read) { ?>
            <p><?php print $read; ?></p>
        <?php } ?>
        <form method="POST">
            アカウント名<input type="text" name="account">
            パス<input type="text" name="login_password">
            <input type="submit" name="ログイン">
        </form>
    </body>
</html>
