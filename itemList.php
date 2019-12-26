<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
require_once('./func/func-buildVTree.php');
// require_once('./tpl/func-getRecursiveCategoryIds.php'); 
?>
<main class="my-5 main_frame h-100 d-flex center-all">
  <header class="row w-100 d-flex center-all fixed-top itemList_header">
    <section class="col-md-12 col-sm-12 d-flex center-all list_info">
      <h2 class="list_info_title"></h2>
      <!-- add title and breadcrumb here -->
    </section>
  </header>
  <div class="row w-100 page_itemList">
<!-- Catagory Tree -->
    <aside class="col-md-2 col-sm-2 itemList_tree itemList_navbar">
      <?php vTree($pdo); ?>
    </aside>

<!-- main field -->
    <section class="col-md-8 col-sm-8 d-flex flex-wrap itemList_list">
      <?php require_once('./tpl/tpl-itemlist.php'); ?>
    </section>

<!-- filter -->
    <aside class="col-md-2 col-sm-2 itemList_filter itemList_navbar">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="商品名稱" aria-label="itemName" aria-describedby="basic-addon1">
      </div>
      <p>
        <label for="amount">商品價格範圍:</label>
        <!-- <input type="text" id="amount" readonly placeholder="xxxxxxx"> -->
      </p>
    </aside>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/itemlistGetVlist.js"></script>