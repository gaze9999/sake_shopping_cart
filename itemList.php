<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
require_once('./tpl/func-buildTree.php');
// require_once('./tpl/func-getRecursiveCategoryIds.php'); 
?>
<main class="my-5 main_frame">
  <div class="container-fluid page_itemlist">
    <header class="row itemList_header">
      <section class="col-md-12 col-sm-12 list_info">
        <!-- add title and breadcrumb here -->
      </section>
    </header>
    <div class="row itemList_frame">
<!-- Catagory Tree -->
      <aside class="col-md-2 col-sm-3 itemList_tree">
        <?php TreeRegion($pdo, 1); ?>
        <input type="hidden" class="tree_id" 
        data-cId="<?php if (isset($_GET['cId'])) { echo $_GET['cId']; }; ?>"
        data-pId="<?php if (isset($_GET['pId'])) { echo $_GET['pId']; }; ?>"
        >
      </aside>

<!-- main field -->
      <section class="col-md-8 col-sm-6 d-flex flex-wrap itemList_list">
        <?php require_once('./tpl/tpl-itemlist.php'); ?>
      </section>

<!-- filter -->
      <aside class="col-md-2 col-sm-3 itemList_filter">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="商品名稱" aria-label="itemName" aria-describedby="basic-addon1">
        </div>
        <p>
          <label for="amount">商品價格範圍:</label>
          <!-- <input type="text" id="amount" readonly placeholder="xxxxxxx"> -->
        </p>
      </aside>
    </div>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/itemlistGetlist.js"></script>