CREATE DATABASE `comunicacao` /*!40100 COLLATE 'utf8mb4_unicode_ci' */;
SHOW DATABASES;
/* Entrando na sessão "Laragon.MySQL" */
USE `comunicacao`;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='comunicacao';
SHOW TABLE STATUS FROM `comunicacao`;
SHOW FUNCTION STATUS WHERE `Db`='comunicacao';
SHOW PROCEDURE STATUS WHERE `Db`='comunicacao';
SHOW TRIGGERS FROM `comunicacao`;
SELECT *, EVENT_SCHEMA AS `Db`, EVENT_NAME AS `Name` FROM information_schema.`EVENTS` WHERE `EVENT_SCHEMA`='comunicacao';
SHOW VARIABLES;
FLUSH PRIVILEGES;
SHOW COLUMNS FROM `mysql`.`user`;
SELECT `user`, `host`, authentication_string AS `password` FROM `mysql`.`user`;
CREATE USER 'comunicacao'@'localhost' IDENTIFIED BY 'Abc@1234';
GRANT USAGE ON *.* TO 'comunicacao'@'localhost';
GRANT EXECUTE, SELECT, SHOW VIEW, ALTER, ALTER ROUTINE, CREATE, CREATE ROUTINE, CREATE TEMPORARY TABLES, CREATE VIEW, DELETE, DROP, EVENT, INDEX, INSERT, REFERENCES, TRIGGER, UPDATE, LOCK TABLES  ON `comunicacao`.* TO 'comunicacao'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;
SHOW GRANTS FOR 'comunicacao'@'localhost';
