var options = {
  series: [{
    name: 'Series 1',
    data: [80, 50, 30, 40],
  }],
  chart: {
    height: 300,
    type: 'radar',
  },
  title: {
    // text: 'Basic Radar Chart'
  },
  xaxis: {
    categories: ['January', 'February', 'March', 'April']
  }
};

var chart = new ApexCharts(document.querySelector("#detailChart"), options);
chart.render();