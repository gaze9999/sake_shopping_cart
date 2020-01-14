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
  <div class="container d-flex flex-wrap page_itemList">
    <!-- <div class="d-flex flex-wrap h-100"> -->
<!-- main field -->
      <section class="d-flex flex-wrap h-100 center_all itemList_list">
        <?php require_once('./tpl/itemList/tpl-itemlist.php'); ?>
      </section>
<!-- Catagory Tree -->
      <aside class="h-100 itemList_tree">
        <?php require_once('./tpl/itemList/tpl-itemlist-tree.php'); ?>
      </aside>
    <!-- </div> -->
  </div>
</main>

<a id="back-to-top" href="#" class="btn btn-dark btn-lg back-to-top" role="button">
  <i class="fas fa-chevron-up"></i>
</a>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/functions/itemList.js"></script>
<script src="./src/js/variables/itemList.js"></script>
<script src="./src/js/functions/itemListTree.js"></script>
<script src="./src/js/itemlistBtn.js"></script>
<script src="./src/js/functions/scrollToTop.js"></script>