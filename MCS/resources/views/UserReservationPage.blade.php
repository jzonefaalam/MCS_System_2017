@extends('layouts.userReserveUI')
@section('contents')
@section('scripts')
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-7">

		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="azure" id="wizard">
		                    <form class = "infoForm" name = "addReservation" id = "addReservation" role = "form" method="POST" action="/UserReservationPage" enctype="multipart/form-data">
		                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">Reservation</h3>
		                        	<p class="category">Book a reservation now!</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#resDetails" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-calendar"></i>
												</div>
												Event Details
											</a>
										</li>
			                            <li>
											<a href="#cusInfo" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-user"></i>
												</div>
												Customer Information
											</a>
										</li>
			                            <li>
											<a href="#package" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-package"></i>
												</div>
												Package Selection
											</a>
										</li>
			                            <li>
											<a href="#addOn" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-plus"></i>
												</div>
												Additional
											</a>
										</li>
			                            <li>
											<a href="#payment" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-wallet"></i>
												</div>
												Payment
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="resDetails">
		                            	<div class="row"> <br> <br>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                	<input type="text" name="addEventID" id="addEventID" value = "{{ $eventNewID }}" hidden>
			                                    <div class="form-group">
			                                        <label>Event Type</label>
			                                        <select name="eType" id = "eType" class="form-control">
														<option disabled="" selected=""></option>
														    @foreach($eType as $type)
														<option value="{{$type->eventTypeID}}">{{$type->eventTypeName}}</option>
														    @endforeach
		                                            </select>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Name of Event</label>
			                                        <input type="text" name="eName" id = "eName" maxlength="50" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Do you have a location?</label>
		                                            	<select name="yesNo" id = "yesNo" class="form-control" onchange="locYes(this.id)">
															<option disabled="" selected=""></option>
															<option value="Yes">Yes</option>
															<option>No</option>
			                                        </select>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Date of Event</label>
			                                        <input type="date" name="eDate" id = "eDate"  class="form-control">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1" id="locYes">
			                                    <div class="form-group">
			                                        <label>Location</label>
			                                        <input type="text" name="eLoc" id = "eLoc" class="form-control" disabled="">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1" id="locNo" style="display:none">
			                                    <div class="form-group">
			                                        <label>Location</label>
		                                            <select name="eLoc2" id = "eLoc2" class="form-control">
														<option disabled="Choose location" selected=""></option>
														@foreach($location as $loc)
														<option value="{{$loc->locationID}}">{{$loc->locationName}}</option>
														@endforeach
		                                            </select>
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Number of Guests</label>
			                                        <input type="number" name="eNum" id = "eNum" min="1" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Starting Time of Event</label>
			                                        <input type="time" name="eTime" id = "eTime" class="form-control">
			                                    </div>
			                                </div>
			                                <div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>End Time of Event</label>
			                                        <input type="time" name="enTime" id = "enTime" class="form-control">
			                                    </div>
			                                </div>
		                            	</div>
		                        	</div>

		                            <div class="tab-pane" id="cusInfo">
		                                <div class="row"> <br> <br>
											<input type="text" name="addCustomerID" id="addCustomerID" value = "{{ $customerNewID }}" hidden>
											<input type="text" name="addReservationID" id="addReservationID" value = "{{ $reservationNewID }}" hidden>
											<input type="text" name="addContactID" id="addContactID" value = "{{ $contactNewID }}" hidden>
											<input type="text" name="addDishAvailedID" id="addDishAvailedID" value = "{{ $dishAvailedNewID }}" hidden>

											<div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Full Name<small>(required)</small></label>
			                                        <input type="text" name="cusName" id = "cusName" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Home Address</label>
			                                        <input type="text" name="homeAdd" id = "homeAdd" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Date of Birth</label>
			                                        <input type="date" name="dob" id = "dob" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Telephone Number</label>
			                                        <input type="text" name="telNum" id = "telNum" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Cellphone Number</label>
			                                        <input type="text" name="cellNum" id = "cellNum" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Email Address</label>
			                                        <input type="text" name="emailAdd" id = "emailAdd" class="form-control">
			                                    </div>
			                                </div>		                                	
			                                <div class="col-sm-12">
		                                    	<h5 class="info-text"> In case of emergency please specify another contact</h5>
		                                    </div>
											<div class="col-sm-5 col-sm-offset-1">
			                                    <div class="form-group">
			                                        <label>Contact Name</label>
			                                        <input type="text" name="conPerson" id = "conPerson" class="form-control">
			                                    </div>
			                                </div>
											<div class="col-sm-5">
			                                    <div class="form-group">
			                                        <label>Contact Number</label>
			                                        <input type="text" name="conNum" id = "conNum" class="form-control">
			                                    </div>
			                                </div>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="package">
		                                <div class="row" align="center">                       
		                                	<div class="col-sm-12">
		                                        <h5 class="info-text"> <i> Choose your package </i> </h5>
		                                    </div>
		                                    @foreach($package as $pg)
		                                	<input type="text" id="pckid" hidden>
		                                    <input type="button" style = "width: 550px" class="btn btn-warning btn-sm"  data-toggle="modal" href="#packageModal{{$pg->packageID}}" id = "pck{{$pg->packageID}}" name='{{$pg->packageID}}' onclick="getpckid(this.name)" value="{{$pg->packageName}}">
		                                    <br> <br>
		                                    <input type="text" id="pgid" value='{{$pg->packageID}}' hidden>
											<input type="text" id="pgimage" value='{{$pg->packageImage}}' hidden>
										    <input type="text" id="countDish" value="{{$countDish}}" hidden>
		                                    @endforeach
		                                </div>
		                            </div>
		                            
		                            <div class="tab-pane" id="addOn">
		                                <div class="row" align="center">                       
		                                	<div class="col-sm-12">
		                                        <h5 class="info-text"> <i> Additional Food / Service / Equipment </i> </h5>
		                                    </div>

		                                	<input type="text" id="dtid" hidden>
		                                	<input type="text" id="ptids" hidden>
		                                	<input type="text" id="pmids" hidden>
		                                    <input type="button" style = "width: 180px; height: 180px" class="btn btn-info btn-lg"  data-toggle="modal" href="#additionalModal" value="Food"> &nbsp &nbsp

		                                	<input type="text" id="dtid" hidden>
		                                    <input type="button" style = "width: 180px; height: 180px" class="btn btn-info btn-lg"  data-toggle="modal" href="#serviceModal" value="Service"> &nbsp &nbsp
		                                    </a>

		                                	<input type="text" id="dtid" hidden>
		                                    <input type="button" style = "width: 180px; height: 180px" class="btn btn-info btn-lg"  data-toggle="modal" href="#equipmentModal" value="Equipment">
		                                    </a>
		                                </div>
		                            </div>
		                            
		                            <div class="tab-pane" id="payment">
		                                <div class="row" align="center">
		                					<!-- <div class="card wizard-card" data-color="orange"> -->
			                                    <div class="row">
				                                    <div class="col-sm-6" >
					                                    <h5 class="info-text"> <i> Payment Term</i> </h5>
				                                    	@foreach($paymentTerm as $pt)
				                                        <div class="col-sm-6" id="ppt{{$pt->paymentTermID}}">
															<div class="choice" data-toggle="wizard-checkbox"  style="margin-top: -10px" >
				                                                <input type="checkbox" name="{{$pt->paymentTermID}}" id="pt{{$pt->paymentTermID}}">
				                                                <div class="card card-checkboxes card-hover-effect"  id="{{$pt->paymentTermID}}" onclick="getpt(this.id)">
				                                                    <i class="{{$pt->paymentTermIco}}"></i>
																	<p>{{$pt->paymentTermName}}</p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    	@endforeach
				                                    </div>
				                                    <div class="col-sm-6" >
					                                        <h5 class="info-text"> <i> Payment Mode</i> </h5>
					                                    
				                                    	@foreach($paymentMode as $pm)
				                                        <div class="col-sm-6 " id="ppm{{$pm->paymentModeID}}" >
															<div class="choice" data-toggle="wizard-checkbox" style="margin-top: -10px">
				                                                <input type="checkbox" name="{{$pm->paymentModeID}}" id="pm{{$pm->paymentModeID}}">
				                                                <div class="card card-checkboxes card-hover-effect" id="{{$pm->paymentModeID}}" onclick="getpm(this.id)">
				                                                    <i class="{{$pm->paymentModeIco}}"></i>
																	<p>{{$pm->paymentModeName}}</p>
				                                                </div>
				                                            </div>
				                                        </div>
				                                    	@endforeach
				                                    </div>
				                                </div>
			                                <!-- </div>		                                 -->
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                        	<div class="pull-right">
		                                <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next'  />
		                                <input type="button" id="btnFinish" class="btn btn-finish btn-fill btn-primary btn-wd" name="finish" value="Finish"/>
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>

		        <div class="col-sm-5 col-sm-offset-8" style="margin: 0px">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizard">
		                <!--        You can switch " data-color="azure" "  with one of the next bright colors: "blue", "green", "orange", "red"           -->
		                		<div class="wizard-header">
		                        	<h3 class="wizard-title">Viewing</h3>
		                        	<p class="category">Click the icon to view the details.</p>
		                    	</div>

								<div class="wizard-navigation">
									<div class="progress-with-circle">
									     <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="5" style="width: 21%;"></div>
									</div>
									<ul>			                            
			                            <li>
											<a href="#viewDate" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-check-box"></i>
												</div>
												Dates
											</a>
										</li>
										<li>
											<a href="#viewCart" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-shopping-cart"></i>
												</div>
												Cart
											</a>
										</li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="viewCart">
		                                <div class="row">
		                                    <table id="cartTable" class="table table-hover">
                  								<thead>
                     				
           										</thead>
                   								<tbody>
                             
                   								</tbody>
          									</table>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="viewDate">
		                                <div class="row">
		                                    <div id="calendar" class="col-sm-10 col-sm-offset-1"></div>
		                                </div>

		                            </div>

		                        </div>
		                        <div class="wizard-footer">
		                            <div id="subtot">
										<h3 class="pull-left"> <b></b></h3> 
									</div>
		                            <div class="clearfix"></div>
		                        </div>

		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->
	</div>
	
	<!-- PACKAGE MODAL -->
	@foreach($package as $pg)
	<div id="packageModal{{$pg->packageID}}" class="modal fade" role="dialog">
		<div class="col-md-8 col-sm-offset-2">	
			<div class="modal-content" style="margin-top: 50px">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"> {{$pg->packageName}} <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h4>
				</div>

				<div class="modal-footer">
					@foreach($packageinclusion as $pgi)
		            	@if($pgi->packageID == $pg->packageID)
		            		<div class = "col-md-3 col-sm-3">
								<h3 id='dishTypeName'><center>{{$pgi->dishTypeName}}{{$pgi->serviceID}}</center></h3>
					            <div class="form-group">
									<img src="{{ asset('images/' . $pgi->dishTypeImage) }}" style="height: 150px; border: 5px" id="dishimg{{$pgi->packageID}}{{$pgi->packageInclusionID}}" class="col-md-12 col-sm-12">
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
						<small>
						<h6 align="left"><label>
						<i><small>This package includes:</small></i><br/>
						Services:
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
						</h6>
						</small>
					</div>
					<div class="pull-right">
						<button type="button" style="margin-top: 10px" class="btn btn-success btn-fill pull-right" data-dismiss="modal" name="{{$pg->packageID}}" id="{{$pg->packageID}}" class="btn btn-info btn-md" onclick="addPack(this.name)">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach

	<!-- ADDITIONAL MODAL -->
	<form class="modal multi-step" id="additionalModal">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h3 hidden>{{$i=1}}</h3>
					@foreach($dishtype as $dd)
	                <h4 class="modal-title step-{{$i}}" data-step="{{$i}}">{{$dd->dishTypeName}}</h4>
	                <h3 hidden>{{$i++}}</h3>
	                @endforeach
	            </div>
				<input id="addprice" hidden>
				<h3 hidden>{{$i=1}}</h3>
				@foreach($dishtype as $dd)
	            <div class="modal-body step step-{{$i}}" align="center">
	            	<div class="row">						
		                <img src="{{ asset('images/' . $dd->dishTypeImage) }}" id="dishTypeImage{{$dd->dishTypeID}}" width="200px" height="150px">
						<select class="form-control" name="dishTypeImage{{$dd->dishTypeID}}" id="dishType{{$dd->dishTypeID}}" style="width: 200px" onchange="pckdshimg(this.name)">
							<option disabled selected value="">Choose Dish</option>
							@foreach($dishes as $dishh)
							@if($dd->dishTypeID == $dishh->dishTypeID)
								<option value="{{$dishh->dishID}}">{{$dishh->dishName}}</option>
							@endif
							@endforeach
						</select> <br>
					    
					    <div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Quantity</label>
					    		<input type="number" name="{{$dd->dishTypeID}}" id = "qty{{$dd->dishTypeID}}" maxlength="50" min="1" max="9999"class="form-control" style="width: 250px" placeholder="Quantity per serving (5 pax)" onkeyup="comPrice(this.name)">
					    	</div>
					    
					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="number" disabled="" name="{{$dd->dishTypeID}}"  id="price{{$dd->dishTypeID}}" maxlength="50" class="form-control" style="width: 250px" value="" placeholder="Price">
					    	</div>
					    </div>

					    <div class="col-sm-offset-1">
					    	<label>Note / Comment</label>
					    	<textarea name="note" name="{{$dd->dishTypeID}}" id = "note{{$dd->dishTypeID}}" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Note"></textarea>
					   	</div>
					</div>
	            </div>
	            <h3 hidden>{{$i++}}</h3>
	            @endforeach
	            

	            <div class="modal-footer">
		            <div class="pull-right">
		            <h3 hidden>{{$i=1}}</h3>
					@foreach($dishtype as $dd)
                		<button type="button" class="btn btn-primary btn-fill step step-{{$i-1}}" data-step="{{$i-1}}" onclick="sendEvent('#additionalModal', {{$i}})"> <i class="ti-angle-double-right"></i> </button>
	                	<button type="button" name="dishType{{$dd->dishTypeID}}" class="btn btn-success btn-fill step step-{{$i}}" data-step="{{$i}}" data-dismiss="modal" onclick="addAdd(this.name)">Add to Cart</button>

	            	<h3 hidden>{{$i++}}</h3>
	            	@endforeach
		            </div>

		            <div class="pull-left">
		            <h3 hidden>{{$i=1}}</h3>
					@foreach($dishtype as $dd)
                		<button type="button" class="btn btn-default step step-{{$i+1}}" data-step="2" onclick="sendEvent('#additionalModal', {{$i}})"><i class="ti-angle-double-left"></i></button>
                	<h3 hidden>{{$i++}}</h3>
	            	@endforeach
		            </div>
	            </div>
	        </div>
	    </div>
	</form>

	<!-- SERVICE MODAL -->
	<form class="modal multi-step" id="serviceModal">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title step-1" data-step="1">Additional Service</h4>
	                <h4 class="modal-title step-2" data-step="2">Additional Service</h4>
	            </div>

	            <div class="modal-body step step-1" align="center">
	            	<div class="row">
	            		<h4> Flower Arrangement</h4>
		                <img src="img.jpg" style="width: 300px;height: 170px"> <br> <br>
		                <select class="form-control" name="dishImg" style="width: 300px">
							<option disabled selected value="">Choose Service</option>
						</select> <br>
					    
					    <div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Description</label>
					    	<textarea name="desc" id = "desc" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Description"></textarea>

					    	</div>
					    
					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="text" disabled="" name="price" id = "price" maxlength="50" class="form-control" style="width: 250px" placeholder="Price">
					    	</div>
					    </div>

					    <div class="col-sm-offset-1">
					    	<div class="form-group">
					    		<label>Quantity</label>
					    		<input type="text" name="qntty" id = "qntty" maxlength="50" class="form-control" style="width: 250px" placeholder="Quantity">
					    	</div>

					    	<label>Note / Comment</label>
					    	<textarea name="note" id = "note" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Note"></textarea>
					   	</div>
					</div>
	            </div>

	            <div class="modal-body step step-2" align="center">
	                <div class="row">
	            		<h4> Clown</h4>
		                <img src="img.jpg" style="width: 300px;height: 170px"> <br> <br>
		                <select class="form-control" name="dishImg" style="width: 300px">
							<option disabled selected value="">Choose Service</option>
						</select> <br>

					    	<label>Note / Comment</label>
					    	<textarea name="note" id = "note" maxlength="50" class="form-control" style="width: 300px; height: 120px" placeholder="Note"></textarea>
					</div>
	            </div> 

	            <div class="modal-footer">
		            <div class="pull-right">
                		<button type="button" class="btn btn-primary btn-fill step step-1" data-step="1" onclick="sendEvent('#serviceModal', 2)"> <i class="ti-angle-double-right"></i> </button>

	                	<button type="button" class="btn btn-success btn-fill step step-2" data-step="2" data-dismiss="modal" onclick="sendEvent('#serviceModal')">Save</button>

	                	<button type="button" class="btn btn-success btn-fill step step-1" data-step="1" data-dismiss="modal" onclick="sendEvent('#serviceModal')">Save</button>
		            </div>

		            <div class="pull-left">
                		<button type="button" class="btn btn-default step step-2" data-step="2" onclick="sendEvent('#serviceModal', 1)"><i class="ti-angle-double-left"></i></button>
		            </div>
	            </div>
	        </div>
	    </div>
	</form>

	<!-- EQUIPMENT MODAL -->
	<form class="modal multi-step" id="equipmentModal">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title step-1" data-step="1">Additional Equipment</h4>
	                <h4 class="modal-title step-2" data-step="2">Additional Equipment</h4>
	            </div>

	            <div class="modal-body step step-1" align="center">
	            	<div class="row">
	            		<h4> Smoke Machine </h4>
		                <img src="img.jpg" style="width: 300px;height: 170px"> <br> <br>
		                <select class="form-control" name="dishImg" style="width: 300px">
							<option disabled selected value="">Choose Equipment</option>
						</select> <br>
					    
					    <div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Description</label>
					    	<textarea name="desc" id = "desc" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Description"></textarea>

					    	</div>
					    
					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="text" disabled="" name="price" id = "price" maxlength="50" class="form-control" style="width: 250px" placeholder="Price">
					    	</div>
					    </div>

					    <div class="col-sm-offset-1">
					    	<div class="form-group">
					    		<label>Quantity</label>
					    		<input type="text" name="qntty" id = "qntty" maxlength="50" class="form-control" style="width: 250px" placeholder="Quantity">
					    	</div>

					    	<label>Note / Comment</label>
					    	<textarea name="note" id = "note" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Note"></textarea>
					   	</div>
					</div>
	            </div>

	            <div class="modal-body step step-2" align="center">
	            	<div class="row">
	            		<h4> Table </h4>
		                <img src="img.jpg" style="width: 300px;height: 170px"> <br> <br>
		                <select class="form-control" name="dishImg" style="width: 300px">
							<option disabled selected value="">Choose Equipment</option>
						</select> <br>
					    
					    <div class="col-sm-6">
					    	<div class="form-group">
					    		<label>Description</label>
					    	<textarea name="desc" id = "desc" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Description"></textarea>

					    	</div>
					    
					    	<div class="form-group">
					    		<label>Price</label>
					    		<input type="text" disabled="" name="price" id = "price" maxlength="50" class="form-control" style="width: 250px" placeholder="Price">
					    	</div>
					    </div>

					    <div class="col-sm-offset-1">
					    	<div class="form-group">
					    		<label>Quantity</label>
					    		<input type="text" name="qntty" id = "qntty" maxlength="50" class="form-control" style="width: 250px" placeholder="Quantity">
					    	</div>

					    	<label>Note / Comment</label>
					    	<textarea name="note" id = "note" maxlength="50" class="form-control" style="width: 250px; height: 120px" placeholder="Note"></textarea>
					   	</div>
					</div>
	            </div>

	            <div class="modal-footer">
		            <div class="pull-right">
                		<button type="button" class="btn btn-primary btn-fill step step-1" data-step="1" onclick="sendEvent('#equipmentModal', 2)"> <i class="ti-angle-double-right"></i> </button>

	                	<button type="button" class="btn btn-success btn-fill step step-2" data-step="2" data-dismiss="modal" onclick="sendEvent('#equipmentModal')">Save</button>

	                	<button type="button" class="btn btn-success btn-fill step step-1" data-step="1" data-dismiss="modal" onclick="sendEvent('#equipmentModal')">Save</button>
		            </div>

		            <div class="pull-left">
                		<button type="button" class="btn btn-default step step-2" data-step="2" onclick="sendEvent('#equipmentModal', 1)"><i class="ti-angle-double-left"></i></button>
		            </div>
	            </div>
	        </div>
	    </div>
	</form>

	<!-- PAYMENT MODAL -->
	<div id="paymentModal" class="modal fade" role="dialog"> <br> <br> <br>
		<div class="col-md-8 col-sm-offset-2">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" align="center"> Payment <i class="fa fa-money" aria-hidden="true"></i></h4>
				</div>

				<div class="modal-footer">
					<div class="pull-right">
						<button type="button" class="btn btn-success pull-right" data-dismiss="modal">Save</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
   			$('#addReservation').bootstrapValidator({
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
							for(var i = 0; i < data['pckid'].length; i++){
								document.getElementById("pck"+[data['pckid'][i]['packageID']]).disabled=true;
							}
							for(var i = 0; i < data['servid'].length; i++){
								servid.push([data['servid'][i]['serviceID']]);
							}
							for(var i = 0; i < data['equipid'].length; i++){
								equipid.push([data['equipid'][i]['equipmentID']]);
							}
							for(var i = 0; i < data['empid'].length; i++){
								empid.push([data['empid'][i]['employeeTypeID']]);
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
						    cell2.innerHTML = '<h6><b>'+pckname+'</b></h6><small><label id="cartDishes"><i>'+ dishes +'</i></label></small>';
		 					cell3.innerHTML = '<h6><b>'+price+'</b></h6>';
						    // cell3.innerHTML = '<h3>'+price+'</h3><br/><button id ="btnRemove" type="button" class="btn btn-info btn-md" onclick="deleteRow(this)">Remove</button>';
					    	cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-danger btn-sm pull-right " onclick="deleteRow(this)">&times</button>';
							cell5.innerHTML = '<input type="text" id="addPackageID" value="'+pgId+'" hidden>';
							cell6.innerHTML = '<input type="text" id="addDishesAvailed" value="'+dishesVal+'" hidden>';
							cell7.innerHTML = '<input type="text" id="addServiceAvailed" value="'+servid+'" hidden>';
							cell8.innerHTML = '<input type="text" id="addEquipmentAvailed" value="'+equipid+'" hidden>';
							cell9.innerHTML = '<input type="text" id="addEmployeeEmployed" value="'+empid+'" hidden>';

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
						$("#addprice").val([data['dish'][0]['dishCost']]);
						pckdishimg.src=str;
						comPrice([data['dish'][0]['dishTypeID']]);
						
						},
						error: function(result){
							alert('error');
						}
				});

		        }
			function deleteRow(t){
		        	var pgId = $("#pckid").val();
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
				    $.ajax({
						url: '/UserReservationPage-getPIID',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",
							pg_id: pgId
						},
						success: function(data){
							for(var i = 0; i < data['pckid'].length; i++){
								document.getElementById("pck"+[data['pckid'][i]['packageID']]).disabled=false;
							}

						},
						error: function(result){
							alert('error');
						}
					});
			}
