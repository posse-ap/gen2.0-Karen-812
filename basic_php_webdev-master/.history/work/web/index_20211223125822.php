<?php
  $today = date('Y-m-d H:i:s l');
  $name = 'Taro';

  function h($str){
    return htmlspecialchars($name, ENT_QUOTES) ?>!</p>
  }
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>
  <p>Hello, PHP!</p>
  <p>Hello, <?= htmlspecialchars($name, ENT_QUOTES) ?>!</p>
  <p>Today: <?= date('Y-m-d H:i:s l'); ?></p>
  <p>Today: <?= $today; ?></p>
</body>
</html>