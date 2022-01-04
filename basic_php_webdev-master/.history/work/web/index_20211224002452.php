<?php

require('../app/functions.php');

$today = date('Y-m-d H:i:s l');
$names = [
  'Taro',
  'Jiro',
  'Saburo',
];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>
  <ul>
    <?php if (empty($names)): ?>
      <li>Nobody!</li>
    <?php else: ?>
    <?php foreach ($names as $name){ ?>
    <li><?= h($name); ?></li>
    <?php  ?>
  </ul>
</body>
</html>