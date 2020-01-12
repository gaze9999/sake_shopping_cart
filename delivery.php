<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important}
</style>
<main class="container devilery_frame">
  <div class="row">
    <form class="col-md-9 form-row" method="POST" action="">
      <section class="form-group col-md-12 delivery_ship">
        <hgroup class="d-flex justify-content-between align-items-center">
          <h4>配送方式</h4>
          <a>
            <h5><i class="fas fa-chevron-left"></i> 返回上一步</h5>
          </a>
        </hgroup>
        <hr>
        <div class="d-flex center_all btn-group">
          <input type="button" class="btn delivery_btn delivery_ship_p2p" value="店到店" data-ship="0">
          <input type="button" class="btn delivery_btn delivery_ship_p2o" value="宅配" data-ship="1">
        </div>
        <input type="hidden" class="delivery_ship_selection" val="1">
      </section>

      <section class="form-group col-md-12 delivery_order">
        <h4>訂購人</h4>
        <hr>
        <div class="form-row">
          <section class="form-group col-md-6">
            <label for="delivery_name">姓名</label>
            <input type="text" class="form-control" id="delivery_name" maxlength="10" placeholder="請輸入中英文" required>
            <label for="delivery_tel">聯絡手機</label>
            <input type="tel" class="form-control" id="delivery_tel" placeholder="請輸入聯絡手機" name="phone" required>
          </section>

          <section class="form-group d-flex col-md-6 m-0 justify-content-between delivery_order_gender">
            <div class="d-flex h-100 flex-grow-1 center_all btn-group">
              <input type="button" class="btn delivery_btn delivery_gender" value="先生" data-gender="0">
              <input type="button" class="btn delivery_btn delivery_gender" value="小姐" data-gender="1">
            </div>
          </section>
        </div>

        <div class="form-row">
          <section class="form-group col-md-12">
            <label for="delivery_order_email">Email</label>
            <input type="email" class="form-control" id="delivery_order_email" maxlength="60" placeholder="請輸入電子信箱" required>
          </section>
          <section class="form-group col-md-6">
            <label for="delivery_order_city">城市</label>
            <select class="mr-sm-2 custom-select" id="delivery_order_city" placeholder="selectCity" required>
              <option value="19">宜蘭縣</option>
            </select>
          </section>
          <section class="form-group col-md-4">
            <label for="delivery_order_state">市區</label>
            <select class="mr-sm-2 custom-select" id="delivery_order_state" placeholder="selectState" required>
              <option value=""></option>
            </select>
          </section>
          <section class="form-group col-md-2">
            <label for="delivery_order_post">郵遞區號</label>
            <input type="text" id="delivery_order_post" class="form-control" required disabled>
          </section>
          <section class="form-group col-md-12">
            <label for="delivery_order_address">地址</label>
            <input type="text" class="form-control" id="delivery_order_address" placeholder="請輸入詳細地址" required>
          </section>
        </div>
      </section>

      <section class="form-group col-md-12 delivery_reciver">
        <div class="delivery_recive">
          <h4>收件人</h4>
          <hr>
          <section class="form-group col-md-12">
            <div class="form-check delivery_recive_same">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                同訂購人
              </label>
            </div>
          </section>

          <section>
            <div class="form-row">
              <section class="form-group col-md-6">
                <label for="delivery_name">姓名</label>
                <input type="text" class="form-control" id="delivery_name2" maxlength="10" placeholder="請輸入中英文" required>
                <label for="delivery_tel">聯絡手機</label>
                <input type="tel" class="form-control" id="delivery_tel2" placeholder="請輸入聯絡手機" name="phone" required>
              </section>
              <section class="form-group d-flex col-md-6 m-0 justify-content-between delivery_reviver_gender">
                <div class="d-flex h-100 flex-grow-1 center_all btn-group">
                  <input type="button" class="btn delivery_btn delivery_gender" value="先生" data-gender="0">
                  <input type="button" class="btn delivery_btn delivery_gender" value="小姐" data-gender="1">
                </div>
              </section>
            </div>

            <div class="form-row">
              <section class="form-group col-md-12">
                <label for="delivery_reciver_email">Email</label>
                <input type="email" class="form-control" id="delivery_reciver_email" maxlength="60" placeholder="請輸入電子信箱" required>
              </section>
              <section class="form-group col-md-6">
                <label for="delivery_reciver_city">城市</label>
                <select class="mr-sm-2 custom-select" id="delivery_reciver_city" placeholder="selectCity" required>
                  <option value="19">宜蘭縣</option>
                </select>
              </section>
              <section class="form-group col-md-4">
                <label for="delivery_reciver_state">市區</label>
                <select class="mr-sm-2 custom-select" id="delivery_reciver_state" placeholder="selectState" required>
                  <option value=""></option>
                </select>
              </section>
              <section class="form-group col-md-2">
                <label for="delivery_reciver_post">郵遞區號</label>
                <input type="text" id="delivery_reciver_post" class="form-control" required disabled>
              </section>
              <section class="form-group col-md-12">
                <label for="delivery_reciver_address">地址</label>
                <input type="text" class="form-control" id="delivery_reciver_address" placeholder="請輸入詳細地址" required>
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

      <section class="form-group col-md-12 delivery_temperature">
        <h4>配送方式</h4>
        <hr>
        <div class="d-flex center_all btn-group">
          <input type="button" class="btn delivery_btn delivery_temp" data-temp="0" value="常溫配送" required>
          <input type="button" class="btn delivery_btn delivery_temp" data-temp="1" value="低溫配送" required>
        </div>
      </section>

      <section class="form-group col-md-12 delivery_payment">
        <h4>付款方式</h4>
        <hr>
        <div class="d-flex center_all btn-group">
          <input type="button" class="btn delivery_btn delivery_pay" data-temp="0" value="線上刷卡" required>
          <input type="button" class="btn delivery_btn delivery_pay" data-temp="1" value="貨到付款" required>
        </div>
      </section>

      <section class="form-group col-md-12 delivery_receipt">
        <h4>發票</h4>
        <hr>
        <div class="d-flex flex-column">
          <div class="d-flex center_all btn-group">
            <input type="button" class="btn delivery_btn delivery_receipt" data-rec="0" value="電子發票" required>
            <input type="button" class="btn delivery_btn delivery_receipt" data-rec="1" value="貨到付款" required>
          </div>
          <input type="text" class="mt-5 p-3" placeholder="統編" value="">
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
      <section class="checkout_info_help">
        <hgroup>
          <h5>快速到貨</h5>
          <p>每日下午 14:00前完成訂單，可於下一個工作天宅配到貨，4個工作天內通知指定門市取貨。</p>
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