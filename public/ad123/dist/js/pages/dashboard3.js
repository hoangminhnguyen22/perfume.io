//"http://"+window.location.hostname+":8000/admin/get_monthly_account_data"
( function ( $ ) {
  'use strict'
	var charts = {
		init: function ( year ) {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetPostMonthlyData(year);
		},

		ajaxGetPostMonthlyData: function ( year ) {
      //console.log(year);
      if (typeof year === 'undefined') {
        year = new Date().getFullYear();
      };

			var urlPath =  'http://'+window.location.hostname+':8000/admin/get_monthly_account_data/'+year;
      
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		});

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedCustommersChart( response );
			});
		},

		/**
		 * Created the Completed Customer Chart
		 */
		createCompletedCustommersChart: function ( response ) {

      $('#total_accounts').html(response.total_accounts);

      var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
      }
    
      var mode = 'index'
      var intersect = true

			var ctx = document.getElementById("customer-chart");
			var salesChart = new Chart( ctx, {
        data: {
          labels: response.months,
          datasets: [{
            type: 'line',
            data: response.accounts,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            pointBorderColor: '#007bff',
            pointBackgroundColor: '#007bff',
            fill: false
          }]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks: {
                min: 0,
								max: response.max, // The response got from the ajax request containing max limit for y axis
								maxTicksLimit: 5
              }
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
              ticks: ticksStyle
            }]
          }
        }
      });
		}
	};

	charts.init();

  $('#time').change(function() {
    charts.init($(this).val());
  });


  var salecharts = {
		init: function (from, to) {
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			this.ajaxGetSaleMonthlyData(from, to);
		},

		ajaxGetSaleMonthlyData: function (from, to) {
      if (typeof from === 'undefined' || typeof to === 'undefined') {
        var toDay = new Date();
        from = toDay.getFullYear()+'-'+(toDay.getMonth())+'-'+toDay.getDate();
        to = toDay.getFullYear()+'-'+(toDay.getMonth()+1)+'-'+toDay.getDate();
      };

			var urlPath = 'http://'+window.location.hostname+':8000/admin/sale_datas/'+from+'/'+to;
      
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		});

			request.done( function ( response ) {
				console.log( response );
				salecharts.createCompletedSalesChart( response );
			});
		},

		createCompletedSalesChart: function ( response ) {
      var sum = response.total.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
      $('#total_sale').html(sum);

      var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
      }
    
      var mode = 'index'
      var intersect = true

			var ctx = document.getElementById("sales-chart");
			var salesChart = new Chart( ctx, {
        type: 'bar',
        data: {
          labels: response.months,
          datasets: [
            {
              backgroundColor: '#007bff',
              borderColor: '#007bff',
              data: response.sales,
            }
          ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks: $.extend({
                beginAtZero: true,

                // Include a dollar sign in the ticks
                callback: function (value) {
                  if (value >= 1000) {
                    value /= 1000
                    value += 'k'
                  }

                  return 'VND ' + value
                }
              }, ticksStyle)
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: true
              },
              ticks: ticksStyle
            }]
          }
        }
      });
		}
	};

  salecharts.init();

  $('#from').change(function() {
    var from = $(this).val()+"-01";
    var to = $('#to').val()+"-31";
    console.log(from, to);
    salecharts.init(from, to);
  });

  $('#to').change(function() {
    var to = $(this).val()+"-31";
    var from = $('#from').val()+"-01";
    console.log(from, to);
    salecharts.init(from, to);
  });

} )( jQuery );