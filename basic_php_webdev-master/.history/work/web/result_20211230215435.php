<?php

require('../app/functions.php');

$color = filter_input(INPUT_GET, 'color');

// $message = trim(filter_input(INPUT_GET, 'message'));
// $message = $message !== '' ? $message : '...';
include('../app/_parts/_header.php');

?>

<!-- <p><?= nl2br(h($color)); ?></p> -->
<p><a href="index.php">Go back</a></p>

<?php
include('../app/_parts/_footer.php');