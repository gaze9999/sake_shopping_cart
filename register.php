<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar { background: url('./img/bgs/bg001.gif') !important }
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important }
  /* .footer { position: fixed; bottom: 0; left: 0; right: 0 } */
</style>

<main class="container register_frame">
  <div class="row center_all">
    <header class="col-md-12 d-flex center_all">
      <h2>會員註冊</h2>
      <img class="" src="img/pic105.svg" alt="">
    </header>

    <section class="form-row flex-wrap m-3 justify-content-center">
      <div class="form-group col-12 col-md-6">
        <label class="form-label" for="login">您的帳號</label>
        <input type="text" id="login" class="" name="login" placeholder="您的帳號" required>
        <label class="form-label" for="password">密碼 (至少六位數)</label>
        <input type="password" id="password" class="" name="login" placeholder="您的密碼" required>
        <label class="form-label" for="password2">再次輸入密碼</label>
        <input type="password" id="password2" class="" name="login" placeholder="您的密碼" required>
      </div>
      <div class="form-group col-12 col-md-6">
        <label class="form-label" for="name">會員姓名</label>
        <input type="text" id="name" class="" name="login" placeholder="姓名" required>
        <label class="form-label" for="email">電子信箱</label>
        <input type="text" id="email" class="" name="login" placeholder="信箱" required>
        <label class="form-label" for="">性別</label>
        <div class="d-flex center_all btn-group">
          <input type="button" class="btn delivery_btn register_gender btn_selected" value="先生" data-gender="男">
          <input type="button" class="btn delivery_btn register_gender" value="小姐" data-gender="女">
        </div>
      </div>
      <div class="d-flex flex-column col-12">
        <input type="submit" class="my-3 register_btn" value="註冊">
        <a type="button" class="my-3 text-center signup_btn" href="./login.php" value="">已經是會員? 登入</a>
      </div>
    </section>
  </div>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/login.js"></script>
<script src="./src/js/register.js"></script>