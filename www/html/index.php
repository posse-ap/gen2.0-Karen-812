<?php
require('dbconnect.php');


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


?>

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
                    <p class="number">
                        <?php foreach ($hours_par_day as $hour_par_day){
                            // echo $result[`hours`]; 普通の''にしたらいけた。。。笑
                            echo $hour_par_day['hours'];
                        }; ?>
                    </p>

                    <p class="unit">hour</p>
                </div>
                <div class="card period">
                    Month
                    <p class="number">
                        <?php foreach ($hours_par_month as $hour_par_month){
                            echo $hour_par_month['total'];
                        }; ?>
                    </p>
                    <p class="unit">hour</p>
                </div>
                <div class="card period">
                    Total
                    <p class="number">
                        <?php foreach ($hours_total as $hour_total){
                            echo $hour_total['total2'];
                        }; ?>
                    </p>
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
    <!-- ここからPhase2-->

    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script type="text/javascript">

    let calender = document.getElementById("calender");
    let fp = flatpickr(calender, {
    dateFormat: "Y-n-j(l)", // フォーマットの変更
    });

    function open_modal() {
    document.getElementById("modal_content").className = "modal_open";
    }

    function close_modal() {
    document.getElementById("modal_content").className = "modal_closed";
    }

    function checkcheck(){
    let check_checkbox = document.getElementsById('checkboxes');
    if(check_checkbox.checked){
        check_checkbox.parentNode.style.backgroundColor = '#0467ad';
        console.log('aaa')
    }
    }

    function post() {
    document.getElementById("posted1").className = "after_post2";
    setTimeout(function(){
        document.getElementById("posted").className = "after_post";
        // document.getElementsByClassName('upper_section').className = 'invisible'
        // document.getElementsByClassName('under_section').className = 'invisible'
        document.getElementById("modal_inside").className = "hidden";
        tweet();
    }, 3000);
    setTimeout(function(){
    document.getElementById("posted1").className = "hidden";
    }, 3000);

    }

    // <!-- 棒グラフ  -->
        google.charts.load("current", { packages: ["corechart", "bar"] });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {
        var data = new google.visualization.DataTable();
        data.addColumn("number", "Day");
        data.addColumn("number", "Time");

        data.addRows([
            [1, 3],
            [2, 4],
            [3, 5],
            [4, 3],
            [5, 0],
            [6, 0],
            [7, 4],
            [8, 2],
            [9, 2],
            [10, 8],
            [11, 8],
            [12, 2],
            [13, 2],
            [14, 1],
            [15, 7],
            [16, 4],
            [17, 4],
            [18, 3],
            [19, 3],
            [20, 3],
            [21, 2],
            [22, 2],
            [23, 6],
            [24, 2],
            [25, 2],
            [26, 1],
            [27, 1],
            [28, 1],
            [29, 0],
            [30, 8],

            // [{v: [8, 0, 0], f: '8 am'}, 1],
            // [{v: [9, 0, 0], f: '9 am'}, 2],
            // [{v: [10, 0, 0], f:'10 am'}, 3],
            // [{v: [11, 0, 0], f: '11 am'}, 4],
            // [{v: [12, 0, 0], f: '12 pm'}, 5],
            // [{v: [13, 0, 0], f: '1 pm'}, 6],
            // [{v: [14, 0, 0], f: '2 pm'}, 7],
            // [{v: [15, 0, 0], f: '3 pm'}, 8],
            // [{v: [16, 0, 0], f: '4 pm'}, 9],
            // [{v: [17, 0, 0], f: '5 pm'}, 10],
        ]);
        /**/

    // 🆕
    // var data = new google.visualization.DataTable(<?=$jsonTable?>);

        var options = {
            title: "",

            // X軸
            hAxis: {
            title: "",
            format: "",
            viewWindow: {
                min: [7, 30, 0],
                max: [17, 30, 0],
            },
            gridlines: { color: "none" },
            ticks:[2,4,6,8,10,12,14,16,18,20,22,24,26,28,30]
            },

            legend: {
            position: "none",
            },

            // Y軸
            vAxis: {
            title: '',
            format: "#.#h",
            gridlines: { color: "none" },
            ticks:[0,2,4,6,8]
            },
        };
        var chart = new google.visualization.ColumnChart(
            document.getElementById("columnchart")
            );
            
        chart.draw(data, options);
        }


    // ドーナツグラフ 言語

    // Visualization APIと、corechartパッケージをロードする
    // Google Chartのpackages(['corechart')を指定
    // 参考：https://uxbear.me/googlechart-color/

    google.charts.load("current", { packages: ["corechart"] });
    // ロード時のコールバックを"drawChart"に指定
    google.charts.setOnLoadCallback(drawChart);

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

    var options = {
        title: "",
        pieHole: 0.4,
        // width: 300,
        // height: 300,
        colors: [
        "#0345EC",
        "#0F71BD",
        "#20BDDE",
        "#3CCEFE",
        "#B29EF3",
        "#6D46EC",
        "#4A17EF",
        "#3105C0",
        ],
        chartArea: {
        // leave room for y-axis labels
        // https://stackoverflow.com/questions/41771333/sizing-google-charts-to-fill-div-width-and-height/41771608
        width: "98%",
        },
        legend: { position: "bottom" },
    };

    var chart = new google.visualization.PieChart(
        document.getElementById("donutchart")
    );
    chart.draw(data, options);
    }

    // ドーナツグラフ 学習内容
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {
    var data = google.visualization.arrayToDataTable([
        ["content", "portion"],
        ["N予備校", 40],
        ["ドットインストール", 20],
        ["課題", 40],
    ]);

    var options = {
        title: "",
        pieHole: 0.4,
        // width: 300,
        // height: 300,
        colors: ["#0345EC", "#0F71BD", "#20BDDE"],
        legend: { position: "bottom" },
    };

    var chart = new google.visualization.PieChart(
        document.getElementById("donutchart2")
    );
    chart.draw(data, options);
    }

    window.onresize = function () {
    drawBasic();
    drawChart();
    drawChart2();
    };

    let tweet_content = document.getElementById('tweet');

    function tweet(){
    let twitter_text = document.getElementById('twitter_com').value
    if(tweet_content.checked){
        window.open("https://twitter.com/intent/tweet?text=" + twitter_text);
    }
    };
        </script>

</html>