<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>

<main class="my-5 h-100 d-flex center_all">
  <header class="row w-100 center_all detail_header">
    <section class="col-md-12 col-sm-12 d-flex center_all detail_header_title">
      <figure class="" data-aos="zoom-in" data-aos-delay="200">
        <img class="" src="./img/test/pic051.png" alt="">
        <h2 class="list_info_title">朝開酒藏</h2>
      </figure>
      <img data-aos="fade-left" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt="">
    </section>
  </header>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>