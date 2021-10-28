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
}


// 棒グラフ
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
      
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', '');
      data.addColumn('number', '');

      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1],
        []
      ]);

      var options = {
        title: 'Motivation Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('columnchart'));

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
    colors: ['#0345EC', '#0F71BD', '#20BDDE', '#3CCEFE','#B29EF3', '#6D46EC', '#4A17EF','#3105C0'],
    chartArea: {
      // leave room for y-axis labels
      width: '98%'
    },
    legend: {position: 'bottom'}
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
    [ "ドットインストール", 20],
    ["課題", 40],
  ]);

  var options = {
    title: "",
    pieHole: 0.4,
    // width: 300,
    // height: 300,
    colors: ['#0345EC', '#0F71BD', '#20BDDE'],
    legend: {position: 'bottom'}
  };

  var chart = new google.visualization.PieChart(
    document.getElementById("donutchart2")
  );
  chart.draw(data, options);
}
