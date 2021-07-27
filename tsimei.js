//問題文

//選択肢の配列
var takanawa_selection = ['たかなわ', 'たかわ', 'こうわ'];
var kameido_selection = ['かめいど', 'かめど', 'かめと'];
var koujimachi_selection = ['こうじまち', 'かゆまち', 'おかとまち'];
var onarimon_selection = ['おなりもん', 'ごせいもん', 'おかどもん'];
var todoroki_selection = ['とどろき', 'たたら', 'たたりき'];
var syakujii_selection = ['しゃくじい', 'せきこうい', 'いじい'];
var zoshiki_selection = ['ぞうしき', 'ざっしき', 'ざっしょく'];
var okachimachi_selection = ['おかちまち', 'ごしろちょう', 'みとちょう'];
var shishibone_selection = ['ししぼね', 'ろっこつ', 'しこね'];
var kogure_selection = ['こぐれ', 'こばく', 'こしゃく'];

var selections = [takanawa_selection, kameido_selection, koujimachi_selection, onarimon_selection, todoroki_selection, syakujii_selection, zoshiki_selection, okachimachi_selection, shishibone_selection, kogure_selection];
var images = ['https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png', 'https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png', 'https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png', 'https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png', 'https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png',
    'https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png', 'https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png', 'https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png', 'https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png', 'https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png'];

for (let i = 0; i <= 9; i++) {
    /* 
        <h2> X.この地名はなんて読む？</h2>
        <img src=""  alt="">
        <ul>
        <li></li>
        <li></li>
        <li></li>
        </ul>
    */
    //h2要素作成
    var h2_element = document.createElement('h2');
    h2_element.innerText = i + 1 + '.この地名はなんて読む？';
    document.getElementById('mondai').appendChild(h2_element);
    // img要素を作成
    var img_element = document.createElement('img');
    img_element.src = images[i]; // 画像パス
    img_element.alt = 'images[i]'; // 代替テキスト
    document.getElementById('mondai').appendChild(img_element);
    //ul,li*3
    var ul_element = document.createElement('ul');
    let text0 = document.createElement('li');
    text0.innerText = selections[i][0];
    text0.id = 'correct_sentakushi'+[i];
    let text1 = document.createElement('li');
    text1.innerText = selections[i][1];
    text1.id = 'wrong_sentakushi1'+[i];
    let text2 = document.createElement('li');
    text2.innerText = selections[i][2];
    text2.id = 'wrong_sentakushi2'+[i];
    document.getElementById('mondai').appendChild(text0);
    document.getElementById('mondai').appendChild(text1);
    document.getElementById('mondai').appendChild(text2);
    //divタグ作って入れることができなかったのはなぜ？

//以下、選択後の処理 

//JSでID作った場合も、読み込みする！！
let correct_sentakushi = document.getElementById('correct_sentakushi'+[i]);
let wrong_sentakushi = document.getElementById('wrong_sentakushi1'+[i]);
let wrong_sentakushi2 = document.getElementById('wrong_sentakushi2'+[i]);

    correct_sentakushi.onclick = function () {
        //選択した部分を白字・青背景にする
        correct_sentakushi.style.background = '#287dff';
        correct_sentakushi.style.color = 'white';
        //「正解！」を出す
        const kaisetsu = document.createElement('div');
        kaisetsu.id='kaisetsu'
        document.getElementById('mondai').appendChild(kaisetsu);

        const answer1 = document.createElement('p');
        answer1.innerText = '正解！';
        answer1.id = 'answer1'
        document.getElementById('kaisetsu').appendChild(answer1);
        //「正解は～です！」
        const answer2 = document.createElement('p');
        answer2.innerText = '正解は 「' + selections[i][0] + '」 です！';
        answer2.id = 'answer2'
        document.getElementById('kaisetsu').appendChild(answer2);
    };
    wrong_sentakushi.onclick = function () {
        //選択した部分を白字・青背景にする
        correct_sentakushi.style.background = '#287dff';
        correct_sentakushi.style.color = 'white';
        //選択した部分を白字・赤背景にする
        wrong_sentakushi.style.background = '#ff5128';
        wrong_sentakushi.style.color = 'white';

        //不正解！を出す
        const answer3 = document.createElement('p');
        answer3.innerText = "不正解！";
        answer3.id = 'answer3';
        document.getElementById('kaisetsu').appendChild(answer3);
        //「正解は～です！」
        const answer4 = document.createElement('p');
        answer4.innerText = '正解は 「' + selections[i][0] + '」 です！';
        answer4.id = 'answer4';
        document.getElementById('kaisetsu').appendChild(answer4);
    };
    wrong_sentakushi2.onclick = function () {
        //選択した部分を白字・青背景にする
        correct_sentakushi.style.background = '#287dff';
        correct_sentakushi.style.color = 'white';
        //選択した部分を白字・赤背景にする
        wrong_sentakushi2.style.background = '#ff5128';
        wrong_sentakushi2.style.color = 'white';
        
        //不正解！を出す
        const answer3 = document.createElement('p');
        answer3.innerText = "不正解！";
        answer3.id = 'answer3';
        document.getElementById('kaisetsu').appendChild(answer3);
        //「正解は～です！」
        const answer4 = document.createElement('p');
        answer4.innerText = '正解は 「' + selections[i][0] + '」 です！';
        answer4.id = 'answer4';
        document.getElementById('kaisetsu').appendChild(answer4);
    };
};