////////////////////////////////////			// //////////////////////////////////////////////////////////////////////////////////////////////
			function getpt(id){
				var ptid=id;
				$('#ptids').val(ptid);
					$.ajax({
						url: '/UserReservationPage-getPay',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",							
							p_id: ptid,
						},
						success: function(data){
							for(var i = 0; i < data['paymentTerm'].length; i++){
								document.getElementById("pt"+[data['paymentTerm'][i]['paymentTermID']]).checked=false;
								$('#ppt'+[data['paymentTerm'][i]['paymentTermID']]).find('[data-toggle="wizard-checkbox"]').removeClass('active');							
							}
							document.getElementById("pt"+id).checked=true;

						},
						error: function(result){
							alert('error');
						}
					});
			}
			function getpm(id){
				var pmid=id;
				$('#pmids').val(pmid);
					$.ajax({
						url: '/UserReservationPage-getPay',
						type: 'POST',
						data: {
							"_token": "{{ csrf_token() }}",
							p_id: pmid,
						},
						success: function(data){
							for(var i = 0; i < data['paymentMode'].length; i++){
								document.getElementById("pm"+[data['paymentMode'][i]['paymentModeID']]).checked=false; 
								$('#ppm'+[data['paymentMode'][i]['paymentModeID']]).find('[data-toggle="wizard-checkbox"]').removeClass('active');
								
							}
							document.getElementById("pm"+id).checked=true;

								// $('.fc-toolbar').find('.fc-button-group').addClass('btn-xs btn-group');
						},
						error: function(result){
							alert('error');
						}
					});
			}
		  
 			function addAdd(id){
				var selectedOption = document.getElementById(id);
				var dish = selectedOption.options[selectedOption.selectedIndex].value;
				var price=0;
				var qty=0;
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
						var qty = $("#qty"+([data['dish'][0]['dishTypeID']])).val();
						var notes = $("#note"+([data['dish'][0]['dishTypeID']])).val();
						var tp = $("#price"+([data['dish'][0]['dishTypeID']])).val();
						var dishid;
						var dishqty;
						var dishnote;
						var check;
						// for (var i = addCtr; i>0; i--) {
						// 	dishid=$('#additionalDish'+(i-1)).val();
						// 	dishqty=$('#additionalQty'+(i-1)).val();
						// 	dishnote=$('#additionalNotes'+(i-1)).val();
							// var table = document.getElementById("cartTable");
							// for (var r = 0,n=table.rows.length; r <n; r++) {		
								 
						 //        	if(dish==parseInt(table.rows[r].cells[4].innerText)){
						        		
						 //    		document.getElementById("cartTable").deleteRow(r);
				   //   					addCtr=addCtr-1;
							// 			//alert(check);
										
						 //        	}
								
						 //    }
				     		
							// if(dishid==dish){
							// 	check=i;
							// 	alert(check);
							// 	document.getElementById("cartTable").deleteRow(check);
				   //   			addCtr=addCtr-1;
							// }

						// }
						if(qty>0){
							var table = document.getElementById("cartTable");
						    var row = table.insertRow(0);
						    var cell1 = row.insertCell(0);
						    var cell2 = row.insertCell(1);
							var cell3 = row.insertCell(2);
							var cell4 = row.insertCell(3);
							var cell5 = row.insertCell(4);
							var cell6 = row.insertCell(5);
							var cell7 = row.insertCell(6);
														
							cell1.innerHTML = '<h6>Add-On &nbsp |</h6><img id="cartImg" src="" width="80px" height="60px">';
							document.getElementById("cartImg").src="{!! asset('img/'.'"+ dishImage +"')!!}";
							cell2.innerHTML = '<h6><b>'+dishName+'</b></h6><small><label id="cartDishes"><i>Quantity: '+qty+'<br/>Price: '+price+'</i></label></small>';
						    cell3.innerHTML = '<h6><b>'+tp+'</b></h6>';
						    cell4.innerHTML = '<button id ="btnRemove" type="button" class="btn btn-danger btn-sm pull-right " onclick="deleteRowFood(this)">&times</button>';
							cell5.innerHTML = '<input type="text" id="additionalDish'+addCtr+'" value="'+dish+'" hidden><h1 style="display:none">'+dish+'</h1>';
							cell6.innerHTML = '<input type="text" id="additionalQty'+addCtr+'" value="'+qty+'" hidden>';
							cell7.innerHTML = '<input type="text" id="additionalNotes'+addCtr+'" value="'+notes+'" hidden>';
				

							var table = document.getElementById('cartTable');
					       	var subt =0;
						        for (var r = 0, n = table.rows.length; r < n; r++) {
						            subt =subt+parseFloat(table.rows[r].cells[2].innerText);
						        }
							$subt=subt;
				    		document.getElementById('subtot').innerHTML='<h3 class="pull-left">Subtotal:   <b>'+subt+'</b></h3> ';
				    		selectedOption.removeChild([selectedOption.selectedIndex]);
						}
						else{
							
						}						
						},
						error: function(result){
							alert('error');
						}
				});
		 		
 			}
 			function comPrice(id){
 					var p=$('#addprice').val();
 					var qty=$('#qty'+id).val();
 					var tp;
 					tp=p*qty;
 					$('#price'+id).val(tp);
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
				    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';

				    // console.log(row);
			}
			// function tabDate(t){
			// 		document.getElementById('subtot').innerHTML='<h4 class="pull-left">  <b></b></h3> ';	
			// }
			// function tabCart(t){
			// 		var table = document.getElementById('cartTable');
		    //        	var subt =0;
			// 	        for (var r = 0, n = table.rows.length; r < n; r++) {
			// 	            subt =subt+parseFloat(table.rows[r].cells[2].innerText);
			// 	        }
			// 	    // alert(subt);
			// 	    $subt=subt;
			// 	    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';
			// }
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
				    document.getElementById('subtot').innerHTML='<h4 class="pull-left">Subtotal:   <b>'+subt+'</b></h4> ';
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
						var servIDs = $("#addServiceAvailed").val().split(',');	
						var equipIDs = $("#addEquipmentAvailed").val().split(',');
						var empIDs = $("#addEmployeeEmployed").val().split(',');
						var addDishID = [];
						var addDishQty = [];
						var addDishNotes = [];
						var dishAvailedIDs = [];
						var ptIDs = $("#ptids").val();
						var pmIDs = $("#pmids").val();
						for (var i = 1; i <= addCtr; i++){
							addDishID.push($("#additionalDish"+i+"").val());
							addDishQty.push($("#additionalQty"+i+"").val());
							addDishNotes.push($("#additionalNotes"+i+"").val());
						}
						
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
									    billAdd: homeAdds,
									    emailAdd: emailAdds,
									    telNum: telNums,
									    cellNum: cellNums,
									    dob: dobs,
									    addContactID: addContactIDs,
									    conPerson: conPersons,
									    conNum: conNums,
										addReservationID: addReservationIDs,
								       	addPackID: addPackIDs,
						            	dishID: dishIDs,
						            	servID: servIDs,
						            	equipID: equipIDs,
						            	empID: empIDs,
						            	addDishID: addDishID,
						            	addDishQty: addDishQty,
						            	addDishNotes: addDishNotes,
						            	
					         		},
					                success: function(data){
						            	alert("Success");
										       
										window.location.href = "UserReservationPage";
					                },
					                error: function(xhr){
						            	alert("Error");
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
					 		$(document).ready(function() {
					 			//alert(datee);
								// alert(start);
								// alert(end);
								//alert(ctr);
								// alert(events);
								$('#calendar').fullCalendar({
									header: {	
										left: '',						
										center: 'title',
										right: '',
									},
									footer: {			
										left: 'prev,next today'
									},
									events: events,
									displayEventTime: false,
									theme:true

										
													
								});
								$('.fc-toolbar').find('.fc-button-group').addClass('btn-xs btn-group');
								$('.fc-toolbar').find('.ui-button').addClass('btn btn-info btn-fill');
								$('.fc-toolbar').find('.fc-prev-button').html($('<span />').attr('class', 'ti-angle-left'));
								$('.fc-toolbar').find('.fc-next-button').html($('<span />').attr('class', 'ti-angle-right'));
							});							
						},
						error: function(result){
							alert('error');
						}
		});
 		</script>

 		<script src="/multi/multi-step-modal.js"></script>
		
		<script>
			sendEvent = function(sel, step) {
		    	$(sel).trigger('next.m.' + step);
			}
		</script>

@endsection
