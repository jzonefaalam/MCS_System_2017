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
              <a class="btn btn-app" href="/InventoryPOTypePage" style="float:right">
                <i class="fa fa-list"></i> CATEGORIES
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
                <th>Supplier</th>
                <th>Supplier's Address</th>
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
                  <td> {{ $poData->poSupplier }} </td>
                  <td> {{ $poData->poSupplierAddress }} </td>
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
          <form role="form" method="POST" action="/InventoryPOPage" class="form-horizontal">
            <div class="modal fade" id="addPurchaseOrderModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">ADD PURCHASE ORDER</h4>
                  </div>
                  <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Item Name</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <input type="text" class="form-control" name="addPOName" id="addPOName" data-error="This field is required">
                        </div>
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
                          <select class="form-control" name="addPOType" id="addPOType">
                            <!-- <option disabled="">Select Category</option> -->
                            @foreach($poTypeData as $poTypeData)
                              <option value="{{ $poTypeData->poTypeId }}">{{ $poTypeData->poTypeName }} </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Supplier</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <input type="text" class="form-control" name="addPOSupplier" id="addPOSupplier" data-error="This field is required">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">Supplier's Address</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-text-o" aria-hidden="true"></i>
                          </div>
                          <textarea type="text" required class="form-control" name="addPOSupplierAddress" id="addPOSupplierAddress"></textarea>
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
                  </div>
                  <div class="modal-footer">
                      <button type="submit" name="addPOBtn" class="btn btn-primary">Submit</button>
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
@endsection