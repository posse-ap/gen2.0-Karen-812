SET CHARSET UTF8;
USE mysql;
alter user 'karen'@'%' identified with mysql_native_password by 'password';

DROP DATABASE IF EXISTS webapp_db;
CREATE DATABASE webapp_db;
USE webapp_db;

-- 投稿するときに記録されるデータまとめ
DROP TABLE IF EXISTS input_data;
CREATE TABLE input_data (
    id INT AUTO_INCREMENT, 
    `date` DATE, 
    `hours` TINYINT, 
    `languages` TINYINT, 
    `contents` TINYINT,
    PRIMARY KEY(id));

INSERT INTO 
input_data (`date`, `hours`, `languages`, `contents`) 
VALUES 
-- (210314,5,5,5),
-- (220314,5,1,5),
-- (220315,5,2,5),
-- (220316,5,5,5),
-- (220317,5,5,5);
(220301, 3, 1, 3),
(220302, 4, 2, 4),
(220303, 5, 3, 5),
(220304, 3, 4, 3),
(220305, 0, 5, 0),
(220306, 0, 6, 0),
(220307, 4, 7, 4),
(220308, 2, 1, 2),
(220309, 2, 2, 2),
(220310, 8, 3, 8),
(220311, 8, 4, 8),
(220312, 2, 5, 2),
(220313, 2, 6, 2),
(220314, 1, 7, 1),
(220315, 7, 1, 7),
(220316, 4, 2, 4),
(220317, 4, 3, 4),
(220318, 3, 4, 3),
(220319, 3, 5, 3),
(220320, 3, 6, 3),
(220321, 2, 7, 2),
(220322, 2, 1, 2),
(220323, 6, 2, 6),
(220324, 2, 3, 2),
(220325, 2, 4, 2),
(220326, 1, 5, 1),
(220327, 1, 6, 1),
(220328, 1, 7, 1),
(220329, 0, 1, 0),
(220330, 0, 2, 0);

-- languageの紐付け
DROP TABLE IF EXISTS language_num;
CREATE TABLE language_num (
    id INT AUTO_INCREMENT, 
    `language` TEXT,
    PRIMARY KEY(id));

INSERT INTO 
language_num (`language`)
VALUES
("HTML"),
("CSS"),
("JavaScript"),
("PHP"),
("Laravel"),
("SQL"),
("SHELL"),
("情報システム基礎知識(その他)");


-- contentの紐付け
DROP TABLE IF EXISTS content_num;
CREATE TABLE content_num (
    id INT AUTO_INCREMENT, 
    `content` TEXT,
    PRIMARY KEY(id));

INSERT INTO 
content_num (`content`)
VALUES
("N予備校"),
("ドットインストール"),
("POSSE課題");