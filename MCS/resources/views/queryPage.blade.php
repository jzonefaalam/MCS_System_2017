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

		          	<div class="form-group">
		          		<label>Filter by</label>
		          		<select class="form-control" name="filterBy" id="filterBy" onchange="filterBy(this)">
		          			<option disabled="Choose" selected=""></option>
		          			<option value="1">Weekly</option>
		          			<option value="2">Monthly</option>
		          			<option value="3">Yearly</option>
		          		</select>
		          	</div>

		          	<div class="form-group">
		          		<label>View by</label>
		          		<select class="form-control" name="viewBy" id="viewBy" onchange="viewBy(this)">
		          			<option disabled="Choose" selected=""></option>
		          			<option value="1">Graph</option>
		          			<option value="2">Table</option>
		          			<option value="3">List</option>
		          		</select>
		          	</div>

		          	<div class="form-group">
		          		<label>Order by</label>
		          		<div class="radio">
						  <label><input type="radio" name="orderBy" id="asc" onchange="orderBy(this)">Ascending</label>
						  	&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						  <label><input type="radio" nmae="orderBy" id="desc" onchange="orderBy(this)">Descending</label>
						</div>
		          	</div>

                <a class="btn btn-app" data-target="#" data-toggle="modal" style="float:right">
                  <i class="fa fa-print"></i> PRINT
                </a>
                <a class="btn btn-app" data-target="#" data-toggle="modal" style="float:right">
                  <i class="fa fa-refresh"></i> GENERATE
                </a>
		        </div>
	        </div>
	    </div>
          
		<!-- CANCEL CHART -->
		<div class="chart" style="display: none" >
	        <div class="col-md-8" >
			    <div class="box box-primary">
			        <div class="box-header with-border">
			            <i class="fa fa-bar-chart-o"></i>

			            <h3 class="box-title">Cancelled Event</h3>
					</div>
			            
			        <div class="box-body">
			            <div id="bar-chart" style="height: 300px;"></div>
			        </div>
			    </div>
			</div>
		</div>

		<!-- CANCEL TABLE -->
		<div class="table"  style="display: none">
			<div class="col-md-8">
				<div class="box box-primary">
				    <div class="box-header with-border">
			            <i class="fa fa-bar-chart-o"></i>

			            <h3 class="box-title">Cancelled Event</h3>
					</div>

					<div class="table-responsive">
		  				<table class="table">
		    				<div class="col-md-8">          
							  <table class="table table-bordered">
							    <thead>
							      <tr>
							        <th>Client Name</th>
							        <th>Contact Number</th>
							        <th>Event Name</th>
							        <th>Date of Event</th>
							      </tr>
							    </thead>
							    <tbody>
							      <tr>
							        <td>Rozhel Turgo</td>
							        <td>0909009090</td>
							        <td>Rozhel's Birthday</td>
							        <td>September 25, 2017</td>
							      </tr>
							    </tbody>
							  </table>
							</div>
		  				</table>
					</div>
				</div>
			</div>
		</div>
		<!-- CANCEL LIST -->
		<div class="lists"  style="display: none">
			<div class="col-md-8">
				<div class="box box-primary">
				    <div class="box-header with-border">
			            <i class="fa fa-bar-chart-o"></i>

			            <h3 class="box-title">Cancelled Event</h3>
					</div>
					<div class="table-responsive">
		  				<table class="table">
		    				<div class="col-md-8">          
							  <table class="table">							    
							    <tbody>
							      <tr>
							        <td>Rozhel Turgo</td>
							        <td>0909009090</td>
							        <td>Rozhel's Birthday</td>
							        <td>September 25, 2017</td>
							      </tr>
							    </tbody>
							  </table>
							</div>
		  				</table>
					</div>					
				</div>
			</div>
        </div>

		<!-- LOST ITEMS CHART
        <div class="col-md-8 chart">
		    <div class="box box-primary">
		        <div class="box-header with-border">
		            <i class="fa fa-bar-chart-o"></i>

		            <h3 class="box-title">Lost Items</h3>
				</div>
		            
		        <div class="box-body">
		            <div id="bar-chart" style="height: 300px;"></div>
		        </div>
		    </div>
		</div>

		LOST ITEMS TABLE
		<div class="col-md-8">
			<div class="box box-primary">
			    <div class="box-header with-border">
		            <i class="fa fa-bar-chart-o"></i>

		            <h3 class="box-title">Lost Items</h3>
				</div>

				<div class="table-responsive">
	  				<table class="table">
	    				<div class="col-md-8">          
						  <table class="table table-bordered">
						    <thead>
						      <tr>
						        <th>Client Name</th>
						        <th>Contact Number</th>
						        <th>Event Name</th>
						        <th>Date of Event</th>
						        <th>Date of Event</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>Rozhel Turgo</td>
						        <td>0909009090</td>
						        <td>Rozhel's Birthday</td>
						        <td>September 25, 2017</td>
						      </tr>
						    </tbody>
						  </table>
						</div>
	  				</table>
				</div>
			</div>
		</div> -->

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
  $(function () {
    /*
     * BAR CHART
     * ---------
     */

    var bar_data = {
      data: [["January", 10], ["February", 8], ["March", 4], ["April", 13], ["May", 17], ["June", 9]],
      color: "#3c8dbc"
    };
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHART */
</script>
<script type="text/javascript">
	function listName(){
		var selectedOption = document.getElementsByName("listName");
		var ln = selectedOption[0].options[selectedOption[0].selectedIndex].value;
		alert(ln);

	}
	function filterBy(){
		var selectedOption = document.getElementsByName("filterBy");
		var fb = selectedOption[0].options[selectedOption[0].selectedIndex].value;
		alert(fb);

	}
	function viewBy(){
		var selectedOption = document.getElementsByName("viewBy");
		var vb = selectedOption[0].options[selectedOption[0].selectedIndex].value;
		//alert(vb);
		if(vb==1){
			$('.chart').css('display', 'initial');
			$('.table').css('display', 'none');
			$('.lists').css('display', 'none');
		}
		else if(vb==2){
			$('.table').css('display', 'initial');
			$('.chart').css('display', 'none');
			$('.lists').css('display', 'none');
		}
		else if(vb==3){
			$('.lists').css('display', 'inline');
			$('.chart').css('display', 'none');
			$('.table').css('display', 'none');
		}

	}
	function orderBy(){
		if(document.getElementById('asc').checked){
			// $("#eLoc").removeAttr('disabled');
			// document.getElementById('locNo').style="display:none";
			// document.getElementById('locYes').style="display:";
			// document.getElementById('eLoc2').selectedIndex="0";
		}
		else if(document.getElementById('desc').checked){
			// document.getElementById('locYes').style="display:none";
			// document.getElementById('locNo').style="display:"; 	
			// document.getElementById('eLoc').value="";				
		}
	}
</script>

@endsection