<?php

require('function.php');

// POSTされたのを受け取る
$filename = 'init.sql';  // できない！涙 = '../../mysql/sql/init.sql';
$message1 = trim(filter_input(INPUT_POST, 'contents'));
$day = trim(filter_input(INPUT_POST, 'date'));
$message = $message !== '' ? $message : '...';


// ファイルに書き込み
$content = implode(' ', $_POST['contents']);
$fp = fopen($filename, 'a');
fwrite($fp, $content);
fclose($fp);

/*  内部
<ul>
  <?php 
    $messages = file($filename, FILE_IGNORE_NEW_LINES);
    $message = trim(filter_input(INPUT_POST, 'message'));
    
    foreach ($messages as $message): ?>
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
    <?php
    // var_dump( $_POST['contents']);
    echo $content; // 2,3,4
    echo $day;
    ?>
</p>
<p>
    <a href="index.php">Go back</a>
</p>



</body>
</html>