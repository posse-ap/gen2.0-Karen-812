<?php
  $today = date('Y-m-d H:i:s l');
  $name = 'Taro';
  ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>
  <p>Hello, PHP!</p>
  <p>Hello, <?= $name >!</p>
  <p>Today: <?= date('Y-m-d H:i:s l'); ?></p>
  <p>Today: <?= $today; ?></p>
</body>
</html>