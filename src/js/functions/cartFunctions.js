getCart()
function getCart() {
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
    cartItems.html('')

    for (let i in json) {
      // 價格換算
      let iCurr = json[i][0]['price'].substr(0, 3),
          iPrice = json[i][0]['price'].slice(3)

          iCurr == 'JPY' ?
          iPrice = parseInt(iPrice * 0.27) :
          iPrice = parseInt(iPrice)

      cartItems.append(
        `<tr class="cart_row_data" data-cartRow="${i}">
          <th class="cart_row_count" scope="row" data-row="${i}">${parseInt(i)+1}</th>
          <td class="d-flex center_all">
          <a href="./itemDetails.php?id=${json[i][2]['itemId']}">
            <picture class="d-flex cart_table_pic">
              <img class="cart_table_img" src="./img/items/pics/${json[i][0]['bId']}/${json[i][2]['itemId']}/${json[i][0]['imgName']}"
              alt="${json[i][0]['itemName']}"
              onerror="this.onerror=null; this.src='./img/icons/main_icon.svg'">
            </picture>
          </a>
          </td>
          <td class="cart_item_name">
            <a href="./itemDetails.php?id=${json[i][2]['itemId']}">
              ${json[i][0]['itemName']}
            </a>
          </td>
          <td class="cart_item_cap">
            ${json[i][0]['capacity']}
          </td>
          <td class="cart_item_price">
            ${iPrice}
          </td>
          <td class="d-flex center_all cart_item_qty">
            <input class="cart_item_minus item_counts_btn" type="button" value="-">
            <input type="number" class="text-center cart_item_hold" value="${json[i][1]['itemQty']}" disabled>
            <input class="cart_item_plus item_counts_btn" type="button" value="+">
          </td>
          <td>
            <a class="btn cart_table_remove" data-itemId="${parseInt(i)}" role="button">刪除</a>
          </td>
          <input type="hidden" class="cart_hidden_sid" value="${json[i][0]['sId']}">
          <input type="hidden" class="cart_hidden_qty" value="${json[i][1]['itemQty']}">
          <input type="hidden" class="cart_hidden_total" value="${iPrice * json[i][1]['itemQty']}">
        </tr>`
      )
    }

  }).then(e => {
  countTotal()
  itemRemove = $('.cart_table_remove'),
  cartMinus = $('.cart_item_minus'),
  cartPlus = $('.cart_item_plus'),
  cartHold = $('.cart_item_hold'),
  cartTotal = $('.cart_hidden_total'),
  cartPrice = $('.cart_item_price'),
  cartHiddenQty = $('.cart_hidden_qty'),
  cartHiddenSid = $('.cart_hidden_sid')

  cartMinus.on('mouseup', function() {
    let thisRow = $(this).parents('tr').data('cartrow'),
        thisQty = cartHold.eq( thisRow ),
        thisTotal = cartTotal.eq( thisRow ),
        thisHQty = cartHiddenQty.eq( thisRow ),
        thisPrice = $.trim( cartPrice.eq( thisRow ).text() ),
        thisQtyCount = parseInt( thisQty.val() )

    thisQtyCount > 1 ? thisQtyCount -= 1 : cartPlus
    thisQty.data('qty', thisQtyCount)
    thisQty.val(thisQtyCount)
    thisHQty.val(thisQtyCount)
    thisTotal.val( parseInt(thisPrice) * parseInt(thisQtyCount) )
    countTotal()
  })

  cartPlus.on('mouseup', function() {
    let thisRow = $(this).parents('tr').data('cartrow'),
        thisQty = cartHold.eq( thisRow ),
        thisTotal = cartTotal.eq( thisRow ),
        thisHQty = cartHiddenQty.eq( thisRow ),
        thisPrice = $.trim( cartPrice.eq( thisRow ).text() ),
        thisQtyCount = parseInt( thisQty.val() )

    thisQtyCount < 99 ? thisQtyCount += 1 : cartMinus
    thisQty.data('qty', thisQtyCount)
    thisQty.val(thisQtyCount)
    thisHQty.val(thisQtyCount)
    thisTotal.val( parseInt(thisPrice) * parseInt(thisQtyCount) )
    countTotal()
  })

  clearCart.on('mouseup', ()=> {
    alertTemp('確定要全部清除嗎?')
    let removeE = $('#remove_e'),
        removeBtn = $('.remove_btn'),
        removeAlert = $('.remove_alert')
    removeE.val($(this).data('itemid'))
    removeBtn.on('mouseup', function(){
      if ($(this).val() == 'yes') {
        clearItem()
        getCart()
        countTotal()
      }
      removeAlert.remove()
    })
  })

  itemRemove.on('mouseup', function() {
    alertTemp('確定要刪除嗎?')
    let removeE = $('#remove_e'),
        removeBtn = $('.remove_btn'),
        removeAlert = $('.remove_alert'),
        removeId = $(this).data('itemid')
    removeE.val( removeId )
    removeBtn.on('mouseup', function(){
      if ($(this).val() == 'yes') {
        removeItem()
        rowNum.eq( removeId ).remove()
        getCart()
        countTotal()
      }
      removeId = ""
      removeAlert.remove()
    })
  })

  }).catch(error => {
  console.log('getDetails() request failed:', error);
  console.log(error.response);
  });
}


function removeItem() {
  fetch('./func/func-cartRemoveItem.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({'itemid': $('#remove_e').val()})]

  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function clearItem() {
  fetch('./func/func-clearCart.php', {
    method: "GET",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'}

  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res;
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }

  }).then(e => {
    cartItems.html('')

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function countTotal() {
  let priceCount = 0, qtyCount = 0
  rowTotal = $('.cart_hidden_total')
  rowCount = $('.cart_row_count')
  cartHold = $('.cart_item_hold')

  rowTotal.each(e => {
    priceCount += parseInt(rowTotal[e].value)
  })
  cartHold.each(e => {
    qtyCount += parseInt(cartHold[e].value)
  })

  totalQty.html(qtyCount)
  totalItems.html(rowCount.length)
  totalPrice.html(priceCount)
}

function getLoginStatus() {
  fetch('./func/func-checkStatus.php', {
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
    // console.log(json[0])
    json[0] == 1 ? 
    location.href = './delivery.php' :
    alertTemp2('你還沒登入哦')

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function updateSession(capIds, itemQtys) {
  fetch('./func/func-updateSession.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({
      'capIds': capIds,
      'qtys': itemQtys
    })]  
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      // return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}