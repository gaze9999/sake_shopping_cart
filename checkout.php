<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important}
</style>
<main class="container checkout_frame">
  <div class="row">
    <form class="form-row col-md-9" method="POST" action="">
      <section class="form-group col-md-12">
        <h4>付款方式</h4>
        <hr>
        <section class="form-row">
          <div class="form-group d-flex col-md-12">
            <div class="form-check mr-3">
              <label class="form-check-label" for="p2p"><input class="form-check-input" type="radio" name="shipment" id="p2p" disabled>貨到付款</label>
            </div>
            <div class="form-check ml-3">
              <label class="form-check-label" class="" for="p2o"><input class="form-check-input" type="radio" name="shipment" id="p2o" disabled>線上付款</label>
            </div>
          </div>
          <div class="form-group col-md-12 card_type">
            <i class="fab fa-cc-visa" style="color:navy;"></i>
            <i class="fab fa-cc-amex" style="color:blue;"></i>
            <i class="fab fa-cc-mastercard" style="color:red;"></i>
            <i class="fab fa-cc-discover" style="color:orange;"></i>
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
        <input class="btn" type="submit" value="返回上一步" class="p-prebtn-hyh">
        <input class="btn" type="submit" value="完成" class="p-btn-hyh">
      </section>
    </form>

    <div class="col-md-3">      
      <?php require_once('./tpl/cart/tpl-cart.php'); ?>
    </div>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>