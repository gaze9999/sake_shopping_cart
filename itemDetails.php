<?php
session_start();
require_once('./db.inc.php');
require_once('./tpl/tpl-html-head.php');
require_once('./tpl/tpl-header.php');
?>
<input type="hidden" id="detailId" name="itemId" value="<?php echo $_GET['id'] ?>">
<main class="container detail_frame">
  <header class="row w-100 center_all detail_header">
    <section class="col-12 d-flex center_all detail_header_title">
      <figure class="d-flex center_all" data-aos="zoom-in" data-aos-delay="200">
        <img class="img-fluid" src="./img/test/pic051.png" alt="">
        <h2 class="list_info_title detail_brewName">酒造名稱</h2>
      </figure>
      <img class="position-absolute detail_titleCloud" data-aos="fade-left" data-aos-delay="200" src="./img/bgs/seigaiwa-sm.svg" alt="">
    </section>
    <section class="col-12 detail_header_breadcrumb">
      <h6 class="detail_breadcrumb"> 首頁 &GT OO &GT OO</h6>
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
            <h2 class="detail_item_name">商品名稱</h2>
          </figure>
          <article class="py-3 text-justify detail_item_content">
            產品介紹
          </article>
          <form class="row py-3 m-0 d-flex flex-column detail_item_function">
            <div class="d-flex center_all detail_item_counts">
              <h2 class="col-6 text-center detail_item_price">價格</h2>
              <!-- can change to fontawesome -->
              <input class="detail_item_minus item_counts_btn" type="button" value="-">
              <!-- using js to show numbers -->
              <input class="detail_item_hold" type="number" value="1" min="1" max="99" maxlength="4">
              <input class="detail_item_plus item_counts_btn" type="button" value="+">
            </div>

            <select class="my-3" name="capacity" id="item_select_cap">
              <option value="720">容量1</option>
              <option value="1800">容量2</option>
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
              <dd data-aos="zoom-in" data-aos-delay="200" class="detail_brewName">BrewName</dd>
              <dt data-aos="zoom-in" data-aos-delay="400">酒款名稱</dt>
              <dd data-aos="zoom-in" data-aos-delay="400" class="detail_item_name">ItemName</dd>
              <dt data-aos="zoom-in" data-aos-delay="600">生產地方</dt>
              <dd data-aos="zoom-in" data-aos-delay="600" class="detail_item_region">Region</dd>
              <dt data-aos="zoom-in" data-aos-delay="800">生產縣市</dt>
              <dd data-aos="zoom-in" data-aos-delay="800" class="detail_item_pref">Prefecture</dd>
            </dl>
            <dl class="col-md-6 d-flex flex-wrap">
              <dt data-aos="zoom-in" data-aos-delay="300">清酒等級</dt>
              <dd data-aos="zoom-in" data-aos-delay="300" class="detail_item_var">Variety</dd>
              <dt data-aos="zoom-in" data-aos-delay="500">清酒原料</dt>
              <dd data-aos="zoom-in" data-aos-delay="500" class="detail_item_rice">Rice</dd>
              <dt data-aos="zoom-in" data-aos-delay="700">日本酒度</dt>
              <dd data-aos="zoom-in" data-aos-delay="700" class="detail_item_shudo">Nihonshudo</dd>
              <dt data-aos="zoom-in" data-aos-delay="900">商品容量</dt>
              <dd data-aos="zoom-in" data-aos-delay="900" class="detail_item_cap">Capacity</dd>
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
            <dd data-aos="flip-left" data-aos-delay="200" class="detail_item_acidity">Acidity</dd>
            <dd data-aos="flip-left" data-aos-delay="300" class="detail_item_shudo">Nihonshudo</dd>
            <dd data-aos="flip-left" data-aos-delay="400" class="detail_item_seimaibuai">Seimaibuai</dd>
            <dd data-aos="flip-left" data-aos-delay="500" class="detail_item_amino">Amino</dd>
          </dl>
          <article class="pt-3">
            產品介紹2
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
          <img class="item_rec_img" src="./img/icons/main_icon.svg">
          <h6 class="text-center item_rec_title">品名</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="300">
          <img class="item_rec_img" src="./img/icons/main_icon.svg">
          <h6 class="text-center item_rec_title">品名</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="400">
          <img class="item_rec_img" src="./img/icons/main_icon.svg">
          <h6 class="text-center item_rec_title">品名</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="500">
          <img class="item_rec_img" src="./img/icons/main_icon.svg">
          <h6 class="text-center item_rec_title">品名</h6>
        </figure>
        <figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="600">
          <img class="item_rec_img" src="./img/icons/main_icon.svg">
          <h6 class="text-center item_rec_title">品名</h6>
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
<script src="./src/js/variables/detail.js"></script>
<script src="./src/js/functions/itemDetail.js"></script>
<script defer src="./dist/js/owl.carousel.min.js"></script>
<script defer src="./src/js/owlCarousel.js"></script>