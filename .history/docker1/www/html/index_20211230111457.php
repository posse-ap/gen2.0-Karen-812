<?php
phpinfo();

$con = mysql_connect('127.0.0.1', 'root', '1234');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('phpdb', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$result = mysql_query('SELECT * FROM address', $con);
while ($data = mysql_fetch_array($result)) {
  echo '<p>' . $data['no'] . ':' . $data['name'] . ':' . $data['tel'] . "</p>\n";
}

$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
</body>
</html>