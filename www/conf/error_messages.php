<?php

//ログイン画面用
define('EMPTY_NAME', '名前を入力してください');
define('LENGTH_MIN_NAME', '名前は6文字以上で入力してください');
define('LENGTH_MAX_NAME', '名前は20文字以下で入力してください');
define('EMPTY_PASSWORD', 'パスワードを入力してください');
define('FAILED_LOGIN', '名前またはパスワードが間違っています');

//商品管理画面用
define('EMPTY_ITEM_NAME',         '商品名を入力してください');
define('EXCESS_LENGTH_ITEM_NAME', '商品名は以下で入力してください'); //ITEM_NAME_LENGTH_MAXが桁数指定
define('REGEXP_SPACE_ONLY_NAME',  '商品名はスペースのみで登録することができません。');
define('EMPTY_PRICE',         '価格を入力してください');
define('ILLEGAL_VALUE_PRICE', '価格の値が正しくありません');
define('OVER_LENGTH_PRICE',   '価格は1億円以下で入力してください');
define('EMPTY_STOCK',          '個数を入力してください');
define('ILLEGAL_VALUE_STOCK',  '個数の値が正しくありません。');
define('OVER_LENGTH_STOCK',    '個数は～未満で入力してください');
define('EMPTY_FILE',          'ファイルを選択してください。');
define('ILLEGAL_FILE_FORMAT', 'ファイル形式が異なります。画像ファイルはJPEGもしくはPNGのみ利用可能です');



?>