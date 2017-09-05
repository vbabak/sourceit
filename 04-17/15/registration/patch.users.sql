create table `users` (
    `user_id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_role_id` INT,
    `username` VARCHAR(128) UNIQUE KEY,
    `email` VARCHAR(128) UNIQUE KEY,
    `password` VARCHAR(128),
    `created` DATETIME,
    KEY (`user_role_id`)
) DEFAULT CHARSET=utf8;

create table `user_roles` (
    `user_role_id` INT PRIMARY KEY AUTO_INCREMENT,
    `role_code` VARCHAR(16) UNIQUE KEY,
    `role_name` VARCHAR(32)
) DEFAULT CHARSET=utf8;

INSERT INTO `user_roles` (`role_code`, `role_name`)
    VALUES ('admin', 'Администратор'), ('user', 'Пользователь'),
    ('supplier', 'Поставщик');

ALTER TABLE `suppliers` ADD `user_id` INT AFTER `supplier_id`;