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
    itemSelCap.html('')
    itemCap.html('')
    breadCrumb.html('')
    itemDescript.html('無資訊')
    itemPrice.html('9999999')

    // 處理字串
    let bName = $.trim(json[0]['breName'])
        iName = $.trim(json[0]['itemName'])
        iDesc = $.trim(json[0]['description'])
        iRegi = $.trim(json[0]['regionName'])
        iPNam = $.trim(json[0]['prefName'])
        iVCat = $.trim(json[0]['vCatag'])
        iRice = $.trim(json[0]['riceName'])
        iShdo = $.trim(json[0]['nihonshudo'])
        iSndo = $.trim(json[0]['sando'])
        iAmno = $.trim(json[0]['aminosando'])
        iSimi = $.trim(json[0]['seimaibuai'])

    // 一般資訊置入
    brewName.html(bName)
    itemName.html(iName)
    itemDescript.html(iDesc)
    itemRegion.html(iRegi)
    itemPref.html(iPNam)
    itemVCatag.html(iVCat)
    itemRice.html(iRice)
    itemShudo.html(iShdo)
    itemAcid.html(iSndo)
    itemAmino.html(iAmno)
    itemSeimai.html(iSimi)

    // 麵包屑
    breadCrumb.append(`<a href="./main.php">首頁</a>`)
    breadCrumb.append(`<a href="./itemList.php">${iRegi}</a>`)
    breadCrumb.append(`<a href="./itemList.php">${iPNam}</a>`)
    breadCrumb.append(`<a href="./itemList.php">${bName}</a>`)
    breadCrumb.append(`${iName}`)

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

    for (let i in json[3]) {
      recItem.append(
        `<figure class="d-flex flex-column item_rec_fig" data-aos="zoom-in" data-aos-delay="200">
          <a href="./itemDetails.php?id=${json[3][i]['sId2']}">
            <img class="item_rec_img" src="./img/items/pics/${json[3][i]['bId']}/${json[3][i]['sId2']}/${json[3][i]['imgName']}" alt="${json[3][i]['itemName']}" onerror="this.onerror=null; this.src='./img/icons/main_icon.svg'">
            <h6 class="text-center item_rec_title">${json[3][i]['itemName']}</h6>
          </a>
         </figure>`
      )
    }

    // slider生成
    $('.detail_carousel').owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      dots: true,
      nav: false,
      items: 1
    })

    $('.recommand_carousel').owlCarousel({
      loop: true,
      autoplay: false,
      dots: false,
      nav: false,
      items: 5
    })

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}