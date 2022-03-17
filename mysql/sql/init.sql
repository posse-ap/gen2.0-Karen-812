SET CHARSET UTF8;
DROP DATABASE IF EXISTS webapp_db;
CREATE DATABASE webapp_db;

USE webapp_db;

-- 投稿するときに記録されるデータまとめ
DROP TABLE IF EXISTS input_data;
CREATE TABLE input_data (
    `date` DATE, 
    `hours` TINYINT, 
    `languages` TINYINT, 
    `contents` TINYINT);

INSERT INTO 
input_data (`date`, `hours`, `languages`, `contents`) 
VALUES 
(220314,5,5,5),
(220315,5,5,5),
(220316,5,5,5),
(220317,5,5,5);
