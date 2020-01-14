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
    treeCapButton = $('.tree_rid_all'),
    treeCapButton = $('.tree_vid_all'),
    treeCapButton = $('.tree_cap_all')

    treeButton.on('mouseup', function() {
      let rid = $(this).data('rid')
      $(this).toggleClass('tree_checked')
      treeCapButton.removeClass('tree_checked')
      filterCheckbox(rid)
    })
    
    treeRidButton.on('mouseup', function() {
      if (treeRidButton.hasClass('tree_checked')) {
        treeRidButton.removeClass('tree_checked')
      }
        $(this).addClass('tree_checked')
        btnSelection($(this))
    })


  }).catch(error => {
    console.log('getTree() request failed:', error);
    // return error.response.json();
  });
}

