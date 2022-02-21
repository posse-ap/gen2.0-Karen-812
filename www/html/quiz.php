<?php if(isset($_GET['id'])) { $id = $_GET['id']; } 
        // echo $id; 

        $pgid = filter_input(INPUT_GET, 'id');
        print_r($pgid);    
    
// quizyのページごとに変わる部分だけをdatabaseから取ってくる
// →pageidに置き換えたら自動的に内容が変わるよね

    $dsn = 'mysql:dbname=quizydb;charset=utf8;host=mysql';
    $user = 'karen';
    $password = 'password';

try {
    $dbh = new PDO(
        $dsn, 
        $user, 
        $password,   
    [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]
    );

    $sql = 'SELECT name FROM big_questions WHERE id = 1';

    // PDOStatementクラスのインスタンスを生成します。
    $prepare = $dbh->prepare($sql);

    // プリペアドステートメントを実行する
    $prepare->execute();
    
    $result = $prepare->fetchAll();
    // PDO::FETCH_ASSOCは、対応するカラム名にふられているものと同じキーを付けた 連想配列として取得します。
    // (PDO::FETCH_ASSOC);

    // 東京・広島を取得
    // SELECT文を変数に格納
    $sql2 = "SELECT * FROM big_questions";
    // SQLステートメントを実行し、結果を変数に格納
    $stmt = $dbh->query($sql2);

} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        これは
        <?php  echo $pgid; ?>
        ページ
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
        <?php echo $pgid; 
            echo $result; ?>
    </h1>
        
    <!-- // 結果を出力 -->
    <?php
    print_r($result);
        // foreach文で配列の中身を一行ずつ出力
        foreach ($stmt as $row) {
    
            // データベースのフィールド名で出力
            echo $row['id'].'：'.$row['name'].'県/都';
            
            // 改行を入れる
            echo '<br>';
            }
    ?>

    <div id="question"></div>
</body>

<script src="tsimei.js"></script>

</html>
