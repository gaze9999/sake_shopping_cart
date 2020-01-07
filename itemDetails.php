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
      <div class="row">
        <div class="col-md-6 col-sm-12 owl-carousel owl-theme d-flex center_all detail_carousel">
          <picture class="d-flex detail_carousel_item" data-aos="fade-right" data-aos-delay="200">
            <img class="detail_carousel_img" src="./img/test/slider01.png" alt="">
          </picture>
          <picture class="d-flex detail_carousel_item" data-aos="fade-right" data-aos-delay="200">
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
          <form class="row py-3 m-0 d-flex flex-column detail_item_function">
            <div class="d-flex center_all detail_item_counts">
              <h2 class="col-6 text-center detail_item_price">$9999</h2>
              <!-- can change to fontawesome -->
              <input class="detail_item_minus item_counts_btn" type="button" value="-">
              <!-- using js to show numbers -->
              <input class="detail_item_hold" type="number" value="1" min="1" max="99" maxlength="4">
              <input class="detail_item_plus item_counts_btn" type="button" value="+">
            </div>

            <select class="my-3" name="capacity" id="">
              <option value="720">720ml</option>
              <option value="1800">1800ml</option>
            </select>
          </form>

          <div class="row m-0 detail_item_function">
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

  <section class="detail_item_info">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <header class="row w-100 center_all detail_header_title">
            <figure class="d-flex center_all" data-aos="zoom-in" data-aos-delay="200">
              <img class="img-fluid" src="./img/test/pic051.png" alt="">
              <h2 class="list_info_title">產品細節</h2>
            </figure>
            <figure>
              <!-- <img class="position-absolute detail_titleCloud" data-aos="fade-left" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt="">
              <img class="position-absolute detail_titleCloud" data-aos="fade-right" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt=""> -->
            </figure>
          </header>
        </div>

        <div class="col-md-12 py-3 detail_info_list">
          <div class="row">
            <dl class="col-md-6 d-flex flex-wrap">
              <dt data-aos="zoom-in" data-aos-delay="200">酒造名稱</dt>
              <dd data-aos="zoom-in" data-aos-delay="200">朝開酒藏</dd>
              <dt data-aos="zoom-in" data-aos-delay="400">酒款名稱</dt>
              <dd data-aos="zoom-in" data-aos-delay="400">南部流伝承造り</dd>
              <dt data-aos="zoom-in" data-aos-delay="600">生產地方</dt>
              <dd data-aos="zoom-in" data-aos-delay="600">東北地方</dd>
              <dt data-aos="zoom-in" data-aos-delay="800">生產縣市</dt>
              <dd data-aos="zoom-in" data-aos-delay="800">岩手縣</dd>
            </dl>
            <dl class="col-md-6 d-flex flex-wrap">
              <dt data-aos="zoom-in" data-aos-delay="300">清酒等級</dt>
              <dd data-aos="zoom-in" data-aos-delay="300">大吟醸酒</dd>
              <dt data-aos="zoom-in" data-aos-delay="500">清酒原料</dt>
              <dd data-aos="zoom-in" data-aos-delay="500">吟銀河</dd>
              <dt data-aos="zoom-in" data-aos-delay="700">日本酒度</dt>
              <dd data-aos="zoom-in" data-aos-delay="700">15</dd>
              <dt data-aos="zoom-in" data-aos-delay="900">商品容量</dt>
              <dd data-aos="zoom-in" data-aos-delay="900">720ml</dd>
            </dl>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="detail_item_feature">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <header class="row w-100 center_all detail_header_title">
            <figure class="d-flex center_all" data-aos="zoom-in" data-aos-delay="200">
              <img class="img-fluid" src="./img/test/pic051.png" alt="">
              <h2 class="list_info_title">特色介紹</h2>
            </figure>
            <figure>
              <!-- <img class="position-absolute detail_titleCloud" data-aos="fade-left" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt="">
              <img class="position-absolute detail_titleCloud" data-aos="fade-right" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt=""> -->
            </figure>
          </header>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
        </div>

        <div class="col-md-8">
          <dl class="d-flex detail_item_feature">
            <dt data-aos="flip-left" data-aos-delay="200">酸度</dt>
            <dt data-aos="flip-left" data-aos-delay="300">日本酒度</dt>
            <dt data-aos="flip-left" data-aos-delay="400">精米步合</dt>
            <dt data-aos="flip-left" data-aos-delay="500">胺基酸度</dt>
          </dl>
          <dl class="d-flex detail_item_feature item_feture_data">
            <dd data-aos="flip-left" data-aos-delay="200">1.35</dd>
            <dd data-aos="flip-left" data-aos-delay="300">4</dd>
            <dd data-aos="flip-left" data-aos-delay="400">50%</dd>
            <dd data-aos="flip-left" data-aos-delay="500">0.9</dd>
          </dl>
          <article class="pt-3">
            華麗及奔放的花果香，在入口前就能充份感受到，是一支能有似葡萄酒香氣的酒款，入口能感受到酸口感，平衡了口中酒體，順口又帶有豐富的口感讓人不會忘記。一度被譽為「十四代接班人」的飛露喜，在國際競賽中屢獲殊榮，更於今年
            IWC 中大放異彩獲得金賞殊榮！許多人對於飛露喜的印象就是「極難入手」。
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="detail_item_recommand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <header class="row w-100 center_all detail_header_title">
            <figure class="d-flex center_all" data-aos="zoom-in" data-aos-delay="200">
              <img class="img-fluid" src="./img/test/pic051.png" alt="">
              <h2 class="list_info_title">本格推薦</h2>
            </figure>
            <figure>
              <!-- <img class="position-absolute detail_titleCloud" data-aos="fade-left" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt="">
              <img class="position-absolute detail_titleCloud" data-aos="fade-right" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt=""> -->
            </figure>
          </header>
        </div>
      </div>
      <div class="row">
      <div class="col-md-12 owl-carousel owl-theme recommand_carousel">
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="200">
          <img class="item_rec_img" src="./img/test/otherItems/otherItems01.png">
          <h6 class="text-center item_rec_title">醉心氷わり本醸造原酒</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="300">
          <img class="item_rec_img" src="./img/test/otherItems/otherItems02.png">
          <h6 class="text-center item_rec_title">謙信大吟釀</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="400">
          <img class="item_rec_img" src="./img/test/otherItems/otherItems03.png">
          <h6 class="text-center item_rec_title">久保田 生原酒</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="500">
          <img class="item_rec_img" src="./img/test/otherItems/otherItems04.png">
          <h6 class="text-center item_rec_title">冬将軍　純米にごり酒</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="600">
          <img class="item_rec_img" src="./img/test/otherItems/otherItems05.png">
          <h6 class="text-center item_rec_title">獺祭 50</h6>
        </figure>
      </div>
    </div>
  </section>
</main>

<?php
require_once('./tpl/tpl-warning.php');
require_once('./tpl/tpl-footer.php');
require_once('./tpl/tpl-html-foot.php');
?>
<script src="./src/js/functions/itemDetail.js"></script>
<script defer src="./dist/js/owl.carousel.min.js"></script>
<script defer src="./src/js/owlCarousel.js"></script>