<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('USER_UI/assets/img/favicon.ico') }}">
		<title> Reservation | Margareth's Catering </title>

		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('USER_UI/assets/img/apple-icon.png') }}" />
		<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}" />
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
		<!-- Ionicons -->
		<link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
		<!-- Theme style -->
		<link rel="stylesheet" href="{{ asset('USER_UI/dist/css/AdminLTE.min.css') }}">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		    folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="{{ asset('USER_UI/dist/css/skins/_all-skins.min.css') }}">
		<!--     Fonts and icons     -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons') }}" />
		<link rel="stylesheet" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css') }}" />
		
		<!-- CSS Files -->

		<link href="{{ asset('USER_UI/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('USER_UI/assets/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />

		<link rel="stylesheet" type="text/css" href="{{ asset('validator/dist/css/bootstrapValidator.css') }}"/>
		<!-- Full Calendar -->		
		<link href="{{ asset('fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />

		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="{{ asset('USER_UI/assets/css/demo.css') }}" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}">
		
	</head>

	<body style = "background-image:url(img/bg1.jpg); background-size: cover; background-attachment: fixed; background-position: center; background-repeat: no-repeat">
		<div class="container-fluid">

			<nav class="navbar navbar-default navbar-fixed-top" style="background-color:black;">
				<div class="container" style = "background-color:black; width:100%; cursor: pointer;">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a class="navbar-brand" href="Base.php"><img src="img/logo.png" style ="float:left ; width 40px;height :40px;padding-bottom :10px"></a>
					</div>

					<div class="collapse navbar-collapse" id="myNavbar" style = "background-color:black; width:100%">
						<ul class ="nav navbar-nav navbar-right">
							<li><a href="UserBasePage"> Home </a></li>

							<li class="dropdown">
								<a class="dropdown-toggle" type = "button" data-toggle="dropdown">
									Menu <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="UserPackagePage"> Packages </a></li>
									<li><a href="UserDishPage"> Dishes </a></li>
									<li><a href="UserServicePage"> Services </a></li>
								</ul>
							</li>

							<li><a href="UserReservationPage">Make a Reservation </a></li>
							<li><a href="UserAboutPage"> Contact Us </a></li>
						</ul>
					</div>
				</div>
			</nav>

			<!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-7">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizardProfile">
		                    <form class = "form-horizontal infoForm" name = "addReservation" id = "addReservation" role = "form" method="POST" action="/UserReservationPage" enctype="multipart/form-data">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
												{!! csrf_field() !!}
		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   	R E S E R V A T I O N
		                        	</h3>
		                    	</div>
<!-- NAVIGATION -->
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#resDetail" data-toggle="tab">Event Details</a></li>
			                            <li><a href="#cusInfo" data-toggle="tab">Customer Information</a></li>
			                            <li><a href="#package" data-toggle="tab">Package Selection</a></li>
			                            <li><a href="#addOn" data-toggle="tab">Additional</a></li>
			                        </ul>
								</div>
<!-- EVENT -->
		                        <div class="tab-content">
		                        	<div class="tab-pane" id="resDetail">
		                              <div class="row">
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">toc</i>
													</span>
													<input type="text" name="addEventID" id="addEventID" value = "{{ $eventNewID }}" hidden>
													<div class="form-group label-floating">
			                                            <label class="control-label">Event Type</label>
		                                            	<select name="eType" id = "eType" class="form-control">
															<option disabled="" selected=""></option>
														    @foreach($eType as $type)
														    	<option value="{{$type->eventTypeID}}">{{$type->eventTypeName}}</option>
														    @endforeach
		                                            	</select>
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">label</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Do you have a location?</label>
		                                            	<select name="yesNo" id = "yesNo" class="form-control" onchange="locYes(this.id)">
															<option disabled="" selected=""></option>
															<option value="Yes"> Yes </option>
															<option value="No"> No </option>
		                                            	</select>
		                                            </div>
		                                        </div>

		                                		<div class="input-group" id="locYes">
													<span class="input-group-addon">
														<i class="material-icons">location_on</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Location</label>
			                                            <input type="text" name="eLoc" id = "eLoc" class="form-control" disabled="">
			                                        </div>
		                                        </div>

		                                		<div class="input-group" id="locNo" style="display:none">
													<span class="input-group-addon">
														<i class="material-icons">location_on</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Location</label>
		                                            	<select name="eLoc2" id = "eLoc2" class="form-control">
															<option disabled="Choose location" selected=""></option>
															@foreach($location as $loc)
														    	<option value="{{$loc->locationID}}">{{$loc->locationName}}</option>
														    @endforeach
		                                            	</select>
			                                        </div>
		                                        </div>
		                                        <div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">query_builder</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Starting Time of Event</label>
			                                            <input type="time" name="eTime" id = "eTime" class="form-control">
			                                        </div>
		                                        </div>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">spellcheck</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Name of Event</label>
			                                            <input type="text" name="eName" id = "eName" maxlength="50" class="form-control">
			                                        </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">perm_identity</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Number of Guest</label>
			                                            <input type="number" name="eNum" id = "eNum" class="form-control">
			                                        </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">today</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Date of Event</label>
			                                            <input type="date" name="eDate" id = "eDate" class="form-control">
			                                        </div>
		                                        </div>
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">query_builder</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">End Time of Event</label>
			                                            <input type="time" name="enTime" id = "enTime" class="form-control">
			                                        </div>
		                                        </div>

		                                	</div>
		                            	</div>
		                            </div>
