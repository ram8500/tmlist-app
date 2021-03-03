<?php

/**
 * XSS対策 : エスケープ処理
 *
 * @param string $str 対象の文字列
 * @return string 処理された文字列
 */
function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

/**
 *  CRRF対策
 */
// トークンを生成
// フォームからそのトークンを送信
// 送信後の画面でトークンを照会
// トークンを削除
function setToken() {
  $csrf_token = bin2hex(random_bytes(32));
  $_SESSION['csrf_token'] = $csrf_token;

  return $csrf_token;
}