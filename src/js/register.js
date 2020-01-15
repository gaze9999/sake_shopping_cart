let usrId = $('#login'),
    usrPwd1 = $('#password'),
    usrPwd2 = $('#password2'),
    usrName = $('#name'),
    usrMail = $('#email'),
    regBtn = $('.register_btn')

regBtn.on('mouseup', function() {
  if (
  checkNotInput(usrId)   == '2' ||
  checkNotInput(usrPwd1) == '2' ||
  checkNotInput(usrPwd2) == '2' ||
  checkNotInput(usrName) == '2' ||
  checkNotInput(usrMail) == '2') {
    alertTemp2('有欄位未填')
  } else {
    if (checkPwd() != '1') {
      return '2'
    } else {
      let genSelect = $('.register_gender.btn_selected')
      register(genSelect)
    }
  }
})

function checkPwd() {
  if (usrPwd1.val().length < 6 ) {
    alertTemp2('密碼長度不能少於6')
    return '3'
  } else if (usrPwd1.val() != usrPwd2.val()) {
    alertTemp2('兩次密碼不相同')
    return '2'
  } else {
    return '1'
  }
}

function register(genSelect) {
  fetch('./func/func-register.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({
      'usrId': ($.trim(usrId.val())).toLowerCase(),
      'usrPwd': usrPwd1.val(),
      'usrName': usrName.val(),
      'usrMail': usrMail.val(),
      'usrGen': genSelect.data('gender')
    })]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {
    let statusCode = json['status'][0];
    switch (parseInt(statusCode)) {
      case 1:
        alertTemp2('註冊成功!')
        break;
      case 2:
        alertTemp2('帳號重複!')
        break;
    }

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  })
}