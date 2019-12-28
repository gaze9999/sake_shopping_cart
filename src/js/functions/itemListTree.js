function getTree(vid) {
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
            <button class='btn tree_btn tree_vcat' data-vcat='${json[i]["vId"]}'>${json[i]["vCatag"]}</button>
          </dt>
        `);
      }
      treeList.append(`
        <dd>
          <button class='btn tree_btn tree_vitem'
           data-vcat='${json[i]["vCatId"] == 0 ? vcId = json[i]["vId"] : vcId = json[i]["vCatId"]}'
           data-vid='${json[i]["vId"]}'>->${json[i]["varieties"]}</button>
        </dd>
      `);
    }

  }).catch(error => {
    console.log('getTree() request failed:', error);
    // return error.response.json();
  });
}