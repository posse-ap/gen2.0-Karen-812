USE mysql;
ALTER user 'karen'@'%' identified WITH mysql_native_password BY 'password';

USE quizydb;
DROP TABLE IF EXISTS big_questions; 
-- 上かくといいらしい
CREATE TABLE big_questions (id int, name varchar(255));
INSERT INTO big_questions (id, name) VALUES (1,'tokyo');
INSERT INTO big_questions (id, name) VALUES (2,'hiroshima');