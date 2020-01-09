getDetails()

function getDetails() {
  fetch('./func/func-itemDetail.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({'itemid': detailId.val()})]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {
    itemPics.html('')
    itemSelCap.html('')

    brewName.html(json[0]['breName'])
    // breadCrumb.html(`首頁`)
    itemDescript.html('test')
    itemName.html(json[0]['itemName'])
    itemDescript.html(json[0]['description'])
    itemPrice.html(json[0]['price'])
    itemRegion.html(json[0]['regionName'])
    itemPref.html(json[0]['prefName'])
    itemVCatag.html(json[0]['vCatag'])
    itemRice.html(json[0]['riceName'])
    itemShudo.html(json[0]['nihonshudo'])
    itemCap.html(json[0]['capacity'])
    itemAcid.html(json[0]['sando'])
    itemAmino.html(json[0]['aminosando'])
    itemSeimai.html(json[0]['seimaibuai'])
  
    for (i in json) {
      itemPics.append(`
        <picture class="d-flex detail_carousel_item" data-aos="fade-right" data-aos-delay="200">
          <img class="detail_carousel_img" src="./img/items/pics/${json[i]['bId']}/${json[i]['sId']}/${json[i]['imgName']}" alt="">
        </picture>
      `)

      let jcap = json[i]['capacity']

      itemSelCap.append(`
        <option value="${jcap}">${jcap}</option>
      `)

      // if (json[i+1]['capacity'] == jcap) {
      //   jcap = json[i+1]['capacity']
      // }
    }      
    
  }).then(e => {    
    $('.detail_carousel').owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      dots: true,
      nav: false,
      items: 1
    })
    
  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}