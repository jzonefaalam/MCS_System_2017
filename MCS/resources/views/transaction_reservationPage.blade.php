@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="/DishPage"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-cutlery"></i>Dish</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">

        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Reservation List</h2>
              </div>
              <div class="col-md-12">
                <table id="reservationListTable" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                  <th>Reservation ID</th>
                  <th>Event Name</th>
                  <th>Customer Name</th>
                  <th width="130 px">Date</th>
                  <th>Package</th>
                  <th>Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                  <th style="display:none">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservationData as $reservationData)
                <tr>
                  <td>{{ $reservationData->reservationID }}</td>
                  <td>{{ $reservationData->eventName }}</td>
                  <td>{{ $reservationData->fullName }}</td>
                  <td>{{ $reservationData->eventDate }}</td>
                  <td>{{ $reservationData->packageName }}</td>
                  <td>
                  <?php if (($reservationData->reservationStatus)==0): ?>
                    <span class="label label-warning">Not Available</span>
                  <?php endif ?>
                  <?php if (($reservationData->reservationStatus)==1): ?>
                    <span class="label label-success">Confirmed</span>
                  <?php endif ?>
                  <?php if (($reservationData->reservationStatus)==2): ?>
                    <span class="label label-warning">Denied</span>
                  <?php endif ?>
                  </td>
                  <td style="display:none">{{ $reservationData->homeAddress }} </td>
                  <td style="display:none">{{ $reservationData->billingAddress }} </td>
                  <td style="display:none">{{ $reservationData->emailAddress }} </td>
                  <td style="display:none">{{ $reservationData->cellNum }} </td>
                  <td style="display:none">{{ $reservationData->telNum }} </td>
                  <td style="display:none">{{ $reservationData->dateOfBirth }} </td>
                  <td style="display:none">{{ $reservationData->packageCost }} </td>
                  <td style="display:none">{{ $reservationData->eventTime }} </td>
                  <td style="display:none">{{ $reservationData->endTime }} </td>
                  <td style="display:none">{{ $reservationData->eventLocation }} </td>
                  <td style="display:none">{{ $reservationData->guestCount }} </td>
                  <td style="display:none">{{ $reservationData->packageID }} </td>
                  <td style="display:none">{{ $reservationData->eventID }} </td>
                </tr>
              @endforeach
                </tbody>
              </table>
              </div>
            </div>
          </div>

           <!-- Update Modal -->
            <form id="scheduleForm" method="POST">
            <div class="modal fade" id="detailModal" style="width:100%;">
            <div class="modal-dialog" style="width:70%; margin-top:5%; margin-left:17%;">
            <div class="modal-content">
            <div class="modal-header" style="width:100%;" >
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Update Reservation</h4>
            </div>
            <div class="modal-body" style="width:100%;">
              <div>
                <div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div>
                        <div>
                          <div>
                            <h4><strong><center>Customer Details</center></strong></h4>
                          </div>
                          <div class="row">
                            
                            <div class="col-sm-6" id="contactNumber">
                              
                            </div>
                            <div class="col-sm-6" style="display:none;">
                              <input type="text"  name="reservationNumber" id="reservationNumber" >
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="row">
                            <div class="col-sm-6">
                              <label>Customer Name</label>
                              <br>
                              <div>
                                <input type="text"  name="editCustomerName" id="editCustomerName" column="20" required >
                              </div>
                              <label>Home Address</label>
                              <br>
                              <div>
                                <input type="text" " name="editHomeAddress" id="editHomeAddress" required >
                              </div>
                              <label>Email Address</label>
                              <br>
                              <div>
                                <input type="text"  name="editEmailAddress" id="editEmailAddress" required >
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label>Contact Number</label>
                              <br>
                              <div>
                                <input type="text"  name="editContactNumber" id="editContactNumber" required >
                              </div>
                              <label>Date of Birth</label>
                              <br>
                              <div>
                                <input type="text" name="editDateOfBirth" id="editDateOfBirth" required >
                              </div>
                            </div>
                          </div>
                          <!-- End Row -->
                        </div>
                      </div>
                      <hr>
                      <div>
                        <div >
                          <h4><strong><center>Event Details</center></strong></h4>
                        </div>
                        <div >
                           <div class="row">
                            <div class="col-sm-6">
                              <label>Event Name</label>
                              <br>
                              <div>
                                <input type="text"  name="editEventName" id="editEventName" column="20" required >
                              </div>
                              <label>Event Date</label>
                              <br>
                              <div>
                                <input type="text" " name="editEventDate" id="editEventDate" required >
                              </div>
                              <label>Event Location</label>
                              <br>
                              <div>
                                <input type="text"  name="editEventLocation" id="editEventLocation" required >
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label>Number of Guests</label>
                              <br>
                              <div>
                                <input type="text"  name="editEventGuestCount" id="editEventGuestCount" required >
                              </div>
                              <label>Start Time</label>
                              <br>
                              <div>
                                <input type="text" name="editEventStartTime" id="editEventStartTime" required >
                              </div>
                              <label>End Time</label>
                              <br>
                              <div>
                                <input type="text"  name="editEventEndTime" id="editEventEndTime" required >
                              </div>
                            </div>
                          </div>
                          <!-- End Row -->
                        </div>
                      </div>
                      <!-- End Box -->
                    </div>
                    <!-- End Column -->
                  </div>
                  <!-- End Row -->
                  <hr>
                  <div >
                    <div>
                      <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                          <li ><a href="#tab_2" data-toggle="tab">Package </a></li>
                          <li ><a href="#tab_3" data-toggle="tab">Additional Food </a></li>
                          <li ><a href="#tab_4" data-toggle="tab">Additional Equipment </a></li>
                          <li ><a href="#tab_5" data-toggle="tab">Additional Service & Staff </a></li>
                        </ul>
                        <div class="tab-content">

                          <!-- Package Tab -->
                          <div class="tab-pane active" id="tab_2">
                            <div>
                              <div>
                                <h4><strong><center>Package Details</center></strong></h4>
                              </div>
                              <div>
                                <div>
                                  <label>Package Name</label>
                                  <br>
                                  <div> 
                                    <select class="form-control" name="editPackage" id="editPackage">
                                    @foreach($addReservationData as $packageData)
                                    <option value="{{ $packageData->packageID }}">{{ $packageData->packageName }} </option>
                                    @endforeach
                                    </select>
                                  </div>
                                </div>
                                  <br>
                                  <h3><strong><center>Package Inclusions</center></strong></h3>
                                 <div class="row">
                                  <div class="col-sm-3">
                                  <h4> Dish Included </h4>
                                    <div id="dishInclusion">
                                      
                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                  <h4> Equipment Included </h4>
                                    <div id="equipmentInclusion">

                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                  <h4> Services & Staff Included </h4>
                                    <div id="serviceInclusion">

                                    </div>
                                  </div>
                                  <div class="col-sm-3">
                                  <h4> Services & Staff Included </h4>
                                    <div id="employeeInclusion">

                                    </div>
                                  </div>
                                </div>
                                <!-- End Row -->
                              </div>
                            </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Info Tab -->

                          <!-- Additional Food Tab -->
                          <div class="tab-pane active" id="tab_3">
                            <div>
                              <div>
                                <h4><strong><center>Additional Food Details</center></strong></h4>
                              </div>
                              <div>
                              <h4> Lists </h4>
                                <div id="additionalDishDiv">

                                </div>
                              </div>
                            </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Tab -->

                              {!! csrf_field() !!}
                          <input type="hidden" id="token" value="{{ csrf_token() }}">
                          <!-- Additional Equipment Tab -->
                          <div class="tab-pane active" id="tab_4">
                            <div>
                              <div>
                                <h4><strong><center>Additional Equipment Details</center></strong></h4>
                              </div>
                              <div >
                                <h4> Lists </h4>
                                <div id="additionalEquipmentDiv">

                                </div>
                              </div>
                            </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Info Tab -->

                          <!-- Additional Service & Staff Tab -->
                          <div class="tab-pane active" id="tab_5">
                            <div >
                              <div >
                                <h4><strong><center>Additional Service Details</center></strong></h4>
                              </div>
                              <div >
                                <h4> Lists </h4>
                                <div id="additionalServiceDiv">

                                </div>
                              </div>
                            </div>
                            <!-- End Box -->
                          </div>
                          <!-- End Reservation Info Tab -->

                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div>
                    </div>
                  </div>
                  </div>
                  <!-- nav-tabs-custom -->
            </div>
            <div class="modal-footer" >
            <a style="display:none;" data-target="#sendApproveEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
                  <i class="fa fa-check" ></i> APPROVE
              </a>
              <a  data-target="#sendApproveEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
                  <i class="fa fa-check" ></i> APPROVE
              </a>
              <a data-target="#sendDenyEmailModal" data-toggle="modal" onclick="getReservation(document.getElementById('reservationNumber').value);" class="btn btn-app" type="submit">
                  <i class="fa fa-times" ></i> DENY
              </a>
            </div>
            </div>
            </div>
            </div>
            </form>
                <!-- End Update Modal -->  

                      <!-- Delete service Modal-->
                      <form role="form" method="POST" action="ApproveReservationEmail" class="form-horizontal">
                      <div class="modal fade" id="sendApproveEmailModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                             <div class="modal-body">
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Reservation ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="approveReservationId" id="approveReservationId" readonly="">
                                  </div>
                                </div>
                                {!! csrf_field() !!}
                                <div>
                                  <h5> Are you sure you want to approve this reservation? </h5>
                                </div>
                                <div style="text-align: center;">
                                  <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- End Modals-->

                      <!-- Delete service Modal-->
                      <form role="form" method="POST" action="DenyReservationEmail" class="form-horizontal">
                      <div class="modal fade" id="sendDenyEmailModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                             <div class="modal-body">
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Reservation ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="denyReservationId" id="denyReservationId" readonly="">
                                  </div>
                                </div>
                                {!! csrf_field() !!}
                                <div>
                                  <h5> Are you sure you want to deny this reservation? </h5>
                                </div>
                                <div style="text-align: center;">
                                  <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- End Modals-->
        </div>
          <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<!-- Full Calendar -->
