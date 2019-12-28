function getVarieties( cid = "", vid = "", pid = "") {
  fetch('./func/func-getItems.php', {
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
      error.response = response;
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
            <div class="card-img-top d-flex center_all">
              <a class="" href="./itemDetails.php?id=${sId[i]}">
                <img class="img-fluid item_card_img" src="./img/items/item_20191216030246.jpg">
              </a>
            </div>
            <div class="card-body d-flex center_all flex-column">
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
    console.log('getVarieties() request failed:', error);
    console.log(error.response);
  });
}



function filterItem(rid = "", pid = "", price = "") {
  fetch('./func/func-filters.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [
      JSON.stringify({'rid': rid, 'pid': pid, 'price': price})
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

  }).catch(error => {
    console.log('filterItem() request failed:', error);
    // return error.response.json();
  });
}