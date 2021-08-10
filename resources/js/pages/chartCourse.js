window.onload = function () {
	var ctx = document.getElementById("myChartCourse");
		/**
		 * Created the Completed Jobs Chart
		 */
		 var myLineChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: [], // The response response.months
				datasets: [{
					label: "Sessions",
					lineTension: 0.3,
					backgroundColor: "rgba(2,117,216,0.2)",
					borderColor: "rgba(2,117,216,1)",
					pointRadius: 5,
					pointBackgroundColor: "rgba(2,117,216,1)",
					pointBorderColor: "rgba(255,255,255,0.8)",
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(2,117,216,1)",
					pointHitRadius: 20,
					pointBorderWidth: 2,
					data: [] // The response 
				}],
			},
			options: {
				scales: {
					xAxes: [{
						time: {
							unit: 'date'
						},
						gridLines: {
							display: false
						},
						ticks: {
							maxTicksLimit: 7
						}
					}],
					yAxes: [{
						ticks: {
							min: 0,
							max: 10,// The response
							maxTicksLimit: 5
						},
						gridLines: {
							color: "rgba(0, 0, 0, .125)",
						}
					}],
				},
				legend: {
					display: false
				}
			}
		})
		$.ajax({
			method: 'GET',
			url: '/getCourseChart'
			}).done(function(data) {	
		myLineChart.data.labels=data.months;
		myLineChart.data.datasets[0].data =data.count_data;
		myLineChart.update();
		})
	$("#listYear").change(function(){
	$.ajax({
            type: 'GET',
			url: '/getCourseChart',
            data:  {chooseYear:$('#listYear option:selected').val()},
    		}).done(function(data) {	
				myLineChart.data.labels=data.months;
				myLineChart.data.datasets[0].data =data.count_data;

				myLineChart.update();
			})
		});


}
   