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
<main class="container cart_frame">
  <header class="row w-100 center_all fixed-top cart_header">
    <section class="col-12 h-100 d-flex center_all cart_info">
      <h2 class="cart_title">購物車</h2>
    </section>
  </header>

  <div class="row cart_list">
    <section class="table-responsive cart_list_table">
      <table class="table table-striped table-bordered cart_table">
        <thead class="thead-light cart_table_head">
          <tr>
            <th scope="col">#</th>
            <th scope="col">商品圖</th>
            <th scope="col">商品名</th>
            <th scope="col">容量</th>
            <th scope="col">單價</th>
            <th scope="col">數量</th>
            <th scope="col">刪除</th>
          </tr>
        </thead>
        <tbody class="cart_table_body cart_table_items">
        </tbody>
      </table>
    </section>
    
    <section class="table-responsive cart_list_table cart_table_bottom">
      <table class="table table-bordered cart_table">
        <thead class="thead-light cart_table_head">
          <th scope="col">商品總數</th>
          <th scope="col">數量合計</th>
          <th scope="col">商品總價</th>
        </thead>
        <tbody class="cart_table_tbody">
          <td class="cart_total_items"></td>
          <td class="cart_total_qty"></td>
          <td class="cart_total_price"></td>
        </tbody>
      </table>
        <div class=" d-flex justify-content-between btn-group py-3">
          <a class="btn delivery_btn cart_clearCart" role="button">清空購物車</a>
          <a class="btn delivery_btn cart_checkout" role="button">前往結帳</a>
        </div>
    </section>
  </div>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/variables/cart.js"></script>
<script src="./src/js/functions/cartFunctions.js"></script>
<script src="./src/js/cartBtn.js"></script>