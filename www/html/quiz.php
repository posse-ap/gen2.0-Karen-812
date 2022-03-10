<!-- 
    全体的な指針
    ・quizyのページごとに変わる部分だけをdatabaseから取ってくる
    ・pageidに置き換えたら自動的に内容が変わるよね 
-->

<?php
require('dbconnect.php');

// pgidを取得する
$pgid = filter_input(INPUT_GET, 'id');
// print_r($pgid);
// $results = $pgid->fetchAll();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

// ----　ちょっとprepared statement色々やる！　----

// $sql = $pdo->query('SELECT name FROM big_questions WHERE id = $pgid');

// PDOStatementクラスのインスタンスを生成します。
    // $prepare = $pdo->prepare($sql);

// プリペアドステートメントを実行する
    // $prepare->execute();

    // $result = $prepare->fetchAll();

//　　これ何？ 　→$question_id = htmlspecialchars($_GET['id']);




// ----　id=?　にしたらできた！　なるほど　----

// $page = 'SELECT name FROM big_questions WHERE id = $pgid';
$page = 'SELECT name FROM big_questions WHERE id = ?';

// PDOStatementクラスのインスタンスを生成します。
$stmt2 = $pdo->prepare($page);

// プリペアドステートメントを実行する
// $prepare->execute();
$stmt2->execute(array($id));

$pages = $stmt2->fetchAll();

}else {
    header("Location: /");
}



    // ---SELECT文を変数に格納----

    // タイトル「東京/広島」を取得
    $title_stmt = "SELECT * FROM big_questions WHERE id = $pgid";
    // $title_stmt = "SELECT * FROM big_questions WHERE id = $page";
    // SQLステートメントを実行し、結果を変数に格納
    $title = $pdo->query($title_stmt);

    // ーーー　ループ使おうとしてダメだったやつ　ーーー
    // $selections = "SELECT * FROM choices INNER JOIN questions on choices.question_id = questions.id WHERE big_question_id = $pgid";
    // $selections2 = "SELECT * FROM choices INNER JOIN questions on choices.question_id = questions.id WHERE big_question_id = $pgid AND questions.id = $i";
    // $selection = $pdo->query($selections);
    // $selection2 = $pdo->query($selections2);

    // $selections = "SELECT * FROM choices INNER JOIN questions on choices.question_id = questions.id WHERE big_question_id = page";

    // ーーー　どうしようコレ　ーーー
    $image1 = "SELECT image FROM questions WHERE big_question_id = 1 INNER JOIN choices on questions.id = choices.question_id";

    // 画像の取得
    // $image1 = "SELECT * FROM questions WHERE big_question_id = $pgid and id = 1";
    $image = "SELECT * FROM questions WHERE big_question_id = $pgid and id = ?";
    $img_prepare = $pdo->prepare($image);
    //execute(array(2))　と　fetchAll();　は下でやってる

    // 選択肢を大問ごとに取得
    $choices = "SELECT * FROM choices WHERE question_id = ?";
    $ch_prepare = $pdo->prepare($choices);
    
    // $choices1 = "SELECT * FROM choices WHERE question_id = 1";
    // $choices2 = "SELECT * FROM choices WHERE question_id = 2";

    // $choices1 = "SELECT * FROM choices WHERE big_question_id = $pgid and question_id = 1";
    // $choices2 = "SELECT * FROM choices WHERE big_question_id = $pgid and question_id = 2";
    // $ch1 = $pdo->query($choices1);
    // $ch2 = $pdo->query($choices2);

// } catch (PDOException $e) {
//     echo "接続失敗: " . $e->getMessage() . "\n";
//     exit();
// }
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
    <!-- <h1>ガチで東京の人しか解けない！ #東京の難読地名クイズ</h1> -->
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

        // for ($i = 1; $i <= 2; $i++) {
        //     echo $i;
        //     echo $selection2['name'];
        // }

        // foreach ($selection as $waa) {
        //     echo $waa['name'];
        //     echo $waa['image'];
        // }

        $img_prepare->execute(array(1));
        $img = $img_prepare->fetchAll();

        foreach ($img as $q_img) {
                    echo '<img src="';
                    echo $q_img['image'];
                    echo '" alt="">';
                    echo '<br>';
                }

        $ch_prepare->execute(array(1));
        $ch = $ch_prepare->fetchAll();

        // foreach文で配列の中身を一行ずつ出力

        foreach ($ch as $row) {
            // データベースのフィールド名で出力
            echo '<li>';
            echo $row['name'];
            echo '</li>';

            // 改行を入れる
            echo '<br>';
        }

        $img_prepare->execute(array(2));
        $img = $img_prepare->fetchAll();

        foreach ($img as $q_img) {
                    echo '<img src="';
                    echo $q_img['image'];
                    echo '" alt="">';
                    echo '<br>';
                }

                echo '<br>';


        $ch_prepare->execute(array(2));
        $ch = $ch_prepare->fetchAll();
        foreach ($ch as $row) {
            echo '<li>';
            echo $row['name'];
            echo '</li>';

            echo '<br>';
        }

        ?>
    </div>
</body>

<!-- <script src="main.js"></script> -->

</html>
