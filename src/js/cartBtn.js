$(document).ready(()=>{
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
      let iCurr = json[i][0]['price'].substr(0, 3)
      let iPrice = json[i][0]['price'].slice(3)
      capaid = json[i][0]['sId']
      iCurr == 'JPY' ?
        iPrice = parseInt(iPrice * 0.27) :
        iPrice = parseInt(iPrice)

      cartItems.append(
        `<tr>
          <th scope="row">${parseInt(i)+1}</th>
          <td class="d-flex center_all">
            <picture class="d-flex cart_table_pic">
              <img class="cart_table_img" src="./img/items/pics/${json[i][0]['bId']}/${json[i][2]['itemId']}/${json[i][0]['imgName']}"
              alt="${json[i][0]['itemName']}"
              onerror="this.onerror=null; this.src='./img/icons/main_icon.svg'">
            </picture>
          </td>
          <td>${json[i][0]['itemName']}</td>
          <td>${json[i][0]['capacity']}</td>
          <td>${iPrice}</td>
          <td>${json[i][1]['itemQty']}</td>
          <td>
            <a class="btn cart_table_remove" data-itemId="${parseInt(i)}" role="button">刪除</a>
          </td>
        </tr>`
      )
    }
    
    itemRemove = $('.cart_table_remove')
    itemRemove.on('mouseup', function() {
      // console.log($(this).data('itemid'))
        fetch('./func/func-cartRemoveItem.php', {
          method: "POST",
          headers: {'Content-Type': 'application/json',
                    'Accept': 'application/json'},
          body: [JSON.stringify({'itemid': $(this).data('itemid')})]
        }).then(res => {
          if (res.status >= 200 && res.status < 300) {
            return res.json();
          } else {
            let error = new Error(res.statusText);
            error.response = response;
            throw error.Content-Type;
          }
        }).then(e => {          
          location.reload()

        }).catch(error => {
          console.log('getDetails() request failed:', error);
          console.log(error.response);
        });
    })

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
})

clearCart.on('mouseup', ()=> {
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
  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
})