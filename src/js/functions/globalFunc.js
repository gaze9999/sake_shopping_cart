function alertTemp(title) {
  $('main').append(
    `<div class="fixed-top remove_alert">
    <div class="row h-100 w-100">
      <div class="d-flex flex-column col-4 center_all remove_box">
          <h4>${title}</h4>
          <div class="btn-group remove_btn_group" role="group" aria-label="Basic example">
            <button type="button" class="btn remove_btn remove_yes" value="yes">是</button>
            <button type="button" class="btn remove_btn remove_no" value="no">否</button>
          </div>
          <input class="hidden" id="remove_e" type="hidden" value=""></input>
      </div>
    </div>
  </div>`
  )
}

function alertTemp2(title) {
  $('main').append(
    `<div class="fixed-top remove_alert">
    <div class="row h-100 w-100">
      <div class="d-flex flex-column col-4 center_all remove_box">
          <h4>${title}</h4>
          <div class="btn-group remove_btn_group" role="group" aria-label="Basic example">
            <button type="button" class="btn remove_btn" value="close">關閉</button>
          </div>
          <input class="hidden" id="remove_e" type="hidden" value=""></input>
      </div>
    </div>
  </div>`
  )
  $('.remove_btn').click( function() {
    $('.remove_alert').remove()
  })
}

function logOutBtn() {
  fetch('./func/func-logout.php', {
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

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function btnSingleSelect(btnList, thisBtn) {  
  btnList.hasClass('btn_selected') &&
  btnList.removeClass('btn_selected')
  thisBtn.addClass('btn_selected')
}

function btnMultiSelect(thisBtn, btnList, btnAll) {
  btnList.hasClass('btn_selected') &&
  btnAll.removeClass('btn_selected')
  thisBtn.toggleClass('btn_selected')
}

function btnAll(thisBtn, btnList) {
  btnList.removeClass('btn_selected')
  thisBtn.addClass('btn_selected')
}