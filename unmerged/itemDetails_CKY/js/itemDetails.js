// owl-carousel
$('.owl-carousel').owlCarousel({
  loop:true,
  margin:10,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:5
      }
  }
})

// AOS特效
$(document).ready(function (){
  AOS.init();
})

// 雷達 
	//定義變數
	var chartRadarDOM;
	var chartRadarData;
	var chartRadarOptions;
	
    	//載入雷達圖
	Chart.defaults.global.legend.display = false;
  Chart.defaults.global.defaultFontColor = '#674300'; //文字顏色
  Chart.defaults.global.defaultFontFamily = "Noto Serif TC"; //文字樣式
	chartRadarDOM = document.getElementById("chartRadar");
	chartRadarData;
	chartRadarOptions = 
	{
		scale: 
		{
			ticks: //內圈數值設定
			{
				// fontSize: 0, //數值大小
				// beginAtZero: true,
        // maxTicksLimit: 0,//中間格線
        // color: 'transparent',
				// min:0,
        // max:100
        callback: function() {return ""},
        backdropColor: "rgba(0, 0, 0, 0)",

			},
			pointLabels: //外圈數值設定
			{
				fontSize: 16,
				color: '#0044BB'
			},
			gridLines: //雷達線格
			{
        color: 'transparent'
      },
      angleLines: 
      { 
        color: 'transparent' //雷達線格
      } 
		}
	};
	
	console.log("---------Rader Data--------");
	var graphData =new Array();
	graphData.push(100);
	graphData.push(40);
	graphData.push(65);
	graphData.push(20);
  graphData.push(97);
  graphData.push(75);
	
	
	console.log("--------Rader Create-------------");
	console.log(graphData);
		
	//CreateData 雷達內部值樣式設定
	chartRadarData = {
    		labels: ['酸度', '日本酒度', '精米步合', '胺基酸度', '辛口', '甘口'],
		datasets: [{
    	label: "Skill Level",
			backgroundColor: "rgba(255,147,0,0.3)",
			borderColor: "transparent",
			pointBackgroundColor: "transparent",//點顏色
   		pointBorderColor: "rgba(0,0,0,0)",
			pointHoverBackgroundColor: "#fff",//內顏色
			pointHoverBorderColor: "#000",//外圈
			pointBorderWidth: 5,
			data: graphData}]
	};
		
	//Draw
	var chartRadar = new Chart(chartRadarDOM, {
		type: 'radar',
		data: chartRadarData,
		options: chartRadarOptions
	});

// 雷達 結束