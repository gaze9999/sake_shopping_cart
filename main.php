<div class="fixed-top main_bg"></div>
<main class="main_frame">
  <div class="container-fluid d-flex flex-column center_all page_main">
    <div class="row w-100">
      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex center_all main_logoSec">
        <header class="h-100" data-aos="zoom-out" data-aos-duration="1000">
          <figure class="d-flex center_all">
            <img class="img-fluid main_logo" src="./img/icons/main_icon.svg" alt="本格の酒">
            <h1 class="text-center">本 格 の 酒</h1>
          </figure>
        </header>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex center_all main_article_center">
        <article class="w-100 d-flex center_all main_article_about" data-aos="zoom-out" data-aos-duration="1000">自1900年成立（明治33年）以來，<br/>高橋清酒釀酒廠一直致力<br/>於在位於熊本縣最南端的人吉和久馬地區<br/>製作正宗的米燒酒。<br/>生產的不僅是稻米燒酒，還包括有400多年曆史的熊馬燒酒。<br/>熊麻燒酒與長崎的讚岐燒酒，鹿兒島的薩摩燒酒和沖繩的<br/>琉球琉森燒酒相比，這是只有四個正宗燒酒的品牌。</article>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex flex-column main_news">
        <figure class="d-flex flex-column center_all">
          <img class="img-fluid main_logo" src="./img/icons/main_icon.svg" alt="">
          <h2 class="main_subtitle">最新消息</h2>
        </figure>
        <?php require_once('./tpl/main/tpl-main-news.php'); ?>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex flex-column center_all main_knowledge">
        <?php require_once('./tpl/main/tpl-main-knowledge.php'); ?>
      </section>

      <section class="col-sm-12 col-md-12 col-xl-12 w-100 d-flex flex-column main_recommand">
        <figure class="d-flex flex-column center_all">
          <img class="img-fluid main_logo" src="./img/icons/main_icon.svg" alt="">
          <h2 class="main_subtitle">本格推薦</h2>
        </figure>
        <?php require_once('./tpl/main/tpl-main-recommand.php'); ?>
        <?php require_once('./tpl/main/tpl-main-cloud.php'); ?>
      </section>
    </div>
  </div>
</main>