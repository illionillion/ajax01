<?php
session_start();

//クリックジャッキング対策
header('X-Frame-Options: DENY');

//トークンの生成
$token=sha1(uniqid(rand(),true));

//トークンを$_SESSIONに格納
$_SESSION['key']=$token;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせフォーム【ajax】</title>
  <style>
    *{
      outline:1px solid black;
    }
  </style>
</head>
<body>
  <div id="contact">
    <div class="inner">
      <h2 class="contact-title">お問い合わせフォーム</h2>
      <form action="" method="post" class="contact-form">
        <ul class="contact-form-list">
          <li class="contact-form-item">
            <input type="text" name="name" id="" placeholder="お名前" required>  
          </li>
          <li class="contact-form-item">
            <input type="email" name="email" placeholder="メールアドレス" required>
          </li>
          <li class="contact-form-item">
            <textarea name="comment" placeholder="内容" required></textarea>
          </li>
          <li class="contact-form-item">
             <!-- 作成したトークンを次のページに引き継ぐ-->
            <input type="hidden" name="token" value="<?= $token ?>">
          </li>
          <li class="contact-form-item">
           <button class='submit' type="submit">送信</button>
          </li>
        </ul>
      </form>

      <!-- 送信中に表示するモーダルウィンドウ -->
      <div id="modal">
        <p>送信中です・・・</p>
      </div><!-- /#modal -->
      
      <!-- 結果メッセージ -->
      <div id="result"></div><!-- /#result -->
    </div>
  </div>
<!-- jQueryの読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="main.js"></script>
</body>
</html>