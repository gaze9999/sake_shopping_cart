<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<h1 class="hidden_obj">本格清酒</h1>
<main class="container detail_frame">
  <header class="row w-100 center_all detail_header">
    <section class="col-12 d-flex center_all detail_header_title">
      <figure class="d-flex center_all" data-aos="zoom-in" data-aos-delay="200">
        <img class="img-fluid" src="./img/test/pic051.png" alt="">
        <h2 class="list_info_title">朝開酒藏</h2>
      </figure>
      <img class="position-absolute detail_titleCloud" data-aos="fade-left" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt="">
    </section>
    <section class="col-12 detail_header_breadcrumb">
      <h6 class=""> 首頁 &GT 朝開酒藏 &GT 南部流傳承造</h6>
    </section>
  </header>

  <section class="detail_item_sec">
    <div class="container">
      <div class="row center_all">
        <div class="col-md-6 col-sm-12 owl-carousel owl-theme d-flex center_all detail_carousel">
          <picture class="detail_carousel_item d-flex" data-aos="fade-right" data-aos-delay="200">
            <img class="detail_carousel_img" src="./img/test/slider01.png" alt="">
          </picture>
          <picture class="detail_carousel_item d-flex" data-aos="fade-right" data-aos-delay="200">
            <img class="detail_carousel_img" src="./img/test/slider02.png" alt="">
          </picture>
        </div>

        <div class="col-md-6 col-sm-12 detail_item">
          <figure class="d-flex center_all detail_item_title">
            <img class="position-absolute" src="./img/test/pic051.png" alt="">
            <h2 clas="detail_item_name">南部流伝承造り</h2>
          </figure>
          <article class="py-3 detail_item_content text-justify">
            採用岩手當地酒米「吟銀河」與百大名水「大慈清水」，以傳統釀造法重現岩手地酒之經典風味。
            帶有清涼的華麗香氣與柔軟乾淨的口感，與漸入層次的尾韻恰到好處地調和。搭配辛香漬物，
            更顯奔放。適合與洋蔥沙拉、紫蘇蘋果等辛香料理搭配。
          </article>
          <div class="row py-3 m-0 detail_item_function">
            <h2 class="col-6 text-center detail_item_price">$9999</h2>

            <form class="d-flex center_all detail_item_counts">
              <!-- can change to fontawesome -->
              <input class="detail_item_minus item_counts_btn" type="button" value="-">
              <!-- using js to show numbers -->
              <input class="detail_item_hold" type="number" value="1" min="1" max="99" maxlength="4">
              <input class="detail_item_plus item_counts_btn" type="button" value="+">
            </form>
          </div>

          <div class="row py-3 m-0 detail_item_function">
            <div class="col-6 d-flex center_all">
              <a class="d-flex center_all item_function_btn">
                <img src="./img/test/heart.svg" alt="">
                <p>加入收藏</p>
              </a>
            </div>
            <div class="col-6 d-flex center_all">
              <a class="d-flex center_all item_function_btn">
                <img src="./img/test/shopp_bag.svg" alt=""> 
                <p>加入酒袋</p>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script defer src="./dist/js/owl.carousel.min.js"></script>
<script defer src="./src/js/owlCarousel.js"></script>