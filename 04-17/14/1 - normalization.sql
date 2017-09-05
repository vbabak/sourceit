DROP TABLE IF EXISTS `companies`;
DROP TABLE IF EXISTS `user_phones`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
    `first_name` VARCHAR(32),
    `last_name` VARCHAR(32),
    `phone_number` VARCHAR(128),
    `company` VARCHAR(32)
);

INSERT INTO `users` VALUES ('Ivan', 'Ivanov', '192-168-33-10, 192-168-44-22', 'SourceIt');

##
## Первая нормальная форма:
##
-- 1) порядок столбцов и строк не важен
-- 2) строки не повторяются
-- 3) значения ячеек нельзя разбить на значения которые также будут соответствовать назначению столбца

-- очистить таблицу
TRUNCATE TABLE `users`;

INSERT INTO `users` VALUES ('Ivan', 'Ivanov', '192-168-33-10', 'SourceIt');
INSERT INTO `users` VALUES ('Ivan', 'Ivanov', '192-168-44-22', 'SourceIt');

-- изменать размер `users`.`phone_number`
ALTER TABLE `users` MODIFY `phone_number` VARCHAR(16);


##
## Вторая нормальная форма:
##
-- 1) таблица находится в 1НФ
-- 2) полная функциональная зависимость неключевого атрибута от его первичного ключа
-- 3) привести отношения к виду "один-к-многим"

-- изменить структуру таблицы
ALTER TABLE `users` ADD `user_id` INT PRIMARY KEY AUTO_INCREMENT FIRST;

-- проверить структуру таблицы
SHOW CREATE TABLE `users`;

CREATE TABLE `companies` (
    `company_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(32) UNIQUE KEY
);

-- заполняем новую таблицу данными из таблицы `users`
INSERT INTO `companies` (`name`) (SELECT `company` FROM `users` GROUP BY `company`);

-- удаляем колонку `company`
ALTER TABLE `users` DROP company;

-- добавляем `company_id`
ALTER TABLE `users` ADD company_id INT;
-- если не добавляем внешний ключ то добавляем простой индекс ALTER TABLE `users` ADD KEY (`company_id`);
ALTER TABLE `users` ADD FOREIGN KEY (`company_id`) REFERENCES `companies`(`company_id`);

-- проверить структуру таблицы
SHOW CREATE TABLE `users`;
SHOW CREATE TABLE `companies`;

-- выборка
SELECT * FROM `users` WHERE `company_id` IS NULL;

-- обновление
UPDATE `users` SET `company_id` = 1 WHERE `company_id` IS NULL;

##
## Третья нормальная форма:
##
-- 1) таблица находится в 2НФ
-- 2) каждый не ключевой столбец не зависим друг от друга

-- выборка
SELECT * FROM `users`;

-- отдельная таблица user_phones
CREATE TABLE `user_phones` (
    `user_phone_id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `phone_number` VARCHAR(32) UNIQUE KEY
);
-- внешний ключ
ALTER TABLE `user_phones` ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`);

-- копируем телефоны в новую таблицу, но только хардкодом указываем что это один и тот же пользователь
INSERT INTO `user_phones` (`user_id`, `phone_number`) (SELECT 1, `phone_number` FROM `users`);

-- удаляем лишнюю запись
DELETE FROM `users` WHERE `user_id` = 2;

-- удаляем колонку
ALTER TABLE `users` DROP `phone_number`;

-- выборка
SELECT * FROM `users`;
SELECT * FROM `user_phones`;
SELECT * FROM `companies`;

-- проверка ограничения внешнего ключа
-- по умолчанию RESTRICT/NO ACTION - InnoDB rejects the delete or update operation for the parent table.
DROP TABLE IF EXISTS `users`;


