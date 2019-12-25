let itemList = $('.itemList_list'),
    itemTree = $('.itemList_tree'),
    treeTotal = $('.tree_total'),
    dataLength,
    regionName = [],
    itemName = [],
    breName = [];
function getItem(id) {
  fetch('./tpl/func-getItems.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [
      JSON.stringify({'cid': id})
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
      dataLength = json.length
      // console.log(dataLength)
    // json.forEach(e => {
      for (i=0; i<json.length; i++) {
      regionName[i] = json[i]['regionName']
      itemName[i] = json[i]['itemName']
      breName[i] = json[i]['breName']

      itemList.html('
          <div class="card shadow-sm item_card">
          <div class="card-img-top d-flex center-all">
            <a class="" href="">
              <img class="img-fluid item_card_img" src="<?php echo "./img/items/item_20191216030246.jpg"; ?>">
            </a>
          </div>
          <div class="card-body d-flex center-all flex-column">
            <p class="card-text item_card_name"></p>
            <p class="card-text item_card_price"></p>
          </div>
        </div>
      ');
      
    };
    treeTotal.text(dataLength);
    treeTotal.data('total', dataLength)
      
  }).catch(error => {
    console.log('request failed:', error);
    // return error.response.json();
  });
}

itemTree.on('mouseup', '.tree_btn', function() {
  itemList.html("")
  cid = $(this).data('cid')
  getItem(cid)
  for (i=0; i<dataLength; i++) {
  }
})

function getAllItem() {
  fetch('./tpl/func-getItems.php', {
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
    };
      
  }).catch(error => {
    console.log('request failed:', error);
  });
}

getAllItem()