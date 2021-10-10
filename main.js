"use strict";

// `<h1>ガチで東京の人しか解けない！ #東京の難読地名クイズ</h1>`

let selections = new Array();
selections.push(["たかなわ", "たかわ", "こうわ"]);
selections.push(["かめいど", "かめど", "かめと"]);
selections.push(["こうじまち", "かゆまち", "おかとまち"]);
selections.push(["おなりもん", "ごせいもん", "おかどもん"]);
selections.push(["とどろき", "たたら", "たたりき"]);
selections.push(["しゃくじい", "せきこうい", "いじい"]);
selections.push(["ぞうしき", "ざっしき", "ざっしょく"]);
selections.push(["おかちまち", "ごしろちょう", "みとちょう"]);
selections.push(["ししぼね", "ろっこつ", "しこね"]);
selections.push(["こぐれ", "こばく", "こしゃく"]);

let images = [
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

for (let i = 0; i < 10; i++) {
  let content =
    `<div>` +
    `<h2>${i + 1}.この地名はなんて読む？</h2>` +
    `<img src="${images[i]}" alt="">` +
    `<ul id="selection_list${i}"></ul>` +
    `<div>` +
    `<p></p>` +
    `<p></p>` +
    `<p></p>` +
    `</div>` +
    `</div>`;
  document.getElementById("main").insertAdjacentHTML("beforeend", content);

  let choice1 = document.createElement("li");
  choice1.className = "selection";
  choice1.id = "selection_" + [i] + "_1";
  choice1.innerText = selections[i][0];
  let choice2 = document.createElement("li");
  choice2.className = "selection";
  choice2.id = "selection_" + [i] + "_2";
  choice2.innerText = selections[i][1];
  let choice3 = document.createElement("li");
  choice3.className = "selection";
  choice3.id = "selection_" + [i] + "_3";
  choice3.innerText = selections[i][2];

  document.getElementById("selection_list" + i).appendChild(choice1);
  document.getElementById("selection_list" + i).appendChild(choice2);
  document.getElementById("selection_list" + i).appendChild(choice3);

  let get_id_choice1 = document.getElementById("selection_" + [i] + "_1");
  let get_id_choice2 = document.getElementById("selection_" + [i] + "_2");
  let get_id_choice3 = document.getElementById("selection_" + [i] + "_3");

  get_id_choice1.onclick = function () {
    console.log("aaa");
  };

  get_id_choice1.onclick = function () {
    console.log("aaa");
  };
  
  get_id_choice1.onclick = function () {
    console.log("aaa");
  };
}