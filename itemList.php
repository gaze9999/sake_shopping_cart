<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
<<<<<<< HEAD
require_once('./func.php/func-buildTree.php');
// require_once('./tpl/func-getRecursiveCategoryIds.php'); 
?>
<main class="my-5 main_frame">
  <div class="container-fluid page_itemlist">
    <header class="row w-100 itemList_header">
      <section class="col-md-12 col-sm-12 w-100 list_info">
        <h2 class="text-center list_info_title"></h2>
        <!-- add title and breadcrumb here -->
      </section>
    </header>
    <div class="row itemList_frame">
<!-- Catagory Tree -->
      <aside class="col-md-2 col-sm-3 itemList_tree itemList_navbar">
        <?php TreeRegion($pdo, 1); ?>
      </aside>
=======
// require_once('./tpl/func-getRecursiveCategoryIds.php'); 
?>
<h1 class="hidden_obj">本格清酒</h1>
<main class="my-5 itemList_frame h-100 d-flex center_all">
  <header class="row w-100 d-flex center_all fixed-top itemList_header">
    <section class="col-md-12 col-sm-12 d-flex center_all list_info">
      <h2 class="list_info_title"></h2>
      <!-- add title and breadcrumb here -->
    </section>
  </header>
  <div class="row w-100 page_itemList">
<!-- Catagory Tree -->
    <aside class="col-md-2 col-sm-2 itemList_tree itemList_navbar">
      <?php require_once('./tpl/tpl-itemlist-tree.php'); ?>
    </aside>
>>>>>>> 932eaa08699dd043d57b6af682180d1ee7b2b396

<!-- main field -->
    <section class="col-md-8 col-sm-8 d-flex flex-wrap itemList_list">
      <?php require_once('./tpl/tpl-itemlist.php'); ?>
    </section>

<!-- filter -->
<<<<<<< HEAD
      <aside class="col-md-2 col-sm-3 itemList_filter itemList_navbar">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="商品名稱" aria-label="itemName" aria-describedby="basic-addon1">
        </div>
        <p>
          <label for="amount">商品價格範圍:</label>
          <!-- <input type="text" id="amount" readonly placeholder="xxxxxxx"> -->
        </p>
      </aside>
    </div>
=======
    <aside class="col-md-2 col-sm-2 itemList_filter itemList_navbar">
      <?php require_once('./func/func-filters.php'); ?>
      <?php require_once('./tpl/tpl-filters.php'); ?>
    </aside>
>>>>>>> 932eaa08699dd043d57b6af682180d1ee7b2b396
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/functions/itemList.js"></script>
<script src="./src/js/functions/itemListTree.js"></script>
<script src="./src/js/variables/itemList.js"></script>
<script src="./src/js/itemlistBtn.js"></script>