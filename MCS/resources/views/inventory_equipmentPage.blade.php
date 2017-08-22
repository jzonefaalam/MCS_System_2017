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
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-cube"></i>Equipment</a></li>
        </ol>
      </section>

    <section class="content">
          <div class="box">
            <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>EQUIPMENT</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" href="EquipmentTypePage" style="float:right">
                  <i class="fa fa-save"></i> CATEGORIES  
                </a>
                <a class="btn btn-app" data-target="#addDishTypeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> REPORTS  
                </a>
                <a class="btn btn-app" data-target="#addEquipmentModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          
                <!-- /Header -->
                <div class="box-body">
                  <table id="inventoryEquipmentTable" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                      <th width="150px">Date</th>
                      <th width="180px">Category</th>
                      <th> Brand</th>
                      <th> Equipment Description</th>
                      <th width="80px">Rate</th>
                      <th width="50px">Total Quantity</th>
                      <th width="50px">Remaining Quantity</th>
                      <th> In use</th> 
                      <th style="display:none;">Equipment Type ID</th>
                      <th style="display:none;">Equipment ID</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($equipmentData as $equipmentData)
                      <tr>
                        <td>{{ $equipmentData->equipmentLogDate }}</td>
                        <td>{{ $equipmentData->equipmentTypeName }}</td>
                        <td>{{ $equipmentData->equipmentName }}</td>
                        <td>{{ $equipmentData->equipmentDescription }}</td>
                        <td>{{ $equipmentData->equipmentRatePerHour }}</td>
                        <td>{{ ($equipmentData->equipmentQuantityIn) + ($equipmentData->equipmentQuantityOut) }} </td>
                        <td>{{ $equipmentData->equipmentQuantityIn }}</td>
                        <td>{{ $equipmentData->equipmentQuantityOut }}</td>  
                        <td style="display:none">{{ $equipmentData->equipmentTypeID }}</td>
                        <td style="display:none">{{ $equipmentData->equipmentID }}</td>
                      
                       </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /Body -->
            <!-- /2nd Body -->


            <!-- /Box Body -->
            </div>

            <!-- addEquipment Modal-->
                    <form id="addEquipmentForm" role="form" method="POST" action="/EquipmentPage" class="form-horizontal addEquipmentValidator" enctype="multipart/form-data">
                    <div class="panel-body">
                     
                        <div class="modal fade" id="addEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">ADD EQUIPMENT</h4>
                              </div>
                              
                              <div class="modal-body">
                                {!! csrf_field() !!}

                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Brand Name</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-cube" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="addEquipmentName" id="addEquipmentName" placeholder="Equipment Name" required>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 control-label"> Description</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                                      </div>
                                      <textarea type="text" class="form-control" name="addEquipmentDescription" placeholder="Equipment Description" required></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Rate</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                                      </div>
                                    <input type="text" class="form-control" name="addEquipmentRatePerHour" placeholder="Rate" required>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-4 control-label"> Category</label>
                                <div class="col-sm-6">
                                <div class = "input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-navicon" aria-hidden="true"></i>
                                </div>
                                <select class="form-control" name="addEquipmentType" id="addEquipmentType">
                                @foreach($addEquipmentData as $equipmentTypeData)
                                <option value="{{ $equipmentTypeData->equipmentTypeID }}">{{ $equipmentTypeData->equipmentTypeName }} </option>
                                @endforeach
                                </select>
                                </div>
                                </div>
                                </div>

                                <div class="form-group has-feedback">
                                  <label class="col-sm-4 control-label">Equipment Image</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <input type="file" name="addEquipmentImage" id="addEquipmentImage">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                
                                

                                <div class="modal-footer">
                                  <button type="submit" name="addEquipmentBtn" class="btn btn-primary">Save</button>
                                </div>

                                </div>
                    
                            </div>
                          </div>
                        </div>
                    </div>
                    </form>
                    <!-- End Modals-->

                    <!-- Enable Equipment Modal-->
                      <div class="modal fade" id="enableEquipmentModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form role="form" method="POST" action="EnableEquipment" class="form-horizontal">
                              <div class="modal-body">
                              {!! csrf_field() !!}
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="enableEquipmentID" id="enableEquipmentID"  readonly="">
                                  </div>
                                </div>

                                <div>
                                  <h5> Are you sure you want to activate this equipment? </h5>
                                </div>

                                <div style="text-align: center;">
                                  <button type="submit" name="enableEquipmentBtn" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Modals-->

                      <!-- Disable Equipment Modal-->
                      <div class="modal fade" id="disableEquipmentModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form role="form" method="POST" action="/DisableEquipment" class="form-horizontal">
                              <div class="modal-body">
                              {!! csrf_field() !!}
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="disableEquipmentID" id="disableEquipmentID" readonly="">
                                  </div>
                                </div>

                                <div>
                                  <h5> Are you sure you want to deactive this equipment? </h5>
                                </div>

                                <div style="text-align: center;">
                                  <button type="submit" name="disableEquipmentBtn" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <!-- End Modals-->

                      <!-- Update Modal -->
                      <div class="modal fade" id="editEquipmentModal">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">UPDATE EQUIPMENT</h4>
                      </div>
                      <div class="modal-body">
                        <div>
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                          <ul class="nav nav-tabs">
                            <li class="active"><a  href="#tab_1" data-toggle="tab">Update Equipment Details</a></li>
                            <li class=""><a href="#tab_2" data-toggle="tab">Add Equipment Unit</a></li>
                          </ul>
                          <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">
                              <form  id="editEquipmentForm" role="form" method="POST" action="EditEquipmentPage" class="form-horizontal editEquipmentValidator" enctype="multipart/form-data">
                              {!! csrf_field() !!}
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
                              <label class="col-sm-4 control-label">Equipment Name</label>
                              <div class="col-sm-6">
                              <div class = "input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-cube" aria-hidden="true"></i>
                              </div>
                              <input type="text" class="form-control" name="editEquipmentName" id="editEquipmentName" required>
                              </div>

                              <input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">
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


                              <div class="form-group">
                              <label class="col-sm-4 control-label">Rate</label>
                              <div class="col-sm-6">
                              <div class = "input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                              </div>
                              <input type="text" class="form-control" name="editEquipmentRatePerHour" id="editEquipmentRatePerHour" required>
                              </div>
                              </div>
                              </div>

                              <div class="form-group">
                              <label class="col-sm-4 control-label"> Type</label>
                              <div class="col-sm-6">
                              <div class = "input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-navicon" aria-hidden="true"></i>
                              </div>
                              <select class="form-control" name="editEquipmentType" id="editEquipmentType">
                              @foreach($addEquipmentData as $equipmentTypeData)
                              <option value="{{ $equipmentTypeData->equipmentTypeID }}">{{ $equipmentTypeData->equipmentTypeName }} </option>
                              @endforeach
                              </select>
                              </div>
                              </div>
                              </div>

                              <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label">Equipment Image</label>
                              <div class="col-sm-6">
                              <div class="input-group">
                              <div class="input-group-addon">
                              <input type="file" name="editEquipmentImage">
                              </div>
                              </div>
                              </div>
                              </div>

                              <div style="text-align: center;">
                              <button type="submit" class="btn btn-primary btn-sm">Confirm</button>
                              <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                              </div>

                              </form>
                            </div>

                            <div class="tab-pane active" id="tab_2">
                              <form id="updateEquipmentQuantityForm" class="form-horizontal">

                              <div class="form-group" style="display: none;">
                              <label class="col-sm-4 control-label">Equipment ID</label>
                              <div class="col-sm-6">
                              <div class = "input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-list" aria-hidden="true"></i>
                              </div>
                              <input type="text" class="form-control" name="addQuantityEquipmentID" id="addQuantityEquipmentID" readonly="">
                              </div>
                              </div>
                              </div>

                              <input type="hidden" id="token" value="{{ csrf_token() }}">

                              <div class="form-group">
                              <label class="col-sm-4 control-label">Equipment Name</label>
                              <div class="col-sm-6">
                              <div class = "input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-cube" aria-hidden="true"></i>
                              </div>
                              <input type="text" class="form-control" name="addQuantityEquipmentName" id="addQuantityEquipmentName" readonly="">
                              </div>
                              </div>
                              </div>

                              <div class="form-group">
                              <label class="col-sm-4 control-label">Equipment Quantity</label>
                              <div class="col-sm-6">
                              <div class = "input-group">
                              <div class="input-group-addon">
                              <i class="fa fa-cube" aria-hidden="true"></i>
                              </div>
                              <input type="text" class="form-control" name="equipmentQuantityFake" id="equipmentQuantityFake" readonly="">
                              </div>
                              </div>
                              </div>

                              <div class="form-group">
                              <label class="col-sm-4 control-label">Add Quantity</label>
                              <div class="col-sm-6">
                              <div class="input-group">
                              <span class="input-group-addon">
                              <input type="checkbox" id="addCheckBox" name="addCheckBox">
                              </span>
                              <input type="text" name="addEquipmentQuantity" id="addEquipmentQuantity" class="form-control" placeholder="Enter Quantity">
                              </div>
                              </div>
                              </div>

                              <div class="form-group">
                              <label class="col-sm-4 control-label">Minus Quantity</label>
                              <div class="col-sm-6">
                              <div class="input-group">
                              <span class="input-group-addon">
                              <input type="checkbox" id="minusCheckBox" name="minusCheckBox">
                              </span>
                              <input type="text" name="minusEquipmentQuantity" id="minusEquipmentQuantity" class="form-control" placeholder="Enter Quantity">
                              </div>
                              </div>
                              </div>

                              
                              <div style="text-align: center;">
                                <button type="submit" id="submitQuantityBtn" class="btn btn-primary btn-sm" data-dismiss="modal">Add</button>
                                <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                              </div>

                              </form>

                            </div>
                           
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