<!-- CUSTOMER -->
		                            <div class="tab-pane" id="cusInfo">
		                              	<div class="row">

		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">toc</i>
													</span>

													<input type="text" name="addCustomerID" id="addCustomerID" value = "{{ $customerNewID }}" hidden>
													<input type="text" name="addReservationID" id="addReservationID" value = "{{ $reservationNewID }}" hidden>
													<input type="text" name="addContactID" id="addContactID" value = "{{ $contactNewID }}" hidden><input type="text" name="addDishAvailedID" id="addDishAvailedID" value = "{{ $dishAvailedNewID }}" hidden>


													<div class="form-group label-floating">
			                                            <label class="control-label">Full Name</label>
			                                            <input type="text" name="cusName" id = "cusName" class="form-control">
		                                            </div>
		                                        </div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">location_on</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Home Address</label>
			                                            <input type="text" name="homeAdd" id = "homeAdd" class="form-control">
			                                        </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">loyalty</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Billing Address</label>
			                                            <input type="text" name="billAdd" id = "billAdd" class="form-control">
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">today</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Date of Birth</label>
			                                            <input type="date" name="dob" id = "dob" class="form-control">
		                                            </div>
		                                        </div>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">ring_volume</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Telephone Number</label>
			                                            <input type="text" name="telNum" id = "telNum" class="form-control">
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">voicemail</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Cellphone Number</label>
			                                            <input type="text" name="cellNum" id = "cellNum" class="form-control">
		                                            </div>
		                                        </div>

		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">comment</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Email Address</label>
			                                            <input type="text" name="emailAdd" id = "emailAdd" class="form-control">
		                                            </div>
		                                        </div>

		                                	</div>
		                            	</div>

										<div class="row">
		                                    <div class="col-sm-12">
		                                        <h4 class="info-text"> In case of emergency please specify another contact </h4>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">assignment_ind</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Contact Name</label>
			                                            <input type="text" name="conPerson" id = "conPerson" class="form-control">
			                                        </div>
		                                        </div>
		                                    </div>

		                                	<div class="col-sm-4 col-sm-offset-1">
		                                		<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">settings_phone</i>
													</span>
													<div class="form-group label-floating">
			                                            <label class="control-label">Contact Number</label>
			                                            <input type="text" name="conNum" id = "conNum" class="form-control">
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
<!-- PACKAGE -->
		                            <div class="tab-pane" id="package"> <br>
		                                <div class="row" align = "center">
		                                    <div class="panel-group" id="accordion">
<!--  -->



<!--  -->
												<input type="text" id="pckid" hidden>
												@foreach($package as $pg)
		                                    	<button type="button" style = "width: 550px; height: 70px" class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#packageModal{{$pg->packageID}}" name='{{$pg->packageID}}' onclick="getpckid(this.name)"><h5>{{$pg->packageName}}</h5></button><br>
		                                    	<input type="text" id="pgid" value='{{$pg->packageID}}' hidden>
											    <input type="text" id="pgimage" value='{{$pg->packageImage}}' hidden>
											    <input type="text" id="countDish" value="{{$countDish}}" hidden>
		                                    	<!-- Modal -->
												<div id="packageModal{{$pg->packageID}}" class="modal fade" role="dialog">
													<div class="col-md-8 col-sm-offset-2">

														<!-- Modal content-->
														<div class="modal-content" style="margin-top: 50px">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>

																<h4 class="modal-title"> Package <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h4>
															</div>

															<div class="modal-footer">
																<div>
																	<h6 align="left"><i>This package includes:</i></h6>
																</div>
																@foreach($packageinclusion as $pgi)
		                                    					@if($pgi->packageID == $pg->packageID)
		                                    					<div class = "col-md-3 col-sm-3">
											        				<h3 id='dishTypeName'><center>{{$pgi->dishTypeName}}{{$pgi->serviceID}}</center></h3>
					                                            	<div class="form-group">
																		<img src="{{ asset('images/' . $pgi->dishTypeImage) }}" id="dishimg{{$pgi->packageID}}{{$pgi->packageInclusionID}}" width="160px" height="120px" class="col-md-10 col-sm-11">
					                                            		<select class="form-control" name="dishimg{{$pgi->packageID}}{{$pgi->packageInclusionID}}" id="dish{{$pgi->packageID}}{{$pgi->packageInclusionID}}" onclick="getdishid(this.id)" onchange="pckdshimg(this.name)">
																			<option disabled selected value="">Choose Dish</option>
																			@foreach($dishes as $dishh)
																			@if($pgi->dishTypeID == $dishh->dishTypeID)
														    				<option value="{{$dishh->dishID}}">{{$dishh->dishName}}</option>
														    				@endif
														    				@endforeach
						                                            	</select>
							                                        </div>
																</div>																
																@endif
																@endforeach
															</div>

															<div class="modal-footer">
																<div class="pull-left">
																	<h5 align="left">
																		<label>Services:
																			<i>								
																				@foreach($serviceinclusion as $sgi)
					                                    						@if($sgi->packageID == $pg->packageID)
																					{{$sgi->serviceName}}, &nbsp														
																				@endif
																				@endforeach
																				@foreach($employeeinclusion as $egi)
						                                    					@if($egi->packageID == $pg->packageID)
																					{{$egi->employeeTypeName}}, &nbsp	
																				@endif
																				@endforeach
																			</i><br/>Equipment:
																			<i>								
																				@foreach($equipmentinclusion as $egi)
						                                    					@if($egi->packageID == $pg->packageID)
																					{{$egi->equipmentName}}, &nbsp	
																				@endif
																				@endforeach
																			</i>																
																		</label>
																	<h5>
																</div>
																<div class="pull-right">
																<button type="button" class="btn btn-success pull-right" data-dismiss="modal" name="{{$pg->packageID}}" id="{{$pg->packageID}}" class="btn btn-info btn-md" onclick="addPack(this.name)">Save</button>
																</div>
															</div>
														</div>
													</div>
												</div>
												@endforeach
											</div>
		                                </div>
		                            </div>
