<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar { background: url('./img/bgs/bg001.gif') !important }
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important }
</style>
<main class="container checkout_frame">
  <div class="row">
    <form class="form-row col-md-9" method="POST" action="">
      <section class="form-group col-md-12 checkout_card_selection">
        <h4>付款方式</h4>
        <hr>
        <section class="row px-3">
          <div class="d-flex col-md-6 p-0 card_type">
            <a class="d-flex center_all"><i class="w-75 h-75 fab fa-cc-visa" style="color:navy;"></i></a>
            <a class="d-flex center_all"><i class="w-75 h-75 fab fa-cc-amex" style="color:blue;"></i></a>
          </div>
          <div class="d-flex col-md-6 p-0 card_type">
            <a class="d-flex center_all"><i class="w-75 h-75 fab fa-cc-mastercard" style="color:red;"></i></a>
            <a class="d-flex center_all"><i class="w-75 h-75 fab fa-cc-discover" style="color:orange;"></i></a>
          </div>
        </section>
      </section>

      <section class="form-group col-md-6 mt-5">
        <h4>請填寫信用卡資料</h4>
        <hr>
        <div class="d-flex flex-column">
          <label for="card_name">持卡人姓名</label>
          <input class="form-control" type="text" id="card_name" name="cardname" placeholder="John Doe" required>
          <label for="card_num">信用卡號</label>
          <input class="form-control" type="text" id="card_num" name="cardnumber" placeholder="1111-2222-3333-4444" required>
        </div>
      </section>

      <section class="form-group col-md-6 mt-5">
        <h4>有效日期及安全碼</h4>
        <hr>
        <div class="d-flex flex-column">
          <label for="expyear">Exp Year</label>
          <input class="form-control" type="text" id="expyear" name="expyear" placeholder="MM/YY" required>
        </div>
        <div class="d-flex flex-column">
          <label for="cvv">CVV</label>
          <input class="form-control" type="text" id="cvv" name="cvv" placeholder="789" required>
        </div>
      </section>

      <section class="form-group col-md-12">
        <hr>
        <div class=" d-flex justify-content-between btn-group">
          <input type="button" class="btn delivery_btn" value="返回上一步">
          <input type="submit" class="btn delivery_btn" value="完成">
        </div>
      </section>
    </form>

    <div class="col-md-3 checkout_info">
      <?php require_once('./tpl/cart/tpl-cart.php'); ?>
    </div>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/variables/delivery.js"></script>
<script src="./src/js/functions/delivery.js"></script>
<script src="./src/js/deliveryBtn.js"></script>