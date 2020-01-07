getDetails()

function getDetails() {
  fetch('./func/func-itemDetail.php', {
    method: "GET",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'}
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {
    // console.log(json)
    for (i in json) {
      if (json[i]['sId'] == detailId.val()) {
        console.log(json[i])
        brewName.html(json[i]['breName'])
        itemPics.html(`
          <picture class="d-flex detail_carousel_item" data-aos="fade-right" data-aos-delay="200">
            <img class="detail_carousel_img" src="./img/items/pics/${json[i]['bId']}/${json[i]['sId']}/${json[i]['imgName']}" alt="">
          </picture>
        `)
        // breadCrumb.html(`首頁`)
        itemDescript.html('test')
        itemName.html(json[i]['itemName'])
        itemPrice.html(json[i]['price'])
        itemRegion.html(json[i]['regionName'])
        itemPref.html(json[i]['prefName'])
        itemVCatag.html(json[i]['vCatag'])
      }
    }

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}