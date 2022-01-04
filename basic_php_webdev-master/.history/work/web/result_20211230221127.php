<?php

require('../app/functions.php');

// $colors = filter_input(INPUT_GET, 'colors', FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
$color = filter_input(INPUT_GET, 'color');

// $colors = empty($colors) ? 'None selected' : implode(',', $colors);
$colors = empty($colors) ? 'None selected' : implode(',', $colors);

// $message = trim(filter_input(INPUT_GET, 'message'));
// $message = $message !== '' ? $message : '...';
include('../app/_parts/_header.php');

?>

<p><?= h($color); ?></p>
<p><a href="index.php">Go back</a></p>

<?php
include('../app/_parts/_footer.php');