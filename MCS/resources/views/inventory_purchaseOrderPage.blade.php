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
          <li><a><i class="fa fa-wrench"></i> Inventory</a></li>
          <li><a href = "/InventoryEquipmentPage"><i class="fa fa-cube"></i>Equipment</a></li>
          <li class="active"><a href = "/InventoryPOPage"><i class="fa fa-cube"></i>Purchase Order</a></li>
        </ol>
      </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-6">
              <h2>PURCHASE ORDER</h2>
            </div>
            <div class="col-md-6">
              <a class="btn btn-app" data-target="#addPurchaseOrderModal" data-toggle="modal" style="float:right">
                <i class="fa fa-plus"></i> NEW
              </a>
            </div>
          </div>
        </div>
        <div class="box-body with-border">
          <table id="purchaseTable" class="table table-bordered table-striped dataTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Puchase Date</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Net Cost</th>
              </tr>
            </thead>
            <tbody>
              @foreach($poData as $poData)
                <tr>
                  <td> {{ $poData->poItemName }} </td>
                  <td> {{ $poData->poTypeName }} </td>
                  <td> {{ $poData->poDescription }} </td>
                  <td> {{ $poData->poDate }} </td>
                  <td> {{ $poData->poPrice }} </td>
                  <td> {{ $poData->poQty }} </td>
                  <?php 
                    $price = ($poData->poPrice) * ($poData->poQty);
                    $price = number_format((float)$price, 2, '.', '');
                  ?>
                  <td> P {{ $price }} </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->

     <!-- Add Purchase Order Type Modal-->
        <div class="panel-body">
          <form id="addPOForm" role="form" method="POST" action="/InventoryPOPage" class="form-horizontal">
            <div class="modal fade" id="addPurchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ADD PURCHASE ORDER</h4>
                  </div>
                  <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group" >
                      <label class="col-sm-4 control-label">Item Name</label>
                      <div class="col-sm-6" id="newItem" style="display:none;">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <input type="text" class="form-control" name="addPOName" id="addPOName" data-error="This field is required">

                        </div>
                      </div>
                      <div class="col-sm-6" id="existingItem">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <select class="form-control" name="addExistingItemName" id="addExistingItemName">
                            <!-- <option disabled="">Select Category</option> -->
                            
                          </select>
                        </div>
                      </div>
                       <div>
                          <input type="checkbox" id="itemCheckbox" class="minimal" onchange="existingItemFunction(this)">
                          <input type="text" id="checkboxChecker" name="checkboxChecker" value="0" style="display:none;">
                          <small>New Item</small>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Item Description</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <textarea type="text" required class="form-control" name="addPODescription" id="addPODescription"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Item Category</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <select class="form-control" name="addPOType" id="addPOType" onchange="enableEquipmentType(this.id);">
                            <!-- <option disabled="">Select Category</option> -->
                            @foreach($poTypeData as $poTypeData)
                              <option value="{{ $poTypeData->poTypeId }}">{{ $poTypeData->poTypeName }} </option>
                            @endforeach
                          </select>
                          <input type="text" id="categoryChecker" name="categoryChecker" value="0" style="display:none;">
                        </div>
                      </div>
                    </div>

                    <div class="form-group" style="display:none;" id="equipmentTypeDiv">
                      <label class="col-sm-4 control-label">Equipment Type</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <select class="form-control" name="addEquipmentType" id="addEquipmentType">
                            <option selected disabled="">Select Equipment Type</option>
                            @foreach($equipmentType as $equipmentType)
                            <!-- <option disabled="">Select Category</option> -->                            
                            <option value="{{ $equipmentType->equipmentTypeID }}">{{ $equipmentType->equipmentTypeName }} </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Item Qty</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <input type="number" class="form-control" name="addPOQty" id="addPOQty" data-error="This field is required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Item Price</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <input type="number" class="form-control" name="addPOPrice" id="addPOPrice" data-error="This field is required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group" style="display:none;" id="ratePerHourDiv">
                      <label class="col-sm-4 control-label">Rate Per Hour</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <input type="number" class="form-control" name="addRatePerHour" id="addRatePerHour" data-error="This field is required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group" style="display:none;" id="imageDiv">
                        <label class="col-sm-4 control-label">Package Image</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                          <input type="file" name="addItemImage" id="addItemImage">
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <input class="btn btn-primary" id="send" type="submit" value="Submit">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      <!-- End Modals-->
  </div>
  <!-- /.content-wrapper -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

