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
(220314,5,5,5),
(220315,5,5,5),
(220316,5,5,5),
(220317,5,5,5);

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