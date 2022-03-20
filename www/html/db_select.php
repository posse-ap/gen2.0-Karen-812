<?php
// ①PDOクラスのprepareメソッドを実行、その結果を$stmtに代入
// ②$pdo->prepare()が成功した場合、PDOStatementオブジェクト（=PDOStatementクラスをインスタンス化したもの）を返す
// ③プリペアドステートメントを実行する
// $stmt = $pdo->query('SELECT * FROM big_questions');

// 今日の勉強時間
$day = 'SELECT * FROM input_data WHERE `date` = ?' ;
$day_prepare = $pdo->prepare($day);
$day_prepare->execute(array(220314));
$hours_par_day = $day_prepare->fetchAll();

// 今月の勉強時間
$search = '%22-03%';
$month_prepare = $pdo->prepare(
    'SELECT SUM(`hours`) AS total FROM input_data WHERE `date` LIKE :search'
);
$month_prepare->execute(['search' => $search]);
$hours_par_month = $month_prepare->fetchAll();

// 合計の勉強時間
$total_prepare = $pdo->prepare(
    'SELECT SUM(`hours`) AS total2 FROM input_data'
);
$total_prepare->execute();
$hours_total = $total_prepare->fetchAll(); 

// 言語ごとの集計
$lang_prepare = $pdo->prepare(
    'SELECT SUM(`hours`) AS total_by_lang FROM input_data WHERE `languages`=?'
);
$lang_prepare->execute(array(5));
$hours_by_lang = $lang_prepare->fetchAll();
// print_r($hours_by_lang);

foreach ($hours_by_lang as $hour_by_lang){
    // echo $result[`hours`]; 普通の''にしたらいけた。。。笑
    echo $hour_by_lang['total_by_lang'];
}; 

