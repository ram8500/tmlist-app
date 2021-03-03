<?php
session_start();
require_once '../classes/UserLogic.php';

// if (!$logout = filter_input(INPUT_POST, 'logout')) {
//   exit('不正なリクエストです');
// }

// ログインしているか判定をし、セッションが切れていたらログインしてくださいとメッセージを出す
$result = UserLogic::checkLogin();

// if (!$result) {
//   exit('セッションが切れましたので、再度ログインしてください');
// }

// ログアウトする
UserLogic::logout();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./management.css">
  <title>ログアウト</title>
</head>
<body>
  <div class="container__">
    <div class="container_">
      <p><span>ログアウトしました</span></p>
      <a href="../main_form/main_form.html">トップ画面へ</a>
    </div>
  </div>
</body>
</html>