<script>

    //if submit button is clicked
    $("#submitQuantityBtn").click(function(e){
        var id = $('input[name=addQuantityEquipmentID]').val();
        var addEquipmentQuantity;
        var minusEquipmentQuantity;
        
        if ( $("#addCheckBox").is(':checked') ){
          addEquipmentQuantity = $('input[name=addEquipmentQuantity]').val();
          minusEquipmentQuantity = 0;
        }
        if ( $("#minusCheckBox").is(':checked') ){
          minusEquipmentQuantity = $('input[name=minusEquipmentQuantity]').val();
          addEquipmentQuantity = 0;
        }
        if ( ($("#addCheckBox").is(':checked')) && ($("#minusCheckBox").is(':checked')) ){
          addEquipmentQuantity = $('input[name=addEquipmentQuantity]').val();
          minusEquipmentQuantity = $('input[name=minusEquipmentQuantity]').val();
        }
        alert(id + ' ' + addEquipmentQuantity + ' ' + minusEquipmentQuantity);
        $.ajax({
          url:  "/UpdateEquipmentUnit",
          type: "POST",
            beforeSend: function (xhr) {
              var token = $('meta[name="csrf_token"]').attr('content');
              if (token) {
                return xhr.setRequestHeader('X-CSRF-TOKEN', token);
              }
          },
          data: {
            id: id,
            addQuantity: addEquipmentQuantity,
            minusQuantity: minusEquipmentQuantity,
            '_token': $('#token').val()
          },
          success: function(data){
            alert('success');
            window.location.href = "InventoryEquipmentPage";      
          },
          error: function(xhr)
          {
          alert($.parseJSON(xhr.responseText)['error']['message']);
          }                  
        });
      }); 
