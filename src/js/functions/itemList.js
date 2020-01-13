function itemGetList(rid = "", vid = [], cap = [], pri = "") {
  fetch('./func/func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [
      JSON.stringify({
        'rid': rid,
        'vid': vid,
        'cap': cap,
        'pri': pri
      })
    ]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {
      itemList.html("")
      let dataLength = json[0].length
      // console.log(json)
      for (let i in json[0]) {
      let
      varieties = json[0][i]['varieties'],
      itemName = json[0][i]['itemName'],
      capacity = json[0][i]['cap'],
      breName = json[0][i]['breName'],
      region = json[0][i]['regionName'],
      price = json[0][i]['price'],
      bId = json[0][i]['bId'],
      sId = json[0][i]['sId'],
      vId = json[0][i]['vId']

      for (let i in json[1]) {
        picName = json[1][i]['imgName']
      }

      // 顯示當前分類
      vid == "" ? itemInfo.html(`日本清酒`) : itemInfo.html(region);

      itemList.append(`
      <div class="d-flex flex-column item_card">
        <div class="d-flex position-relative card_mainArea">
          <figure class="d-flex flex-row item_card_brew">
            <img class="card_brew_img" src="./img/icons/add_to_fav.svg" alt="">
            <h6>${breName}</h6>
          </figure>
          <a class="d-flex flex-column center_all item_card_mainImg" href="./itemDetails.php?id=${sId}">
            <img class="item_card_img" src="./img/items/pics/${bId}/${sId}/${picName}" alt="${itemName}" onerror="this.onerror=null; this.src='./img/icons/image.svg'"></img>
          </a>
          <figure class="position-absolute item_card_price">
            <img class="card_price_img" src="./img/icons/item_price_board.svg" alt="">
            <h6 class="position-absolute">${price}</h6>
          </figure>
        </div>
        <h5 class="text-center item_card_name">${itemName}</h5>
      </div>
      `);
    };
    treeTotalData.text(dataLength);
    treeTotalData.data('total', dataLength)

  }).catch(error => {
    console.log('getVarieties() request failed:', error);
    console.log(error.response);
  });
}

function filterItem(rid = "", vid = "", cap = "", price = "") {
  filterItems = new itemGetList(rid, vid, cap)
}

function filterCheckbox(rid) {
  let vids = [],
      caps = []

  $('.tree_checked').each( function() {
    let vidSelected = $(this).data('vid')
    // vids.push(vidSelected)
    vidSelected !== undefined ? vids.push(vidSelected) : vids
  })

  $('.tree_checked').each( function() {
    let capSelected = $(this).data('cap')
    // caps.push(capSelected)
    capSelected !== undefined ? caps.push(capSelected) : caps
  })

  itemGetList(rid, vids, caps)
}