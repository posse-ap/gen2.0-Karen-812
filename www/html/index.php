<?php
// phpinfo();
require('dbconnect.php');

$sql = 'SELECT * FROM big_questions';

// PDOStatementクラスのインスタンスを生成します。
$prepare = $pdo->prepare($sql);

// プリペアドステートメントを実行する
$prepare->execute();

$results = $prepare->fetchAll();
// PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
// (PDO::FETCH_ASSOC);

// 結果を出力
// print_r($results);
$stmt = $pdo->query('SELECT * FROM big_questions');
?>

<?php foreach ($results as $result) : ?>
    <p>
        <a href="/quiz.php?id=<?php echo $result['id']; ?>"><?php echo $result['id'] . '：' . $result['name']; ?></a>
    </p>
<?php endforeach; ?>

<?php
// Echo "<a href=http://localhost:8080/quiz.php?id=1> 1だよ</a>" . PHP_EOL;
// Echo "<a href=http://localhost:8080/quiz.php?id=2> 2だよ </a>";
