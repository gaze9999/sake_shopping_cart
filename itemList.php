<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
require_once("./tpl/func-buildTree.php");
require_once("./tpl/func-getRecursiveCategoryIds.php"); 
?>
<main class="page_itemlist">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-sm-12 list_info">
        
      </div>
    </div>
    <div class="row">
<!-- Catagory Tree -->
      <div class="col-md-2 col-sm-3">
        <?php buildTree($pdo, 1); ?>
      </div>

<!-- main field -->
      <div class="col-md-8 col-sm-6 d-flex flex-wrap item_list">
        <?php for($i=0;$i<20;$i++) {require('./tpl/tpl-itemcard.php'); }; ?>
      </div>

<!-- filter -->
      <div class="col-md-2 col-sm-3">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="商品名稱" aria-label="itemName" aria-describedby="basic-addon1">
        </div>
        <p>
          <label for="amount">商品價格範圍:</label>
          <input type="text" id="amount" readonly placeholder="xxxxxxx">
        </p>
        <div id="slider-range"></div>
      </div>

    </div>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>