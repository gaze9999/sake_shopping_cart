function getVarieties(cid = "", vid = "", pid = "", rid = "",price = "") {
  fetch('./func/func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [
      JSON.stringify({
        'vid': vid,
        'cid': cid,
        'pid': pid,
        'rid': rid,
        'pri': price
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
      let dataLength = json.length
      // console.log(json)
    // json.forEach(e => {
      for (let i in json) {
      let
      regionName = json[i]['regionName'],
      varieties = json[i]['varieties'],
      itemName = json[i]['itemName'],
      breName = json[i]['breName'],
      vCatag = json[i]['vCatag'],
      price = json[i]['price'],
      bId = json[i]['bId'],
      sId = json[i]['sId'],
      vId = json[i]['vId'],
      picPath = `<img class="img-fluid item_card_img" src="./img/items/pics/${bId}/${sId}/1.png">`

      // if (picPath[i]) {
      //   picPath[i] = `<i class="fas fa-images"></i>`
      // }

      vid == "" ? itemInfo.html(`日本清酒`) : itemInfo.html(varieties);
      cid == "" ? itemInfo.html(`日本清酒`) : itemInfo.html(varieties);

      itemList.append(`
          <div class="card shadow-sm item_card" data-aos="fade-up">
            <div class="card-img-top d-flex center_all">
              <a class="" href="./itemDetails.php?id=${sId}">
                ${picPath}
              </a>
            </div>
            <div class="card-body d-flex center_all flex-column">
              <p class="card-text item_card_bre">${breName}</p>
              <p class="card-text item_card_name">${itemName}</p>
              <p class="card-text item_card_price">${price}</p>
            </div>
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

function filterItem(cid = "", vid = "", pid = "", rid = "",price = "") {
  filterItems = new getVarieties(vcat, vid, "", rid)
}

function filterCheckbox() {
  let rids = [];
  $('.filter_region .filter_checkbox.checked').each( function() {
    let Selected = $(this).data('region')
    rids.push(Selected)
  });
  filterItem(vcat, vid, "", rids)
}