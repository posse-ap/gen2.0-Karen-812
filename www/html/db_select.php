<?php
// ①PDOクラスのprepareメソッドを実行、その結果を$stmtに代入
// ②$pdo->prepare()が成功した場合、PDOStatementオブジェクト（=PDOStatementクラスをインスタンス化したもの）を返す
// ③プリペアドステートメントを実行する
// $stmt = $pdo->query('SELECT * FROM big_questions');


// ーーー左画面ーーー

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



// ーーー左画面下ーーー

// 棒グラフ  日毎の勉強時間をGroupByで集計
$chart_day_prepare = $pdo->prepare(
    'SELECT `date` , SUM(`hours`) AS h FROM input_data WHERE `date` LIKE :search GROUP BY `date`'
);
$chart_day_prepare->execute(['search' => $search]);
$charts_day = $chart_day_prepare->fetchAll();


// 方針：PHPでしか使えない形 → エンコード → JS → グラフ用にさらに整形
// PHPである程度整える →エンコードもあり

$c = json_encode($charts_day);


// ーーー右画面ーーー

// ドーナツグラフ1  言語毎の勉強時間
    /*
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["laguage", "portion"],
            ["HTML", 30],
            ["CSS", 20],
            ["JavaScript", 10],
            ["PHP", 5],
            ["Laravel", 5],
            ["SQL", 20],
            ["SHELL", 20],
            ["その他", 10],
        ]);
    */

// GROUP BYで集計
$lang_prepare = $pdo->prepare(
    'SELECT `languages` , (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS lang_time
    FROM input_data WHERE `date` LIKE :search 
    GROUP BY `languages`'
);
$lang_prepare->execute(['search' => $search]);
$hours_by_lang = $lang_prepare->fetchAll();
// print_r($hours_by_lang);

$c2 = json_encode($hours_by_lang);


// IDと学習言語名紐付け
$test_prepare = $pdo->prepare(
    'SELECT language_num.language, (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS lang_time
    FROM input_data 
    -- AS test_time
    INNER JOIN language_num
    ON
    input_data.languages = language_num.id
    WHERE `date` LIKE :search 
    GROUP BY `languages`;'
);
$test_prepare->execute(['search' => $search]);
$hours_by_test = $test_prepare->fetchAll();

$c4 = json_encode($hours_by_test);



// ドーナツグラフ2  コンテンツ毎の勉強時間
    /*
    var data = google.visualization.arrayToDataTable([
        ["content", "portion"],
        ["N予備校", 40],
        ["ドットインストール", 20],
        ["課題", 40],
    ]);
    */

// GROUP BY 使って集計
$cont_prepare = $pdo->prepare(
    'SELECT `contents` , (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS cont_time
    FROM input_data WHERE `date` LIKE :search 
    GROUP BY `contents`'
);
$cont_prepare->execute(['search' => $search]);
$hours_by_cont = $cont_prepare->fetchAll();

$c3 = json_encode($hours_by_cont);

// IDと学習言語名紐付け
$test_prepare = $pdo->prepare(
    'SELECT content_num.content, (100.0 * SUM(`hours`) / (SELECT SUM(`hours`) FROM input_data) ) AS cont_time
    FROM input_data
    INNER JOIN content_num
    ON
    input_data.contents = content_num.id
    WHERE `date` LIKE :search 
    GROUP BY `contents`;'
);
$test_prepare->execute(['search' => $search]);
$hours_by_test2 = $test_prepare->fetchAll();

$c5 = json_encode($hours_by_test2);