<!-- ADDITIONAL -->
		                            <div class="tab-pane" id="addOn">		                                
		                            	<div class="row" align = "center">
											<input type="text" id="dtid" hidden>
		                                	<h4> <i> Additional Food / Service / Equipment </i> </h4>
		                                    <div class="panel-group" id="accordion">
		                                    	<button type="button" style = "width: 550px; height: 70px" class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#foodModal"><h4>Food</h4></button><br>
		                                    	<!-- Modal -->
												<div id="foodModal" class="modal fade" role="dialog">
													<div class="col-md-6 col-sm-offset-3">

														<!-- Modal content-->
														<div class="modal-content" style="margin-top: 130px">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>

																<h4 class="modal-title"> Additional Food <i class="fa fa-check-square-o" aria-hidden="true"></i></h4>
															</div>

															<div class="modal-footer">

<!--  -->
											    @foreach($dishtype as $dd)
											    <div>
											      	<div class="col-md-12" >
											        	<h4><center>{{$dd->dishTypeName}}</center></h4>
											      	</div>

		                                    		<div class = "col-md-3">
											      		<div class="form-group">
															<img src="{{ asset('images/' . $dd->dishTypeImage) }}" id="dishTypeImage{{$dd->dishTypeID}}" width="200px" height="150px">
															<select class="form-control" name="dishTypeImage{{$dd->dishTypeID}}" id="dishType{{$dd->dishTypeID}}" onchange="pckdshimg(this.name)">
																<option disabled selected value="">Choose Dish </option>
																@foreach($dishes as $dishh)
																	@if($dd->dishTypeID == $dishh->dishTypeID)
												    				<option value="{{$dishh->dishID}}">{{$dishh->dishName}}</option>
												    				@endif
											    				@endforeach
			                                            	</select>
														</div>
													</div>
													<div class = "col-md-4">
					                                  	<div class="form-group">
					                                   		
				                                        </div>
													</div>


											    </div>
											    @endforeach

