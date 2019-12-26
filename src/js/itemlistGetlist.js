let itemList = $('.itemList_list'),
    itemTree = $('.itemList_tree'),
    itemInfo = $('.list_info_title'),
    treeTotal = $('.tree_total'),
    treeTotalData = $('.tree_totalData'),
    dataLength,
    regionName = [],
    itemName = [],
    breName = [], 
    sId = [];
    
function getItem(cid = "", pid = "") {
  fetch('./func/func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [
      JSON.stringify({'cid': cid, 'pid': pid})
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
      // console.log(JSON.stringify(json))
    // json.forEach(e => {
      for (i=0; i<json.length; i++) {
      regionName[i] = json[i]['regionName']
      itemName[i] = json[i]['itemName']
      breName[i] = json[i]['breName']
      sId[i] = json[i]['sId']
      if (cid == "") {
        itemInfo.html(`日本清酒`)
      } else {
        itemInfo.html(regionName[i])
      };
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

getItem()

itemTree.on('mouseup', '.tree_btn', function() {
  // itemList.html("")
  cid = $(this).data('cid')
  getItem(cid)
  for (i=0; i<dataLength; i++) {
  }
})

function getAllItem() {
  fetch('./func/func-getItems.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'}
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = res;
      throw error.Content-Type;
    }

  }).then(json => {
      dataLength = json.length
      // console.log(dataLength)
      for (i=0; i<json.length; i++) {
        regionName[i] = json[i]['regionName']
        itemName[i] = json[i]['itemName']
        breName[i] = json[i]['breName']
        sId[i] = json[i]['sId']
  
        itemList.append(`
            <div class="card shadow-sm item_card">
              <div class="card-img-top d-flex center-all">
                <a class="" href="./tpl-itemDetail.php?sId=${sId[i]}">
                  <img class="img-fluid item_card_img" src="./img/items/item_20191216030246.jpg">
                </a>
              </div>
              <div class="card-body d-flex center-all flex-column">
                <p class="card-text item_card_name">${itemName[i]}</p>
                <p class="card-text item_card_bre">${breName[i]}</p>
                <p class="card-text item_card_price"></p>
              </div>
            </div>
        `);
        
      };
      
  }).catch(error => {
    console.log('request failed:', error);
  });
}

// getAllItem()