<script>
function enableEquipmentType(id){
  var selectedOption = document.getElementById(id);
  var loc = selectedOption.selectedIndex;
  // Food
  if(loc==0){
    document.getElementById('equipmentTypeDiv').style="display:none";
    document.getElementById('ratePerHourDiv').style="display:none";
    document.getElementById('imageDiv').style="display:none";
    document.getElementById('categoryChecker').value="0";
    $('#addExistingItemName')
      .find('option')
      .remove()
      .end()
    ;
    $.ajax({
      type: "GET",
      url:"/RetrievePOFood",
      data:{

      },
      success: function (data) {
        for (var i = 0; i < data['existingPOFood'].length; i++) {
          var div_data="<option value=" +data['existingPOFood'][i]['poItemName']+ ">" +data['existingPOFood'][i]['poItemName']+ "</option>";
          $(div_data).appendTo('#addExistingItemName'); 
          // alert(data['existingPOFood'][i]['poItemName']);
        }
      },
      error: function(xhr)
      {
        alert("mali");
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }         
    });     
  }
  // Equipment
  if(loc==1){
    document.getElementById('equipmentTypeDiv').style="display:";
    document.getElementById('ratePerHourDiv').style="display:";
    document.getElementById('imageDiv').style="display:";
    document.getElementById('categoryChecker').value="1";
    $('#addExistingItemName')
      .find('option')
      .remove()
      .end()
    ;
    $.ajax({
      type: "GET",
      url:"/RetrievePOEquipment",
      data: {

      },
      success: function(data){        
        for (var i = 0; i < data['existingPOEquipment'].length; i++) {
          // alert(data['existingPOEquipment'][i]['equipmentName']);
          var div_data="<option value=" +data['existingPOEquipment'][i]['equipmentID']+ ">" +data['existingPOEquipment'][i]['equipmentName']+ "</option>";
          $(div_data).appendTo('#addExistingItemName');
        }
      },
      error: function(xhr)
      {
        alert("mali");
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }         
    });  
  }
}

function existingItemFunction(){
 if(document.getElementById('itemCheckbox').checked){
  document.getElementById('existingItem').style="display:none";
  document.getElementById('newItem').style="display:";
  document.getElementById('checkboxChecker').value="1";
 }
 else{
  document.getElementById('existingItem').style="display:";
  document.getElementById('newItem').style="display:none";
  document.getElementById('checkboxChecker').value="0";
 }
}
</script>

<!-- Script for ADDING -->
<!-- <script>
  $(document).ready(function() {
    $("#send").click(function(e) {
      e.preventDefault();
      var checker = document.getElementById('checkboxChecker').value;
      var categoryChecker = document.getElementById('categoryChecker').value;
      // New Item
      if(checker==1) {
        // Food
        if(categoryChecker==0){
          document.getElementById("addPOForm").submit();
        }
        // Equipment
        if(categoryChecker==1){
          document.getElementById("addPOForm").submit();
        }
      }
      // Existing Item 
      if(checker==0){
        // Food
        if(categoryChecker==0){
          document.getElementById("addPOForm").submit();
        }
        // Equipment
        if(categoryChecker==1){
          // Ajax for getting equipmentID
          var equipmentNameChecker = document.getElementById("addExistingItemName");
          var strUser = equipmentNameChecker.options[equipmentNameChecker.selectedIndex].value;
          
        }
      }
    });
  });
</script> -->


@endsection