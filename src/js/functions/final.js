getFinalCart()
function getFinalCart() {
  fetch('./func/func-getCart.php', {
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
    console.log(json)
    cartList.html('')

    finalHeader.html(`<h2>${json[0][4]} 這是您的購物車!<h2>`)

    // output for delivery
    // for(let i in json) {
    //   itemData.push(
    //     {id : json[i][0]['sId'],
    //      qty: json[i][1]['itemQty']}
    //   )
    // }

    for (let i in json) {
      let capacity = json[i][0]['capacity'],
          breName = json[i][0]['breName'],
          name = json[i][0]['itemName'],
          imgId = json[i][2]['itemId'],
          price = json[i][0]['price'],
          qty = json[i][1]['itemQty'],
          bId = json[i][0]['bId']
          picPath = `./img/items/pics/${bId}/${imgId}/${json[i][0]['imgName']}`

      let iCurr = price.substr(0, 3),
          iPrice = price.slice(3)

      iCurr == 'JPY' ?
      iPrice = parseInt(iPrice * 0.27) :
      iPrice = parseInt(iPrice)

      cartList.append(
        `<div class="card col-6 col-sm-4 col-lg-2 justify-content-between final_cart_card">
          <figure class="d-flex flex-column w-100">
            <img class="cart_card_img" src="${picPath}">
          </figure>
          <hgroup>
            <h6 class="text-center">${breName}</h6>
            <h6 class="text-center final_itemName">${name}</h6>
          </hgroup>
          <dl class="text-center">
            <dt>訂單數量</dt>
            <dd class="final_itemQty">${qty}</dd>
            <dt>總金額</dt>
            <dd class="final_itemPrice">${iPrice * qty}</dd>
          </dl>
        </div>`
      )      
    }
    // json.length > 5 && ccList.append(`<h6 class="text-center">商品數量大於5</h6>`)

    // ccPrice = $('.checkout_item_price')
    // for (i=0; i<ccPrice.length; i++) {
    //   priceRaw += parseInt(ccPrice.eq(i).html())
    // }
    // ctRaw.html(priceRaw)
    // ctTotal.html(priceRaw + 150)

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}
