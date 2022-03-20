<?php

require('function.php');


// $message = filter_input(INPUT_GET, 'date');
// $content = filter_input(INPUT_GET, 'nyobi');

// $colors = filter_input(INPUT_GET, 'nyobi', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
// $colors = empty($colors) ? 'None selected' : implode(',', $colors);

// include('../app/_parts/_header.php');

// POST
$filename = 'init.sql';
// $filename = '../../mysql/sql/init.sql';
$messages = file($filename, FILE_IGNORE_NEW_LINES);

$message1 = trim(filter_input(INPUT_POST, 'nyobi'));
$message = trim(filter_input(INPUT_POST, 'message'));
$message = $message !== '' ? $message : '...';

// $filename = 'input_data.txt';
$fp = fopen($filename, 'a');
fwrite($fp, $message);
fclose($fp);

/*  内部
<ul>
  <?php foreach ($messages as $message): ?>
    <li><?= h($message); ?></li>
  <?php endforeach; ?>
</ul>
*/

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHP Practice</title>
</head>
<body>


    
    <p>
    <?= h($message1); ?>
    <?= h($nyobi); ?>
    <?= h($colors); ?>
</p>
<p>
    <a href="index.php">Go back</a>
</p>



</body>
</html>