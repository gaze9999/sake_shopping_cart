<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<style>
  .navbar-dark, .navbar-nav, .nav-link, .navbar-brand { color: #000 !important}
</style>
<header class="know_header know_bg">
  <div class="d-flex flex-column know_title" data-aos="fade-up" data-aos-delay="100">
    <hgroup class="d-flex flex-column center_all">
      <h3>本格清酒專家</h3>
      <h1>給您滿滿的知識大平台</h1>   
    </hgroup>
    <div class="d-flex flex-column center_all know_mouse">
      <p class="know_mousep">Scroll</p>
      <i class="know_mouseIcon"></i>
    </div>
  </div>
</header>
<main class="container know_frame">
  <section class="row know_carousel">
    <?php require_once('./tpl/knowledge/tpl-knowledge-carousel.php'); ?>
  </section>
  <section class="row know_contents">
    <?php require_once('./tpl/knowledge/tpl-knowledge-content.php'); ?>
    <?php require_once('./tpl/knowledge/tpl-knowledge-aside.php'); ?>
  </section>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script defer src="./dist/js/owl.carousel.min.js"></script>
<script defer src="./src/js/owlCarousel.js"></script>