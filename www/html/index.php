<?php
require('dbconnect.php');
require('function.php');

include('db_select.php');


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
    <link rel="stylesheet" href="src/style.css">
    <title>POSSE app</title>

    <!-- graph -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- json用 -->
    <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->

</head>

<body>

    <header class="header inner">
        <h1>
            <img src="./src/posse_logo.jpeg" alt="POSSE">
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

    <?php include('_modal.php'); ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

</body>


    <!-------------- ここからPhase2 -------------->

    <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script type="text/javascript">

    let calender = document.getElementById("calender");
    let fp = flatpickr(calender, {
    dateFormat: "Y年n月j日", // フォーマットの変更
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

        <?php foreach ($hours_par_day as $hour_par_day){
                            // echo $result[`hours`]; 普通の''にしたらいけた。。。笑
                            echo $hour_par_day['hours'];
                        }; ?>

        // JSで整形！
            var obj = <?php echo $c; ?>


            let a = [];
            obj.forEach(function (value,index) {
                let number = Number(value.date.substr(8));
                let value_number = Number(value.h);

                a.push([number, value_number])
            });

            console.log(a);
            data.addRows(a);

            /*
            
            // var new_obj =obj.substring(0, 6);

            // こうすればOK
            // Object.keys(obj).forEach(function (key) {
            //     console.log([key] + "," + obj[key]);
            // });

            for (const [key, value] of Object.entries(obj)) {
                console.log([value]);
                }
            
            Object.entries(obj).forEach(
            entry => console.log(entry)  //   1回目: [ "x," 10]                   //   2回目: [ "y" , 20]
            );
            */

        //     for (const [key, value] of Object.entries(obj)) {
        //     console.log("[" +  [key] + "," + [value]+ "]");
        //     const column_data = "[" +  [key] + "," + [value]+ "]";
        //     a.push([[key] + "," + [value]])
        //     }

        // // a.map(Number);
        //     console.log(a);

        /*
        data.addRows(a);
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
            [30, 0],
        ]);
        */

    // 🆕
    // var data = new google.visualization.DataTable(<?=$jsonTable?>);　←整形済んだら入れ込む

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
        'chartArea': {'width': '95%', 'height': '95%'},
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
        // スーパー・ホカホカ・タイム☆ to Everyone (23:25) 余白が気になるなら
        'chartArea': {'width': '95%', 'height': '95%'},

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