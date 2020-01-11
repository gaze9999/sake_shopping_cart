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
    <form class="col-md-9 d-flex flex-column" action="">
      <section class="">
        <h4>請選擇付款方式</h4>
        <div>
          <label class="" for="p2p">貨到付款</label>
          <input type="radio" name="shipment" id="p2p">
          <label class="" for="p2o">線上付款</label>
          <input type="radio" name="shipment" id="p2o">
        </div>
      </section>
      <section class="d-flex flex-column py-4">
        <h4>請填寫信用卡資料</h4>
        <div class="card_type">
          <i class="fab fa-cc-visa" style="color:navy;"></i>
          <i class="fab fa-cc-amex" style="color:blue;"></i>
          <i class="fab fa-cc-mastercard" style="color:red;"></i>
          <i class="fab fa-cc-discover" style="color:orange;"></i>
        </div>
        <div class="d-flex flex-column">
          <label for="card_name">持卡人姓名</label>
          <input type="text" id="card_name" name="cardname" placeholder="John Doe">
          <label for="card_num">信用卡號</label>
          <input type="text" id="card_num" name="cardnumber" placeholder="1111-2222-3333-4444">
        </div>
        <div class="d-flex flex-column py-4">
          <h4>有效日期及安全碼</h4>
          <div class="d-flex">
            <div class="flex-grow-1">
              <label for="expyear">Exp Year</label>
              <input class="" type="text" id="expyear" name="expyear" placeholder="MM/YY">
            </div>
            <div class="flex-grow-1">
              <label for="cvv">CVV</label>
              <input class="" type="text" id="cvv" name="cvv" placeholder="789">
            </div>
          </div>
        </div>
      </section>
      <section>
        <input class="btn" type="submit" value="返回上一步" class="p-prebtn-hyh">
        <input class="btn" type="submit" value="完成" class="p-btn-hyh">
      </section>
    </form>

    <div class="col-md-3">
      <h4>購物車<i class="fa fa-shopping-cart"></i></h4>
      <div class="d-flex flex-column">
        <a href="#">ITEM1<span class="price">$</span></a>
        <a href="#">ITEM2<span class="price">$</span></a>
        <a href="#">ITEM3<span class="price">$</span></a>
      </div>
      <hr>
      <p>總金額: </p>
    </div>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>