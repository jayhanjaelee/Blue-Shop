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