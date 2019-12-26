let itemList = $('.itemList_list'),
    itemTree = $('.itemList_tree'),
    itemInfo = $('.list_info_title'),
    treeTotal = $('.tree_total'),
    treeTotalData = $('.tree_totalData'),
    dataLength,
    regionName = [],
    varieties = [],
    itemName = [],
    breName = [],
    vCatag = [],
    sId = [],
    vId = [];

function getVarieties(vid = "", cid = "", pid = "") {
  fetch('./func/func-func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [
      JSON.stringify({'vid': vid, 'cid': cid, 'pid': pid})
    ]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = res;
      throw error.Content-Type;
    }
  }).then(json => {
      itemList.html("")
      dataLength = json.length
      // console.log(json)
    // json.forEach(e => {
      for (let i in json) {
      regionName[i] = json[i]['regionName']
      varieties[i] = json[i]['varieties']
      itemName[i] = json[i]['itemName']
      breName[i] = json[i]['breName']
      vCatag[i] = json[i]['vCatag']
      sId[i] = json[i]['sId']
      vId[i] = json[i]['vId']
      vid == "" ? itemInfo.html(`日本清酒`) : itemInfo.html(varieties[i]);
      itemList.append(`
          <div class="card shadow-sm item_card">
            <div class="card-img-top d-flex center-all">
              <a class="" href="./itemDetails.php?id=${sId[i]}">
                <img class="img-fluid item_card_img" src="./img/items/item_20191216030246.jpg">
              </a>
            </div>
            <div class="card-body d-flex center-all flex-column">
              <p class="card-text item_card_bre">${breName[i]}</p>
              <p class="card-text item_card_name">${itemName[i]}</p>
              <p class="card-text item_card_price"></p>
            </div>
          </div>
      `);
    };
    treeTotalData.text(dataLength);
    treeTotalData.data('total', dataLength)
      
  }).catch(error => {
    console.log('request failed:', error);
    // return error.response.json();
  });
}

getVarieties()

itemTree.on('mouseup', '.tree_btn', function() {
  // itemList.html("")
  vid = $(this).data('vid')
  getVarieties(vid)
  for (let i in dataLength) {
  }
})