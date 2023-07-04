//[Dashboard Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

	var count = 480;

	  $.get("https://min-api.cryptocompare.com/data/histominute?fsym=BTC&tsym=USD&limit=" + count + "&aggregate=3&e=CCCAGG", function(data, status) {

		  var datarec = [];
		  var data_time = [];


		  for (var i = 0; i < data.Data.length; i++) {

			  var ts = Date.UTC(data.Data[i].time);
			  var d = new Date(data.Data[i].time * 1000)
			  //var time = ts.toString();


			  var test = [Date.parse(d), data.Data[i].close];

			  datarec.push(test)
		  }

		  Highcharts.chart('myChart', {
			  chart: {
				  zoomType: 'x'
			  },
			  title: {
				  text: 'BTC Current Value'
			  },
			  subtitle: {
				  text: document.ontouchstart === undefined ?
					  'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
			  },
			  yAxis: {
				  gridLineWidth: 0,
				  minorGridLineWidth: 0,
				  title: {
					  text: 'BTC rate'
				  }
			  },
			  xAxis: {
				  type: 'datetime',
				  labels: {
					  formatter: function() {
						  //alert( this.value);
						  return Highcharts.dateFormat(' %H:%M UTC', this.value);
					  },
					  dateTimeLabelFormats: {
						  minute: '%H:%M',
						  hour: '%H:%M',
						  day: '%e. %b',
						  week: '%e. %b',
						  month: '%b \'%y',
						  year: '%Y'
					  }
				  }
			  },

			  legend: {
				  enabled: false
			  },



			  series: [{
				  name: 'BTC',
				  type: 'area',
				  data: datarec,
				  gapSize: 5,

				  fillColor: {
					  linearGradient: {
						  x1: 0,
						  y1: 0,
						  x2: 0,
						  y2: 1
					  },
					  stops: [
						  [0, '#00baf2'],
						  [1, '#d8f6ff']
					  ]
				  },
				  threshold: null
			  }]
		  });
	  });



	  $.get("https://min-api.cryptocompare.com/data/histominute?fsym=BCH&tsym=USD&limit=" + count + "&aggregate=3&e=CCCAGG", function(data, status) {

		  var datarec = [];
		  var data_time = [];


		  for (var i = 0; i < data.Data.length; i++) {

			  var ts = Date.UTC(data.Data[i].time);
			  var d = new Date(data.Data[i].time * 1000)
			  var time = ts.toString();


			  var test = [Date.parse(d), data.Data[i].close];

			  datarec.push(test)
		  }





		  Highcharts.chart('myChart1', {
			  chart: {
				  zoomType: 'x'
			  },
			  title: {
				  text: 'BCH Current Value'
			  },
			  subtitle: {
				  text: document.ontouchstart === undefined ?
					  'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
			  },
			  yAxis: {
				  gridLineWidth: 0,
				  minorGridLineWidth: 0,
				  title: {
					  text: 'BCH rate'
				  }
			  },
			  xAxis: {
				  type: 'datetime',
				  labels: {
					  formatter: function() {
						  //alert( this.value);
						  return Highcharts.dateFormat('%H:%M UTC', this.value);
					  },
					  dateTimeLabelFormats: {
						  minute: '%H:%M',
						  hour: '%H:%M',
						  day: '%e. %b',
						  week: '%e. %b',
						  month: '%b \'%y',
						  year: '%Y'
					  }
				  }
			  },

			  legend: {
				  enabled: false
			  },



			  series: [{
				  name: 'BCH',
				  type: 'area',
				  data: datarec,
				  gapSize: 5,
				  tooltip: {
					  valueDecimals: 2
				  },
				  fillColor: {
					  linearGradient: {
						  x1: 0,
						  y1: 0,
						  x2: 0,
						  y2: 1
					  },
					  stops: [
						  [0, '#e80c60'],
						  [1, '#fabfd6']
					  ],
				  },
				  threshold: null
			  }]
		  });
	  });


	  $.get("https://min-api.cryptocompare.com/data/histominute?fsym=ETH&tsym=USD&limit=" + count + "&aggregate=3&e=CCCAGG", function(data, status) {

		  var datarec = [];
		  var data_time = [];


		  for (var i = 0; i < data.Data.length; i++) {

			  var ts = Date.UTC(data.Data[i].time);
			  var d = new Date(data.Data[i].time * 1000)
			  var time = ts.toString();


			  var test = [Date.parse(d), data.Data[i].close];

			  datarec.push(test)
		  }






		  Highcharts.chart('myChart2', {
			  chart: {
				  zoomType: 'x'
			  },
			  title: {
				  text: 'ETH Current Value'
			  },
			  subtitle: {
				  text: document.ontouchstart === undefined ?
					  'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
			  },
			  yAxis: {
				  gridLineWidth: 0,
				  minorGridLineWidth: 0,
				  title: {
					  text: 'ETH rate'
				  }
			  },
			  xAxis: {
				  type: 'datetime',
				  labels: {
					  formatter: function() {
						  //alert( this.value);
						  return Highcharts.dateFormat('%H:%M UTC', this.value);
					  },
					  dateTimeLabelFormats: {
						  minute: '%H:%M',
						  hour: '%H:%M',
						  day: '%e. %b',
						  week: '%e. %b',
						  month: '%b \'%y',
						  year: '%Y'
					  }
				  }
			  },

			  legend: {
				  enabled: false
			  },



			  series: [{
				  name: 'ETH',
				  type: 'area',
				  data: datarec,
				  gapSize: 5,
				  tooltip: {
					  valueDecimals: 2
				  },
				  fillColor: {
					  linearGradient: {
						  x1: 0,
						  y1: 0,
						  x2: 0,
						  y2: 1
					  },
					  stops: [
						  [0, '#37b38b'],
						  [1, '#d7fff2']
					  ]
				  },
				  threshold: null
			  }]
		  });
	  });


	  $.get("https://min-api.cryptocompare.com/data/histominute?fsym=LTC&tsym=USD&limit=" + count + "&aggregate=3&e=CCCAGG", function(data, status) {

		  var datarec = [];
		  var data_time = [];


		  for (var i = 0; i < data.Data.length; i++) {

			  var ts = Date.UTC(data.Data[i].time);
			  var d = new Date(data.Data[i].time * 1000)
			  var time = ts.toString();


			  var test = [Date.parse(d), data.Data[i].close];

			  datarec.push(test)
		  }




		  Highcharts.chart('myChart3', {
			  chart: {
				  zoomType: 'x'
			  },
			  title: {
				  text: 'LTC Current Value'
			  },
			  subtitle: {
				  text: document.ontouchstart === undefined ?
					  'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
			  },
			  yAxis: {
				  gridLineWidth: 0,
				  minorGridLineWidth: 0,
				  title: {
					  text: 'LTC rate'
				  }
			  },
			  xAxis: {
				  type: 'datetime',
				  labels: {
					  formatter: function() {
						  //alert( this.value);
						  return Highcharts.dateFormat('%H:%M UTC', this.value);
					  },
					  dateTimeLabelFormats: {
						  minute: '%H:%M',
						  hour: '%H:%M',
						  day: '%e. %b',
						  week: '%e. %b',
						  month: '%b \'%y',
						  year: '%Y'
					  }
				  }
			  },

			  legend: {
				  enabled: false
			  },



			  series: [{
				  name: 'LTC',
				  type: 'area',
				  data: datarec,
				  gapSize: 5,
				  tooltip: {
					  valueDecimals: 2
				  },
				  fillColor: {
					  linearGradient: {
						  x1: 0,
						  y1: 0,
						  x2: 0,
						  y2: 1
					  },
					  stops: [
						  [0, '#304ffe'],
						  [1, '#cbd2fa']
					  ]
				  },
				  threshold: null
			  }]
		  });
	  });


	  $.get("https://min-api.cryptocompare.com/data/histominute?fsym=XRP&tsym=USD&limit=" + count + "&aggregate=3&e=CCCAGG", function(data, status) {

		  var datarec = [];
		  var data_time = [];


		  for (var i = 0; i < data.Data.length; i++) {

			  var ts = Date.UTC(data.Data[i].time);
			  var d = new Date(data.Data[i].time * 1000)
			  var time = ts.toString();


			  var test = [Date.parse(d), data.Data[i].close];

			  datarec.push(test)
		  }



		  Highcharts.chart('myChart4', {
			  chart: {
				  zoomType: 'x'
			  },
			  title: {
				  text: 'XRP Current Value'
			  },
			  subtitle: {
				  text: document.ontouchstart === undefined ?
					  'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
			  },
			  yAxis: {
				  gridLineWidth: 0,
				  minorGridLineWidth: 0,
				  title: {
					  text: 'XRP rate'
				  }
			  },
			  xAxis: {
				  type: 'datetime',
				  labels: {
					  formatter: function() {
						  //alert( this.value);
						  return Highcharts.dateFormat('%H:%M UTC', this.value);
					  },
					  dateTimeLabelFormats: {
						  minute: '%H:%M',
						  hour: '%H:%M',
						  day: '%e. %b',
						  week: '%e. %b',
						  month: '%b \'%y',
						  year: '%Y'
					  }
				  }
			  },

			  legend: {
				  enabled: false
			  },



			  series: [{
				  name: 'XRP',
				  type: 'area',
				  data: datarec,
				  gapSize: 5,
				  tooltip: {
					  valueDecimals: 2
				  },
				  fillColor: {
					  linearGradient: {
						  x1: 0,
						  y1: 0,
						  x2: 0,
						  y2: 1
					  },
					  stops: [
						  [0, '#9b26af'],
						  [1, '#f6d9fa']
					  ]
				  },
				  threshold: null
			  }]
		  });
	  });

	
	
	
	
	var options = {
		labels: ['Ripple','Bitcoin','Eth','Lit','Bit'],
          series: [44, 55, 41, 17, 15],
          chart: {
          type: 'donut',
        },
		legend: {
		  position: 'bottom'
		},
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            }
          }
        }]
    };

        var chart = new ApexCharts(document.querySelector("#profile-chart"), options);
        chart.render();
		
}); // End of use strict
