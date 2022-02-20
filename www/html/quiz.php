<?php if(isset($_GET['echo'])) { $id = $_GET['id']; } 
        // echo $id; 

    $pgid = filter_input(INPUT_GET, 'id');
    print_r($pgid);
// quizyのページごとに変わる部分だけをdatabaseから取ってくる→pageidに置き換えたら自動的に内容が変わるよね
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?php  print_r($id); ?>
    </title>
    <link rel="stylesheet" href="timei.css" />
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
        <?php echo $pgid; ?>
    </h1>
    <div id="question"></div>
</body>

<script src="tsimei.js"></script>

</html>
