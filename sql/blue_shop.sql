DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
	`id`	integer	NOT NULL,
	`user_id`	varchar(255)	NOT NULL,
	`password`	varchar(255)	NOT NULL,
	`name`	varchar(6)	NULL,
	`email`	varchar(255)	NULL,
	`phone`	varchar(255)	NULL,
	`address`	varchar(255)	NULL,
	`point`	decimal(7,0)	NULL DEFAULT 200000
);

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
	`id`	integer	NOT NULL,
	`name`	varchar(255)	NULL,
	`price`	decimal(7,0)	NULL,
	`stock`	integer	NULL	DEFAULT 99,
	`image`	varchar(255)	NULL,
	`category_id`	integer	NOT NULL
);

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
	`id`	integer	NOT NULL,
	`name`	varchar(255)	NULL
);

ALTER TABLE `users` ADD CONSTRAINT `PK_USERS` PRIMARY KEY (
	`id`
);

ALTER TABLE `products` ADD CONSTRAINT `PK_PRODUCTS` PRIMARY KEY (
	`id`
);

ALTER TABLE `categories` ADD CONSTRAINT `PK_CATEGORIES` PRIMARY KEY (
	`id`
);

ALTER TABLE `products` ADD CONSTRAINT `FK_categories_TO_products_1` FOREIGN KEY (
	`category_id`
)
REFERENCES `categories` (
	`id`
);

