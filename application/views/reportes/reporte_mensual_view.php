<script type="text/javascript">
	// Load the Visualization API and the piechart package.
	google.load('visualization','1.0',{'packages':['corechart']});

	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(drawChart);

	/* Callback that creates and populates a data table,
	instantiates the pie chart, passes in the data and draw it.*/
	function drawChart(){

		// Create the data table.
		var data = new google.visualization.DataTable();
		
		data.addColumn('string','Topping');
		data.addColumn('number','Slices');
		data.addRows([
			['Mushrooms',3],
			['Onions',1],
			['Olives',1],
			['Zucchini',1],
			['Pepperoni',2]
		]);

		// Set the chart options
		var options = {
			'title':'How Much Pizza I Ate Last Night',
			'width': 800,
			'height': 600
		};
		
		
		// Instantiate and draw our chart, passing in some options
		var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
		
		// Adding Interactivity
		function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);
            alert('El usuario eligió ' + topping);
          }
        }
        google.visualization.events.addListener(chart, 'select', selectHandler);    

		chart.draw(data,options);
	}
</script>

<div class="span10">
	<h1><?php echo $titulo;?></h1>

	<div id="chart_div"></div>

</div>

