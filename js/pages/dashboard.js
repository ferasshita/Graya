//[Dashboard Javascript]

//Project:	Crypto Tokenizer UI Interface & Cryptocurrency Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';
	var options = {
          series: [{
          data: [{
              x: new Date(1538778600000),
              y: [6629.81, 6650.5, 6623.04, 6633.33]
            },
            {
              x: new Date(1538780400000),
              y: [6632.01, 6643.59, 6620, 6630.11]
            },
            {
              x: new Date(1538782200000),
              y: [6630.71, 6648.95, 6623.34, 6635.65]
            },
            {
              x: new Date(1538784000000),
              y: [6635.65, 6651, 6629.67, 6638.24]
            },
            {
              x: new Date(1538785800000),
              y: [6638.24, 6640, 6620, 6624.47]
            },
            {
              x: new Date(1538787600000),
              y: [6624.53, 6636.03, 6621.68, 6624.31]
            },
            {
              x: new Date(1538789400000),
              y: [6624.61, 6632.2, 6617, 6626.02]
            },
            {
              x: new Date(1538791200000),
              y: [6627, 6627.62, 6584.22, 6603.02]
            },
            {
              x: new Date(1538793000000),
              y: [6605, 6608.03, 6598.95, 6604.01]
            },
            {
              x: new Date(1538794800000),
              y: [6604.5, 6614.4, 6602.26, 6608.02]
            },
            {
              x: new Date(1538796600000),
              y: [6608.02, 6610.68, 6601.99, 6608.91]
            },
            {
              x: new Date(1538798400000),
              y: [6608.91, 6618.99, 6608.01, 6612]
            },
            {
              x: new Date(1538800200000),
              y: [6612, 6615.13, 6605.09, 6612]
            },
            {
              x: new Date(1538802000000),
              y: [6612, 6624.12, 6608.43, 6622.95]
            },
            {
              x: new Date(1538803800000),
              y: [6623.91, 6623.91, 6615, 6615.67]
            },
            {
              x: new Date(1538805600000),
              y: [6618.69, 6618.74, 6610, 6610.4]
            },
            {
              x: new Date(1538807400000),
              y: [6611, 6622.78, 6610.4, 6614.9]
            },
            {
              x: new Date(1538809200000),
              y: [6614.9, 6626.2, 6613.33, 6623.45]
            },
            {
              x: new Date(1538811000000),
              y: [6623.48, 6627, 6618.38, 6620.35]
            },
            {
              x: new Date(1538812800000),
              y: [6619.43, 6620.35, 6610.05, 6615.53]
            },
            {
              x: new Date(1538814600000),
              y: [6615.53, 6617.93, 6610, 6615.19]
            },
            {
              x: new Date(1538816400000),
              y: [6615.19, 6621.6, 6608.2, 6620]
            },
            {
              x: new Date(1538818200000),
              y: [6619.54, 6625.17, 6614.15, 6620]
            },
            {
              x: new Date(1538820000000),
              y: [6620.33, 6634.15, 6617.24, 6624.61]
            },
            {
              x: new Date(1538821800000),
              y: [6625.95, 6626, 6611.66, 6617.58]
            },
            {
              x: new Date(1538823600000),
              y: [6619, 6625.97, 6595.27, 6598.86]
            },
            {
              x: new Date(1538825400000),
              y: [6598.86, 6598.88, 6570, 6587.16]
            },
            {
              x: new Date(1538827200000),
              y: [6588.86, 6600, 6580, 6593.4]
            },
            {
              x: new Date(1538829000000),
              y: [6593.99, 6598.89, 6585, 6587.81]
            },
            {
              x: new Date(1538830800000),
              y: [6587.81, 6592.73, 6567.14, 6578]
            },
            {
              x: new Date(1538832600000),
              y: [6578.35, 6581.72, 6567.39, 6579]
            },
            {
              x: new Date(1538834400000),
              y: [6579.38, 6580.92, 6566.77, 6575.96]
            },
            {

              x: new Date(1538836200000),
              y: [6575.96, 6589, 6571.77, 6588.92]
            },
            {
              x: new Date(1538838000000),
              y: [6588.92, 6594, 6577.55, 6589.22]
            },
            {
              x: new Date(1538839800000),
              y: [6589.3, 6598.89, 6589.1, 6596.08]
            },
            {
              x: new Date(1538841600000),
              y: [6597.5, 6600, 6588.39, 6596.25]
            },
            {
              x: new Date(1538843400000),
              y: [6598.03, 6600, 6588.73, 6595.97]
            },
            {
              x: new Date(1538845200000),
              y: [6595.97, 6602.01, 6588.17, 6602]
            },
            {
              x: new Date(1538847000000),
              y: [6602, 6607, 6596.51, 6599.95]
            },
            {
              x: new Date(1538848800000),
              y: [6600.63, 6601.21, 6590.39, 6591.02]
            },
            {
              x: new Date(1538850600000),
              y: [6591.02, 6603.08, 6591, 6591]
            },
            {
              x: new Date(1538852400000),
              y: [6591, 6601.32, 6585, 6592]
            },
            {
              x: new Date(1538854200000),
              y: [6593.13, 6596.01, 6590, 6593.34]
            },
            {
              x: new Date(1538856000000),
              y: [6593.34, 6604.76, 6582.63, 6593.86]
            },
            {
              x: new Date(1538857800000),
              y: [6593.86, 6604.28, 6586.57, 6600.01]
            },
            {
              x: new Date(1538859600000),
              y: [6601.81, 6603.21, 6592.78, 6596.25]
            },
            {
              x: new Date(1538861400000),
              y: [6596.25, 6604.2, 6590, 6602.99]
            },
            {
              x: new Date(1538863200000),
              y: [6602.99, 6606, 6584.99, 6587.81]
            },
            {
              x: new Date(1538865000000),
              y: [6587.81, 6595, 6583.27, 6591.96]
            },
            {
              x: new Date(1538866800000),
              y: [6591.97, 6596.07, 6585, 6588.39]
            },
            {
              x: new Date(1538868600000),
              y: [6587.6, 6598.21, 6587.6, 6594.27]
            },
            {
              x: new Date(1538870400000),
              y: [6596.44, 6601, 6590, 6596.55]
            },
            {
              x: new Date(1538872200000),
              y: [6598.91, 6605, 6596.61, 6600.02]
            },
            {
              x: new Date(1538874000000),
              y: [6600.55, 6605, 6589.14, 6593.01]
            },
            {
              x: new Date(1538875800000),
              y: [6593.15, 6605, 6592, 6603.06]
            },
            {
              x: new Date(1538877600000),
              y: [6603.07, 6604.5, 6599.09, 6603.89]
            },
            {
              x: new Date(1538879400000),
              y: [6604.44, 6604.44, 6600, 6603.5]
            },
            {
              x: new Date(1538881200000),
              y: [6603.5, 6603.99, 6597.5, 6603.86]
            },
            {
              x: new Date(1538883000000),
              y: [6603.85, 6605, 6600, 6604.07]
            },
            {
              x: new Date(1538884800000),
              y: [6604.98, 6606, 6604.07, 6606]
            },
          ]
        }],
          chart: {
          type: 'candlestick',
          height: 520
        },
		colors:['#2444e8, #000000'],
        xaxis: {
          type: 'datetime'
        },
        yaxis: {
          tooltip: {
            enabled: true
          }
        },
		plotOptions: {
		  candlestick: {
			colors: {
			  upward: '#0080ff',
			  downward: '#ff3f3f'
			}
		  }
		}
        };

        var chart = new ApexCharts(document.querySelector("#bitcoin-stock"), options);
        chart.render();
	
	
	  var options = {
      series: [{
      name: 'ATC',      
      data: [
            [1327359600000,30.95],
            [1327446000000,31.34],
            [1327532400000,31.18],
            [1327618800000,31.05],
            [1327878000000,31.00],
            [1327964400000,30.95],
            [1328050800000,31.24],
            [1328137200000,31.29],
            [1328223600000,31.85],
            [1328482800000,31.86],
            [1328569200000,32.28],
            [1328655600000,32.10],
            [1328742000000,32.65],
            [1328828400000,32.21],
            [1329087600000,32.35],
            [1329174000000,32.44],
            [1329260400000,32.46],
            [1329346800000,32.86],
            [1329433200000,32.75],
            [1329778800000,32.54],
            [1329865200000,32.33],
            [1329951600000,32.97],
            [1330038000000,33.41],
            [1330297200000,33.27],
            [1330383600000,33.27],
            [1330470000000,32.89],
            [1330556400000,33.10],
            [1330642800000,33.73],
            [1330902000000,33.22],
            [1330988400000,31.99],
            [1331074800000,32.41],
            [1331161200000,33.05],
            [1331247600000,33.64],
            [1331506800000,33.56],
            [1331593200000,34.22],
            [1331679600000,33.77],
            [1331766000000,34.17],
            [1331852400000,33.82],
            [1332111600000,34.51],
            [1332198000000,33.16],
            [1332284400000,33.56],
            [1332370800000,33.71],
            [1332457200000,33.81],
            [1332712800000,34.40],
            [1332799200000,34.63],
            [1332885600000,34.46],
            [1332972000000,34.48],
            [1333058400000,34.31],
            [1333317600000,34.70],
            [1333404000000,34.31],
            [1333490400000,33.46],
            [1333576800000,33.59],
            [1333922400000,33.22],
            [1334008800000,32.61],
            [1334095200000,33.01],
            [1334181600000,33.55],
            [1334268000000,33.18],
            [1334527200000,32.84],
            [1334613600000,33.84],
            [1334700000000,33.39],
            [1334786400000,32.91],
            [1334872800000,33.06],
            [1335132000000,32.62],
            [1335218400000,32.40],
            [1335304800000,33.13],
            [1335391200000,33.26],
            [1335477600000,33.58],
            [1335736800000,33.55],
            [1335823200000,33.77],
            [1335909600000,33.76],
            [1335996000000,33.32],
            [1336082400000,32.61],
            [1336341600000,32.52],
            [1336428000000,32.67],
            [1336514400000,32.52],
            [1336600800000,31.92],
            [1336687200000,32.20],
            [1336946400000,32.23],
            [1337032800000,32.33],
            [1337119200000,32.36],
            [1337205600000,32.01],
            [1337292000000,31.31],
            [1337551200000,32.01],
            [1337637600000,32.01],
            [1337724000000,32.18],
            [1337810400000,31.54],
            [1337896800000,31.60],
            [1338242400000,32.05],
            [1338328800000,31.29],
            [1338415200000,31.05],
            [1338501600000,29.82],
            [1338760800000,30.31],
            [1338847200000,30.70],
            [1338933600000,31.69],
            [1339020000000,31.32],
            [1339106400000,31.65],
            [1339365600000,31.13],
            [1339452000000,31.77],
            [1339538400000,31.79],
            [1339624800000,31.67],
            [1339711200000,32.39],
            [1339970400000,32.63],
            [1340056800000,32.89],
            [1340143200000,31.99],
            [1340229600000,31.23],
            [1340316000000,31.57],
            [1340575200000,30.84],
            [1340661600000,31.07],
            [1340748000000,31.41],
            [1340834400000,31.17],
            [1340920800000,32.37],
            [1341180000000,32.19],
            [1341266400000,32.51],
            [1341439200000,32.53],
            [1341525600000,31.37],
            [1341784800000,30.43],
            [1341871200000,30.44],
            [1341957600000,30.20],
            [1342044000000,30.14],
            [1342130400000,30.65],
            [1342389600000,30.40],
            [1342476000000,30.65],
            [1342562400000,31.43],
            [1342648800000,31.89],
            [1342735200000,31.38],
            [1342994400000,30.64],
            [1343080800000,30.02],
            [1343167200000,30.33],
            [1343253600000,30.95],
            [1343340000000,31.89],
            [1343599200000,31.01],
            [1343685600000,30.88],
            [1343772000000,30.69],
            [1343858400000,30.58],
            [1343944800000,32.02],
            [1344204000000,32.14],
            [1344290400000,32.37],
            [1344376800000,32.51],
            [1344463200000,32.65],
            [1344549600000,32.64],
            [1344808800000,32.27],
            [1344895200000,32.10],
            [1344981600000,32.91],
            [1345068000000,33.65],
            [1345154400000,33.80],
            [1345413600000,33.92],
            [1345500000000,33.75],
            [1345586400000,33.84],
            [1345672800000,33.50],
            [1345759200000,32.26],
            [1346018400000,32.32],
            [1346104800000,32.06],
            [1346191200000,31.96],
            [1346277600000,31.46],
            [1346364000000,31.27],
            [1346709600000,31.43],
            [1346796000000,32.26],
            [1346882400000,32.79],
            [1346968800000,32.46],
            [1347228000000,32.13],
            [1347314400000,32.43],
            [1347400800000,32.42],
            [1347487200000,32.81],
            [1347573600000,33.34],
            [1347832800000,33.41],
            [1347919200000,32.57],
            [1348005600000,33.12],
            [1348092000000,34.53],
            [1348178400000,33.83],
            [1348437600000,33.41],
            [1348524000000,32.90],
            [1348610400000,32.53],
            [1348696800000,32.80],
            [1348783200000,32.44],
            [1349042400000,32.62],
            [1349128800000,32.57],
            [1349215200000,32.60],
            [1349301600000,32.68],
            [1349388000000,32.47],
            [1349647200000,32.23],
            [1349733600000,31.68],
            [1349820000000,31.51],
            [1349906400000,31.78],
            [1349992800000,31.94],
            [1350252000000,32.33],
            [1350338400000,33.24],
            [1350424800000,33.44],
            [1350511200000,33.48],
            [1350597600000,33.24],
            [1350856800000,33.49],
            [1350943200000,33.31],
            [1351029600000,33.36],
            [1351116000000,33.40],
            [1351202400000,34.01],
            [1351638000000,34.02],
            [1351724400000,34.36],
            [1351810800000,34.39],
            [1352070000000,34.24],
            [1352156400000,34.39],
            [1352242800000,33.47],
            [1352329200000,32.98],
            [1352415600000,32.90],
            [1352674800000,32.70],
            [1352761200000,32.54],
            [1352847600000,32.23],
            [1352934000000,32.64],
            [1353020400000,32.65],
            [1353279600000,32.92],
            [1353366000000,32.64],
            [1353452400000,32.84],
            [1353625200000,33.40],
            [1353884400000,33.30],
        ]
    }],
      chart: {
      type: 'area',
      stacked: false,
      height: 280,
      toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
    },
    dataLabels: {
      enabled: false
    },
    markers: {
      size: 0,
    },
    title: {
      show: false
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 1,
        inverseColors: false,
        opacityFrom: 0.5,
        opacityTo: 0,
        stops: [0, 90, 100]
      },
    },
    yaxis: {
      labels: {
        formatter: function (val) {
          return (val / 1000000).toFixed(0);
        },
      },
      title: {
        show: false
      },
    },
    xaxis: {
      type: 'datetime',
    },
    tooltip: {
      shared: false,
      y: {
        formatter: function (val) {
          return (val / 1000000).toFixed(0)
        }
      }
    }
    };

    var chart = new ApexCharts(document.querySelector("#timeseries-chart"), options);
    chart.render();
		
	
	
	var options = {
        series: [{
          name: 'Inflation',
          data: [189, 156, 123, 118]
        }],
        chart: {
          height: 150,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            dataLabels: {
              position: 'top', // top, center, bottom
            },
			  columnWidth: '15%',
			  endingShape: 'rounded',
          }
        },
        dataLabels: {
          enabled: false,
        },
        colors:['#45b6c6'],
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr"],
          position: 'bottom',
			
          labels: {
			show: true, 
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          tooltip: {
            enabled: false,        
          }
        },
		grid: {
		  yaxis: {
			lines: {
			  show: false
			}
		  }
		},
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
      };

      var chart = new ApexCharts(document.querySelector("#meetingschart3"), options);
      chart.render();
	
	
	
	
	var options = {
        series: [{
          name: 'Inflation',
          data: [189, 156, 123, 118]
        }],
        chart: {
          height: 120,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            dataLabels: {
              position: 'top', // top, center, bottom
            },
			  columnWidth: '15%',
			  endingShape: 'rounded',
          }
        },
        dataLabels: {
          enabled: false,
        },
        colors:['#2444e8'],
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr"],
          position: 'bottom',
			
          labels: {
			show: true, 
          },
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          tooltip: {
            enabled: false,        
          }
        },
		grid: {
		  yaxis: {
			lines: {
			  show: false
			}
		  }
		},
        yaxis: {
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + "%";
            }
          }
        
        },
      };

      var chart = new ApexCharts(document.querySelector("#meetingschart4"), options);
      chart.render();
	
	
		
	
		if ($('#webticker-1').length) {   
			$("#webticker-1").webTicker({
				height:'auto', 
				duplicate:true, 
				startEmpty:false, 
				rssfrequency:5
			});
		}	
	
	function sparkline_charts() {
				$('.sparklines').sparkline('html');
			}
			if ($('.sparklines').length) {
				sparkline_charts();
			} 
	
	
}); // End of use strict


	//=-------------------------chartdiv31

