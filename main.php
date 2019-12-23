<main class="page_main my-5">
  <div class="container">
    <div class="row">
      <header class="col-sm-12 col-md-12 col-xl-12">
        <div class="page_main_title">
          <h1 class="text-center">商品一覽</h1>
        </div>
      </header>
      <section class="col-sm-12 col-md-12 col-xl-12 d-flex flex-wrap itemList_list">
        <?php for($i=0;$i<20;$i++) {require('./tpl/tpl-itemcard.php'); }; ?>
      </section>
    </div>
  </div>
</main>