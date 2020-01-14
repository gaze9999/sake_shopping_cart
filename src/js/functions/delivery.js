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
    // console.log(json)
    ccList.html('')
    let priceRaw = 0

    for (let i in json) {
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