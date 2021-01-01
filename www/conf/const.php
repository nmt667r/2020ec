<?php


define('DB_HOST', 'mysql');
define('DB_NAME', '2020ec');
define('DB_USER', 'testuser');
define('DB_PASSWD', 'password');
define('DB_CHARSET', 'utf8');

define('HOME_PATH', './home.php');
define('LOGIN_PATH', './login.php');

define('ITEMS_IMG_DIR', '../view/items_image/');

define('ITEM_NAME_LENGTH_MAX', 30);
define('ITEM_PRICE_MAX', 100000000);
define('ITEM_STOCK_MAX', 100000);

define('HALF_SPACE', '/^[ ]+$/' );
define('ALL_SPACE' , '/^[　]+$/');
define('REGEXP_ALPHANUMERIC', '/\A[0-9a-zA-Z]+\z/');
define('REGEXP_POSITIVE_INTEGER', '/\A([1-9][0-9]*|0)\z/');
define('REGEXP_NUMBER', '/^[0-9]+$/');

define('PERMITTED_ITEM_STATUSES', array(
    'open' => 1,
    'close' => 0,
));

?>