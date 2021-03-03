<?php

session_start();

require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result) {
  header('Location: mypage.php');
  return;
}

$err = $_SESSION;

$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./management.css">
  <title>ログイン登録画面</title>
</head>
<body>
  <div class="container">
      <div class="container_title">
        <h2>ログインフォーム</h2>
      </div>
      <div class="container_">
          <?php if (isset($err['msg'])) : ?>
            <P><?php echo $err['msg']; ?></p>
            <?php endif; ?>
        <form action="login.php" method="POST">
            <p>
            <label for="email">メールアドレス :</label>
            <input type="email" name="email">
            <?php if (isset($err['email'])) : ?>
            <P><?php echo $err['email']; ?></p>
            <?php endif; ?>
            </p>
            <p>
            <label for="password">パスワード :</label>
            <input type="password" name="password">
            <?php if (isset($err['password'])) : ?>
            <P><?php echo $err['password']; ?></p>
            <?php endif; ?>
            </p>
            <p>
            <input type="submit" value="ログイン">
            </p>
        </form>
        <a href="signup_form.php"><input type="submit" value="新規登録"></a>
      </div>
  </div>
</body>
</html>