<?php

// (1) 取得するデータのidを指定
$id = $_REQUEST['id'];

// (2) データベースに接続
$pdo = new PDO('mysql:charset=UTF8;dbname=quizy;host=db', 'root', 'root');

// (3) SQL作成
$stmt = $pdo->prepare("SELECT * FROM choices WHERE id = :id");

// (4) 登録するデータをセット
$stmt->bindParam( ':id', $id, PDO::PARAM_INT);

// (5) SQL実行
$res = $stmt->execute();

// (6) 該当するデータを取得
if( $res ) {
	$data = $stmt->fetch();
	// var_dump($data);
    echo $data['name'];

}

// (7) データベースの接続解除
$pdo = null;

?>


<!-- ________________________________________ -->



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