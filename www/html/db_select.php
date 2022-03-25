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

// 棒グラフ
// 日毎の勉強時間を　GroupBy　で集計
$chart_day_prepare = $pdo->prepare(
    'SELECT `date` , SUM(`hours`) AS h FROM input_data WHERE `date` LIKE :search GROUP BY `date`'
);
$chart_day_prepare->execute(['search' => $search]);
$charts_day = $chart_day_prepare->fetchAll();
// print_r($charts_day);

/*
$lang_chart = 
    [   
        'c1'=>'赤',
        'c2'=>'黄',
		'c3'=>'青'
	];
    $b = json_encode($lang_chart,JSON_UNESCAPED_UNICODE);
    // var_dump($b);
*/

    // PHPでしか使えない形　→ エンコード　→　JS →　さらに整形
    // PHPである程度整える　→エンコード　もあり

$c = json_encode($charts_day);
// var_dump($c);
// print_r($c);


// foreach ($c_day as $chart_name => $chart_day) {
//     echo $chart_name , $chart_day;
// }

// ーーー右画面ーーー

// ドーナツグラフ1
// 言語毎の勉強時間

/*　$lang_prepare = $pdo->prepare('SELECT SUM(`hours`) AS total_by_lang FROM input_data WHERE `languages`=?');
foreach ($hours_by_lang as $hour_by_lang){
    // echo $result[`hours`]; 普通の''にしたらいけた。。。笑
    echo $hour_by_lang['total_by_lang'];
}; */

// やっぱGROUP BYで集計
$lang_prepare = $pdo->prepare(
    'SELECT SUM(`hours`) FROM input_data WHERE `date` LIKE :search GROUP BY `languages`'
);
$lang_prepare->execute(['search' => $search]);
$hours_by_lang = $lang_prepare->fetchAll();
// print_r($hours_by_lang);



// ドーナツグラフ2
// コンテンツ毎の勉強時間

// GROUP BY 使って集計
$cont_prepare = $pdo->prepare(
    'SELECT SUM(`hours`) FROM input_data  WHERE `date` LIKE :search GROUP BY `contents`'
);
$cont_prepare->execute(['search' => $search]);
$hours_by_cont = $cont_prepare->fetchAll();
// print_r($hours_by_cont);


