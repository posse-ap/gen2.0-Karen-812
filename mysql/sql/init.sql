SET CHARSET UTF8;

USE mysql;
ALTER user 'karen'@'%' identified WITH mysql_native_password BY 'password';

USE quizydb;

SET CHARACTER_SET_CLIENT = utf8;
SET CHARACTER_SET_CONNECTION = utf8;

DROP TABLE IF EXISTS big_questions; 
DROP TABLE IF EXISTS questions; 
-- 上かくといいらしい
CREATE TABLE big_questions (id int, name varchar(255)) DEFAULT CHARACTER SET utf8;
INSERT INTO big_questions (id, name) VALUES (1,'東京の難読地名クイズ');
INSERT INTO big_questions (id, name) VALUES (2,'広島県の難読地名クイズ');

CREATE TABLE questions (id int, big_question_id int, image varchar(255));
INSERT INTO questions (id, big_question_id, image) VALUES (1, 1, 'takanawa.png');
INSERT INTO questions (id, big_question_id, image) VALUES (2, 1, 'kameido.png');
INSERT INTO questions (id, big_question_id, image) VALUES (3, 2, 'mukainada.png');

-- boolean https://qiita.com/ritukiii/items/3a3667391d4d65678d82
CREATE TABLE choices (id int, question_id int, name varchar(255), valid boolean);
INSERT INTO choices (id, question_id, name, valid) 
VALUES (1, 1, 'たかなわ', 1), (2, 1, 'たかわ', 0), (3, 1, 'こうわ', 0), (4, 2, 'かめと', 0), (5, 2, 'かめど', 0), (6, 2, 'かめいど', 1),(7, 3, 'むこうひら', 0), (8, 3, 'むきひら', 0), (9, 3, 'むかいなだ', 1);