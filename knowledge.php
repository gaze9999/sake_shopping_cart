<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<header class="know_header know_bg">
  <div class="d-flex flex-column know_title" data-aos="fade-up" data-aos-delay="100">
    <div class="d-flex flex-column center_all">
      <h3>本格清酒專家</h3>
      <h1>給您滿滿的知識大平台</h1>    
    </div>
    <div class="d-flex flex-column center_all know_mouse">
      <p class="know_mousep">Scroll</p>
      <i class="know_mouseIcon"></i>
    </div>
  </div>
</header>
<main class="main_frame">
  <?php require_once('./tpl/tpl-knowledge-carousel.php'); ?>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script defer src="./dist/js/owl.carousel.min.js"></script>
<script defer src="./src/js/owlCarousel.js"></script>