CREATE TABLE `history` (
 `order_id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `details` (
 `details_id` int(11) NOT NULL AUTO_INCREMENT,
 `order_id` int(11) NOT NULL,
 `amount` int(11) NOT NULL,
 `Selling_price` int(11) NOT NULL,
 `item_id` int(11) NOT NULL,
 PRIMARY KEY (`details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8