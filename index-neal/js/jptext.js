var place_data=[
    {
        tag:"北海道/城市",
        place:"北海道",
        name01:"國稀酒造",
        name02:"高砂酒造"
    },
    
    {
        tag:"岩手/城市",
        place:"岩手",
        low:20,
        high:25
    },
    
    {
        tag:"宮城/仙台/城市",
        place:"宮城",
        low:20,
        high:25
    },
    
    {
        tag:"秋田/城市",
        place:"秋田",
        low:20,
        high:25
    },
    
    {
        tag:"山形/城市",
        place:"山形",
        low:20,
        high:25
    },
    
    {
        tag:"福島/城市",
        place:"福島",
        low:20,
        high:25
    },
    
    {
        tag:"青森/城市",
        place:"青森",
        low:20,
        high:25
    },
    
    {
        tag:"茨城/城市",
        place:"茨城",
        low:20,
        high:25
    },
    
    {
        tag:"千葉/城市",
        place:"千葉",
        low:20,
        high:25
    },
    
    {
        tag:"東京/城市",
        place:"東京",
        low:20,
        high:25
    },
    
    {
        tag:"神奈川/城市",
        place:"神奈川",
        low:20,
        high:25
    },
    
    {
        tag:"群馬/城市",
        place:"群馬",
        low:20,
        high:25
    },
    
    {
        tag:"櫪/城市",
        place:"櫪木",
        low:20,
        high:25
    },
    
    {
        tag:"埼玉/城市",
        place:"埼玉",
        low:20,
        high:25
    },
    
    {
        tag:"新潟/城市",
        place:"新潟",
        low:20,
        high:25
    },
    
    {
        tag:"富山/城市",
        place:"富山",
        low:20,
        high:25
    },
    
    {
        tag:"金澤/石川/城市",
        place:"石川",
        low:20,
        high:25
    },
    
    {
        tag:"福井",
        place:"福井",
        low:20,
        high:25
    },
    
    {
        tag:"山梨",
        place:"山梨",
        low:20,
        high:25
    },
    
    {
        tag:"長野/城市",
        place:"長野",
        low:20,
        high:25
    },
    
    {
        tag:" 岐阜/城市",
        place:" 岐阜",
        low:20,
        high:25
    },
    
    {
        tag:"靜岡/城市",
        place:"靜岡",
        low:20,
        high:25
    },
    
    {
        tag:"愛知",
        place:"愛知",
        low:20,
        high:25
    },
    
    {
        tag:"三重/城市",
        place:"三重",
        low:20,
        high:25
    },
    
    {
        tag:"滋賀/城市",
        place:"滋賀",
        low:20,
        high:25
    },
    
    {
        tag:"京都/城市",
        place:"京都",
        low:20,
        high:25
    },
    
    {
        tag:"大阪/城市",
        place:"大阪",
        low:20,
        high:25
    },
    
    {
        tag:"奈良/城市",
        place:"奈良",
        low:20,
        high:25
    },
    
    {
        tag:"兵庫/神戶/城市",
        place:"兵庫",
        low:20,
        high:25
    },
    
    {
        tag:"和歌山/城市",
        place:"和歌山",
        low:20,
        high:25
    },
    
    {
        tag:"鳥取/城市",
        place:"鳥取",
        low:20,
        high:25
    },
    
    {
        tag:"島根/城市",
        place:"島根",
        low:20,
        high:25
    },
    
    {
        tag:"岡山/城市",
        place:"岡山",
        low:20,
        high:25
    },
    
    {
        tag:"廣島/城市",
        place:"廣島",
        low:20,
        high:25
    },
    
    {
        tag:"山口/城市",
        place:"山口",
        low:20,
        high:25
    },
    
    {
        tag:"德島/城市",
        place:"德島",
        low:20,
        high:25
    },
    
    {
        tag:"香川/城市",
        place:"香川",
        low:20,
        high:25
    },
    
    {
        tag:"愛媛/城市",
        place:"愛媛",
        low:20,
        high:25
    },
    
    {
        tag:"高知/城市",
        place:"高知",
        low:20,
        high:25
    },
    
    {
        tag:"福岡/城市",
        place:"福岡",
        low:20,
        high:25
    },
    
    {
        tag:"佐賀/城市",
        place:"佐賀",
        low:20,
        high:25
    },
    
    {
        tag:"長崎/城市",
        place:"長崎",
        low:20,
        high:25
    },
    
    {
        tag:"熊本/城市",
        place:"熊本",
        low:20,
        high:25
    },
    
    {
        tag:"大分/城市",
        place:"大分",
        low:20,
        high:25
    },
    
    {
        tag:"宮崎/城市",
        place:"宮崎",
        low:20,
        high:25
    },

    {
        tag:"箱根/城市",
        place:"箱根",
        low:20,
        high:25
    },
    
    {
        tag:"鹿耳島/城市",
        place:"鹿耳島",
        low:20,
        high:25
    },
    
    ]
    ;

    var vm = new Vue({
        el: "#app",
        data: {
          filter: "",
          place_data: place_data
        },computed:{
          now_area: function(){
            var vobj=this;
            var result=this.place_data.filter(function(obj){
              return obj.tag==vobj.filter;
            });
            if (result.length==0){
              return null;
            }
            return result[0];
          }
        }
      });
      
      $("path").mouseenter(function(e){
        var tagname=$(this).attr("data-name");
        vm.filter=tagname;
      
      });