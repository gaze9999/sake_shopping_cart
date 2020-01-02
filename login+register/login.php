<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,500,700,900&display=swap" rel="stylesheet">
    <title>User System</title>
</head>
<body>

<!-- ---這頁想說是登入頁不要放微動畫的設定 所以code比較少沒有太多註解--- -->	 
<section>
  <div class="header">
    <h2>會員登入</h2>
    <img class="mainlogo-hyh" src="img/pic105.svg" alt="">
  </div>

<form method="post" action="login.php">
<?php include('errors.php'); ?>
  <div class="input-group-hyh">
    <label>您的帳號</label>
    <input type="text" name="username"> 
  </div>

  <div class="input-group-hyh">
    <label>您的密碼</label>
    <input type="text" name="password"> 
  </div>

  <div class="input-group-hyh">
    <button type="submit" name="login" class="btn-hyh">登入</button>
  </div>

<!-- ---連結註冊頁面--- -->	 
  <a href="register.php">
      還不是會員? 註冊
  </a>

</form>
</section>
</body>
</html>