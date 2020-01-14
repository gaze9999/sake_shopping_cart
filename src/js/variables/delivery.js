    // checkout cart
let ccList = $('.checkout_cart_list'),
    ccName = $('.checkout_item_name'),
    ccCount = $('.checkout_item_count'),
    ccPrice = $('.checkout_item_price'),

    // checkout total
    ctRaw = $('.checkout_price_raw'),
    ctTotal = $('.checkout_price_total'),

    shipSelect = $('.delivery_ship_select'),
    shipOGender = $('.delivery_order_gender'),
    shipRGender = $('.delivery_receiver_gender'),
    shipTemp = $('.delivery_temp'),
    shipPay = $('.delivery_pay'),
    shipReceipt = $('.delivery_receipt'),
    receiptNumber = $('.delivery_receipt_number'),

    sameOrder = $('.same_order'),
    receiverRegion = $('.delivery_receiver'),
    receiverSec = $('.delivery_receiver_section'),
    receive = $('.delivery_receive'),

    deliSubmit = $('#delivery_submit'),


    sameOrder  = $('input.same_order'),
    saveAddr   = $('input.save_address'),

    submitShip = $('input.delivery_ship_select[type="hidden"]'),
    submitName = $('#delivery_name'),
    submitTel  = $('#delivery_tel'),
    submitMail = $('#delivery_order_email'),
    submitGen  = $('input.delivery_order_gender[type="hidden"]'),
    submitAddr = $('#delivery_order_address'),

    RsubmitName = $('#delivery_name2'),
    RsubmitTel  = $('#delivery_tel2'),
    RsubmitMail = $('#delivery_receiver_email'),
    RsubmitGen  = $('input.delivery_receiver_gender[type="hidden"]'),
    RsubmitAddr = $('#delivery_receiver_address'),

    shipSelTemp = $('input.delivery_temp[type="hidden"]'),
    shipSelPay  = $('input.delivery_pay[type="hidden"]'),
    shipSelRec  = $('input.delivery_receipt[type="hidden"]'),
    shipSelNumb = $('input.receipt_number_input')