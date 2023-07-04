//[Dashboard Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {
	
	$('#slimtest1').slimScroll({
		height: '340px'
	});


  	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart
	var chart = am4core.create("ethbtc", am4charts.XYChart);
	chart.padding(0, 15, 0, 15);

	// Load data
	chart.dataSource.url = "https://www.amcharts.com/wp-content/uploads/assets/stock/MSFT.csv";
	chart.dataSource.parser = new am4core.CSVParser();
	chart.dataSource.parser.options.useColumnNames = true;
	chart.dataSource.parser.options.reverse = true;

	// the following line makes value axes to be arranged vertically.
	chart.leftAxesContainer.layout = "vertical";

	// uncomment this line if you want to change order of axes
	//chart.bottomAxesContainer.reverseOrder = true;

	var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
	dateAxis.renderer.grid.template.location = 0;
	dateAxis.renderer.ticks.template.length = 8;
	dateAxis.renderer.ticks.template.strokeOpacity = 0.1;
	dateAxis.renderer.grid.template.disabled = true;
	dateAxis.renderer.ticks.template.disabled = false;
	dateAxis.renderer.ticks.template.strokeOpacity = 0.2;
	dateAxis.renderer.minLabelPosition = 0.01;
	dateAxis.renderer.maxLabelPosition = 0.99;
	dateAxis.keepSelection = true;
	dateAxis.minHeight = 30;

	dateAxis.groupData = true;
	dateAxis.minZoomCount = 5;

	// these two lines makes the axis to be initially zoomed-in
	// dateAxis.start = 0.7;
	// dateAxis.keepSelection = true;

	var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis.tooltip.disabled = true;
	valueAxis.zIndex = 1;
	valueAxis.renderer.baseGrid.disabled = true;
	// height of axis
	valueAxis.height = am4core.percent(65);

	valueAxis.renderer.gridContainer.background.fill = am4core.color("#000000");
	valueAxis.renderer.gridContainer.background.fillOpacity = 0.05;
	valueAxis.renderer.inside = true;
	valueAxis.renderer.labels.template.verticalCenter = "bottom";
	valueAxis.renderer.labels.template.padding(2, 2, 2, 2);

	//valueAxis.renderer.maxLabelPosition = 0.95;
	valueAxis.renderer.fontSize = "0.8em"

	var series = chart.series.push(new am4charts.CandlestickSeries());
	series.dataFields.dateX = "Date";
	series.dataFields.openValueY = "Open";
	series.dataFields.valueY = "Close";
	series.dataFields.lowValueY = "Low";
	series.dataFields.highValueY = "High";
	series.clustered = false;
	series.tooltipText = "open: {openValueY.value}\nlow: {lowValueY.value}\nhigh: {highValueY.value}\nclose: {valueY.value}";
	series.name = "MSFT";
	series.defaultState.transitionDuration = 0;

	var valueAxis2 = chart.yAxes.push(new am4charts.ValueAxis());
	valueAxis2.tooltip.disabled = true;
	// height of axis
	valueAxis2.height = am4core.percent(35);
	valueAxis2.zIndex = 3
	// this makes gap between panels
	valueAxis2.marginTop = 30;
	valueAxis2.renderer.baseGrid.disabled = true;
	valueAxis2.renderer.inside = true;
	valueAxis2.renderer.labels.template.verticalCenter = "bottom";
	valueAxis2.renderer.labels.template.padding(2, 2, 2, 2);
	//valueAxis.renderer.maxLabelPosition = 0.95;
	valueAxis2.renderer.fontSize = "0.8em"

	valueAxis2.renderer.gridContainer.background.fill = am4core.color("#000000");
	valueAxis2.renderer.gridContainer.background.fillOpacity = 0.05;

	var series2 = chart.series.push(new am4charts.ColumnSeries());
	series2.dataFields.dateX = "Date";
	series2.clustered = false;
	series2.dataFields.valueY = "Volume";
	series2.yAxis = valueAxis2;
	series2.tooltipText = "{valueY.value}";
	series2.name = "Series 2";
	// volume should be summed
	series2.groupFields.valueY = "sum";
	series2.defaultState.transitionDuration = 0;

	chart.cursor = new am4charts.XYCursor();

	var scrollbarX = new am4charts.XYChartScrollbar();

	var sbSeries = chart.series.push(new am4charts.LineSeries());
	sbSeries.dataFields.valueY = "Close";
	sbSeries.dataFields.dateX = "Date";
	scrollbarX.series.push(sbSeries);
	sbSeries.disabled = true;
	scrollbarX.marginBottom = 20;
	chart.scrollbarX = scrollbarX;
	scrollbarX.scrollbarChart.xAxes.getIndex(0).minHeight = undefined;



	/**
	 * Set up external controls
	 */

	// Date format to be used in input fields
	var inputFieldFormat = "yyyy-MM-dd";

	document.getElementById("b1m").addEventListener("click", function() {
	  var max = dateAxis.groupMax["day1"];
	  var date = new Date(max);
	  am4core.time.add(date, "month", -1);
	  zoomToDates(date);
	});

	document.getElementById("b3m").addEventListener("click", function() {
	  var max = dateAxis.groupMax["day1"];
	  var date = new Date(max);
	  am4core.time.add(date, "month", -3);
	  zoomToDates(date);
	});

	document.getElementById("b6m").addEventListener("click", function() {
	  var max = dateAxis.groupMax["day1"];
	  var date = new Date(max);
	  am4core.time.add(date, "month", -6);
	  zoomToDates(date);
	});

	document.getElementById("b1y").addEventListener("click", function() {
	  var max = dateAxis.groupMax["day1"];
	  var date = new Date(max);
	  am4core.time.add(date, "year", -1);
	  zoomToDates(date);
	});

	document.getElementById("bytd").addEventListener("click", function() {
	  var max = dateAxis.groupMax["day1"];
	  var date = new Date(max);
	  am4core.time.round(date, "year", 1);
	  zoomToDates(date);
	});

	document.getElementById("bmax").addEventListener("click", function() {
	  var min = dateAxis.groupMin["day1"];
	  var date = new Date(min);
	  zoomToDates(date);
	});

	dateAxis.events.on("selectionextremeschanged", function() {
	  updateFields();
	});

	dateAxis.events.on("extremeschanged", updateFields);

	function updateFields() {
	  var minZoomed = dateAxis.minZoomed + am4core.time.getDuration(dateAxis.mainBaseInterval.timeUnit, dateAxis.mainBaseInterval.count) * 0.5;
	  document.getElementById("fromfield").value = chart.dateFormatter.format(minZoomed, inputFieldFormat);
	  document.getElementById("tofield").value = chart.dateFormatter.format(new Date(dateAxis.maxZoomed), inputFieldFormat);
	}

	document.getElementById("fromfield").addEventListener("keyup", updateZoom);
	document.getElementById("tofield").addEventListener("keyup", updateZoom);

	var zoomTimeout;
	function updateZoom() {
	  if (zoomTimeout) {
		clearTimeout(zoomTimeout);
	  }
	  zoomTimeout = setTimeout(function() {
		var start = document.getElementById("fromfield").value;
		var end = document.getElementById("tofield").value;
		if ((start.length < inputFieldFormat.length) || (end.length < inputFieldFormat.length)) {
		  return;
		}
		var startDate = chart.dateFormatter.parse(start, inputFieldFormat);
		var endDate = chart.dateFormatter.parse(end, inputFieldFormat);

		if (startDate && endDate) {
		  dateAxis.zoomToDates(startDate, endDate);
		}
	  }, 500);
	}

	function zoomToDates(date) {
	  var min = dateAxis.groupMin["day1"];
	  var max = dateAxis.groupMax["day1"];
	  dateAxis.keepSelection = true;
	  //dateAxis.start = (date.getTime() - min)/(max - min);
	  //dateAxis.end = 1;

	  dateAxis.zoom({start:(date.getTime() - min)/(max - min), end:1});
	}

	}); // end am4core.ready()
	
	
	
	
	
	
	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart instance
	var chart = am4core.create("order-chart", am4charts.XYChart);

	// Add data
	chart.dataSource.url = "https://poloniex.com/public?command=returnOrderBook&currencyPair=BTC_ETH&depth=50";
	chart.dataSource.reloadFrequency = 30000;
	chart.dataSource.adapter.add("parsedData", function(data) {

	  // Function to process (sort and calculate cummulative volume)
	  function processData(list, type, desc) {

		// Convert to data points
		for(var i = 0; i < list.length; i++) {
		  list[i] = {
			value: Number(list[i][0]),
			volume: Number(list[i][1]),
		  }
		}

		// Sort list just in case
		list.sort(function(a, b) {
		  if (a.value > b.value) {
			return 1;
		  }
		  else if (a.value < b.value) {
			return -1;
		  }
		  else {
			return 0;
		  }
		});

		// Calculate cummulative volume
		if (desc) {
		  for(var i = list.length - 1; i >= 0; i--) {
			if (i < (list.length - 1)) {
			  list[i].totalvolume = list[i+1].totalvolume + list[i].volume;
			}
			else {
			  list[i].totalvolume = list[i].volume;
			}
			var dp = {};
			dp["value"] = list[i].value;
			dp[type + "volume"] = list[i].volume;
			dp[type + "totalvolume"] = list[i].totalvolume;
			res.unshift(dp);
		  }
		}
		else {
		  for(var i = 0; i < list.length; i++) {
			if (i > 0) {
			  list[i].totalvolume = list[i-1].totalvolume + list[i].volume;
			}
			else {
			  list[i].totalvolume = list[i].volume;
			}
			var dp = {};
			dp["value"] = list[i].value;
			dp[type + "volume"] = list[i].volume;
			dp[type + "totalvolume"] = list[i].totalvolume;
			res.push(dp);
		  }
		}

	  }

	  // Init
	  var res = [];
	  processData(data.bids, "bids", true);
	  processData(data.asks, "asks", false);

	  return res;
	});

	// Set up precision for numbers
	chart.numberFormatter.numberFormat = "#,###.####";

	// Create axes
	var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
	xAxis.dataFields.category = "value";
	//xAxis.renderer.grid.template.location = 0;
	xAxis.renderer.minGridDistance = 50;
	xAxis.title.text = "";

	var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
	yAxis.title.text = "";

	// Create series
	var series = chart.series.push(new am4charts.StepLineSeries());
	series.dataFields.categoryX = "value";
	series.dataFields.valueY = "bidstotalvolume";
	series.strokeWidth = 2;
	series.stroke = am4core.color("#0f0");
	series.fill = series.stroke;
	series.fillOpacity = 0.1;
	series.tooltipText = "Ask: [bold]{categoryX}[/]\nTotal volume: [bold]{valueY}[/]\nVolume: [bold]{bidsvolume}[/]"

	var series2 = chart.series.push(new am4charts.StepLineSeries());
	series2.dataFields.categoryX = "value";
	series2.dataFields.valueY = "askstotalvolume";
	series2.strokeWidth = 2;
	series2.stroke = am4core.color("#f00");
	series2.fill = series2.stroke;
	series2.fillOpacity = 0.1;
	series2.tooltipText = "Ask: [bold]{categoryX}[/]\nTotal volume: [bold]{valueY}[/]\nVolume: [bold]{asksvolume}[/]"

	var series3 = chart.series.push(new am4charts.ColumnSeries());
	series3.dataFields.categoryX = "value";
	series3.dataFields.valueY = "bidsvolume";
	series3.strokeWidth = 0;
	series3.fill = am4core.color("#000");
	series3.fillOpacity = 0.2;

	var series4 = chart.series.push(new am4charts.ColumnSeries());
	series4.dataFields.categoryX = "value";
	series4.dataFields.valueY = "asksvolume";
	series4.strokeWidth = 0;
	series4.fill = am4core.color("#000");
	series4.fillOpacity = 0.2;

	// Add cursor
	chart.cursor = new am4charts.XYCursor();

	}); // end am4core.ready()
		
}); // End of use strict
