<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" >
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC:400,500,700,900&display=swap" rel="stylesheet">
</head>
<body>

<section>

<!-- ---微動畫圖片--- -->	
<figure>
	<img class="bg-wgr-hyh" src="img/bg_wgr.svg" alt="">
</figure>
<!-- --------------- -->

  <div class="header">
	  <h2 >註冊會員</h2>
	<figure>
	  <img class="mainlogo-hyh" src="img/pic105.svg" alt="">
	</figure>
  </div>
	
<!-- ---註冊頁面--- -->
  <form method="post" action="register.php">
<!-- --------------- -->

<!-- ---連結error頁面--- -->
	<?php include('errors.php'); ?>
<!-- --------------- -->	  
  
  	<div class="input-group-hyh flex-row">
  	  <label>您的帳號</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	  
		<div class="input-group-hyh flex-row">
			<label>您的信箱</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
	  
			<div class="input-group-hyh flex-row">
				<label>設定您的密碼</label>
				<input type="password" name="password_1">
			</div>
	  
		<div class="input-group-hyh flex-row">
			<label>確認密碼</label>
			<input type="password" name="password_2">
		</div>

<!-- ---加入會員btn--- -->		  
  	<div class="input-group-hyh flex-row">
  	  <button type="submit" class="btn-hyh" name="reg_user">加入會員</button>
	</div>
<!-- --------------- -->

<!-- ---已經是會員連結login頁面--- -->	  
  	<a href="login.php">
  		已經是會員? 點我登入
  	</a>
  </form>
<!-- --------------- -->

<!-- ---微動畫圖片--- -->	
  	<figure>
		<img class="bg-wgr-hyh02" src="img/bg_wgr.svg" alt="">
	</figure>
<!-- --------------- -->
  </section>
</body>
</html>