getSmallCart()
btnSelector(shipSelect)
btnSelector(shipOGender)
btnSelector(shipRGender)
btnSelector(shipTemp)
btnSelector(shipPay)
btnSelector(shipReceipt)

shipReceipt.on('mouseup', ()=> {
  $('.delivery_receipt:hidden').val() == 1 ?
  receiptNumber.css('display', 'block') :
  receiptNumber.css('display', 'none')
})

sameOrder.on('change', function(e) {
  $(this).prop('checked') ?
  receiverSec.css('display', 'none') :
  receiverSec.css('display', 'block')
})