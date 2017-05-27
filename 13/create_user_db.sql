# CREATE DATABASE
CREATE DATABASE `suppliers` CHARACTER SET utf8 COLLATE utf8_general_ci;

-- CREATE USER
CREATE USER 'suppliers_u'@'localhost' IDENTIFIED BY '111';

-- TO ALLOW CONNECTION FROM LOCALHOST ONLY
GRANT ALL privileges ON `suppliers`.* TO 'suppliers_u'@'localhost';
-- TO ALLOW REMOTE CONNECTION
GRANT ALL privileges ON `suppliers`.* TO 'suppliers_u'@'%';
