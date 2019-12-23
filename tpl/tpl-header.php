<nav class="navbar navbar-expand-lg fixed-top">
    <div class="nav_logo d-flex center-all">
        <header class="h-100">
            <a class="navbar-brand d-flex center-all h-100" name="nav_a_home" href="./">
                <h1>本格の酒</h1>
                <img class="img-fluid d-block" src="./img/icons/logo.svg">
            </a>
        </header>
    </div>
    <div class="btn-group" role="group" aria-label="Button group">
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div id="my-nav" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active" data-page="map">
                <a class="nav-link" data-page="map">地圖</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="breweries">酒造介紹</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="itemList" href="./itemList.php">商品列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="knowledge">清酒知識+</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="newCome">新手專區</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-page="about">關於我們</a>
            </li>
        </ul>
    </div>
    <div class="nav_searchbar mx-5">
        <input class="header_searchbar" placeholder="Search"></input>
    </div>
    <div class="nav_function">
        <a class="nav_cart px-2" href="">購物車</a>
        <a class="nav_account px-2" href="">登入</a>
    </div>
</nav>