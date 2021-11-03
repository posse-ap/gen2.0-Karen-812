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

function post() {
  document.getElementById("posted").className = "after_post";
  // document.getElementsByClassName('upper_section').className = 'invisible'
  // document.getElementsByClassName('under_section').className = 'invisible'
  document.getElementById("modal_inside").className = "hidden";
  tweet();
}

// 棒グラフ
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
    [29, 7],
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