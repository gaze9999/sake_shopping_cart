function getVTree(vid) {
  fetch('./func/func-buildVTree.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({'vid': vid})]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }

  }).then(json => {
    for (let i in json) {
      let vCat = json[i]['vCatId']
      if  (vCat == 0) {
        treeList.append(`
          <dt>
            <button class='btn tree_btn tree_vcat' data-vcat='${json[i]["vcId"]}'>${json[i]["vCatag"]}</button>
          </dt>
        `);
      }
      treeList.append(`
        <dd>
          <button class='btn tree_btn tree_vitem'
           data-vcat='${json[i]["vcId"]}'
           data-vid='${json[i]["vId"]}'>->${json[i]["varieties"]}</button>
        </dd>
      `);
    }

  }).catch(error => {
    console.log('getTree() request failed:', error);
    // return error.response.json();
  });
}

function getRTree(rId) {
  fetch('./func/func-buildRTree.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({'vid': vid})]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }

  }).then(json => {
    for (let i in json[0]) {
      $('#tree_wrapper1').append(
        `<dt class="tree_selection p-0">
          <button class='btn tree_btn tree_rid' data-rid='${json[0][i]["rId"]}'>${json[0][i]["regionName"].slice(0, json[0][i]["regionName"].length-2)}</button>
        </dt>`)
    }
    for (let i in json[1]) {
      $('#tree_wrapper2').append(
        `<dt class="tree_selection p-0">
          <button class='btn tree_btn tree_vid' data-vid='${json[1][i]["vcId"]}'>${json[1][i]["vCatag"]}</button>
        </dt>`)
    }
    for (let i in json[2]) {
      $('#tree_wrapper3').append(
        `<dt class="tree_selection p-0">
          <button class='btn tree_btn tree_cap' data-cap='${json[2][i]["cap"]}'>${json[2][i]["cap"]}ML</button>
        </dt>`)
    }
    treeButton    = $('.tree_btn'),
    treeRidButton = $('.tree_rid'),
    treeVidButton = $('.tree_vid'),
    treeCapButton = $('.tree_cap'),
    treeRidAll = $('.tree_rid_all'),
    treeVidAll = $('.tree_vid_all'),
    treeCapAll = $('.tree_cap_all'),
    treeChked = $('.tree_checked')

    treeRidButton.on('mouseup', function() {
      let thisBtn = $(this)
      let rid = $(this).data('rid')
      treeBtnSelect(treeRidButton, thisBtn)
      filterCheckbox(rid)
    })

    treeVidButton.on('mouseup', function() {
      let thisBtn = $(this)
      treeRidCheck()
      treeBtnMulti(thisBtn, treeVidButton, treeVidAll)
      filterCheckbox(rid)
    })

    treeCapButton.on('mouseup', function() {
      let thisBtn = $(this)
      treeRidCheck()
      treeBtnMulti(thisBtn, treeCapButton, treeCapAll)
      filterCheckbox(rid)
    })

    // treeRidAll.on('mouseup', function() {
    //   treeButton.removeClass('tree_checked')
    //   $(this).addClass('tree_checked')
    //   treeVidAll.addClass('tree_checked')
    //   treeCapAll.addClass('tree_checked')
    //   filterCheckbox()
    // })


    treeRidAll.on('mouseup', function() {
      let thisBtn = $(this)
      treeRidCheck()
      treeBtnAll(thisBtn, treeRidButton)
      filterCheckbox(rid)
    })

    treeVidAll.on('mouseup', function() {
      let thisBtn = $(this)
      treeRidCheck()
      treeBtnAll(thisBtn, treeVidButton)
      filterCheckbox(rid)
    })

    treeCapAll.on('mouseup', function() {
      let thisBtn = $(this)
      treeRidCheck()
      treeBtnAll(thisBtn, treeCapButton)
      filterCheckbox(rid)
    })

    function treeRidCheck() {
      treeRidButton.each( function() {
        if ($(this).hasClass('tree_checked')) {
          rid = $(this).data('rid')
        }
      })
      return rid
    }

  }).catch(error => {
    console.log('getTree() request failed:', error);
    // return error.response.json();
  });
}

