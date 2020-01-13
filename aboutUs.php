<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<main class="container-fluid position-relative about_frame">
  <video class="w-100 h-100 about_video" src="./video/Slow-Fire.mp4" autoplay loop></video>
  <div class="about_video_cover"></div>
    <section class="w-100 position-relative rellax about_header_sec" data-rellax-speed="-4">
      <header class="d-flex w-100 position-absolute center_all">
        <img class="img-fluid d-block main_icon" src="./img/icons/main_icon.svg" alt="">
        <h1>關 於 我 們</h1>
      </header>
    </section>
    <section class="rellax d-flex position-relative center_all about_article" data-rellax-speed="-10">
      <div class="d-flex center_all">
        <article class="about_article_content">自二零一九年成立（民國一零八年）以來，<br/>本格の酒一直致力於<br/>在福爾摩沙這塊土地<br/>將清酒的香醇與濃郁推廣到整座島嶼。<br/>推廣的不僅是清酒，還包括有400多年曆史的清酒文化。<br/>就讓我們在酒香與微醺之中<br/>逐步探尋那隱藏在瓶底的百年歷史。</article>
      </div>
    </section>
    <section class="position-absolute rellax about_water_1" data-rellax-speed="-2">
    </section>
    <section class="position-absolute rellax about_water_2" data-rellax-speed="5">
    </section>
    <section class="position-absolute rellax about_water_3" data-rellax-speed="10">
    </section>
    <section class="position-absolute rellax about_water_4" data-rellax-speed="10">
    </section>
    <section class="position-absolute rellax about_water_5" data-rellax-speed="10">
    </section>
    <section class="position-absolute d-flex justify-content-center about_water_6">
      <a href="./main.php">返回首頁</a>
    </section>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script defer src="./dist/js/rellax.min.js"></script>
<script defer src="./src/js/rellax.js"></script>