<?php

require('../app/functions.php');

$message = filter_input(INPUT_GET)

include('../app/_parts/_header.php');

?>

<p><?= h($message); ?></p>
<p><a href="index.php">Go back</a></p>

<?php
include('../app/_parts/_footer.php');