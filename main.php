<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<div class="fixed-top main_bg"></div>
<main class="main_frame">
  <div class="container-fluid d-flex flex-column center_all page_main">
    <div class="row w-100">
      <section class="col-sm-12 col-md-12 col-xl-12 w-100 main_sakura">
        <section class="d-flex center_all main_logoSec">
          <header class="h-100" data-aos="zoom-out" data-aos-duration="1000">
            <figure class="d-flex center_all">
              <img class="img-fluid main_logo" src="./img/icons/main_icon.svg" alt="本格の酒">
              <h1 class="text-center">本 格 の 酒</h1>
            </figure>
          </header>
        </section>

        <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex center_all main_article_center">
          <article class="d-flex w-100 center_all main_article_about" data-aos="zoom-out" data-aos-duration="1000">自二零一九年成立（民國一零八年）以來，<br/>本格の酒一直致力於<br/>在福爾摩沙這塊土地<br/>將清酒的香醇與濃郁推廣到整座島嶼。<br/>推廣的不僅是清酒，還包括有400多年曆史的清酒文化。<br/>就讓我們在酒香與微醺之中<br/>逐步探尋那隱藏在瓶底的百年歷史。</article>
        </section>
        <canvas id="sakura"></canvas>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex flex-column main_news">
        <figure class="row d-flex flex-column center_all index_title">
          <img class="img-fluid main_logo" src="./img/icons/sake_icon.svg" alt="">
          <h2 class="main_subtitle">最新消息</h2>
        </figure>
        <?php require_once('./tpl/main/tpl-main-news.php'); ?>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex flex-column center_all main_knowledge">
        <?php require_once('./tpl/main/tpl-main-knowledge.php'); ?>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex flex-column main_recommand">
        <figure class="d-flex flex-column center_all index_title">
          <img class="img-fluid main_logo" src="./img/icons/sake_icon.svg" alt="">
          <h2 class="main_subtitle">本格推薦</h2>
        </figure>
        <?php require_once('./tpl/main/tpl-main-recommand.php'); ?>
        <?php require_once('./tpl/main/tpl-main-cloud.php'); ?>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex flex-column center_all main_map">
        <figure class="d-flex flex-column center_all index_title">
          <img class="img-fluid main_logo" src="./img/icons/sake_icon.svg" alt="">
          <h2 class="main_subtitle">酒造地圖</h2>
        </figure>
        <?php require_once('./tpl/main/tpl-main-map.php'); ?>
      </section>
    </div>
  </div>
</main>
<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/main/tpl-main-sakura.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
<script src="./src/js/mainMap.js"></script>
<script defer src="./src/js/sakura.js"></script>