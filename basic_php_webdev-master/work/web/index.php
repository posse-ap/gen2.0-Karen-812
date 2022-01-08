<?php

require('../app/functions.php');

createToken();

// filenameを2回定義してしまっている⇨定数にする
define('FILENAME', '../app/message.txt');

// POSTされた時だけ処理を実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

validateToken();

    $message = trim(filter_input(INPUT_POST, 'message'));
    $message = $message !== '' ? $message : '...';
    // trim() をしたあとに、空文字ではなかったら $message をそのまま使って、
    // もし空文字になってしまっていたら何も入力されなかったということで、無言のメッセージを意味する '...' にしておきましょう。
    
    $fp = fopen(FILENAME, 'a');
    fwrite($fp, $message . "\n");
    fclose($fp);

    header('Location: http://localhost:8080/result.php');
    exit;
}

$messages = file(FILENAME, FILE_IGNORE_NEW_LINES);

include('../app/_parts/_header.php');

?>

<ul>
    <?php foreach ($messages as $message): ?>
        <li><?= h($message); ?></li>
    <?php endforeach; ?>    
</ul>

<form action="index.php" method="post">
    <input type="text" name="message">
    <button>Post</button>
    <input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
</form>

<?php
include('../app/_parts/_footer.php');