<script src="{{ asset('LTE/fullcalendar/lib/moment.min.js')}}"></script>
<!-- <script src="{{ asset('LTE/fullcalendar/lib/jquery.min.js')}}"></script> -->
<script src="{{ asset('LTE/fullcalendar/fullcalendar.min.js')}}"'></script>
<script src="{{ asset('LTE/fullcalendar/gcal.min.js')}}"></script>
<!-- Page specific script -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>  
<script>
      function getReservation(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveReservationID",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#approveReservationId').val(data['ss'][0]['reservationID']);
                $('#denyReservationId').val(data['ss'][0]['reservationID']);
                },
                error: function(xhr)
                {
                    alert("mali");
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
      }

    </script>
<script>
      var datee=[];
      var start=[];
      var end=[];
      var rsvtn=1;
      var events=[];
      var eventName=[];
      $.ajax({
            url: '/RetrieveSchedule',
            type: 'GET',
            data: {
               asd: rsvtn
              },
              success: function(data){
                for(var i=0;i<data['rsvtn'].length;i++){
                  eventName.push([data['rsvtn'][i]['eventName']]);
                  datee.push([data['rsvtn'][i]['eventDate']]);  
                  start.push([data['rsvtn'][i]['eventTime']]);  
                  end.push([data['rsvtn'][i]['endTime']]);
                } 
                for(var i=0;i<data['rsvtn'].length;i++){
                  events.push({title: 'Reserved'+"\r\nEvent: "+eventName[i],  start : datee[i]+'T'+start[i], end : datee[i]+'T'+end[i]})
                 
                }

                $('#calendar').fullCalendar({
                header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,listWeek'
                },
                events: events,
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                droppable: true


                });               
              },
              error: function(result){
                alert('Error! ');
              }
      });
      // $(document).ready(function() {
      //   // alert(datee);
      //   // alert(start);
      //   // alert(end);
      //   //alert(ctr);
      //   // alert(events);
        
        
      // });
