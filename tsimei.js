//問題文

//選択肢の配列
var takanawa_selection = ["たかなわ", "たかわ", "こうわ"];
var kameido_selection = ["かめいど", "かめど", "かめと"];
var koujimachi_selection = ["こうじまち", "かゆまち", "おかとまち"];
var onarimon_selection = ["おなりもん", "ごせいもん", "おかどもん"];
var todoroki_selection = ["とどろき", "たたら", "たたりき"];
var syakujii_selection = ["しゃくじい", "せきこうい", "いじい"];
var zoshiki_selection = ["ぞうしき", "ざっしき", "ざっしょく"];
var okachimachi_selection = ["おかちまち", "ごしろちょう", "みとちょう"];
var shishibone_selection = ["ししぼね", "ろっこつ", "しこね"];
var kogure_selection = ["こぐれ", "こばく", "こしゃく"];

var selections = [
  takanawa_selection,
  kameido_selection,
  koujimachi_selection,
  onarimon_selection,
  todoroki_selection,
  syakujii_selection,
  zoshiki_selection,
  okachimachi_selection,
  shishibone_selection,
  kogure_selection,
];
var images = [
  "https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",
  "https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",
  "https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png",
  "https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png",
  "https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png",
  "https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png",
  "https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png",
  "https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png",
  "https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png",
  "https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png",
];

for (let i = 0; i <= 9; i++) {
  /* 
        <h2> X.この地名はなんて読む？</h2>
        <img src=""  alt="">
        <ul>
        <li></li>
        <li></li>
        <li></li>
        </ul>
        <div><p>
    */

  //h2要素(問題文)作成
  var h2_element = document.createElement("h2");
  h2_element.innerText = i + 1 + ".この地名はなんて読む？";
  document.getElementById("question").appendChild(h2_element);
  // img要素を作成
  var img_element = document.createElement("img");
  img_element.src = images[i]; // 画像パス
  img_element.alt = "images[i]"; // 代替テキスト
  document.getElementById("question").appendChild(img_element);
  //ul,li*3(選択肢)
  let ul_element = document.createElement("ul");
  let text0 = document.createElement("li");
  text0.innerText = selections[i][0];
  text0.id = "correct_sentakushi" + [i];
  text0.className = "before_click";
  let text1 = document.createElement("li");
  text1.innerText = selections[i][1];
  text1.id = "wrong_sentakushi1" + [i];
  text1.className = "before_click";
  let text2 = document.createElement("li");
  text2.innerText = selections[i][2];
  text2.id = "wrong_sentakushi2" + [i];
  text2.className = "before_click";
  // document.getElementById("question").appendChild(text0);
  // document.getElementById("question").appendChild(text1);
  // document.getElementById("question").appendChild(text2);

  //選択肢のシャッフル処理
  array = [text0, text1, text2];
  newArray = [];
  let n = array.length;
  let k = Math.floor(Math.random() * n);
  let text_k = array[k];
  console.log(text_k);
  document.getElementById("question").appendChild(text_k);
  newArray.push(array[k]); // array のk番目を newArray に追加
  array.splice(k,1); // array のk番目を削除

  n = array.length;
  l = Math.floor(Math.random() * n);
  let text_l = array[l];
  console.log(text_l);
  document.getElementById("question").appendChild(text_l);
  newArray.push(array[l]);
  array.splice(l,1);

  n = array.length;
  m = Math.floor(Math.random() * n);
  let text_m = array[m];
  console.log(text_m);
  document.getElementById("question").appendChild(text_m);
  newArray.push(array[m]);
  array.splice(m,1);

  array.push(array[k],array[l],array[m]);
  newArray.splice(0,1,2);

  //結果・解説部分
  const result = document.createElement("div");
  result.id = "result" + [i];
  result.className = "invisible"; //はじめは非表示
  document.getElementById("question").appendChild(result);

  //JSでID作った場合も、読み込みする！！
  let correct_sentakushi = document.getElementById("correct_sentakushi" + [i]);
  let wrong_sentakushi = document.getElementById("wrong_sentakushi1" + [i]);
  let wrong_sentakushi2 = document.getElementById("wrong_sentakushi2" + [i]);

  //解説部分作成
  //「正解！」
  const description1 = document.createElement("p");
  description1.id = "description1";
  description1.className = "invisible";
  description1.innerText = "正解！";
  document.getElementById("result" + [i]).appendChild(description1);
  //「不正解！」
  const description2 = document.createElement("p");
  description2.id = "description2";
  description2.className = "invisible";
  description2.innerText = "不正解！";
  document.getElementById("result" + [i]).appendChild(description2);
  //「正解は～です！」
  const description3 = document.createElement("p");
  description3.id = "description3";
  description3.className = "invisible";
  description3.innerText = "正解は 「" + selections[i][0] + "」 です！";
  document.getElementById("result" + [i]).appendChild(description3);

  // 選択後の処理
  //解説の表示・非表示の切り替え
  correct_sentakushi.onclick = function () {
    //選択した部分を白字・青背景にする
    correct_sentakushi.className = "correct_after_clicked";
    wrong_sentakushi.className = "after_click_other";
    wrong_sentakushi2.className = "after_click_other";
    //「正解！」を出す
    description1.className = "description1_visible";
    description3.className = "description3_visible";
    description2.className = "invisible";
    result.className = "result";
  };

  wrong_sentakushi.onclick = function () {
    //正解の選択肢を白字・青背景にする
    correct_sentakushi.className = "correct_after_clicked";
    //選択した部分を白字・赤背景にする
    wrong_sentakushi.className = "wrong_after_clicked";
    wrong_sentakushi2.className = "after_click_other";

    //不正解！を出す
    description2.className = "description2_visible";
    description3.className = "description3_visible";
    description1.className = "invisible";
    result.className = "result";
  };

  wrong_sentakushi2.onclick = function () {
    //正解の選択肢を白字・青背景にする
    correct_sentakushi.className = "correct_after_clicked";
    //選択した部分を白字・赤背景にする
    wrong_sentakushi2.className = "wrong_after_clicked";
    wrong_sentakushi.className = "after_click_other";

    //不正解！を出す
    description2.className = "description2_visible";
    description3.className = "description3_visible";
    description1.className = "invisible";
    result.className = "result";
  };
}
