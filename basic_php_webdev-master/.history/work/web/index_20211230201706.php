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

<form action="result.php" method="get">
    <input type="text" name="message">
    <input type="text" name="username">
    <button>Send</button>
</form>

<?php
include('../app/_parts/_footer.php');