</script>
<script>
  $(function () {
    $('#reservationListTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });

  $(document).ready(function() {
    var table = $('#reservationListTable').DataTable();
     
    $('#reservationListTable tbody').on('dblclick', 'tr', function () {
        var data = table.row( this ).data();
        var reservationIDVar = data[0];
        var reservationEventNameVar = data[1];
        var reservationCustomerNameVar = data[2];
        var reservationDateVar = data[3];
        var reservationPackageVar = data[4];
        var customerHomeAddressVar = data[6];
        var customerBillingAddressVar = data[7];
        var customerEmailAddressVar = data[8];
        var customerCellNumVar = data[9];
        var customerTelNumVar = data[10];
        var customerDateOfBirthVar = data[11];
        var reservationPackageCostVar = data[12];
        var reservationEventTimeVar = data[13];
        var reservartionEndTimeVar = data[14];
        var reservationEventLocationVar = data[15];
        var reservationGuestCountVar = data[16];
        var reservationPackageID = data[17];
        var reservationEventID = data[18];
        $('#editReservationID').val(reservationIDVar);
        $('#editCustomerName').val(reservationCustomerNameVar);
        $('#editEventName').val(reservationEventNameVar);
        $('#reservationNumber').val(reservationIDVar);
        $('#editHomeAddress').val(customerHomeAddressVar);
        $('#editEmailAddress').val(customerEmailAddressVar);
        $('#editContactNumber').val(customerCellNumVar);
        $('#editDateOfBirth').val(customerDateOfBirthVar);
        $('#editEventName').val(reservationEventNameVar);
        $('#editEventDate').val(reservationDateVar);
        $('#editEventLocation').val(reservationEventLocationVar);
        $('#editEventGuestCount').val(reservationGuestCountVar);
        $('#editEventStartTime').val(reservationEventTimeVar);
        $('#editEventEndTime').val(reservartionEndTimeVar);
        var opty = document.getElementById('editPackage').options;
          for(var i =0; i<opty.length; i++){
            if(opty[i].value==(reservationPackageID)){
              $('#editPackage').val(reservationPackageID);
              break;
            }
          }
                  $.ajax({

                    type: "GET",
                    url:  "/RetrievePackageInclusion",
                    data: 
                    {     
                      sdid: reservationPackageID,
                      sendReservationID: reservationEventID
                    },
                    success: function(data){
                      for (var i = 0; i < data['ss'].length; i++) {
                        document.getElementById('dishInclusion').innerHTML += '<h6>'+data['ss'][i]['dishName']+'</h6>';
                      }
                      for (var i = 0; i < data['dd'].length; i++) {
                        document.getElementById('serviceInclusion').innerHTML += '<h6>'+data['dd'][i]['serviceName']+'</h6>';
                      }
                      for (var i = 0; i < data['ff'].length; i++) {
                        document.getElementById('equipmentInclusion').innerHTML += '<h6>'+data['ff'][i]['equipmentName']+'</h6>';
                      }
                      for (var i = 0; i < data['gg'].length; i++) {
                        document.getElementById('employeeInclusion').innerHTML += '<h6>'+data['gg'][i]['employeeTypeName']+'</h6>';
                      }
                      for (var i = 0; i < data['additionalDish'].length; i++) {
                        document.getElementById('additionalDishDiv').innerHTML += '<h6>'+data['additionalDish'][i]['dishName']+'</h6>';
                      }
                      for (var i = 0; i < data['additionalService'].length; i++) {
                        document.getElementById('additionalServiceDiv').innerHTML += '<h6>'+data['additionalService'][i]['serviceName']+'</h6>';
                      }
                      for (var i = 0; i < data['additionalEquipment'].length; i++) {
                        document.getElementById('additionalEquipmentDiv').innerHTML += '<h6>'+data['additionalEquipment'][i]['equipmentName']+'</h6>';
                      }
                      $("#detailModal").modal("show");     
                    },
                    error: function(xhr)
                    {
                      alert("mali");
                      alert($.parseJSON(xhr.responseText)['error']['message']);
                    }                
                  });
        } );
    // $('#datepicker').datepicker({
    //   autoclose: true
    // });
    // //Timepicker
    // $(".timepicker").timepicker({
    //   showInputs: true
    // });
} );
</script>


<script>
      function getReservationDetail(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveReservation",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editReservationID').val(data['ss'][0]['reservationID']);
                $('#editReservationDate').val(data['ss'][0]['eventDate']);
                var opty = document.getElementById('editReservationPackage').options;
                
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==data['ss'][0]['packageID']){
                    $('#editReservationPackage').val(data['ss'][0]['packageID']) ;
                    break;
                    }

                  }
                },
                error: function(xhr)
                {
                    alert("mali");
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
      }

    </script>


@endsection