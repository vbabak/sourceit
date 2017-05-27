
CREATE TABLE `suppliers`
(
`supplier_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`first_name` VARCHAR(32),
`last_name` VARCHAR(32),
`company` VARCHAR(64),
`city` VARCHAR(32),
`country` VARCHAR(16),
`created` DATETIME
) ENGINE=InnoDB, DEFAULT CHARSET UTF8;


CREATE TABLE `items`
(
`item_id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`supplier_id` INT UNSIGNED,
`title` VARCHAR(32),
`description` VARCHAR(1024),
`img_path` VARCHAR(128),
`price` DOUBLE(10,2),
`created` DATETIME DEFAULT NULL
) ENGINE=InnoDB, DEFAULT CHARSET UTF8;

ALTER TABLE `items` ADD KEY (`supplier_id`);
-- ALTER TABLE `items` ADD FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`supplier_id`);
