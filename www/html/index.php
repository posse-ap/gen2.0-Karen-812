<?php
// phpinfo();

$dsn = 'mysql:dbname=quizydb;charset=utf8;host=mysql';
$user = 'karen';
$password = 'password';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";


    
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

// $dbh = new PDO(
//     'mysql:host=db;dbname=quizy;charset=utf8mb4',
//     'naoki',
//     'karen',
//     'password'
// );

?>