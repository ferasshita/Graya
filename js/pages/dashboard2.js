//[Dashboard Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	
	
		if ($('#webticker-3').length) {   
			$("#webticker-3").webTicker({
				height:'auto', 
				duplicate:true, 
				startEmpty:false, 
				rssfrequency:5
			});
		}
	
	//data table
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : false
    });
	
	if ($('.buy-sall-table').length) {
        setRandomClass();
        setInterval(function () {
            setRandomClass();
        },1000);
        function setRandomClass() {
            var tbody = $(".buy-sall-table table tbody");
            var items = tbody.find("tr");
            var number = items.length;
            var random1 = Math.floor((Math.random() * number));
            var random2 = Math.floor((Math.random() * number));
            items.removeClass("bg-warning");
            items.eq(random1).addClass("bg-warning");
            items.eq(random2).addClass("bg-warning");
        }
    }
	
	
	// Apex  start
  if($('#apexChart2').length) {
    var options2 = {
      chart: {
        type: "bar",
        height: 100,
        sparkline: {
          enabled: !0
        }
      },
      plotOptions: {
        bar: {
          columnWidth: "25%"
        }
      },
      colors: ["#ffffff"],
      series: [{
        data: [36, 77, 52, 90, 74, 35, 55, 23, 47, 10, 63, 36, 77, 52, 90, 74, 35, 55, 23, 47]
      }],
      labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
      xaxis: {
        crosshairs: {
          width: 2
        }
      },
      tooltip: {
        fixed: {
          enabled: !1
        },
        x: {
          show: !1
        },
        y: {
          title: {
            formatter: function(e) {
              return ""
            }
          }
        },
        marker: {
          show: !1
        }
      }
    };
    new ApexCharts(document.querySelector("#apexChart2"),options2).render();
  }
  // Apex  end
	
	
	
	// Apex  start
  if($('#apexChart3').length) {
    var options2 = {
      chart: {
        type: "bar",
        height: 100,
        sparkline: {
          enabled: !0
        }
      },
      plotOptions: {
        bar: {
          columnWidth: "25%"
        }
      },
      colors: ["#ffffff"],
      series: [{
        data: [36, 77, 52, 90, 74, 35, 55, 23, 47, 10, 63, 36, 77, 52, 90, 74, 35, 55, 23, 47]
      }],
      labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
      xaxis: {
        crosshairs: {
          width: 2
        }
      },
      tooltip: {
        fixed: {
          enabled: !1
        },
        x: {
          show: !1
        },
        y: {
          title: {
            formatter: function(e) {
              return ""
            }
          }
        },
        marker: {
          show: !1
        }
      }
    };
    new ApexCharts(document.querySelector("#apexChart3"),options2).render();
  }
  // Apex chart2 end
	
	
	
	
	am4core.ready(function() {

	// Themes begin
	am4core.useTheme(am4themes_animated);
	// Themes end

	// Create chart
	var chart = am4core.create("chartdiv30", am4charts.XYChart);
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
		
}); // End of use strict
