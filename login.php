<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar { background: url('./img/bgs/bg001.gif') !important }
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important }
  .footer { position: fixed; bottom: 0; left: 0; right: 0 }
</style>
<main class="container login_frame">
  <div class="row center_all">
    <header class="col-md-12 d-flex center_all">
      <h2>會員登入</h2>
      <img class="" src="img/pic105.svg" alt="">
    </header>
  
    <section class="form-row d-flex flex-column m-3 justify-content-center">
      <div class="form-group">
        <label class="form-label" for="login">您的帳號</label>
        <input type="text" id="login" class="" name="login" placeholder="您的帳號" required>
      </div>
      <div class="form-group">
        <label class="form-label" for="password">您的密碼</label>
      <input type="password" id="password" class="" name="login" placeholder="您的密碼" required>
      </div>
      <input type="submit" class="my-3 login_btn" value="登入">
      <input type="button" class="my-3 signup_btn" href="./register.php" value="還不是會員? 註冊">
    </section>
  </div>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/login.js"></script>