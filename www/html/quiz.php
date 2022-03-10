<!-- 
    全体的な指針
    ・quizyのページごとに変わる部分だけをdatabaseから取ってくる
    ・pageidに置き換えたら自動的に内容が変わるよね 
-->

<?php
require('dbconnect.php');

// pgidを取得する
$pgid = filter_input(INPUT_GET, 'id');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

/* 

    ----　prepared statement色々やる！　----

    $sql = $pdo->query('SELECT name FROM big_questions WHERE id = $pgid');

    $prepare = $pdo->prepare($sql); PDOStatementクラスのインスタンスを生成します。

    prepare->execute(); プリペアドステートメントを実行する
    
    $result = $prepare->fetchAll();

*/

}else {
    header("Location: /");
}


    // タイトル「東京/広島」を取得
    $title_stmt = "SELECT * FROM big_questions WHERE id = $pgid";
    // SQLステートメントを実行し、結果を変数に格納
    $title = $pdo->query($title_stmt);

// inner join使わんかったね・・・
// $selections = "SELECT * FROM choices INNER JOIN questions on choices.question_id = questions.id WHERE big_question_id = page";


    // 画像の取得
    // $image = "SELECT * FROM questions WHERE big_question_id = $pgid and id = ?";
    $image = "SELECT * FROM questions WHERE big_question_id = ? and id = ?";
    $img_prepare = $pdo->prepare($image);
    //execute(array( ))　と　fetchAll();　は下でやってる

    // 選択肢を大問ごとに取得
    $choices = "SELECT * FROM choices WHERE question_id = ?";
    $ch_prepare = $pdo->prepare($choices);
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        これは
        ページ
        <?php echo $pgid; ?>
    </title>
    <link rel="stylesheet" href="style.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="header_container">
            <div class="header_title">
                <a class="header_kuizy_logo" href="https://kuizy.net/">kuizy</a>
            </div>
            <div class="header_menu">
                <a class="header_kuizy_creation" href="https://kuizy.net/prepare">クイズ・診断を作る</a>
                <a class="header_kuizy_search" href="https://kuizy.net/search">
                    <img class="header_search_icon" src="search-icon.svg" alt="検索マーク" />
                    検索</a>
            </div>
        </div>
    </header>

    <div class="menubar">
        <ul>
            <li class="menu_list">
                <a href="https://kuizy.net/quiz"><i class="fas fa-book"></i>
                    <br> クイズ</a>
            </li>
            <li class="menu_list">
                <a href="https://kuizy.net/analysis"><i class="fas fa-clipboard"></i>
                    <br> 診断</a>
            </li>
            <li class="menu_list">
                <a href="https://kuizy.net/sketch"><i class="fas fa-pen-nib"></i>
                    <br> お絵描き診断</a>
            </li>
            <li class="menu_list">
                <a href="https://kuizy.net/quiz/prepare"><i class="fas fa-sign-in-alt"></i>
                    <br> ログイン</a>
            </li>
        </ul>
    </div>

    
    <h1>
        <?php
        // 結果を出力
        // foreach文で配列の中身を一行ずつ出力
        foreach ($title as $row) {
            // データベースのフィールド名で出力
            echo $row['name'];
            // 改行を入れる
            echo '<br>';
        }
        ?>
    </h1>

    <div id="question">
        <?php

        $imgid = $pgid + 1;
        $img_prepare->execute(array($pgid,$pgid*2-1));
        //id=1　→　1,1にしたい
        //id=2　→　2,3にしたい
        $img = $img_prepare->fetchAll();

        // foreach文で配列の中身を一行ずつ出力
        foreach ($img as $q_img) {
                    echo '<img src="';
                    echo $q_img['image'];
                    echo '" alt="">';
                    // 改行を入れる        
                    echo '<br>';
                }

        $ch_prepare->execute(array($pgid*2-1));
        //id=1　→　1にしたい
        //id=2　→　3にしたい
        $ch = $ch_prepare->fetchAll();

        foreach ($ch as $row) {
            // データベースのフィールド名で出力
            echo '<li>';
            echo $row['name'];
            echo '</li>';
        }



        $img_prepare->execute(array($pgid,$pgid*2));
        //id=1　→　1,2にしたい
        //id=2　→　2,4にしたい
        $img = $img_prepare->fetchAll();

        foreach ($img as $q_img) {
                    echo '<img src="';
                    echo $q_img['image'];
                    echo '" alt="">';
                }

        $ch_prepare->execute(array($pgid*2));
        //id=1　→　2にしたい
        //id=2　→　4にしたい
        $ch = $ch_prepare->fetchAll();
        foreach ($ch as $row) {
            echo '<li>';
            echo $row['name'];
            echo '</li>';
        }

        ?>
    </div>
</body>

<!-- <script src="main.js"></script> -->

</html>
