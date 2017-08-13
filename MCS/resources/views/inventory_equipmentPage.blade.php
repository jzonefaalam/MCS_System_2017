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
                  <h2>Equipment</h2>
                </div>
              </div>
            </div>
          <!-- /.box-header -->
          
                <!-- /Header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th width="150px">Image</th>
                      <th width="180px">Name</th>
                      <th width="80px">Rate Per Hour</th>
                      <th width="50px">Total Quantity</th>
                      <th width="50px">Remaining Quantity</th>
                      <th width="10px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($equipmentData as $equipmentData)
                      <tr>
                        <td><img src="{{ asset('images/' . $equipmentData->equipmentImage) }}"  style="width:150px;height:100px;" /></td>
                        <td>{{ $equipmentData->equipmentName }}</td>
                        <td>{{ $equipmentData->equipmentRatePerHour }}</td>
                        <td> Total Quantity </td>
                        <td width="80px">{{ $equipmentData->equipmentUnit }} 
                        <a onclick="getEquipment(this.name);" name="{{$equipmentData->equipmentID}}" data-toggle="modal" data-target="#updateEquipmentModal" class="pull-right"><i class="fa fa-plus-square-o" style="margin-right: 5px;"  aria-hidden="true"></i>
                        </a>
                        </td>
                        <td>
                          <?php if (( $equipmentData->equipmentAvailability )==0): ?> 
                          <div class="btn-group">
                          <button type="button" class="btn btn-default">Disable</button>
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          <li>
                          <a data-toggle="modal" data-target="#enableEquipmentModal" onclick="getEquipment(this.name);" name="{{$equipmentData->equipmentID}}">Enable</a>
                          </li>
                          </ul>
                          </div>
                          <?php endif ?>

                          <?php if (( $equipmentData->equipmentAvailability )==1): ?> 
                          <div class="btn-group">
                          <button type="button" class="btn btn-default">Enable</button>
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                          <li>
                          <a data-toggle="modal" data-target="#disableEquipmentModal" onclick="getEquipment(this.name);" name="{{$equipmentData->equipmentID}}">Disable</a>
                          </li>
                          </ul>
                          </div>
                          <?php endif ?>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                </div>
                <!-- /Body -->
            <!-- /2nd Body -->


            <!-- /Box Body -->
            </div>

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

                    <!-- Update Equipment Unit Modal-->
                      <div class="modal fade" id="updateEquipmentModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <form role="form" method="POST" action="UpdateEquipmentUnit" class="form-horizontal">
                              <div class="modal-body">
                              {!! csrf_field() !!}
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">Equipment ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="updateEquipmentID" id="updateEquipmentID"  readonly="">
                                  </div>
                                </div>

                                <div class="form-group ">
                                <label class="col-sm-4 control-label"> Quantity</label>
                                <div class="col-sm-6">
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="remainingQuantity" id="remainingQuantity" readonly="">
                                </div>
                                </div>
                                </div>

                                <div class="form-group ">
                                <label class="col-sm-4 control-label"> Additional Quantity</label>
                                <div class="col-sm-6">
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="updateEquipmentUnit" id="updateEquipmentUnit">
                                </div>
                                </div>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

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