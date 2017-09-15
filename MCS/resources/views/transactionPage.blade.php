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
                <th>Status</th>
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
    <!-- Delete service Modal-->
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
              <a class="btn btn-app" style="float:right">
                <i class="fa fa-print"></i>Print
              </a>

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
});
</script>
<script>
  $(document).ready(function() {
    var table = $('#transactionTable').DataTable();
    $('#transactionTable tbody').on('dblclick', 'tr', function () {
      var data = table.row( this ).data();
      var transactionId = data[0];
      var packageID;
      var eventID;
      $.ajax({
        type: "GET",
        url:  "/RetrieveTransaction",
        data: 
        {     
          getId: transactionId
        },
        success: function(data){
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