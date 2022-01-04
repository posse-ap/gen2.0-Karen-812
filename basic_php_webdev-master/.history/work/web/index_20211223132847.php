<?php

require('../app/functions.php');

$today = date('Y-m-d H:i:s l');
$name = 'Taro <script>alert(1);</script>';
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
  <p>Hello, <?= h($name); ?>!</p>
  <!-- <p>Today: <?= date('Y-m-d H:i:s l'); ?></p>
  <p>Today: <?= $today; ?></p> -->
  <ul>
    <?php foreach ($names as $name) { ?>
    <li><?= h($name)</li>
    <?php } ?>
  </ul>
</body>
</html>