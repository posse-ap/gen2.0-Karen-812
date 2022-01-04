<?php

require('../app/functions.php');
include('../app/_parts/_header.php');

// $today = date('Y-m-d H:i:s l');
// $names = [
//   'Taro',
//   'Jiro',
//   'Saburo',
// ];

?>

<p><?= h($message); ?></p>
<p><a href="index.php">Go back</a></p>

<?php
include('../app/_parts/_footer.php');