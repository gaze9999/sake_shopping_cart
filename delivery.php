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
    <form class="col-md-9" method="POST" action="">
      <section>
        <h2>配送方式</h2>
        <a class="continue-cky"><i class="fas fa-chevron-left"></i> 返回上一步</a>
        <hr>
        <button class="btn btn-dark">店到店</button>
        <button class="btn btn-dark active">宅配</button>
      </section>

      <section>
        <h2>訂購人</h2>
        <hr>
        <div class="form-row">
          <section class="form-group col-md-6">
            <label for="">姓名</label>
            <input type="text" class="form-control" maxlength="10" placeholder="請輸入中英文" required>
          </section>

          <section class="form-group col-md-6">
            <label class="radio-cky">先生</label>
            <input type="radio" value="male" name="gender" required>
            <label class="radio-cky">小姐</label>
            <input type="radio" value="female" name="gender" required>
          </section>

          <section class="form-group col-md-6">
            <label for="">聯絡手機</label>
            <input type="tel" class="form-control" placeholder="請輸入聯絡手機" name="phone" required>
          </section>
        </div>

        <div class="form-row">
          <section class="form-group col-md-12">
            <label for="">Email</label>
            <input type="email" class="form-control" maxlength="60" placeholder="請輸入電子信箱" required>
          </section>

          <section class="form-group col-md-6 ">
            <label for="">城市</label>
            <select class="mr-sm-2 custom-select " placeholder="selectCity" required>
              <option value="19">宜蘭縣</option>
            </select>
          </section>

          <section class="form-group col-md-4">
            <label for="">市區</label>
            <select class="custom-select mr-sm-2" placeholder="selectState" required>
              <option value=""></option>
            </select>
          </section>

          <section class="form-group col-md-2">
            <label for="">郵遞區號</label>
            <input type="text" class="form-control" required disabled>
          </section>

          <section class="form-group col-md-12">
            <label for="">地址</label>
            <input type="text" class="form-control" placeholder="請輸入詳細地址" required>
          </section>
        </div>
      </section>

      <section>
        <div class="shippingDetail-cky">
          <h3>收件人</h3>
          <hr>
          <section class="form-group col-md-12">
            <div class="form-check">
              <label class="form-check-label"><input type="checkbox" class="form-check-input">同訂購人</label>
            </div>
          </section>

          <section>
            <div class="form-row">
              <section class="form-group col-md-6">
                <label for="">姓名</label>
                <input type="text" class="form-control" maxlength="10" placeholder="請輸入中英文" required>
              </section>

              <section class="form-group col-md-6">
                <label class="radio-cky">先生</label>
                <input type="radio" value="male" name="gender" required>
                <label class="radio-cky">小姐</label>
                <input type="radio" value="female" name="gender" required>
              </section>

              <section class="form-group col-md-6">
                <label for="">聯絡手機</label>
                <input type="tel" class="form-control" placeholder="請輸入聯絡手機" name="phone" required>
              </section>
            </div>

            <div class="form-row">
              <section class="form-group col-md-6 ">
                <label for="">城市</label>
                <select class="mr-sm-2 custom-select " placeholder="selectCity" required>
                  <option value="19">宜蘭縣</option>
                </select>
              </section>

              <section class="form-group col-md-4">
                  <label for="">市區</label>
                  <select class="custom-select mr-sm-2" placeholder="selectState" required>
                    <option value=""></option>
                  </select>
              </section>

              <section class="form-group col-md-2">
                  <label for="">郵遞區號</label>
                  <input type="text" class="form-control" required disabled>
              </section>

              <section class="form-group col-md-12">
                <label for="">地址</label>
                <input type="text" class="form-control" placeholder="請輸入詳細地址" required>
              </section>

              <section class="form-group col-md-12">
                <div class="form-check">
                  <label class="form-check-label"><input type="checkbox" class="form-check-input">存為常用地址</label>
                </div>
              </section>
            </div>
          </section>
        </div>
      </section>

      <section>
        <h3>配送方式</h3>
        <hr>
        <div class="d-flex flex-column">
          <label class="" for="delivery2"><input type="radio" id="delivery2" name="deliveryRadios" value="2" required>常溫配送</label>
          <label class="" for="delivery3"><input type="radio" id="delivery3" name="deliveryRadios" value="3" required>低溫配送</label>
        </div>
      </section>

      <section>
        <h3>付款方式</h3>
        <hr>
        <div class="d-flex flex-column">
          <label class="" for="payment2"><input type="radio" id="payment2" name="paymentRadios" value="2" required>線上刷卡</label>
          <label class="" for="payment3"><input type="radio" id="payment3" name="paymentRadios" value="3" required>貨到付款</label>
        </div>
      </section>

      <section>
        <h3>發票</h3>
        <hr>
        <div class="d-flex flex-column">
          <label class="" for="receipt2"><input type="radio" id="receipt2" name="receiptRadios" value="2" required>電子發票</label>
          <label class="" for="receipt3"><input type="radio" id="receipt3" name="receiptRadios" value="3" required>公司發票</label>
        </div>
        <input type="text" class="tax-num-cky" placeholder="統編" required>
      </section>
    </form>

    <div class="col-md-3">
      <section class="shippingDuration-cky">
        <hgroup>
          <h5>快速到貨</h5>
          <h6>每日下午 14:00前完成訂單，可於下一個工作天宅配到貨，4個工作天內通知指定門市取貨。</h6>
        </hgroup>
      </section>
      <?php require_once('./tpl/cart/tpl-cart.php'); ?>
    </div>
  </div>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>