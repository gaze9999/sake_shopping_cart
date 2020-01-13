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
    treeList.append(
      `<dt class="col-12">分類</dt>
      <dd class="col-12">
        <button class='btn tree_btn'>全部</button>
      </dd>`)

    for (let i in json[0]) {
      treeList.append(
        `<dt class="col-3 col-md-12 px-1">
          <button class='btn tree_btn tree_rid' data-rid='${json[0][i]["rId"]}'>${json[0][i]["regionName"]}</button>
        </dt>`)
    }

    treeList.append(
      `<dt class="col-12">篩選</dt>
      <dd class="col-12">
        <button class='btn tree_btn'>全選</button>
      </dd>`)
    for (let i in json[1]) {
      treeList.append(
        `<dt class="col-3 col-md-12 px-1">
          <input type="checkbox" class='btn tree_btn tree_vid' name='datavid' id='datavid_${json[1][i]["vcId"]}' data-vid='${json[1][i]["vcId"]}'>
          <label class="btn tree_btn tree_vid_label" for="datavid_${json[1][i]["vcId"]}" data-vid='${json[1][i]["vcId"]}'>${json[1][i]["vCatag"]}</label>
        </dt>`)
    }
    treeList.append(
      `<dt class="col-12">容量</dt>
      <dd class="col-12">
        <button class='btn tree_btn'>全選</button>
      </dd>`)
    for (let i in json[2]) {
      treeList.append(
        `<dt class="col-3 col-md-12 px-1">
          <input type="checkbox" class='btn tree_btn tree_cap' name='datacap' id='datacap_${json[2][i]["cap"]}' data-cap='${json[2][i]["cap"]}'>
          <label class="btn tree_btn tree_cap_label" for="datacap_${json[2][i]["cap"]}"data-cap='${json[2][i]["cap"]}'>${json[2][i]["cap"]}ML</label>
        </dt>`)
    }
    treeButton    = $('.tree_btn'),
    treeRidButton = $('.tree_rid'),
    treeVidButton = $('.tree_vid'),
    treeCapButton = $('.tree_cap')

    treeButton.on('mouseup', function() {
      let rid = $(this).data('rid')
      $(this).toggleClass('tree_checked')
      filterCheckbox(rid)
    })


  }).catch(error => {
    console.log('getTree() request failed:', error);
    // return error.response.json();
  });
}