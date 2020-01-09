<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important}
</style>
<main class="container cart_frame">
  <header class="row w-100 center_all fixed-top cart_header">
    <section class="col-12 d-flex center_all cart_info">
      <h2 class="cart_title">購物車</h2>
    </section>
  </header>

  <div class="row cart_list">
    <section class="table-responsive cart_list_table">
      <table class="table table-striped table-bordered cart_table">
        <thead class="thead-light cart_table_head">
          <th scope="col">#</th>
          <th scope="col">商品圖</th>
          <th scope="col">商品名</th>
          <th scope="col">價格</th>
          <th scope="col">數量</th>
        </thead>
        <tbody class="cart_table_body">

        </tbody>
        <tfoot class="cart_table_foot">

        </tfoot>
      </table>
    </section>
  </div>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src=""></script>