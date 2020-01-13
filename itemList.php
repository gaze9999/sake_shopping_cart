<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important}
</style>
<main class="container-fluid itemList_frame">
  <header class="row w-100 center_all itemList_header">
    <section class="col-12 d-flex center_all list_info">
      <h2 class="list_info_title"></h2>
      <!-- add title and breadcrumb here -->
    </section>
  </header>
  <div class="container page_itemList">
    <div class="row">
<!-- Catagory Tree -->
      <aside class="col-sm-12 col-md-2 itemList_tree itemList_navbar">
        <?php require_once('./tpl/itemList/tpl-itemlist-tree.php'); ?>
      </aside>

<!-- main field -->
      <section class="col-sm-12 col-md-10 d-flex center_all flex-wrap itemList_list">
        <?php require_once('./tpl/itemList/tpl-itemlist.php'); ?>
      </section>
    </div>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/functions/itemList.js"></script>
<script src="./src/js/variables/itemList.js"></script>
<script src="./src/js/functions/itemListTree.js"></script>
<script src="./src/js/itemlistBtn.js"></script>