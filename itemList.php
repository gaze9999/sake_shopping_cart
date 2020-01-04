<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
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

<!-- main field -->
    <section class="col-md-8 col-sm-8 d-flex flex-wrap itemList_list">
      <?php require_once('./tpl/tpl-itemlist.php'); ?>
    </section>

<!-- filter -->
    <aside class="col-md-2 col-sm-2 itemList_filter itemList_navbar">
      <?php require_once('./func/func-filters.php'); ?>
      <?php require_once('./tpl/tpl-filters.php'); ?>
    </aside>
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