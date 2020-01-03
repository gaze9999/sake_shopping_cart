<div class="position-absolute d-flex w-100 center_all page_ac">
  <header class="d-flex flex-column center_all ac_header">
      <hgroup class="text-white d-flex flex-column px-2 px-sm-0 center_all ac_hero">
        <h2 class="display-4">Welocme</h2>
        <h1 class="lead mb-4">帶給您前所未有的清酒世界</h1>
      </hgroup>
      <div class="ac_checkBtn">
        <a class="px-5 mr-2 ac_btn">未滿18歲</a>
        <a class="px-5 mr-2 ac_btn" checked onmouseup="yoo.play()">已滿18歲</a>
      </div>
  </header>
</div>
<script defer src="./src/js/ageCheck.js"></script>
<script>
    var yoo = new Audio();
    yoo.src="./audio/yoo_119.mp3";
</script>