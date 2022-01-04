<?php

require('../app/functions.php');

$today = date('Y-m-d H:i:s l');
$names = [
  'Taro',
  'Jiro',
];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>
  <p>Hello, PHP!</p>
  <ul>
    <?php foreach ($names as $name){ ?>
    <li><?= h($name); ?></li>
    <?php } ?>
  </ul>
</body>
</html>