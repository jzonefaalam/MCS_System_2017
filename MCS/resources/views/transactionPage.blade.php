@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style>
  .btn-space{
    margin-right: 5px;
  }
  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <ol class="breadcrumb">
        <li><a href="TransactionPage"><i class="fa fa-wrench"></i>Transaction</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-6">
              <h2>Transaction List</h2>
            </div>
            <div class="col-md-6">
              <a class="btn btn-app" href="#" style="float:right">
                <i class="fa fa-save"></i>Button
              </a>
            </div>
          </div>
        </div>
        <!-- /Header -->
        <div class="box-body">
          <table id="transactionTable" class="table table-bordered table-striped dataTable">
            <thead>
              <tr>
                <th>Transaction #</th>
                <th>Event Name</th>
                <th>Customer</th>
                <th>Payment</th>
                <th>Payment Status</th>
                <th>Event Status</th>
                <th style="display: none;">Event Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactionData as $transactionData)
              <tr>
                <td>{{ $transactionData->transactionID }}</td>
                <td>{{ $transactionData->eventName }}</td>
                <td>{{ $transactionData->fullName }}</td>
                <td>{{ $transactionData->totalFee }}</td>
                <td>{{ $transactionData->transactionStatus }}</td>
                <td>None</td>
                <td style="display: none;">{{ $transactionData->eventDate }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /Body -->
      </div>
      <!-- /Box -->
    </section>
    <!-- /Content -->
    <!-- Transaction Modal-->
    <form role="form" method="POST" action="#" class="form-horizontal">
      <div  class="modal fade" id="transactionModal">
        <!-- <div class="modal-dialog"> -->
        <div style="height: 80%; width: 80%; margin-top: 5%; margin-left: 12%;" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              Transaction Details
            </div>
            <!-- /Modal Header -->
            <div class="modal-body">
              {!! csrf_field() !!}
              <div name="customerDetails">
                <h4><strong>Customer & Event Details</strong></h4>
                <div class="row">
                  <div class="col-md-4">
                    <p>Customer Name: </p>
                    <p>Contact Number: </p>
                    <p>Event Name: </p>
                    <p>Event Location: </p>
                    <p>Number of Guests: </p>
                    <p>Availed Package: </p>
                    <p>Additional: </p>
                    <p>Total Fee: </p>
                    <p>Balance: </p>
                    <p>Payment Term: </p>
                    <p>Payment Status: </p>
                  </div>
                  <div class="col-md-6">
                    <p id="parCustomerName"></p>
                    <p id="parContactNumber"></p>
                    <p id="parEventName"></p>
                    <p id="parEventLocation"></p>
                    <p id="parNumberOfGuest"></p>
                    <p id="parAvailedPackage"></p>
                    <p id="parAdditionalItem"></p>
                    <p id="parTotalFee"></p>
                    <p id="parBalanceFee"></p>
                    <p id="parPaymentTerm"></p>
                    <p id="parPaymentStatus"></p>
                    <input type="text"  name="parTransactionId" id="parTransactionId" style="display: none;">
                  </div>
                </div>
              </div>
            </div>
            <!-- /Modal Body -->
            <div class="modal-footer">
              <a class="btn btn-app" data-dismiss="modal" href="#" style="float:right">
                <i class="fa fa-close"></i>Close
              </a>
              <a class="btn btn-app" href="#" style="float:right">
                <i class="fa fa-check"></i>Confirm Payment
              </a>
              <a class="btn btn-app" id="returnBtn" href="#" style="float:right;">
                <i class="fa fa-print"></i>Return Equipment
              </a>
              <a onclick="assignEquipment(document.getElementById('parTransactionId').value);" style="float:right;" class="btn btn-app" id="assignBtn">
                  <i class="fa fa-check" ></i> Assign Equipment
              </a>
              <a class="btn btn-app" href="#" style="float:right" onclick="getReservation(document.getElementById('parTransactionId').value);">
                <i class="fa fa-print"></i>Print
              </a>
            </div>
            <!-- /Modal Footer -->
          </div>
        </div>
      </div>
    </form>
    <!-- End Modals-->

    <!-- Transaction Modal-->
    <form role="form" method="POST" action="#" class="form-horizontal">
      <div  class="modal fade" id="assignEquipmentModal">
        <!-- <div class="modal-dialog"> -->
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              Assignment of Equipment
            </div>
            <!-- /Modal Header -->
            <div class="modal-body">
              {!! csrf_field() !!}
              <div>
                <table id="equipmentTbl" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Equipment Name</th>
                      <th>Quantity</th>
                      <th style="display: none;">Id</th>
                    </tr>
                  </thead>
                  <tbody id="equipmentTblBody">

                  </tbody>
                </table>
                <a class="btn btn-app" style="float:right">
                  <i class="fa fa-save"></i>Submit
                </a>
              </div>
            </div>
            <!-- /Modal Body -->
            <div class="modal-footer">
              
            </div>
            <!-- /Modal Footer -->
          </div>
        </div>
      </div>
    </form>
    <!-- End Modals--> 
  </div>
  <!-- /Content-wrapper -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

<script>
  $(function () {
    $('#transactionTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });

    $('#equipmentTbl').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
  });
</script>

<script>
  function assignEquipment(id){
    $('#transactionModal').modal('hide');
    $.ajax({
      type: "GET",
      url:  "/GetTransactionData",
      data: 
      {
        transacId: id
      },
      success: function(data){
        //Another Ajax for Equipment List
        var sendPackageId = data['transactionDetails'][0]['packageID'];
        var sendEventId = data['transactionDetails'][0]['eventID'];
        $.ajax({
          type: "GET",
          url:  "/RetrievePackageInclusion",
          data: 
          {
            sdid: sendPackageId,
            sendReservationID: sendEventId
          },
          success: function(data){
            
            var itemName;
            var itemQty;
            var qtyCounter;
            var nameCounter;
            var tblSDet = $('#equipmentTbl').DataTable();
            tblSDet.clear();
            tblSDet.draw(true);
            for (var i = 0; i < data['ff'].length; i++) {
              qtyCounter = "itemQty" + i;
              nameCounter = "itemName" + i;
              itemName = data['ff'][i]['equipmentName'];
              itemId = '<input  style="display: none;" type="text" id="' + nameCounter + '" value="' + data['ff'][i]['equipmentID'] +'"></input>';
              itemQty = '<input type="number" id="' + qtyCounter + '"></input>';
              // itemQty = document.createElement('input');
              // itemQty.type = 'number';
              // itemQty.name = 'myInput_' + i;
              // itemQty.id = 'myInput_' + i;
              tblSDet.row.add([
                itemName,
                itemQty,
                itemId
              ]).draw(true);
            }
            $('#assignEquipmentModal').modal('show');
          }, 
          error: function(xhr)
          {
            alert('ajax 2');
            alert($.parseJSON(xhr.responseText)['error']['message']);
          }                
        });
        //End of Ajax
      }, 
      error: function(xhr)
      {
        alert('ajax 1');
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function getReservation(id){
    var frame1 = $('<iframe />');
    frame1[0].name = "frame1";
    frame1.css({ "position": "absolute", "top": "-1000000px" });
    $("body").append(frame1);
    var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
    frameDoc.document.open();
    frameDoc.document.write('<html><head>');
    frameDoc.document.write('</head><body>');
    frameDoc.document.write('<style> .invoice-box{ max-width:800px; margin:auto; padding:30px; border:1px solid #eee; box-shadow:0 0 10px rgba(0, 0, 0, .15); font-size:16px; line-height:24px; font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif; color:#555; } .invoice-box table{ width:100%; line-height:inherit; text-align:left; } .invoice-box table td{ padding:5px; vertical-align:top; } .invoice-box table tr td:nth-child(2){ text-align:right; } .invoice-box table tr.top table td{ padding-bottom:20px; } .invoice-box table tr.top table td.title{ font-size:45px; line-height:45px; color:#333; } .invoice-box table tr.information table td{ padding-bottom:40px; } .invoice-box table tr.heading td{ background:#eee; border-bottom:1px solid #ddd; font-weight:bold; } .invoice-box table tr.details td{ padding-bottom:20px; } .invoice-box table tr.item td{ border-bottom:1px solid #eee; } .invoice-box table tr.item.last td{ border-bottom:none; } .invoice-box table tr.total td:nth-child(2){ border-top:2px solid #eee; font-weight:bold; } @media only screen and (max-width: 600px) { .invoice-box table tr.top table td{ width:100%; display:block; text-align:center; } .invoice-box table tr.information table td{ width:100%; display:block; text-align:center; } } </style>');
    frameDoc.document.write('<html><body> <div > <table cellpadding="0" cellspacing="0"> <tr class="top"> <td colspan="2">   ');
    frameDoc.document.write('<image src = "logo.png" align = "pullcenter"  width = "130" height = "100" style ="padding-left:10px"> ');
    frameDoc.document.write('<p align = "Center">Margareth Catering Services </br> ');
    frameDoc.document.write(' B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br> ');
    frameDoc.document.write(' 696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
    frameDoc.document.write(' margarethcateringservices@gmail.com </p></br></br>');
    frameDoc.document.write(' <p align= "right" style ="padding-right:16%">MM/DD/YYYY</p>');
    frameDoc.document.write(' <p align = "left" style = "padding-left:20%">');
    frameDoc.document.write(' Dear (client name),</br></br> ');
    frameDoc.document.write(' </br>We recieved your inquiry and we would like confirm the agreement made during the phone conversation.</br> ');
    frameDoc.document.write(' Thank you for making a reservation.');
    frameDoc.document.write('     Here is the full details of your reservation. Kindly check if all the information is correct.</br>');
    frameDoc.document.write(' </br></br></br>Event Date: ');
    frameDoc.document.write(' </br>Event Time: ');
    frameDoc.document.write(' </br>Event Name:');
    frameDoc.document.write(' </br>Package Availed:');
    frameDoc.document.write(' </br>Chosen Dish/Dishes: ');
    frameDoc.document.write(' </br>Number of Guest:');
    frameDoc.document.write(' </br>Add-ons:');
    frameDoc.document.write(' </br>Service Availed:');
    frameDoc.document.write(' </br>Location:</br>');
    frameDoc.document.write(' </br>As agreed upon the first payment will be made at (date) and the second payment will be at (date).</br>');
    frameDoc.document.write(' This letter will serve as our contract. For further question you can reach us in our phone number 696-4528</br>');
    frameDoc.document.write(' (+63) 928-297-2321 | (+63) 907-208-3331or you can email us at margarethcateringservices@gmail.com</br>');
    frameDoc.document.write(' </br></br></br>');
    frameDoc.document.write('</div></body></html>');
    frameDoc.document.close();
    setTimeout(function () {
      window.frames["frame1"].focus();
      window.frames["frame1"].print();
      frame1.remove();
    }, 500);
  }
</script>

<script>
  $(document).ready(function() {
    

    var table = $('#transactionTable').DataTable();
    $('#transactionTable tbody').on('dblclick', 'tr', function () {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!

      var yyyy = today.getFullYear();
      if(dd<10){
      dd='0'+dd;
      } 
      if(mm<10){
      mm='0'+mm;
      }
      var newDate = yyyy+'-'+mm+'-'+dd;
      var data = table.row( this ).data();
      var transactionId = data[0];
      var eventDate = data[6];
      var packageID;
      var eventID;
      if(newDate > eventDate){
        document.getElementById('returnBtn').style.display='block';
        document.getElementById('assignBtn').style.display='none';
      }
      if(newDate < eventDate){
        document.getElementById('returnBtn').style.display='none';
        document.getElementById('assignBtn').style.display='block';
      }
      $.ajax({
        type: "GET",
        url:  "/RetrieveTransaction",
        data: 
        {     
          getId: transactionId
        },
        success: function(data){
        $('#parTransactionId').val(transactionId);
        document.getElementById("parCustomerName").innerHTML = data['tdata'][0]['fullName'];
        document.getElementById("parContactNumber").innerHTML = data['tdata'][0]['cellNum'];
        document.getElementById("parEventName").innerHTML = data['tdata'][0]['eventName'];
        document.getElementById("parEventLocation").innerHTML = data['tdata'][0]['eventLocation'];
        document.getElementById("parAvailedPackage").innerHTML = data['tdata'][0]['packageName'];
        document.getElementById("parTotalFee").innerHTML = data['tdata'][0]['totalFee'];
        document.getElementById("parBalanceFee").innerHTML = "not yet available";
        document.getElementById("parPaymentTerm").innerHTML = data['tdata'][0]['paymentTermName'];
        if(data['tdata'][0]['transactionStatus'] == 0){
          document.getElementById("parPaymentStatus").innerHTML = "Not Paid";
        }
        if(data['tdata'][0]['transactionStatus'] == 1){
          document.getElementById("parPaymentStatus").innerHTML = "Half Paid";
        }
        if(data['tdata'][0]['transactionStatus'] == 2){
          document.getElementById("parPaymentStatus").innerHTML = "Fully Paid";
        }
        document.getElementById("parNumberOfGuest").innerHTML = data['tdata'][0]['guestCount'];
        packageID = data['tdata'][0]['packageID'];
        eventID = data['tdata'][0]['eventID'];
        $.ajax({
          type: "GET",
          url:  "/RetrievePackageInclusion",
          data: 
          {
            sdid: packageID,
            sendReservationID: eventID
          },
          success: function(data){
          var additionalDishList;
          var additionalServiceList;
          var additionalEmployeeList;
          var additionalEquipmentList;
          // document.getElementById("parAdditionalItem").innerHTML = "none";
          if(data['additionalDish'].length > 0){
            for (var i = 0; i < data['additionalDish'].length; i++) {
              additionalDishList = "[" + data['additionalDish'][i]['additionalServing'] + "] " + 
                                    data['additionalDish'][i]['dishName'];
            }
          }
          else{
            additionalDishList = "";
          }
          if(data['additionalService'].length > 0){
            for (var i = 0; i < data['additionalService'].length; i++) {
              additionalServiceList = "[" + data['additionalService'][i]['serviceAdditionalQty'] + "] " + 
                                    data['additionalService'][i]['serviceName'];
            }
          }
          else{
            additionalServiceList = "";
          }
          if(data['additionalEquipment'].length > 0){
            for (var i = 0; i < data['additionalEquipment'].length; i++) {
              additionalEquipmentList = "[" + data['additionalEquipment'][i]['equipmentAdditionalQty'] + "] " + 
                                    data['additionalEquipment'][i]['equipmentName'];
            }
          }
          else{
            additionalEquipmentList = "";
          }
          if(data['additionalEmployee'].length > 0){
            for (var i = 0; i < data['additionalEmployee'].length; i++) {
              additionalEmployeeList = "[" + data['additionalEmployee'][i]['employeeAdditionalQty'] + "] " + 
                                    data['additionalEmployee'][i]['employeeTypeName'];
            }
          }
          else{
            additionalEmployeeList = "";
          }
          document.getElementById("parAdditionalItem").innerHTML = additionalDishList + " " + additionalEquipmentList + " " + additionalServiceList + " " + additionalEmployeeList;
          $("#transactionModal").modal("show");
          }, 
          error: function(xhr)
          {
            alert($.parseJSON(xhr.responseText)['error']['message']);
          }                
        });
        }, 
        error: function(xhr)
        {
          alert($.parseJSON(xhr.responseText)['error']['message']);
        }                
      });
    });
  });
</script>
  @endsection