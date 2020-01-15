function getSmallCart() {
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
    ccList.html('')
    let priceRaw = 0

    // output for delivery
    for(let i in json) {
      itemData.push(
        {id : json[i][0]['sId'],
         qty: json[i][1]['itemQty']}
      )
    }

    for (let i=0; i<json.length & i<5; i++) {
      let sId = json[i][2]['itemId'],
          qty = json[i][1]['itemQty'],
          name = json[i][0]['itemName']

      let iCurr = json[i][0]['price'].substr(0, 3),
          iPrice = json[i][0]['price'].slice(3)

      iCurr == 'JPY' ?
      iPrice = parseInt(iPrice * 0.27) :
      iPrice = parseInt(iPrice)

      ccList.append(
        `<a class="d-flex flex-wrap justify-content-between checkout_cart_item">
          <span class="w-100 checkout_item_name">${name}</span>
          <span class="checkout_item_count">${qty}</span>
          <span class="checkout_item_price">${iPrice * qty}</span>
        </a>
        <hr>`
      )      
    }
    json.length > 5 && ccList.append(`<h6 class="text-center">商品數量大於5</h6>`)

    ccPrice = $('.checkout_item_price')
    for (i=0; i<ccPrice.length; i++) {
      priceRaw += parseInt(ccPrice.eq(i).html())
    }
    ctRaw.html(priceRaw)
    ctTotal.html(priceRaw + 150)

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function getDatatoCheckout(arr) {
  fetch('./func/func-checkout.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify(
      {order: arr}
    )]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      // return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function btnSelector(selector) {
  selector.on('mouseup', function() {
    if (selector.hasClass('btn_active')) {
      selector.removeClass('btn_active')
    }
      $(this).addClass('btn_active')
      btnSelection($(this))
  })
}

function btnSelection(selector) {
  let thisValue = JSON.stringify(selector.data()),
      thisOutput = selector.parents('section').find('input.delivery_input:hidden')
      thisOutput.val(thisValue.slice(thisValue.length-2, thisValue.length-1))
}

// 元件表(僅供複製)
// submitShip
// submitName
// submitTel
// submitMail
// submitGen
// submitAddr
// submitCity
// submitDist
// submitZip

// RsubmitName
// RsubmitTel
// RsubmitMail
// RsubmitGen
// RsubmitAddr
// RsubmitCity
// RsubmitDist
// RsubmitZip 

// shipSelTemp
// shipSelPay
// shipSelRec
// shipSelNumb

// sameOrder
// saveAddr

function getOrderData() {
  let order = []
  order.push(
    {ship: submitShip.val()},
    {name: submitName.val()},
    {tel : submitTel.val() },
    {mail: submitMail.val()},
    {gen : submitGen.val() },
    {addr: submitAddr.val()},
    {city: submitCity.val()},
    {dist: submitDist.val()},
    {zip : submitZip.val() }
    )
  return order
}
function getReceiverData() {
  let order = []
  order.push(
    {ship : submitShip.val() },
    {Rname: RsubmitName.val()},
    {Rtel : RsubmitTel.val() },
    {Rmail: RsubmitMail.val()},
    {Rgen : RsubmitGen.val() },
    {Raddr: RsubmitAddr.val()},
    {Rcity: RsubmitCity.val()},
    {Rdist: RsubmitDist.val()},
    {Rzip : RsubmitZip.val() }
    )
  return order
}

function getShipData() {
  let order = []
  order.push(
    {temp: shipSelTemp.val()},
    {pay : shipSelPay.val() },
    {rec : shipSelRec.val() },
    {num : shipSelNumb.val()}
    )
  return order
}