<?php
require('dbconnect.php');

$sql = 'SELECT sum(`hours`) FROM input_data';

// //①PDOクラスのprepareメソッドを実行、その結果を$stmtに代入
// //②$pdo->prepare()が成功した場合、PDOStatementオブジェクト（=PDOStatementクラスをインスタンス化したもの）を返す
// //③プリペアドステートメントを実行する
// $stmt = $pdo->query('SELECT * FROM big_questions');

$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll();

// 結果を出力 
print_r($results);

foreach ($results as $result) : ?>
    <p>
        <?php echo $result[`hours`]; ?>
    </p>
<?php endforeach; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->

    <!-- font awesome, calender -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- stylesheet -->
    <link rel="stylesheet" href="style.css">
    <title>POSSE app</title>

    <!-- graph -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- json用 -->
    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

</head>

<body>

    <header class="header inner">
        <h1>
            <img src="posse_logo.jpeg" alt="POSSE">
        </h1>
        <p class="unit">4th week</p>
        <div id="header_button" class="button" onclick="open_modal()">
            <p>記録・投稿</p>
        </div>
    </header>


    <div class="container">
        <section class="first_section">
            <section class="first_top">
                <div class="card period">
                    Today
                    <p class="number">3</p>
                    <p class="unit">hour</p>
                </div>
                <div class="card period">
                    Month
                    <p class="number">120</p>
                    <p class="unit">hour</p>
                </div>
                <div class="card period">
                    Total
                    <p class="number">1348</p>
                    <p class="unit">hour</p>
                </div>
            </section>
            <section class="first_bottom">
                <div class="card graph">
                    <div id="columnchart" style="width: 100%;"></div>
                </div>
            </section>
        </section>
        <section class="second_section">
            <div class="card title">学習時間
                <div id="donutchart" style="width: 100%;"></div>
            </div>
            <div class="card title">学習コンテンツ
                <div id="donutchart2" style="width: 100%;"></div>
            </div>
        </section>
    </div>
    <section class="for_mobile">
        <div>
            <i class="fas fa-chevron-left blue"></i>
            <p>2020年 10月</p>
            <i class="fas fa-chevron-right blue"></i>
        </div>
    </section>
    <footer class="footer">
        <div class="button2" onclick="open_modal()">
            <p>記録・投稿</p>
        </div>
    </footer>

    <!-- モーダルだよ🍩 -->
    <div id="modal_content" class="modal_closed">
        <div onclick="close_modal()" class="close_button">
            <i class="fas fa-times grey"></i>
        </div>
        <section id="modal_inside">
            <section class="upper_section">
                <section class="modal_first">
                    <div class="study_day inside">
                        <p>学習日</p>
                        <input type="text" class="input_box calender" id="calender">
                    </div>
                    <div class="study_contents inside modal_margin">
                        <p>学習コンテンツ(複数選択可)</p>
                        <div class="checkbox_outside grey">
                            <label>
                                <input type="checkbox" class="checkbox" id="checkboxes" onclick="checkcheck()">
                                <span class="checkmark"></span>
                                N予備校
                            </label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label>
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                ドットインストール
                            </label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label>
                                <input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                POSSE課題
                            </label>
                        </div>
                    </div>
                    <div class="study_languages inside modal_margin">
                        <p>学習言語(複数選択可)</p>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                HTML</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                CSS</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                JavaScript</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                PHP</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                Laravel</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                SQL</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                SHELL</label>
                        </div>
                        <div class="checkbox_outside grey">
                            <label><input type="checkbox" class="checkbox">
                                <span class="checkmark"></span>
                                情報システム基礎知識(その他)</label>
                        </div>
                </section>
                <section class="modal_second">
                    <div class="study_hour inside">
                        <p>学習時間</p>
                        <input type="text" class="input_box">
                    </div>
                    <div class="twitter_comment inside modal_margin">
                        <p>Twitter用コメント</p>
                        <!-- <input type="text" class="input_box comment" id="twitter_com"> -->
                        <textarea name="twitter_com" id="twitter_com" class="input_box comment"></textarea>
                    </div>
                    <div class="twitter inside">
                        <label>
                            <input type="checkbox" id="tweet" class="checkbox">
                            <span class="checkmark big_check"></span>
                            Twitterに自動投稿する
                        </label>
                    </div>
                </section>
            </section>
            <section class="under_section">
                <div class="modal_button" onclick="post()">記録・投稿</div>
            </section>
        </section>


        <!-- ローディング・投稿完了画面 -->
        <section class="before_post" id="posted1">
            <div class="loader-wrap">
                <div class="loader">Loading...</div>
            </div>
        </section>

        <section class="before_post" id="posted">
            <p class="green">AWESOME!</p>
            <i class="fas fa-check-circle green checkmark2"></i>
            <p>記録・投稿</p>
            <p>完了しました</p>
        </section>

        <!-- <p><a id="modal-close" class="button-link">閉じる</a></p> -->
    </div>

    <script src="main.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>


</html>