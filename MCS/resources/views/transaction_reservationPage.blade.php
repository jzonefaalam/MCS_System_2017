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
                    <span class="label label-success">Not Available</span>
                  <?php endif ?>
                  <?php if (($reservationData->reservationStatus)==1): ?>
                    <span class="label label-success">Confirmed</span>
                  <?php endif ?>
                  <?php if (($reservationData->reservationStatus)==2): ?>
                    <span class="label label-success">Not Fully Paid</span>
                  <?php endif ?>
                  </td>
                </tr>
              @endforeach
                </tbody>
              </table>
              </div>
            </div>
          </div>

          <!-- Update Modal -->
            <div class="modal fade" id="detailModal" style="width:100%;">
            <div class="modal-dialog" style="width:70%; margin-top:5%; margin-left:17%;">
            <div class="modal-content">
            <div class="modal-header" style="width:100%;" >
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Update Reservation</h4>
            </div>
            <div class="modal-body" style="width:100%;">
              <div>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a  href="#tab_1" data-toggle="tab">Reservation Info</a></li>
                  <li class=""><a href="#tab_2" data-toggle="tab">Date & Time </a></li>
                  <li class=""><a href="#tab_3" data-toggle="tab">Package & Menu </a></li>
                  <li class=""><a href="#tab_4" data-toggle="tab">Equipment, Services & Staff </a></li>
                  <li class=""><a href="#tab_5" data-toggle="tab">Confirmation </a></li>
                </ul>
                <div class="tab-content">
                  <!-- Reservation Info Tab -->
                  <div class="tab-pane active" id="tab_1">
                    <form  id="editReservationForm" role="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-sm-6">
                    {!! csrf_field() !!}

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Reservation ID</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    </div>
                    <input type="text" class="form-control" name="editReservationID" id="editReservationID" required readonly="">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label"> Event Name</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    </div>
                    <input type="text" class="form-control" name="editEventName" id="editEventName" required readonly="">
                    </div>
                    </div>
                    </div>

                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                      <label class="col-sm-4 control-label">Customer Name</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <div class="input-group-addon">
                      </div>
                      <input type="text" class="form-control" name="editCustomerName" id="editCustomerName" required>
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Contact Number</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <div class="input-group-addon">
                      </div>
                      <input type="text" class="form-control" name="editContactNumber" id="editContactNumber" required>
                      </div>
                      </div>
                      </div>
                    </div>
                    <!-- End Column -->

                    </div>
                    <!-- End Row -->

                    <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                    </div>
                    </form>
                  </div>
                  <!-- End Reservation Info Tab -->

                  <!-- Date & Time Tab -->
                  <div class="tab-pane active" id="tab_2">
                    <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentPage" class="form-horizontal editEquipmentValidator" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="row">
                      <div class="col-sm-6">

                        <br>
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Date</label>
                        <div class="col-sm-6">
                        <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="datepicker">
                        </div>
                        </div>
                        </div>

                        <div class="bootstrap-timepicker">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Start Time</label>
                        <div class="col-sm-6">
                        <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control timepicker">
                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="bootstrap-timepicker">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">End Time</label>
                        <div class="col-sm-6">
                        <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control timepicker">
                        </div>
                        </div>
                        </div>
                        </div>

                      </div>
                      <!-- End Column -->

                      <div class="col-sm-6">
                        <div class="box">
                          <div class="box-body">
                            <div id="calendar"></div>
                          </div>
                        </div>
                      </div>
                      <!-- End Column -->
                      </div>
                      <!-- End Row -->
                    <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                    </div>

                    </form>
                  </div>
                  <!-- End Reservation Info Tab -->

                  <!-- Package & Menu Info Tab -->
                  <div class="tab-pane active" id="tab_3">
                    <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentPage" class="form-horizontal editEquipmentValidator" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    <div class="row">
                      <div class="col-sm-6"> 
                        <div class="form-group" style="display: none;">
                        <label class="col-sm-4 control-label">Equipment ID</label>
                        <div class="col-sm-6">
                        <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="editEquipmentID" id="editEquipmentID" readonly="">
                        </div>
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-4 control-label">Package Name</label>
                        <div class="col-sm-6">
                        <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="editEquipmentName" id="editEquipmentName" required>
                        </div>
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-4 control-label"> Description</label>
                        <div class="col-sm-6">
                        <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                        </div>
                        <textarea type="text" required class="form-control" name="editEquipmentDescription" id="editEquipmentDescription"></textarea>
                        </div>
                        </div>
                        </div>
                      </div>
                      <!-- End Column -->

                      <div class="col-sm-6">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Courses</label>
                        <div class="col-sm-6">
                        <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="addDishTypeInclusion[]" style="width: 100%;">
                        </select>
                        </div>
                        </div>
                      </div>
                      <!-- End Column -->
                      </div>
                      <!-- End Row -->

                    <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                    </div>

                    </form>
                  </div>
                  <!-- End Reservation Tab -->

                  <!-- Equipment, Service & Staff Tab -->
                  <div class="tab-pane active" id="tab_4">
                    <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentPage" class="form-horizontal editEquipmentValidator" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Equipment</label>
                        <div class="col-sm-6">
                        <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="addDishTypeInclusion[]" style="width: 100%;">
                        </select>
                        </div>
                        </div>
                      </div>
                      <!-- End Column -->

                      <div class="col-sm-6">
                        <div class="form-group">
                        <label class="col-sm-4 control-label">Services & Staff</label>
                        <div class="col-sm-6">
                        <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="addDishTypeInclusion[]" style="width: 100%;">
                        </select>
                        </div>
                        </div>
                      </div>
                      <!-- End Column -->
                    </div>

                    <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                    </div>

                    </form>
                  </div>
                  <!-- End Reservation Info Tab -->

                  <!-- Confirmation Tab -->
                  <div class="tab-pane active" id="tab_5">
                    <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentPage" class="form-horizontal editEquipmentValidator" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    
                    <div class="box">
                      <div class="box-body">
                          asdasd
                      </div>
                    </div>
                    <!-- End Box -->

                    <div style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                    <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                    </div>

                    </form>
                  </div>
                  <!-- End Reservation Info Tab -->

                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
              
            </div>
            </div>
            </div>
                <!-- End Update Modal -->     
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
        $('#editReservationID').val(reservationIDVar);
        $('#editCustomerName').val(reservationCustomerNameVar);
        $('#editEventName').val(reservationEventNameVar);
        $("#detailModal").modal("show");
        } );
    $('#datepicker').datepicker({
      autoclose: true
    });
    //Timepicker
    $(".timepicker").timepicker({
      showInputs: true
    });
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