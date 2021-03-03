<?php
require_once 'env.php';
// エラー内容表示
ini_set('display_errors', true);
function connect()
{
    $host = DB_HOST;
    $db = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;

    $dsn = "mysql:host=$host;dbname=$db;charsetutf8mb4";


    // try {
    //   $pdo = new PDO($dsn, $user, $pass, [
    //     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    //   ]);
    //   return $pdo;

    // } catch(PDOExeption $e) {
    //   echo '接続失敗です。'. $e->getMessage();
    //   exit();
    // }


    //mysqlworkbench:本番環境処理
try{
  $db=new PDO('mysql:dbname=heroku_f298e9c0cfab437;host=us-cdbr-east-03.cleardb.com;charset=utf8','b82a73385697c4','383e78da');
}catch(PDOException $e){
  print('DB接続エラー:'.$e->getMessage());
}


}


