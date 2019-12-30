<nav class="navbar fixed-top navbar-expand-xl navbar-dark bg-dark">
  <div class="nav_logo d-flex center_all">
    <header class="h-100">
      <a class="navbar-brand d-flex center_all h-100" name="nav_a_home" href="./">
        <h1>本格の酒</h1>
        <img class="img-fluid d-block" src="./img/icons/sake-icon.svg">
      </a>
    </header>
  </div>
  <div class="btn-group" role="group" aria-label="Button group">
    <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </div>
  <div id="my-nav" class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" data-page="map">
        <a class="nav-link" data-page="map">地圖</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-page="about">關於我們</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-page="newCome">新手選酒</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-page="itemList" href="./itemList.php">商品列表</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-page="knowledge" href="./knowledge.php">清酒知識+</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">清酒知識+</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" data-page="sakeSource">清酒起源</a>
          <a class="dropdown-item" data-page="sakeVarieties">清酒分類</a>
          <a class="dropdown-item" data-page="sakeDrinking">清酒喝法</a>
        </div>
      </li> -->
    </ul>
  <!-- <div class="nav_searchbar mx-5">
    <input class="header_searchbar" placeholder="Search"></input>
  </div> -->
    <ul class="navbar-nav my-2 my-md-0 nav_function">
      <li class="nav-item active">
        <a class="nav-link nav_cart px-2" href="">購物車</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link nav_account px-2" href="">登入</a>
      </li>
    </ul>
  </div>
</nav>