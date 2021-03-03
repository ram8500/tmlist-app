<?php
session_start();

require_once '../classes/UserLogic.php';

$err = [];

if(!$email = filter_input(INPUT_POST, 'email')) {
  $err['email'] = 'メールアドレスを記入してください。';
}
if(!$password = filter_input(INPUT_POST, 'password')) {
  $err['password'] = 'パスワードを記入してください。';
}


if (count($err) > 0) {
  // エラー時の処理
  $_SESSION = $err;
  header('Location: login_form.php');
  return;
}
  // ログイン成功時の処理
  $result = UserLogic::login($email, $password);
  // ログイン失敗時の処理
  if (!$result) {
    header('Location: login_form.php');
    return;
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./management.css">
  <title>ログイン完了</title>
</head>
<body>
<div class="container__">
  <div class="container_">
    <p><span>ログインしました</span></p>
    <a href="../cal_main/cal_main.php">マイページへ</a>
  </div>
</div>
</body>
</html>