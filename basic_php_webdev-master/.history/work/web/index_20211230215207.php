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
    <!-- <input type="text" name="message"> -->
    <!-- <textarea name="message"></textarea> -->
    <select name="color" id="">
        <option value=""></option>
    </select>
    <button>Send</button>
</form>

<?php
include('../app/_parts/_footer.php');