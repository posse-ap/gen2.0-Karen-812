<?php

require('../app/functions.php');

$color = transparent

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

    <!-- <select name="colors[]" multiple> -->
        <!-- <option value="orange">Orange</option>
        <option value="pink">Pink</option>
        <option value="gold">Gold</option> -->
    <!-- </select> -->
        <label for=""><input type="radio" name="color" value="orange">Orange</label>
        <label for=""><input type="radio" name="color" value="pink">Pink</label>
        <label for=""><input type="radio" name="color" value="gold">Gold</label>
    <button>Send</button>
</form>

<?php
include('../app/_parts/_footer.php');