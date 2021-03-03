<?php
session_start();
require_once 'cal_date.php';
require_once '../classes/UserLogic.php';
// require_once '../login/functions.php';
// ログインしているか判定をし、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
$_SESSION['login_err'] = 'ユーザーを登録してログインしてください';
header('Location: signup_form.php');
return;
}

$login_user = $_SESSION['login_user'];

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>PHPカレンダー</title>
    <!-- CSS -->
    <link rel="stylesheet" href="cal_style.css">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- awesome -->
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->

    <!-- view -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap  ver5.0.0-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- bootstrap  ver5.0.0 /JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="container_header">
      <div class="container_header1">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>">&gt;</a></h3>
      </div>
      <div class="container_header1">
        <form action="../login/logout.php"    method="POST">
          <input type="submit" class="button" name="logout" value="ログアウト">
        </form>
      </div>
    </div>
    <!-- <table class="table table-bordered" id="table1"> -->
    <table class="table table-bordered">
      <tr>
        <th>日</th>
        <th>月</th>
        <th>火</th>
        <th>水</th>
        <th>木</th>
        <th>金</th>
        <th>土</th>
      </tr>
      <?php
          foreach ($weeks as $week) {
              echo $week;
          }
      ?>
    </table>
    <!-- modal -->
    <div class="menu_modal" id="plan-modal">
          <div class="close-modal"><p>X</p></div>
        <div id="plan-form">
          <h2>Today'sMission</h2>
          <form action="#" method="POST">
            <p>
              <label for="title">タイトル</label>
              <input type="text" name="title">
            </p>
            <ul class="time">
                  <li class="time_">
                    <?php
                        //クエリパラメータから時間取得
                        $get_event_time_start = 0;
                        $get_event_time_end = 24;

                        echo "<select name=\"ご希望時間\">";
                        for ($i = $get_event_time_start * 2; $i <= $get_event_time_end * 2; $i++) {
                          echo "<option>".date("H時i分", strtotime("00:00 +". $i * 30 ." minute"));
                        }
                        echo "</select>";
                      ?>
                  </li>
                  <li class="time_"><div>~</div></li>
                  <li class="time_">
                      <?php
                          //クエリパラメータから時間取得
                          $get_event_time_start = 0;
                          $get_event_time_end = 24;

                          echo "<select name=\"ご希望時間\">";
                          for ($i = $get_event_time_start * 2; $i <= $get_event_time_end * 2; $i++) {
                            echo "<option>".date("H時i分", strtotime("00:00 +". $i * 30 ." minute"));
                          }
                          echo "</select>";
                      ?>
                  </li>
            </ul>
            <p>
              <label for="content">備考</label>
              <br>
              <textarea name="content" cols="25" rows="5"></textarea>
            </p>
            <br>
            <p>
              <button type="button" onclick="submit();">保存</button>
            </p>
          </form>
        </div>
    </div>
<!-- modal -->
    <table class="table-details table table-bordered">
      <thead>
        <tr>
          <th colspn="2" class="details">
            <div id="select_day"><?php echo $today1;?></div>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="details">予定の内容</td>
        </tr>
      </tbody>
    </table>
  </div>
<script src="cal_script.js"></script>
</body>
</html>