<?php


function h($str){
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function createToken()
{
  if(!isset($_SESSION['token'])){
    $_SESSION['token'] = bin2hex(random_bytes(32));
  }
}

function validateToken()
{
  if(
    empty($_SESSION['token']) ||
    $_SESSION['token'] !== filter_input(INPUT_POST, 'token')
  ){
    exit('Invalid post request');
  }
}
// トークンのチェックでは Session のトークンが空だったり、
// もしくは、Session のトークンと、 POST で渡ってきたトークンが一致しなかった場合に、処理を終了

session_start();