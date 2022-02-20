<?php
// phpinfo();

$dsn = 'mysql:dbname=quizydb;charset=utf8;host=mysql';
$user = 'karen';
$password = 'password';

try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";

    // -------ここから12/27の週分を新しく書いてくよ！------

    $sql = 'SELECT * FROM big_questions';

    // PDOStatementクラスのインスタンスを生成します。
    $prepare = $dbh->prepare($sql);

    // プリペアドステートメントを実行する
    $prepare->execute();
    
    $result = $prepare->fetchAll();
    // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
    // (PDO::FETCH_ASSOC);
    
    // 結果を出力
    print_r($result);

    Echo "<a href = http://localhost:8080/quiz.php?id=1> 1だよ</a>" . PHP_EOL;
    Echo "<a href = http://localhost:8080/quiz.php?id=2> 2だよ </a>";
    // Echo "<a href = $ url> $ site_title </a>";

} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}

?>