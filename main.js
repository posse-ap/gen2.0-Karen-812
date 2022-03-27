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