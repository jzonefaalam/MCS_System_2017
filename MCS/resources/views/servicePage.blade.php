@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
        <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-cube"></i>service</a></li>
        </ol>
      </section>

    <section class="content">
          <div class="box">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-md-6">
                  <h2>Service</h2>
                </div>
                <div class="col-md-6">
                      <a class="btn btn-app" data-target="#addserviceModal" data-toggle="modal" style="float:right">
                        <i class="fa fa-save"></i> ADD
                      </a>
                    </div>
              </div>
            </div>
          <!-- /.box-header -->
          
                <!-- /Header -->
                <div class="box-body">
                  <table id="serviceTable" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr>
                      <th width="150px">Image</th>
                      <th width="180px">Name</th>
                      <th width="200px">Description</th>
                      <th width="200px">Fee</th>
                      <th width="80px">Type</th>
                      <th width="150px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($serviceData as $serviceData)
                      <tr>
                        <td><img style="width:150px;height:100px;" /></td>
                        <td>{{ $serviceData->serviceName }}</td>
                        <td>{{ $serviceData->serviceDescription }}</td>
                        <td>{{ $serviceData->serviceFee }}</td>
                        <td>{{ $serviceData->serviceTypeName }}</td>
                       <td>
                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editServiceModal" onclick="getService(this.name);" name="{{$serviceData->serviceID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteServiceModal" onclick="getService(this.name);" name="{{$serviceData->serviceID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
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


                      <!-- Delete service Modal-->
                      <form role="form" method="POST" action="DeleteServicePage" class="form-horizontal">
                      <div class="modal fade" id="deleteServiceModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                             <div class="modal-body">
                                <div class="form-group" style="display: none;">
                                  <label class="col-sm-4 control-label">service ID</label>
                                  <div class="col-sm-5 input-group">
                                    <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="deleteServiceID" id="deleteServiceID" readonly="">
                                  </div>
                                </div>
                                {!! csrf_field() !!}
                                <div>
                                  <h5> Are you sure you want to delete this item? </h5>
                                </div>
                                <div style="text-align: center;">
                                  <button type="submit" name="deleteserviceBtn" class="btn btn-primary btn-sm">Confirm</button>
                                  <button data-dismiss="modal" class="btn btn-primary btn-sm">Cancel</button>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      </form>
                      <!-- End Modals-->

                    <!-- Update Package Modal-->
                    <div class="modal fade" id="editServiceModal">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <form  id="editserviceForm" role="form" method="POST" action="EditServicePage" class="form-horizontal editserviceValidator" enctype="multipart/form-data" >
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">UPDATE SERVICE</h4>
                    </div>

                    <div class="modal-body">
                    {!! csrf_field() !!}
                    <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label">Service ID</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-list" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" name="editServiceID" id="editServiceID" readonly="">
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Service Name</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control" name="editServiceName" id="editServiceName" required>
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
                    <textarea type="text" required class="form-control" name="editServiceDescription" id="editServiceDescription"></textarea>
                    </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label"> Fee</label>
                    <div class="col-sm-6">
                    <div class = "input-group">
                    <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="editServiceFee" id="editServiceFee" required>
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
                    <select class="form-control" name="editServiceType" id="editServiceType">
                    @foreach($addServiceData as $serviceTypeData)
                    <option value="{{ $serviceTypeData->serviceTypeID }}">{{ $serviceTypeData->serviceTypeName }} </option>
                    @endforeach
                    </select>
                    </div>
                    </div>
                    </div>

                    <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Service Image</label>
                    <div class="col-sm-6">
                    <div class="input-group">
                    <div class="input-group-addon">
                    <input type="file" name="editServiceImage">
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>

                    <div class="modal-footer">
                    <button type="submit" name="editserviceBtn" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    </div>
                    </div>                   
                    </div>
                    <!-- End Modals-->

                    <!-- addservice Modal-->
                    <form id="addserviceForm" role="form" method="POST" action="/ServicePage" class="form-horizontal addserviceValidator" enctype="multipart/form-data">
                    <div class="panel-body">
                     
                        <div class="modal fade" id="addserviceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">ADD Service</h4>
                              </div>
                              
                              <div class="modal-body">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                  <label class="col-sm-4 control-label">Service Name</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-cube" aria-hidden="true"></i>
                                    </div>
                                    <input type="text" class="form-control" name="addServiceName" ID="addServiceName" placeholder="service Name" required>
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
                                      <textarea type="text" class="form-control" name="addServiceDescription" ID="addServiceDescription" placeholder="service Description" required></textarea>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                <label class="col-sm-4 control-label"> Fee</label>
                                <div class="col-sm-6">
                                <div class = "input-group">
                                <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="addServiceFee" id="addServiceFee" required>
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
                                <select class="form-control" name="addServiceType" id="addServiceType">
                                @foreach($addServiceData as $serviceTypeData)
                                <option value="{{ $serviceTypeData->serviceTypeID }}">{{ $serviceTypeData->serviceTypeName }} </option>
                                @endforeach
                                </select>
                                </div>
                                </div>
                                </div>

                                <div class="form-group has-feedback">
                                  <label class="col-sm-4 control-label">Service Image</label>
                                  <div class="col-sm-6">
                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <input type="file" name="addServiceImage" id="addServiceImage">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                

                                <div class="modal-footer">
                                  <button type="submit" name="addserviceBtn" class="btn btn-primary">Save</button>
                                </div>

                                </div>
                    
                            </div>
                          </div>
                        </div>
                    </div>
                    </form>
                    <!-- End Modals-->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
 <script>
  $(function () {
    $('#serviceTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script>
  <script>
      function getService(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveService",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editServiceID').val(data['ss'][0]['serviceID']);
                $('#deleteServiceID').val(data['ss'][0]['serviceID']);
                $('#editServiceName').val(data['ss'][0]['serviceName']);
                $('#editServiceFee').val(data['ss'][0]['serviceFee']);
                $('#editServiceDescription').val(data['ss'][0]['serviceDescription']);
                var opty = document.getElementById('editServiceType').options;
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==data['ss'][0]['serviceTypeID']){
                    $('#editServiceType').val(data['ss'][0]['serviceTypeID']) ;
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

    <script type="text/javascript">
    $('.editserviceValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editserviceName: {
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
               editserviceDescription: {
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
                editserviceUnit: {
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
                editserviceRatePerHour: {
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
    $('.addserviceValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addserviceName: {
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
               addserviceDescription: {
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
                addserviceUnit: {
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
                addserviceRatePerHour: {
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