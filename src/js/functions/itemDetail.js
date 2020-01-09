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
    // console.log(json)
    // 給予預設資訊
    itemPics.html('')
    itemSelCap.html('720ml')
    itemCap.html('720ml')
    itemDescript.html('無資訊')
    itemPrice.html('9999999')
    
    // 一般資訊置入
    brewName.html(json[0]['breName'])
    itemName.html($.trim(json[0]['itemName']))
    itemDescript.html($.trim(json[0]['description']))
    itemRegion.html(json[0]['regionName'])
    itemPref.html(json[0]['prefName'])
    itemVCatag.html(json[0]['vCatag'])
    itemRice.html(json[0]['riceName'])
    itemShudo.html(json[0]['nihonshudo'])
    itemAcid.html(json[0]['sando'])
    itemAmino.html(json[0]['aminosando'])
    itemSeimai.html(json[0]['seimaibuai'])

    // 麵包屑
    // breadCrumb.html(`首頁`)

    // 價格換算
    let iCurr = json[0]['price'].substr(0, 3)
    let iPrice = json[0]['price'].slice(3)
    iCurr == 'JPY' ? itemPrice.html(parseInt(iPrice * 0.27)) : itemPrice.html(iPrice)    
  
    // 圖片置入
    for (let i in json[1]) {
      itemPics.append(
        `<picture class="d-flex detail_carousel_item" data-aos="fade-right" data-aos-delay="200">
          <img class="detail_carousel_img" src="./img/items/pics/${json[0]['bId']}/${json[0]['sId']}/${json[1][i]['imgName']}" alt="${json[0]['itemName']}-${[i]}" onerror="this.onerror=null; this.src='./img/icons/main_icon.svg'">
        </picture>`
      )
    }
    
    // 容量置入
    for (let i in json[2]) {
      let iCap = json[2][i]['capacity']
      itemCap.append(i < json[2].length-1 ? `${iCap}, ` : `${iCap}`)
      itemSelCap.append(`<option value="${iCap}">${iCap}</option>`)
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