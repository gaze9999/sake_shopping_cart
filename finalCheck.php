<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>

<main class="container finelCheck_frame">
    <header class="final_header"></header>
  <div class="row">
    <section class="row final_cart">

    </section>
  </div>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/variables/final.js"></script>
<script src="./src/js/functions/final.js"></script>
<script src="./src/js/finalBtn.js"></script>