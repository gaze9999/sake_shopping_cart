function getDatatoFinal(arr) {
  fetch('./func/func-cardData.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify(
      {cardData: arr}
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
    // console.log(json)

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function checkCardInfo() {
  let code = 0,
      cardData = [],
      savCard  = 0,  
      crdName  = $.trim( cardName.val().toLowerCase() ),
      crdNum   = $.trim( cardNum.val().toLowerCase() ),
      crdExp   = $.trim( cardExp.val().toLowerCase() ),
      crdCvv   = $.trim( cardCvv.val().toLowerCase() )

      cardName = $('#card_name'),
      cardNum = $('#card_num'),
      cardExp = $('#expyear'),
      cardCvv = $('#cvv'),
      cardType = creditCard.siblings('.btn_selected').data('card')

  checkNotInput(cardCvv)  == 2 && (code = 4)
  checkNotInput(cardExp)  == 2 && (code = 3)
  checkNotInput(cardNum)  == 2 && (code = 2)
  checkNotInput(cardName) == 2 && (code = 1)
  switch (code) {
    case 0:
      saveCard.prop('checked') &&
        (savCard = 1)
      cardData.push(
        {cardType: cardType},
        {cardName: crdName },
        {cardNum : crdNum  },
        {cardExp : crdExp  },
        {cardCvv : crdCvv  },
        {savCard : savCard }
      )
      getDatatoFinal(cardData)
      location.href = './finalCheck.php'
      break;
    case 1:
      alertTemp2('持卡人姓名未填')
      break;
    case 2:
      alertTemp2('信用卡號錯誤')
      break;
    case 3:
      alertTemp2('Exp Year錯誤')
      break;
    case 4:
      alertTemp2('CVV錯誤')
      break;
  }
}