am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// create chart
var chart = am4core.create("chartdiv31", am4charts.GaugeChart);
chart.innerRadius = am4core.percent(82);

/**
 * Normal axis
 */

var axis = chart.xAxes.push(new am4charts.ValueAxis());
axis.min = 0;
axis.max = 100;
axis.strictMinMax = true;
axis.renderer.radius = am4core.percent(80);
axis.renderer.inside = true;
axis.renderer.line.strokeOpacity = 1;
axis.renderer.ticks.template.disabled = false
axis.renderer.ticks.template.strokeOpacity = 1;
axis.renderer.ticks.template.length = 10;
axis.renderer.grid.template.disabled = true;
axis.renderer.labels.template.radius = 40;
axis.renderer.labels.template.adapter.add("text", function(text) {
  return text + "%";
})

/**
 * Axis for ranges
 */

var colorSet = new am4core.ColorSet();

var axis2 = chart.xAxes.push(new am4charts.ValueAxis());
axis2.min = 0;
axis2.max = 100;

axis2.strictMinMax = true;
axis2.renderer.labels.template.disabled = true;
axis2.renderer.ticks.template.disabled = true;
axis2.renderer.grid.template.disabled = true;

var range0 = axis2.axisRanges.create();
range0.value = 0;
range0.endValue = 50;
range0.axisFill.fillOpacity = 1;
range0.axisFill.fill = colorSet.getIndex(0);

var range1 = axis2.axisRanges.create();
range1.value = 50;
range1.endValue = 100;
range1.axisFill.fillOpacity = 1;
range1.axisFill.fill = colorSet.getIndex(2);

/**
 * Label
 */

var label = chart.radarContainer.createChild(am4core.Label);
label.isMeasured = false;
label.fontSize = 20;
label.x = am4core.percent(50);
label.y = am4core.percent(100);
label.horizontalCenter = "middle";
label.verticalCenter = "bottom";
label.text = "10%";


/**
 * Hand
 */

var hand = chart.hands.push(new am4charts.ClockHand());
hand.axis = axis2;
hand.innerRadius = am4core.percent(20);
hand.startWidth = 10;
hand.pin.disabled = true;
hand.value = 50;

hand.events.on("propertychanged", function(ev) {
  range0.endValue = ev.target.value;
  range1.value = ev.target.value;
  label.text = axis2.positionToValue(hand.currentPosition).toFixed(1);
  axis2.invalidate();
});

setInterval(function() {
  var value = Math.round(Math.random() * 100);
  var animation = new am4core.Animation(hand, {
    property: "value",
    to: value
  }, 1000, am4core.ease.cubicOut).start();
}, 2000);

}); // end am4core.ready()