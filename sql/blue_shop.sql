DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id`	integer	NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`user_id`	varchar(12)	UNIQUE NOT NULL,
	`password`	varchar(255)	NOT NULL,
	`name`	varchar(6)	NOT NULL,
	`email`	varchar(255)	UNIQUE NULL,
	`mobile_phone`	varchar(255)	UNIQUE NULL,
	`address`	varchar(255) NULL,
	`point`	decimal(7,0)	NULL DEFAULT 200000
);

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
	`id`	integer	NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name`	varchar(255)	NULL,
	`price`	decimal(7,0)	NULL,
	`stock`	integer	NULL	DEFAULT 99,
	`image`	varchar(255)	NULL,
	`category_id`	integer	NOT NULL
);

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
	`id`	integer	NOT NULL PRIMARY KEY AUTO_INCREMENT,
	`name`	varchar(255)	NULL
);

ALTER TABLE `products` ADD CONSTRAINT `FK_categories_TO_products_1` FOREIGN KEY (
	`category_id`
)
REFERENCES `categories` (
	`id`
);

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);

-- Insert Dummy Data
INSERT INTO categories (name) VALUES ('fashion');
INSERT INTO categories (name) VALUES ('food');
INSERT INTO categories (name) VALUES ('digital');

-- fashion products
-- INSERT INTO products (name, price, image, category_id) VALUES ('AIRism코튼스트라이프T(5부)', 16900, '1.avif', 1);
-- INSERT INTO products (name, price, image, category_id) VALUES ('DRY-EX탱크탑', 16900, '2.avif', 1);
-- INSERT INTO products (name, price, image, category_id) VALUES ('감탄셔츠재킷(울라이크)', 16900, '3.avif', 1);
-- INSERT INTO products (name, price, image, category_id) VALUES ('옥스포드스트라이프셔츠(긴팔)', 16900, '4.avif', 1);
-- INSERT INTO products (name, price, image, category_id) VALUES ('울트라스트레치DRY-EX UV PROTECTION프린트풀집파카(긴팔)', 16900, '5.avif', 1);
-- INSERT INTO products (name, price, image, category_id) VALUES ('유틸리티재킷(데님)', 16900, '6.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 1', 16900, '1.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 2', 16900, '2.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 3', 16900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 4', 16900, '4.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 5', 16900, '5.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 6', 16900, '6.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 7', 26900, '1.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 8', 26900, '2.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 9', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 10', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 11', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 12', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 13', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 14', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 15', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 16', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 17', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 18', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 19', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 20', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 21', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 22', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 23', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 24', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 25', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 26', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 27', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 28', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 29', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 30', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 31', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 32', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 33', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 34', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 35', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 36', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 37', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 38', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 39', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 40', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 41', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 42', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 43', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 44', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 45', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 46', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 47', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 48', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 49', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 50', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 51', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 52', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 53', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 54', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 55', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 56', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 57', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 58', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 59', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 60', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 61', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 62', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 63', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 64', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 65', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 66', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 67', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 68', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 69', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 70', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 71', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 72', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 73', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 74', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 75', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 76', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 77', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 78', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 79', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 80', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 81', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 82', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 83', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 84', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 85', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 86', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 87', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 88', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 89', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 90', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 91', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 92', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 93', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 94', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 95', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 96', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 97', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 98', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 99', 26900, '3.avif', 1);
INSERT INTO products (name, price, image, category_id) VALUES ('fashion item 100', 26900, '3.avif', 1);

-- food products
INSERT INTO products (name, price, image, category_id) VALUES ('food item 1', 26900, '1.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 2', 26900, '2.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 3', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 4', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 5', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 6', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 7', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 8', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 9', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 10', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 11', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 12', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 13', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 14', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 15', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 16', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 17', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 18', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 19', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 20', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 21', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 22', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 23', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 24', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 25', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 26', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 27', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 28', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 29', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 30', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 31', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 32', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 33', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 34', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 35', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 36', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 37', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 38', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 39', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 40', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 41', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 42', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 43', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 44', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 45', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 46', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 47', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 48', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 49', 26900, '3.jpg', 2);
INSERT INTO products (name, price, image, category_id) VALUES ('food item 50', 26900, '3.jpg', 2);

-- digital products
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 1', 26900, '1.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 2', 26900, '2.png', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 3', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 4', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 5', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 6', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 7', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 8', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 9', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 10', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 11', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 12', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 13', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 14', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 15', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 16', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 17', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 18', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 19', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 20', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 21', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 22', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 23', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 24', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 25', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 26', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 27', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 28', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 29', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 30', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 31', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 32', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 33', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 34', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 35', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 36', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 37', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 38', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 39', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 40', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 41', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 42', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 43', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 44', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 45', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 46', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 47', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 48', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 49', 26900, '3.jpg', 3);
INSERT INTO products (name, price, image, category_id) VALUES ('digital item 50', 26900, '3.jpg', 3);