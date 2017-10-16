@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header"> <br>
        <ol class="breadcrumb">
          	<li><a href="/Reports"><i class="fa fa-file-text"></i> Queries </a></li>
        </ol>
    </section>
      
    <!-- Main content -->
    <section class="content">
    <div>
      	<div class="col-md-4">
	        <div class="box box-primary">
	          	<!-- box header -->
	          	<div class="box-header with-border">
	            	<div class="row">
	              		<div class="col-md-8">
	                		<h3><b><i>Query List</i></b></h3>
	              		</div>
	            	</div>
	          	</div>
	          
	          	<!-- /.box-header -->
	          	<div class="box-body">
		          	<div class="form-group">
		          		<label>List</label>
		          		<select class="form-control" name="listName" id="listName" onchange="listName(this)">
		          			<option disabled="Choose" selected=""></option>
		          			<option value="1">Cancelled Event</option>
		          			<option value="2">Lost Items</option>
		          			<option value="3">Assigned Equipment</option>
		          		</select>
		          	</div>

		          	<!-- <div class="form-group">
		          		<label>Filter by</label>
		          		<select class="form-control" name="filterBy" id="filterBy" onchange="filterBy(this)">
		          			<option disabled="Choose" selected=""></option>
		          			<option value="1">Weekly</option>
		          			<option value="2">Monthly</option>
		          			<option value="3">Yearly</option>
		          		</select>
		          	</div> -->

		          	<div class="form-group">
		          		<label>View by</label>
		          		<select class="form-control" name="viewBy" id="viewBy" onchange="viewBy(this)">
		          			<option disabled="Choose" selected=""></option>
		          			<option value="1">Table</option>
		          			<option value="2">List</option>
		          		</select>
		          	</div>

		          	<!-- <div class="form-group">
		          		<label>Order by</label>
		          		<div class="radio">
						  <label><input type="radio" name="orderBy" id="asc" onchange="orderBy(this)">Ascending</label>
						  	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						  <label><input type="radio" nmae="orderBy" id="desc" onchange="orderBy(this)">Descending</label>
						</div>
		          	</div>
 -->
                <a class="btn btn-app" data-target="#" data-toggle="modal" style="float:right">
                  <i class="fa fa-print"></i> PRINT
                </a>
                <a class="btn btn-app" data-target="#" data-toggle="modal" style="float:right">
                  <i class="fa fa-refresh"></i> GENERATE
                </a>
		        </div>
	        </div>
	    </div>
        
		<!-- CANCEL TABLE -->
		<div class="cancel"  style="display: none">
		<div class="tablee"  style="display: none">
			<div class="col-md-8">
				<div class="box box-primary">
				    <div class="box-header with-border">
			            <i class="fa fa-bar-chart-o"></i>

			            <h3 class="box-title">Cancelled Event</h3>
					</div>

					<div class="box-body">
	    				<div class="col-md-12">          
						  <table id="cancellationTable" class="table table-bordered dataTable">
						    <thead>
						      <tr>
						        <th>Client Name</th>
						        <th>Contact Number</th>
						        <th>Event Name</th>
						        <th>Date of Event</th>
						      </tr>
						    </thead>
						    <tbody>
						    @foreach ($cancellation as $cd)
				            <tr>
				               	<td>{{ $cd->fullName }}</td>
				                <td>{{ $cd->cellNum }}</td>
				                <td>{{ $cd->eventName }}</td>
				                <td>{{ $cd->eventDate}}</td>             
				          	</tr>
				            @endforeach							      
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- CANCEL LIST -->
		<div class="cancel"  style="display: none">
		<div class="lists"  style="display: none">
			<div class="col-md-8">
				<div class="box box-primary">
				    <div class="box-header with-border">
			            <i class="fa fa-bar-chart-o"></i>

			            <h3 class="box-title">Cancelled Event</h3>
					</div>
					<div class="box-body">
		  				<div class="col-md-12">          
						  <table id="cancellationTable" class="table table-bordered dataTable">
						    <thead>
						      <tr>
						      </tr>
						    </thead>
						    <tbody>
						    @foreach ($cancellation as $cd)
				            <tr>
				                <td>{{ $cd->eventDate}}<br> 
				               	{{ $cd->fullName }} - {{ $cd->cellNum }}<br>
				                EVENT NAME: {{ $cd->eventName }}</td>            
				          	</tr>
				            @endforeach							      
						    </tbody>
						  </table>
						</div>
					</div>					
				</div>
			</div>
        </div>
        </div>
        <!-- LOST TABLE -->
		<div class="lost"  style="display: none">
		<div class="tablee"  style="display: none">
			<div class="col-md-8">
				<div class="box box-primary">
				    <div class="box-header with-border">
			            <i class="fa fa-bar-chart-o"></i>

			            <h3 class="box-title">Lost Items</h3>
					</div>

					<div class="box-body">
	    				<div class="col-md-12">          
						  <table id="lostTable" class="table table-bordered dataTable">
						    <thead>
						      <tr>
						        <th>Client Name</th>
						        <th>Contact Number</th>
						        <th>Item Name</th>
						        <th>Item Price</th>
						        <th>Item Quantity</th>
						        <th>Date of Event</th>
						      </tr>
						    </thead>
						    <tbody>
						    @foreach ($lost as $ld)
				            <tr>
				               	<td>{{ $ld->fullName }}</td>
				                <td>{{ $ld->cellNum }}</td>
				                <td>none</td>
				                <td>none</td>
				                <td>none</td>
				                <td>{{ $ld->eventDate}}</td>             
				          	</tr>
				            @endforeach							      
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- ASSIGNED TABLE -->
		<div class="assign"  style="display: none">
		<div class="tablee"  style="display: none">
			<div class="col-md-8">
				<div class="box box-primary">
				    <div class="box-header with-border">
			            <i class="fa fa-bar-chart-o"></i>

			            <h3 class="box-title">Items Out</h3>
					</div>

					<div class="box-body">
	    				<div class="col-md-12">          
						  <table id="assignedTable" class="table table-bordered dataTable">
						    <thead>
						      <tr>
						        <th>Client Name</th>
						        <th>Event Name</th>
						        <th>Item Name</th>
						        <th>Item Quantity</th>
						        <th>Date of Event</th>
						      </tr>
						    </thead>
						    <tbody>
						    @foreach ($assign as $ad)
				            <tr>
				               	<td>{{ $ad->fullName }}</td>
				                <td>{{ $ad->cellNum }}</td>
				                <td>none</td>
				                <td>none</td>
				                <td>{{ $ad->eventDate}}</td>             
				          	</tr>
				            @endforeach							      
						    </tbody>
						  </table>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('chart/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- FLOT CHARTS -->
<script src="{{ asset('chart/plugins/flot/jquery.flot.min.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="{{ asset('chart/plugins/flot/jquery.flot.resize.min.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="{{ asset('chart/plugins/flot/jquery.flot.pie.min.js') }}"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="{{ asset('chart/plugins/flot/jquery.flot.categories.min.js') }}"></script>

<!-- Page script -->
<script>
	function chartchart(){
		var chLabel = [];
		var chData = [];
		chLabel.push(["asd"]);
		chData.push([10]);
		
		//- BAR CHART -
	    //-------------
	    var areaChartData = {
	      labels  : chLabel,
	      datasets: [
	        {
	          label               : 'Electronics',
	          fillColor           : 'rgba(210, 214, 222, 1)',
	          strokeColor         : 'rgba(210, 214, 222, 1)',
	          pointColor          : 'rgba(210, 214, 222, 1)',
	          pointStrokeColor    : '#c1c7d1',
	          pointHighlightFill  : '#fff',
	          pointHighlightStroke: 'rgba(220,220,220,1)',
	          data                : chData
	        }
	      ]
	    }

	    var barChartCanvas                   = $('#barCancel').get(0).getContext('2d')

	    var barChart                         = new Chart(barChartCanvas)
	    var barChartData                     = areaChartData
	    barChartData.datasets[0].fillColor   = '#dd4b39'
	    barChartData.datasets[0].strokeColor = '#dd4b39'
	    barChartData.datasets[0].pointColor  = '#dd4b39'
	    var barChartOptions                  = {
	      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
	      scaleBeginAtZero        : true,
	      //Boolean - Whether grid lines are shown across the chart
	      scaleShowGridLines      : true,
	      //String - Colour of the grid lines
	      scaleGridLineColor      : 'rgba(0,0,0,.05)',
	      //Number - Width of the grid lines
	      scaleGridLineWidth      : 1,
	      //Boolean - Whether to show horizontal lines (except X axis)
	      scaleShowHorizontalLines: true,
	      //Boolean - Whether to show vertical lines (except Y axis)
	      scaleShowVerticalLines  : true,
	      //Boolean - If there is a stroke on each bar
	      barShowStroke           : true,
	      //Number - Pixel width of the bar stroke
	      barStrokeWidth          : 2,
	      //Number - Spacing between each of the X value sets
	      barValueSpacing         : 5,
	      //Number - Spacing between data sets within X values
	      barDatasetSpacing       : 1,
	      //String - A legend template
	      //Boolean - whether to make the chart responsive
	      responsive              : true,
	      maintainAspectRatio     : true
	    }
	    barChartOptions.datasetFill = false
	    barChart.Bar(barChartData, barChartOptions)




	}
	function listName(){
		var selectedOption = document.getElementsByName("listName");
		var ln = selectedOption[0].options[selectedOption[0].selectedIndex].value;
		if(ln==1){
			$('.cancel').css('display', 'initial');
			$('.lost').css('display', 'none');
			$('.assign').css('display', 'none');
		}
		else if(ln==2){
			$('.lost').css('display', 'initial');
			$('.cancel').css('display', 'none');
			$('.assign').css('display', 'none');
		}
		else if(ln==3){
			$('.assign').css('display', 'inline');
			$('.lost').css('display', 'none');
			$('.cancel').css('display', 'none');
		}

	}	
	function viewBy(){
		var selectedOption = document.getElementsByName("viewBy");
		var vb = selectedOption[0].options[selectedOption[0].selectedIndex].value;
		//alert(vb);
		if(vb==1){
			$('.tablee').css('display', 'initial');
			$('.lists').css('display', 'none');
		}
		else if(vb==2){
			$('.lists').css('display', 'inline');
			$('.tablee').css('display', 'none');
		}

	}
	// function orderBy(){
	// 	if(document.getElementById('asc').checked){
	// 		// $("#eLoc").removeAttr('disabled');
	// 		// document.getElementById('locNo').style="display:none";
	// 		// document.getElementById('locYes').style="display:";
	// 		// document.getElementById('eLoc2').selectedIndex="0";
	// 	}
	// 	else if(document.getElementById('desc').checked){
	// 		// document.getElementById('locYes').style="display:none";
	// 		// document.getElementById('locNo').style="display:"; 	
	// 		// document.getElementById('eLoc').value="";				
	// 	}
	// }
	
</script>
<!-- ChartJS -->



@endsection