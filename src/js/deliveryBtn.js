getSmallCart()
btnSelector(shipSelect)
btnSelector(shipOGender)
btnSelector(shipRGender)
btnSelector(shipTemp)
btnSelector(shipPay)
btnSelector(shipReceipt)

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


deliSubmit.on('mouseup', function() {
  let savAdd = 0,
      combindItems = []
  
  combindItems.push({orderData: getOrderData()})
  saveAddr.prop('checked') &&
    (savAdd = 1)
  sameOrder.prop('checked') ?
    combindItems.push({recData: getOrderData()   }) :
    combindItems.push({recData: getReceiverData()}) &
    (savAdd = 0)

  combindItems.push(
    {shipData : getShipData()},
    {saveAddr : savAdd       },
    {itemData : itemData     }
    )
  // console.log(combindItems)
  getDatatoCheckout(combindItems)
})

sameOrder.on('change', function() {
  sameOrder.prop('checked') ?
    $('.delivery_receiver_section').find(':required').prop('required', '') :
    RsubmitName.prop('required', 'required') &
     RsubmitTel.prop('required', 'required') &
    RsubmitMail.prop('required', 'required') &
    RsubmitAddr.prop('required', 'required')
})