<!--  -->
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
															</div>
														</div>

													</div>
												</div>

		                                    	<button type="button" style = "width: 550px; height: 70px" class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#serviceModal"><h4>Service</h4></button><br>
		                                    	<!-- Modal -->
												<div id="serviceModal" class="modal fade" role="dialog">
													<div class="col-md-6 col-sm-offset-3">

														<!-- Modal content-->
														<div class="modal-content" style="margin-top: 130px">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>

																<h4 class="modal-title"> Additional Service <i class="fa fa-check-square-o" aria-hidden="true"></i></h4>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
															</div>
														</div>
													</div>
												</div>

		                                    	<button type="button" style = "width: 550px; height: 70px" class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#equipModal"><h4>Equipment</h4></button><br>
		                                    	<!-- Modal -->
												<div id="equipModal" class="modal fade" role="dialog">
													<div class="col-md-6 col-sm-offset-3">

														<!-- Modal content-->
														<div class="modal-content" style="margin-top: 130px">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>

																<h4 class="modal-title"> Additional Equipment <i class="fa fa-check-square-o" aria-hidden="true"></i></h4>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
															</div>
														</div>
													</div>
												</div>

											</div>
										</div>
		                            </div>
		                        </div>

		                        <div class="wizard-footer">
		                            <div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-default btn-wd' name='next' value='Next' />
		                                <input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' id='btnFinish' value='Finish' />
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>

		        <div class="col-sm-5 col-sm-offset-9" style="margin-left: 0px">
		            <div class="wizard-container">
		        	<div class="modal-content">
                    	<div class="modal-header">
	                       	
	                   	</div>
	                 	<div class="modal-body">

							<div id='calendar'></div>
						</div>	
						<div class="modal-footer ">
							<h5 align="left"><b>NOTE:</b> <label>View the dates for availability</label></h5>
						</div>
					</div>
		        	</div>

				</div>

		        <div class="col-sm-5 col-sm-offset-9" style="margin-left: 0px">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		               <!--  <div class="card wizard-card" id="wizardProfile">
		                    <form action="" method=""> -->
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
		                	<div class="modal-content">
		                    	<div class="modal-header">
		                        	<h4 class="wizard-title">
		                        	   	Cart <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
		                        	</h4>
		                    	</div>
								<div class="modal-body">
									<table id="cartTable" class="table table-hover">
                  						<thead>
                     				
           								</thead>
                   						<tbody>
                             
                   						</tbody>
          							</table>
								</div>	
								<div class="modal-footer ">
									<div id="subtot">
										<h3 class="pull-left">Subtotal:   <b></b></h3> 
									</div>
								</div>
							</div>
								
		                   <!--  </form>
		                </div> -->
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> </br> </br> <!--  big container -->

        <!-- /.modal-content -->
        </div>
        <!-- AdminLTE App -->

	    <script type="text/javascript" src="{{ asset('/jquery-1.10.2.min.js') }}"></script>
	    <script type="text/javascript" src="{{ asset('USER_UI/dist/js/validator.js') }}"></script>
	   	<script src="{{ asset('USER_UI/dist/js/app.min.js') }}"></script>
	    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	    <script src="{{ asset('USER_UI/dist/js/pages/dashboard.js') }}"></script>
	    <!-- AdminLTE for demo purposes -->
	    <script src="{{ asset('USER_UI/dist/js/demo.js') }}"></script>

	    <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

	    <script type="text/javascript">
   			$('.infoForm').bootstrapValidator({
        		// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        		feedbackIcons: {
            		valid: 'fa fa-check',
            		invalid: 'fa fa-close',
            		validating: 'fa fa-refresh',
        		},

        		fields: {
            		eType: {
                		validators: {
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
		                }
		            },
		            yesNo: {
		            	validators: {
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
		                }
		            },
		            eLoc: {
						validators: {
                  			regexp: {
				  				regexp: /^[a-zA-Z0-9]+([-',.\s][a-zA-Z0-9]+)*$/,
                    			message: 'Invalid input.'
                    		},
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
                  		}
		            },
		            eLoc2: {
		            	validators: {
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
		                }
		            },
		            eName: {
		            	validators: {
		            		regexp: {
				  				regexp: /^[a-zA-Z]+([-'@\s][a-zA-Z0-9]+)*$/,
                    			message: 'Invalid input.'
                    		},
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
		                }
		            },
		            eNum: {
		            	validators: {
		            		regexp: {
                    			regexp: /^\d{1,3}?$/,
                    				message: 'Invalid input.'
                  			},
                  			stringLength: {
			                    max: 9,
			                    message: 'Maximum number of guest is 6 digits.'
                  			},
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
		                }
		            },
		            eDate: {
		            	validators: {
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
		                }
		            },
		            eTime: {
		            	validators: {
                        	notEmpty: {
		                        message: 'This field is required.'
		                    },
		                }
		            },

		            cusName: {
		            	validators: {
		                  	regexp: {
						  		regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
		                    	message: 'This can only consist of alphabetical letters, hyphens and apostrophe only.'
		                  	},
		                  	notEmpty: {
		                    	message: 'Please supply your name.'
		                  	},
		                  	stringLength: {
		                    	min: 3,
		                    	max: 50,
		                    	message: 'The system allows 3 to 50 characters only.'
		                  	},
		                }
		            },
		            homeAdd: {
		            	validators: {
					  		regexp: {
				  				regexp: /^[a-zA-Z0-9]+([-',.\s][a-zA-Z0-9]+)*$/,
								message: 'Invalid input.'
					  		},
					  		notEmpty: {
								message: 'Please supply your home address.'
					  		},
						}
		            },
		            billAdd: {
		            	validators: {
					  		regexp: {
				  				regexp: /^[a-zA-Z0-9]+([-',.\s][a-zA-Z0-9]+)*$/,
								message: 'Invalid input.'
					  		},
					  		notEmpty: {
								message: 'Please supply your home address.'
					  		},
						}
		            },
		            cusAge: {
		            	validators: {
					  		notEmpty: {
								message: 'This field is required.'
					  		},
						}
		            },
		            telNum: {
		            	validators: {
						  	regexp: {
								regexp: /^\d{0,8}?$/,
								message: 'Invalid input.'
						  	},
						}
		            },
		            cellNum: {
		            	validators: {
						  	regexp: {
								regexp: /^\d{0,12}?$/,
								message: 'Invalid input.'
						  	},
						}
		            },
		            emailAdd: {
		            	validators: {
					  		regexp: {
								regexp: /^[a-zA-Z0-9]+([@.-\s][a-zA-Z0-9]+)*$/,
								message: 'Invalid input.'
					  		},
					  		notEmpty: {
								message: 'Please supply your email address.'
					  		},
						}
		            },
		            conPerson: {
		            	validators: {
						  	regexp: {
								regexp: /^[a-zA-Z]+([-',\s][a-zA-Z]+)*$/,
								message: 'This can only consist of alphabetical letters, hyphens and apostrophe only.'
						  	},
						  	notEmpty: {
								message: 'Please supply the contact person.'
						  	},
						}
		            },
		            conNum: {
		            	validators: {
						  	regexp: {
								regexp: /^\d{0,12}?$/,
								message: 'Invalid input.'
						  	},
						}
		            },
            	}
        	});


 		</script>

 		<script>
 			var addCtr = 0;
 			function addPack(id){
				var dishes = [];
				var dishesVal = [];
 					// alert("asd");
 					var pckgid = [];
 					var servid = [];
 					var equipid = [];
 					var empid = [];
 					var dishid = [];
		        	var pgId = $("#pckid").val();
		        	var pckname;
		        	var price = 0;
		        	var pckImage;
		        	// alert(pgId);
					$.ajax({
						url: '/UserReservationPage-getPIID',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",
							pg_id: pgId
						},
						success: function(data){
							// console.log(data);
							// alert(data['pckgid'][0]['packageInclusionID']);
							for(var i = 0; i < data['pckgid'].length; i++){
								// alert(data['pckgid'][i]['packageInclusionID']);
								price=([data['pckgid'][i]['packageCost']]);
								pckgid.push([data['pckgid'][i]['packageInclusionID']]);
		 						pckname=([data['pckgid'][i]['packageName']]);
		 						pckImage=([data['pckgid'][i]['packageImage']]);		
		 						// price=price+parseDouble(([data['pckgid'][i]['dishCost']]));
		 						// alert(price);

							}
							for(var i = 0; i < data['servid'].length; i++){
								servid.push([data['servid'][i]['packageInclusionID']]);
							}
							for(var i = 0; i < data['equipid'].length; i++){
								equipid.push([data['equipid'][i]['packageInclusionID']]);
							}
							for(var i = 0; i < data['empid'].length; i++){
								empid.push([data['empid'][i]['packageInclusionID']]);
							}
							var pckginc = [];
		 					for (var i = 0; i < pckgid.length; i++){
		 						pckginc.push(["dish" +pgId+""+pckgid[i]]);
		 					}
							for (var i = 0; i < pckginc.length; i++){
								var selectedOption = document.getElementById(pckginc[i]);
		 						dishes[i] = " "+selectedOption.options[selectedOption.selectedIndex].text;
								dishesVal[i] = selectedOption.options[selectedOption.selectedIndex].value;
		 					}
							// alert(dishes);
							// alert(dishesVal);
		 					 
							var table = document.getElementById("cartTable");
						    var row = table.insertRow(0);
						    var cell1 = row.insertCell(0);
						    var cell2 = row.insertCell(1);
							var cell3 = row.insertCell(2);
							var cell4 = row.insertCell(3);
							var cell5 = row.insertCell(4);
							var cell6 = row.insertCell(5);
							var cell7 = row.insertCell(6);
							var cell8 = row.insertCell(7);
							var cell9 = row.insertCell(8);

							cell1.innerHTML = '<h6>Package &nbsp |</h6><img id="cartImg" src="" width="80px" height="60px">';
							document.getElementById("cartImg").src="{!! asset('images/'.'"+ pckImage +"')!!}";
						    cell2.innerHTML = '<h6><b>'+pckname+'</b></h6><label id="cartDishes"><i>'+ dishes +'</i></label>';
		 					cell3.innerHTML = '<h6><b>'+price+'</b></h6>';
						    // cell3.innerHTML = '<h3>'+price+'</h3><br/><button id ="btnRemove" type="button" class="btn btn-info btn-md" onclick="deleteRow(this)">Remove</button>';
					    	cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-info btn-sm pull-right " onclick="deleteRow(this)">&times</button>';
							cell5.innerHTML = '<input type="text" id="addPackageID" value="'+pgId+'" hidden>';
							cell6.innerHTML = '<input type="text" id="addDishesAvailed" value="'+dishesVal+'" hidden>';
							cell7.innerHTML = '<input type="text" id="addServiceAvailed" value="'+servid+'" hidden>';
							cell8.innerHTML = '<input type="text" id="addEquipmentAvailed" value="'+equipid+'" hidden>';
							cell9.innerHTML = '<input type="text" id="addEmployeeAvailed" value="'+empid+'" hidden>';

							var table = document.getElementById('cartTable');
				        	var subt =0;
						        for (var r = 0, n = table.rows.length; r < n; r++) {
						            subt =subt+parseFloat(table.rows[r].cells[2].innerText);
						        }
							$subt=subt;
				    		document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
						},
						error: function(result){
							alert('error');
						}
					});


		        }
		        function pckdshimg(id){			        
				var selectedOption = document.getElementsByName(id);
				var dish = selectedOption[0].options[selectedOption[0].selectedIndex].value;
				        
				$.ajax({
					url: '/UserReservationPage-getAdd',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ad_id: dish
						},
						success: function(data){	
						var dishImages=([data['dish'][0]['dishImage']]);
						var str="{!! asset('img/'.'"+ dishImages +"')!!}";
						var pckdishimg =  document.getElementById(id);
						pckdishimg.src=str;
						
						},
						error: function(result){
							alert('error');
						}
				});

		        }
			function deleteRow(t){
				    var row = t.parentNode.parentNode;
				    document.getElementById("cartTable").deleteRow(row.rowIndex);

		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[2].innerText);
				        }
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    // console.log(row);
			}
		  
 			function addAdd(id){
				var selectedOption = document.getElementById(id);
				var dish = selectedOption.options[selectedOption.selectedIndex].value;
				var price=0;
				var qty=0;
 				// alert(dish);
 				$.ajax({
					url: '/UserReservationPage-getAdd',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ad_id: dish
						},
						success: function(data){
						price=parseFloat([data['dish'][0]['dishCost']]);	
						var dishName=([data['dish'][0]['dishName']]);	
						var dishImage=([data['dish'][0]['dishImage']]);
						addCtr=addCtr+1;	 
						 
						var table = document.getElementById("cartTable");
						var qty = document.getElementById("addquant").value;
						var notes = document.getElementById("addnotes").value;
					    var row = table.insertRow(0);
					    var cell1 = row.insertCell(0);
					    var cell2 = row.insertCell(1);
						var cell3 = row.insertCell(2);
						var cell4 = row.insertCell(3);
						var cell5 = row.insertCell(4);
						var cell6 = row.insertCell(5);
						var cell7 = row.insertCell(6);
									
					   	cell1.innerHTML = '<img id="cartImg" src="" width="200px" height="150px">';
						document.getElementById("cartImg").src="{!! asset('img/'.'"+ dishImage +"')!!}";
						cell2.innerHTML = '<h4><b>'+dishName+'</b></h4><h6>Add-On</h6><br/><label id="cartDishes"> </label>';
					    cell3.innerHTML = '<h4><b>'+price+'</b></h4>';
					    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-info btn-md pull-right " onclick="deleteRowFood(this)">Remove</button>';
						cell5.innerHTML = '<input type="text" id="additionalDish'+addCtr+'" value="'+dish+'" hidden>';
						cell6.innerHTML = '<input type="text" id="additionalQty'+addCtr+'" value="'+qty+'" hidden>';
						cell7.innerHTML = '<input type="text" id="additionalNotes'+addCtr+'" value="'+notes+'" hidden>';
												
						},
						error: function(result){
							alert('error');
						}
				});
		 		
 			}
 			function deleteRowFood(t){
				    var row = t.parentNode.parentNode;
				    document.getElementById("cartTable").deleteRow(row.rowIndex);
				    addCtr=addCtr-1;

		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[2].innerText);
				        }
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    // console.log(row);
			}
 			function addServ(id){
 				var selectedOption = document.getElementById(id);
				var serv = selectedOption.options[selectedOption.selectedIndex].value;
				var price=0;
				var qty=0;
 				// alert(serv);
 				$.ajax({
					url: '/UserReservationPage-getServ',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					as_id: serv
						},
						success: function(data){
						price=parseFloat([data['serv'][0]['serviceFee']]);	
						var servName=([data['serv'][0]['serviceName']]);	
						var servImage=([data['serv'][0]['serviceImage']]);
								 
						 
						var table = document.getElementById("cartTable");
						var qty = document.getElementById("addquant").value;
						var notes = document.getElementById("addnotes").value;
					    var row = table.insertRow(0);
					    var cell1 = row.insertCell(0);
					    var cell2 = row.insertCell(1);
						var cell3 = row.insertCell(2);
						var cell4 = row.insertCell(3);
						var cell5 = row.insertCell(4);
						var cell6 = row.insertCell(5);
						var cell7 = row.insertCell(6);
									
					   	cell1.innerHTML = '<img id="cartImg" src="" width="60px" height="45px">';
						document.getElementById("cartImg").src="{!! asset('img/'.'"+ servImage +"')!!}";
						cell2.innerHTML = '<h4><b>'+servName+'</b></h4><h6>Add-On</h6><br/><label id="cartDishes"> </label>';
					    cell3.innerHTML = '<h4><b>'+price+'</b></h4>';
					    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-info btn-md pull-right " onclick="deleteRow(this)">Remove</button>';
						cell5.innerHTML = '<input type="text" id="'+serv+'" value="'+serv+'" hidden>';
						cell6.innerHTML = '<input type="text" id="additionalQty" value="'+qty+'" hidden>';
						cell7.innerHTML = '<input type="text" id="additionalNotes" value="'+notes+'" hidden>';
						
						},
						error: function(result){
							alert('error');
						}
				});
 			}
 			function addEquip(id){
				var equip = id;
				var price=0;
				var qty=0;
 				// alert(equip);
 				$.ajax({
					url: '/UserReservationPage-getEquip',
					type: 'POST',
					data: {
					"_token": "{{ csrf_token() }}",
					ae_id: equip
						},
						success: function(data){
						price=parseFloat([data['equip'][0]['equipmentRatePerHour']]);	
						var equipName=([data['equip'][0]['equipmentName']]);	
						var equipImage=([data['equip'][0]['equipmentImage']]);
								 
						 
						var table = document.getElementById("cartTable");
						var qty = document.getElementById("addquant").value;
						var notes = document.getElementById("addnotes").value;
					    var row = table.insertRow(0);
					    var cell1 = row.insertCell(0);
					    var cell2 = row.insertCell(1);
						var cell3 = row.insertCell(2);
						var cell4 = row.insertCell(3);
						var cell5 = row.insertCell(4);
						var cell6 = row.insertCell(5);
						var cell7 = row.insertCell(6);
									
					   	cell1.innerHTML = '<img id="cartImg" src="" width="200px" height="150px">';
						document.getElementById("cartImg").src="{!! asset('img/'.'"+ equipImage +"')!!}";
						cell2.innerHTML = '<h4><b>'+equipName+'</b></h4><h6>Add-On</h6><br/><label id="cartDishes"> </label>';
					    cell3.innerHTML = '<h4><b>'+price+'</b></h4>';
					    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-info btn-md pull-right " onclick="deleteRow(this)">Remove</button>';
						cell5.innerHTML = '<input type="text" id="'+equip+'" value="'+equip+'" hidden>';
						cell6.innerHTML = '<input type="text" id="additionalQty" value="'+qty+'" hidden>';
						cell7.innerHTML = '<input type="text" id="additionalNotes" value="'+notes+'" hidden>';
						  
						
						},
						error: function(result){
							alert('error');
						}
				});
 			}
 			// function addEmp(id){
 			// 	alert(id);
 			// }

 			
		        
		        function cartclick(id){
		        	// alert($("#addEventID").val());
		        	// alert($("#addCustomerID").val());
		        	// alert($("#addReservationID").val());
		        	// alert($("#addContactID").val());
		        	// alert($("#addDishAvailedID").val());
		        	var table = document.getElementById('cartTable');
		        	var subt =0;
				        for (var r = 0, n = table.rows.length; r < n; r++) {
				            subt =subt+parseFloat(table.rows[r].cells[2].innerText);
				        }
				    // alert(subt);
				    $subt=subt;
				    document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
		        }
 				function getpckid(id){
 				$("#pckid").val(id)
 				// alert(id)
 				}
 				function getdishtypeid(id){
 				$("#dtid").val(id)
 				//alert(id)
 				}
 				function getstid(id){
 				$("#stid").val(id)
 				//alert(id)
 				}
 				function geteqid(id){
 				$("#eqid").val(id)
 				//alert(id)
 				}
 				function getdishid(id){
 				//$("#pckid").val(id)
 				//alert(id)
 				}
 				$("#btnFinish").click(function(e){	
						alert('ss');
						var addEventIDs = $("#addEventID").val();						
						var eNames = $("#eName").val();
						var eDates = $("#eDate").val();
						var eTimes = $("#eTime").val();
						var enTimes = $("#enTime").val();
						var eLocs = $("#eLoc").val();
						var eLoc2s = $("#eLoc2").val();
						var eNums = $("#eNum").val();
						var eTypes = $("#eType").val();
						var addCustomerIDs = $("#addCustomerID").val();
						var cusNames = $("#cusName").val();
						var homeAdds = $("#homeAdd").val();
						var billAdds = $("#billAdd").val();
						var emailAdds = $("#emailAdd").val();
						var telNums = $("#telNum").val();
						var cellNums = $("#cellNum").val();
						var dobs = $("#dob").val();
						var addContactIDs = $("#addContactID").val();
						var conPersons = $("#conPerson").val();
						var conNums = $("#conNum").val();
						var addReservationIDs = $("#addReservationID").val();
						var addPackIDs = $("#addPackageID").val();
						var dishIDs = $("#addDishesAvailed").val().split(',');	
						var addDishID = [];
						var addDishQty = [];
						var addDishNotes = [];
						var dishAvailedIDs = [];
						for (var i = 0; i < dishIDs.length; i++){
							dishAvailedIDs.push(parseInt($("#addDishAvailedID").val())+i);
						}
						for (var i = 1; i <= addCtr; i++){
							addDishID.push($("#additionalDish"+i+"").val());
							addDishQty.push($("#additionalQty"+i+"").val());
							addDishNotes.push($("#additionalNotes"+i+"").val());
						}
						alert(addPackIDs);
						alert(dishIDs);
						alert(dishAvailedIDs);
						alert(addEventIDs);
						alert(eNames);
						alert(eDates);
						alert(eTimes);
						alert(enTimes);
						alert(eLocs);
						alert(eLoc2s);
						alert(eNums);
						alert(eTypes);
						alert(addCustomerIDs);
						alert(cusNames);
						alert(homeAdds);
						alert(billAdds);
						alert(emailAdds);
						alert(telNums);
						alert(cellNums);
						alert(dobs);
						alert(addContactIDs);
						alert(conPersons);
						alert(conNums);
						alert(addReservationIDs);
						alert('ss');
						
						// var d = new Date(); 
						//  dt = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate(); 
						// alert(dt)
								$.ajax({
					                url:  "/UserReservationPage",
					                type: "POST",
							        beforeSend: function (xhr) {
							            var token = $('meta[name="csrf_token"]').attr('content');

							            if (token) {
							                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
							            }
							        },
					                data: {
					                	"_token": "{{ csrf_token() }}",
										addEventID: addEventIDs,
										eName: eNames,
										eDate: eDates,
										eTime: eTimes,
										enTime: enTimes,
									    eLoc: eLocs,
									    eLoc2: eLoc2s,
									    eNum: eNums,
									    eType: eTypes,
									    addCustomerID: addCustomerIDs,
									    cusName: cusNames,
									    homeAdd: homeAdds,
									    billAdd: billAdds,
									    emailAdd: emailAdds,
									    telNum: telNums,
									    cellNum: cellNums,
									    dob: dobs,
									    addContactID: addContactIDs,
									    conPerson: conPersons,
									    conNum: conNums,
										addReservationID: addReservationIDs,
								       	addPackID: addPackIDs,
						            	dishAvailedID: dishAvailedIDs,
						            	dishID: dishIDs,
						            	addDishID: addDishID,
						            	addDishQty: addDishQty,
						            	addDishNotes: addDishNotes,
						            	
					         		},
					                success: function(data){
						            	alert("Success");
										       
										window.location.href = "UserReservationPage";
					                },
					                error: function(result){
						            	alert("asd");
						            }                  
					    		});					
							
					});
 				function locYes(id){
 					var selectedOption = document.getElementById(id);
					var loc = selectedOption.selectedIndex;
 					if(loc==1){
 						$("#eLoc").removeAttr('disabled');
 						document.getElementById('locNo').style="display:none";
 						document.getElementById('locYes').style="display:";
 						document.getElementById('eLoc2').selectedIndex="0";
 					}
 					else if(loc==2){
 						document.getElementById('locYes').style="display:none";
 						document.getElementById('locNo').style="display:"; 	
 						document.getElementById('eLoc').value="";				
 					}
 				}
 		</script>
 		<script>
 		var datee=[];
 		var start=[];
 		var end=[];
 		var rsvtn=1;
 		var events=[];
 		$.ajax({
					url: '/UserReservationPage-getReservation',
					type: 'POST',
					data: {
						asd:'rsvtn',
						"_token": "{{ csrf_token() }}",
						},
						success: function(data){	
	 						for(var i=0;i<data['rsvtn'].length;i++){
								datee.push([data['rsvtn'][i]['eventDate']]);	
								start.push([data['rsvtn'][i]['eventTime']]);	
								end.push([data['rsvtn'][i]['endTime']]);
							}	
							for(var i=0;i<data['rsvtn'].length;i++){
								events.push({title: 'Reserved',  start : datee[i]+'T'+start[i], end : datee[i]+'T'+end[i]})
							}								
						},
						error: function(result){
							alert('error');
						}
		});
 		$(document).ready(function() {
 			// alert(datee);
			// alert(start);
			// alert(end);
			//alert(ctr);
			 // alert(events);
			$('#calendar').fullCalendar({
  
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,listWeek'
				},
				events: events

					
								
			});
			
		});
 		</script>

		<!--   Core JS Files   -->
	    <script src="{{ asset('USER_UI/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
	    <!-- Full Calendar -->
		<script src="{{ asset('/fullcalendar/lib/moment.min.js')}}"></script>
		<script src="{{ asset('/fullcalendar/lib/jquery.min.js')}}"></script>
		<script src="{{ asset('/fullcalendar/fullcalendar.min.js')}}"'></script>
		<script src="{{ asset('/fullcalendar/gcal.min.js')}}"></script>
		<script src="{{ asset('USER_UI/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('USER_UI/assets/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

		<!--  Plugin for the Wizard -->
		<script src="{{ asset('/USER_UI/assets/js/material-bootstrap-wizard.js') }}"></script>

	    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
		<script src="{{ asset('/USER_UI/assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
		
	</body>
</html>