</script> 

  <script>
      function getEquipment(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveEquipment",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#enableEquipmentID').val(data['ss'][0]['equipmentID']);
                $('#disableEquipmentID').val(data['ss'][0]['equipmentID']);
                $('#updateEquipmentID').val(data['ss'][0]['equipmentID']);
                $('#remainingQuantity').val(data['ss'][0]['equipmentUnit']);
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
  $(function () {
    $('#inventoryEquipmentTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });

  $(document).ready(function() {
    var table = $('#inventoryEquipmentTable').DataTable();
     
    $('#inventoryEquipmentTable tbody').on('dblclick', 'tr', function () {
        var data = table.row( this ).data();
        var equipmentDateVar = data[0];
        var equipmentNameVar = data[2];
        var equipmentDescriptionVar = data[3];
        var equipmentRatePerHourVar = data[4];
        var equipmentUnitVar= data[5];
        var equipmentTypeVar = data[8];
        var equipmentIDVar = data[9];
         $('#editEquipmentType option[value="' + equipmentTypeVar + '"]').prop("selected", true);
         $('#editEquipmentName').val(equipmentNameVar);
         $('#editEquipmentDescription').val(equipmentDescriptionVar);
         $('#editEquipmentRatePerHour').val(equipmentRatePerHourVar);
         $('#editEquipmentID').val(equipmentIDVar);
         $('#addQuantityEquipmentID').val(equipmentIDVar);
         $('#addQuantityEquipmentName').val(equipmentNameVar);
         $('#equipmentQuantityFake').val(equipmentUnitVar);
         $("#editEquipmentModal").modal("show");
        } );
} );
</script>

    <script type="text/javascript">
    $('.editEquipmentValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editEquipmentName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'First name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                              message: 'This field should contain letters only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },
               editEquipmentDescription: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                                regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                                message: 'This field should contain letters only.'
                        
                        },
                    }
                },
                editEquipmentUnit: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                },
                editEquipmentRatePerHour: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                },
              }
          });
      </script>

      <script type="text/javascript">
    $('.addEquipmentValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addEquipmentName: {
                  validators: {
                        stringLength: {
                        min: 2,
                        max: 20,
                        message:'First name should be at least 2 characters and not exceed 20 characters.'
                      },
                          regexp: {
                              regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                              message: 'This field should contain letters only.'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      },
                  }

              },
               addEquipmentDescription: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                                regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                                message: 'This field should contain letters only.'
                        
                        },
                    }
                },
                addEquipmentUnit: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                },
                addEquipmentRatePerHour: {
                    validators: {
                        stringLength: {
                        max: 20,
                        message:'Middle name should not exceed 20 characters.'
                    },
                          regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    }
                },
              }
          });
      </script>
  @endsection