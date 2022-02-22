SET CHARSET UTF8;

USE mysql;
ALTER user 'karen'@'%' identified WITH mysql_native_password BY 'password';

USE quizydb;

SET CHARACTER_SET_CLIENT = utf8;
SET CHARACTER_SET_CONNECTION = utf8;

DROP TABLE IF EXISTS big_questions; 
-- 上かくといいらしい
CREATE TABLE big_questions (id int, name varchar(255)) DEFAULT CHARACTER SET utf8;
INSERT INTO big_questions (id, name) VALUES (1,'東京の難読地名クイズ');
INSERT INTO big_questions (id, name) VALUES (2,'広島県の難読地名クイズ');