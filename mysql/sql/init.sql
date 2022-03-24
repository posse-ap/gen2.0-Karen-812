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
(220301, 5, 1, 3),
(220302, 5, 2, 4),
(220303, 5, 3, 5),
(220304, 5, 4, 3),
(220305, 5, 5, 0),
(220306, 5, 6, 0),
(220307, 5, 7, 4),
(220308, 5, 1, 2),
(220309, 5, 2, 2),
(220310, 5, 3, 8),
(220311, 5, 4, 8),
(220312, 5, 5, 2),
(220313, 5, 6, 2),
(220314, 5, 7, 1),
(220315, 5, 1, 7),
(220316, 5, 2, 4),
(220317, 5, 3, 4),
(220318, 5, 4, 3),
(220319, 5, 5, 3),
(220320, 5, 6, 3),
(220321, 5, 7, 2),
(220322, 5, 1, 2),
(220323, 5, 2, 6),
(220324, 5, 3, 2),
(220325, 5, 4, 2),
(220326, 5, 5, 1),
(220327, 5, 6, 1),
(220328, 5, 7, 1),
(220329, 5, 1, 0),
(220330, 5, 2, 0);

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