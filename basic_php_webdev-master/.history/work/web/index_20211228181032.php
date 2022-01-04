<?php

require('../app/functions.php');
include
// $today = date('Y-m-d H:i:s l');
// $names = [
//   'Taro',
//   'Jiro',
//   'Saburo',
// ];
?>


  <ul>
    <?php if (empty($names)): ?>
      <li>Nobody!</li>
    <?php else: ?>
    <?php foreach ($names as $name): ?>
    <li><?= h($name); ?></li>
    <?php endforeach; ?>
    <?php endif; ?>
  </ul>