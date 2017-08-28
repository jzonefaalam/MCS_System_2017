<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Calendar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('LTE/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/skins/_all-skins.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link href="{{ asset('LTE/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('LTE/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media="print" />
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
    <header class="main-header">
    <!-- Logo -->
    <a href="../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MCS</b>  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <a style="text-align:center;" class="pull-right" href="/Logout">  Logout</a>
    </nav>
  </header>
      <!-- Left side column. contains the logo and sidebar -->
     <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size: 20px">
            
            <li class="active">
              <a href="#">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Maintenance</span>
                <span class="pull-right-container">
                  <i class="fa fa-caret-right pull-right"></i>
                </span>
              </a>
                <ul class="treeview-menu">
                  <li class="active treeview">
                    <a href="Maintenance/DishPage"><i class="fa fa-circle-o"></i> Dish
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="/DishPage"><i class="fa fa-square-o"></i> Dish List</a></li>
                      <li><a href="/DishTypePage"><i class="fa fa-square-o"></i> Dish Type</a></li>
                    </ul>
                  </li>
                  <li class="active treeview">
                    <a href="/EmployeePage"><i class="fa fa-circle-o"></i> Employee
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="/EmployeePage"><i class="fa fa-square-o"></i> Employee List</a></li>
                      <li><a href="/EmployeeTypePage"><i class="fa fa-square-o"></i> Employee Type</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="/EquipmentPage"><i class="fa fa-circle-o"></i> Equipment
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="/EquipmentPage"><i class="fa fa-square-o"></i> Equipment List</a></li>
                      <li><a href="/EquipmentTypePage"><i class="fa fa-square-o"></i> Equipment Type</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="/EventPage"><i class="fa fa-circle-o"></i> Event</a>
                  </li>
                  <li>
                    <a href="/LocationPage"><i class="fa fa-circle-o"></i> Location</a>
                  </li>
                  <li>
                    <a href="/PackagePage"><i class="fa fa-circle-o"></i> Packages</a>
                  </li>
                  <li>
                    <a href="/ServicePage"><i class="fa fa-circle-o"></i> Service
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li>
                        <a href="/ServicePage"><i class="fa fa-square-o"></i> Service List</a>
                      </li>
                      <li>
                        <a href="/ServiceTypePage"><i class="fa fa-square-o"></i> Service Type</a>
                      </li>
                    </ul>
                  </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="/SchedulePage">
                <i class="fa fa-calendar"></i> <span>Schedule</span>
              </a>
            </li>

            <li class="treeview">
              <a href="/ReservationPage">
                <i class="fa fa-file-text-o"></i> <span>Reservation</span>
              </a>
            </li>

            <li class="treeview">
              <a href="/InventoryDishPage">
                <i class="fa fa-book"></i>  <span>Inventory</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/InventoryEquipmentPage"><i class="fa fa-square-o"></i> Equipment</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text"></i> <span>Reports</span>
              </a>  
            </li>

          </ul>
        </section>
      <!-- /.sidebar -->
      </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calendar
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
               <div class="external-event bg-green">Not Available/Holiday</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>


            <!-- Update Modal -->
            <form id="scheduleForm">
            <div class="modal fade" id="detailModal" style="width:100%;">
            <div class="modal-dialog" style="width:70%; margin-top:5%; margin-left:17%;">
            <div class="modal-content">
            <div class="modal-header" style="width:100%;" >
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Update Reservation</h4>
            </div>
            <div class="modal-body" style="width:100%;">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="box">
                        <div class="box-header">
                          <div class="row">
                            <div class="col-sm-6">
                              <h4><strong>Customer Details</strong></h4>
                            </div>
                            <div class="col-sm-6" id="contactNumber">
                              
                            </div>
                          </div>
                        </div>
                        <div class="box-body">
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
                      <div class="box">
                        <div class="box-header">
                          <h4><strong>Event Details</strong></h4>
                        </div>
                        <div class="box-body">
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
                  <div class="box">
                    <div class="box-body">
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
                            <div class="box">
                              <div class="box-header">
                                <h4><strong>Package Details</strong></h4>
                              </div>
                              <div class="box-body">
                                <div>
                                  <label>Package Name</label>
                                  <br>
                                  <div> 
                                    <select class="form-control" name="editPackage" id="editPackage">
                                    @foreach($packageData as $packageData)
                                    <option value="{{ $packageData->packageID }}">{{ $packageData->packageName }} </option>
                                    @endforeach
                                    </select>
                                  </div>
                                </div>
                                  <br>
                                  <h3><strong> Package Inclusions </strong></h3>
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
                            <div class="box">
                              <div class="box-header">
                                <h4><strong>Additional Food Details</strong></h4>
                              </div>
                              <div class="box-body">
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
                            <div class="box">
                              <div class="box-header">
                                <h4><strong>Additional Equipment Details</strong></h4>
                              </div>
                              <div class="box-body">
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
                            <div class="box">
                              <div class="box-header">
                                <h4><strong>Additional Service Details</strong></h4>
                              </div>
                              <div class="box-body">
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
            <div class="modal-footer" style="margin-left:50%">
              <a class="btn btn-app" style="display:none;">
                  <i class="fa fa-save"></i> APPROVE
              </a>
              <a style="margin-left:50%" class="btn btn-app" type="submit" id="approveBtn" name="approveBtn">
                  <i class="fa fa-check" ></i> APPROVE
              </a>
              <a class="btn btn-app" data-target="#addPackageModal" data-toggle="modal">
                  <i class="fa fa-times"></i> DENY
              </a>
            </div>
            </div>
            </div>
            </div>
            </form>
                <!-- End Update Modal -->     
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('LTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('LTE/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('LTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('LTE/plugins/fastclick/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('LTE/dist/js/app.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('LTE/dist/js/demo.js') }}"></script>
<!-- Full Calendar -->
    <script src="{{ asset('LTE/fullcalendar/lib/moment.min.js')}}"></script>
    <!-- <script src="{{ asset('LTE/fullcalendar/lib/jquery.min.js')}}"></script> -->
    <script src="{{ asset('LTE/fullcalendar/fullcalendar.min.js')}}"'></script>
    <script src="{{ asset('LTE/fullcalendar/gcal.min.js')}}"></script>
<!-- Page specific script -->

<script>

    //if submit button is clicked
    $("#approveBtn").click(function(e){
        var randomID = 1;
        $.ajax({
          url:  "/ReservationEmail",
          type: "POST",
            beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');
              if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          data: {
             id: randomID,
            '_token': $('#token').val()
          },
          success: function(data){
            alert('An Email was sent to the customer.');
            window.location.href = "ReservationPage";      
          },
          error: function(xhr)
          {
          alert($.parseJSON(xhr.responseText)['error']['message']);
          }                  
        });
      }); 
</script> 

<script>
$(function () {
  $(document).on("hidden.bs.modal", "#detailModal", function () {
      $(this).find("#additionalDishDiv").html(""); // Just clear the contents.
      $(this).find("#additionalServiceDiv").html(""); // Just clear the contents.
      $(this).find("#additionalEquipmentDiv").html(""); // Just clear the contents.
      $(this).find("#dishInclusion").html(""); // Just clear the contents.
      $(this).find("#serviceInclusion").html(""); // Just clear the contents.
      $(this).find("#equipmentInclusion").html(""); // Just clear the contents.
      $(this).find("#employeeInclusion").html(""); // Just clear the contents.
    });
});
</script>

<script>


      var eventDate=[];
      var eventStart=[];
      var eventEnd=[];
      var eventLocation=[];
      var eventGuestCount=[];
      var rsvtn=1;
      var events=[];
      var eventName=[];
      var dateReservationId=[];
      var customerName=[];
      var customerHomeAddress=[];
      var customerEmailAddress=[];
      var customerCellNumber=[];
      var customerBirthDate=[];
      var eventPackageName=[];
      var eventPackageId=[];
      $.ajax({
            url: '/RetrieveSchedule',
            type: 'GET',
            data: {
               asd: rsvtn
              },
              success: function(data){
                for(var i=0;i<data['rsvtn'].length;i++){
                  eventName.push([data['rsvtn'][i]['eventName']]);
                  eventDate.push([data['rsvtn'][i]['eventDate']]);  
                  eventStart.push([data['rsvtn'][i]['eventTime']]);  
                  eventEnd.push([data['rsvtn'][i]['endTime']]);
                  eventLocation.push([data['rsvtn'][i]['eventLocation']]);
                  eventGuestCount.push([data['rsvtn'][i]['guestCount']]);
                  dateReservationId.push([data['rsvtn'][i]['reservationID']]);
                  customerName.push([data['rsvtn'][i]['fullName']]);
                  customerHomeAddress.push([data['rsvtn'][i]['homeAddress']]);
                  customerEmailAddress.push([data['rsvtn'][i]['emailAddress']]);
                  customerCellNumber.push([data['rsvtn'][i]['cellNum']]);
                  customerBirthDate.push([data['rsvtn'][i]['dateOfBirth']]);
                  eventPackageName.push([data['rsvtn'][i]['packageName']]);
                  eventPackageId.push([data['rsvtn'][i]['packageID']]);
                } 
                // alert(dateReservationId);
                for(var i=0;i<data['rsvtn'].length;i++){
                  events.push({
                    title: 'Reserved'+"\r\nEvent: "+eventName[i],  
                    start: eventDate[i]+'T'+eventStart[i], 
                    end: eventDate[i]+'T'+eventEnd[i], 
                    id: dateReservationId[i],
                    customerNameEvent: customerName[i],
                    customerHomeAddressEvent: customerHomeAddress[i],
                    customerEmailAddressEvent: customerEmailAddress[i],
                    customerCellNumberEvent: customerCellNumber[i],
                    customerBirthDateEvent: customerBirthDate[i],
                    guestCountEvent: eventGuestCount[i],
                    locationEvent: eventLocation[i],
                    nameEvent: eventName[i],
                    dateEvent: eventDate[i],
                    startTimeEvent: eventStart[i],
                    endTimeEvent: eventEnd[i],
                    packageNameEvent: eventPackageName[i],
                    packageIdEvent: eventPackageId[i]
                  })
                }

                $('#calendar').fullCalendar({
                header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,listWeek'
                },
                events: events,
                eventRender: function(event, element) {
                    content: 
                      event.id,
                      event.customerNameEvent,
                      event.customerHomeAddressEvent,
                      event.customerEmailAddressEvent,
                      event.customerCellNumberEvent,
                      event.customerBirthDateEvent,
                      event.guestCountEvent,
                      event.locationEvent,
                      event.nameEvent,
                      event.dateEvent
                      event.startTimeEvent,
                      event.endTimeEvent,
                      event.packageNameEvent,
                      event.packageIdEvent
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                droppable: true,


                eventClick: function(calEvent, jsEvent, view) {
                  document.getElementById('scheduleForm').reset();
                  $(this).find("#scheduleForm").html("");
                  document.getElementById('contactNumber').innerHTML = '<h2 class="pull-right"><strong> #'+calEvent.customerCellNumberEvent+'</strong></h2>';
                  $('#editCustomerName').val(calEvent.customerNameEvent);
                  $('#editContactNumber').val(calEvent.customerCellNumberEvent);
                  $('#editEmailAddress').val(calEvent.customerEmailAddressEvent);
                  $('#editHomeAddress').val(calEvent.customerHomeAddressEvent);
                  $('#editDateOfBirth').val(calEvent.customerBirthDateEvent);
                  $('#editEventName').val(calEvent.nameEvent);
                  $('#editEventDate').val(calEvent.dateEvent);
                  $('#editEventLocation').val(calEvent.locationEvent);
                  $('#editEventGuestCount').val(calEvent.guestCountEvent);
                  $('#editEventStartTime').val(calEvent.startTimeEvent);
                  $('#editEventEndTime').val(calEvent.endTimeEvent);
                  var opty = document.getElementById('editPackage').options;
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==(calEvent.packageIdEvent)){
                      $('#editPackage').val(calEvent.packageIdEvent);
                      break;
                    }
                  }
                  $.ajax({

                    type: "GET",
                    url:  "/RetrievePackageInclusion",
                    data: 
                    {     
                      sdid: calEvent.packageIdEvent,
                      sendReservationID: calEvent.id
                    },
                    success: function(data){

                      // for (var i = 0; i < data['ss'].length; i++) {
                      //   document.getElementById('dishInclusion').innerHTML += '<select id="dishInclusion'+data['ss'][i]['dishID']+'"></select><br>';
                      // }
                      // for (var i = 0; i < data['ss'].length; i++) {
                      //   var select = document.getElementById('dishInclusion'+data['ss'][i]['dishID']);
                      //   for (var x = 0; x < data['dishTypeData'].length; x++) {
                      //     if(data['dishTypeData'][i]['dishTypeID']==data['dishData'][x]['dishTypeID']){
                      //       select.options[select.options.length] = new Option(data['dishData'][x]['dishName'],'value1');
                      //   }
                      // }
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
                  }
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
</body>
</html>
