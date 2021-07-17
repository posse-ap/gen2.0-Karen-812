//1問目
const sentakushi1 = document.getElementById('sentakushi1');
const sentakushi2 = document.getElementById('sentakushi2');
const sentakushi3 = document.getElementById('sentakushi3');
const kaisetsu1 = document.getElementById('kaisetsu1')
const kaisetsu2 = document.getElementById('kaisetsu2')
const kaisetsu3 = document.getElementById('kaisetsu3')
const kaisetsu4 = document.getElementById('kaisetsu4')

sentakushi1.onclick = function () {
    sentakushi1.style.background = '#287dff';
    sentakushi1.style.color = 'white';
    
    //「正解！」を出す 
    kaisetsu1.innerText ="";
    const text1 = document.createElement('h4');
    text1.innerText = '正解！';
    kaisetsu1.appendChild(text1);
    kaisetsu1.style.background = '#f5f5f5';
    //「正解は～です！」
    kaisetsu2.innerText ="";
    const text = document.createElement('p');
    text.innerText = '正解は「たかなわ」です！';
    kaisetsu2.appendChild(text);
    kaisetsu2.style.background = '#f5f5f5';

};

sentakushi2.onclick = function () {
    sentakushi1.style.background = '#287dff';
    sentakushi1.style.color = 'white';
　　//不正解の部分を赤くする
    sentakushi2.style.background = '#ff5128';
    sentakushi2.style.color = 'white';

    //不正解！を出す
    kaisetsu3.innerText ="";
    const text3 = document.createElement('h4');
    text3.innerText = "不正解！";
    kaisetsu3.appendChild(text3);
    kaisetsu3.style.background = '#f5f5f5';
    //「正解は～です！」
    kaisetsu4.innerText ="";
    const text = document.createElement('p');
    text.innerText = '正解は「たかなわ」です！';
    kaisetsu4.appendChild(text);
    kaisetsu4.style.background = '#f5f5f5';
};

sentakushi3.onclick = function () {
    sentakushi1.style.background = '#287dff';
    sentakushi1.style.color = 'white';
　　//不正解の部分を赤くする
    sentakushi3.style.background = '#ff5128';
    sentakushi3.style.color = 'white';

　　//不正解！を出す
    kaisetsu3.innerText ="";
    const text3 = document.createElement('h4');
    text3.innerText = "不正解！";
    kaisetsu3.appendChild(text3);
    kaisetsu3.style.background = '#f5f5f5';
    //「正解は～です！」
    kaisetsu4.innerText ="";
    const text = document.createElement('p');
    text.innerText = '正解は「たかなわ」です！';
    kaisetsu4.appendChild(text);
    kaisetsu4.style.background = '#f5f5f5';
};

