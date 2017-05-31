-- with using previous database

##
## Выборка по условию
##

-- равно
SELECT `first_name` FROM `users` WHERE `user_id` = 1;

-- не равно
SELECT `first_name` FROM `users` WHERE `user_id` <> 1;
-- не равно
SELECT `first_name` FROM `users` WHERE `user_id` != 1;

-- больше + limit
SELECT `first_name` FROM `users` WHERE `user_id` > 10 LIMIT 1;

-- меньше-равно + order + limit
SELECT `first_name` FROM `users` WHERE `user_id` <= 10 ORDER BY `user_id` ASC LIMIT 1;

-- пагинация - выбрать 3 строки, пропустить одну строку, возвращяет строки 2-3-3
SELECT `phone_number` FROM `user_phones` LIMIT 1, 3;

##
## aggregate functions
##

-- count of the number of rows returned
SELECT COUNT(*) AS `cnt` FROM `user_phones`;

-- max
SELECT MAX(`user_id`) AS `max_user_id` FROM `user_phones`;

-- min
SELECT MIN(`user_id`) AS `max_user_id` FROM `user_phones`;

-- sum
SELECT SUM(`user_phones_id`) AS `id_sum` FROM `user_phones`;


##
## JOIN
##

-- fill extra data
INSERT INTO `companies` (`name`) VALUES (FLOOR((RAND() * 100))), (FLOOR((RAND() * 100)));

-- fill extra data
INSERT INTO `users` (`first_name`, `last_name`) VALUES ('user2', 'user2');

-- строгое соответствие, то же самое что inner join
SELECT * FROM `users`, `companies` WHERE `users`.`company_id` = `companies`.`company_id`;

-- строгое соответствие
SELECT * FROM `users` INNER JOIN `companies` ON `users`.`company_id` = `companies`.`company_id`;

-- строгое соответствие
SELECT * FROM `users` JOIN `companies` ON `users`.`company_id` = `companies`.`company_id`;

-- строгое соответствие, то же самое что inner join
SELECT * FROM `users` CROSS JOIN `companies` ON `users`.`company_id` = `companies`.`company_id`;

-- строгое соответствие, то же самое что inner join, левая таблица всегда читается первой
SELECT * FROM `users` STRAIGHT_JOIN `companies` ON `users`.`company_id` = `companies`.`company_id`;

-- включем в выборку все возможные значения с левой таблицы
SELECT * FROM `users` LEFT JOIN `companies` ON `users`.`company_id` = `companies`.`company_id`;
-- OUTER можно опустить
SELECT * FROM `users` LEFT OUTER JOIN `companies` ON `users`.`company_id` = `companies`.`company_id`;

-- включем в выборку все возможные значения с правой таблицы
SELECT * FROM `users` RIGHT JOIN `companies` ON `users`.`company_id` = `companies`.`company_id`;

-- бд сама объединяет таблицы по столбцам с одинаковыми именами
SELECT * FROM `users` NATURAL LEFT JOIN `companies`;

SELECT * FROM `users` NATURAL RIGHT JOIN `companies`;

