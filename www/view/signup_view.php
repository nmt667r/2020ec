<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>ユーザー新規登録</title>
    </head>
    <body>
        <h1>ユーザー新規登録</h1>
        <?php foreach ($err_msg as $read) { ?>
            <p><?php print $read; ?></p>
        <?php } ?>
        <form method="POST">
            アカウント名<input type="text" name="account">
            ユーザー名<input type="text" name="name">
            パスワード<input type="text" name="password">
            パスワード確認<input type="text" name="password_confirm">
            <input type="submit" name="ログイン">
        </form>
    </body>
</html>