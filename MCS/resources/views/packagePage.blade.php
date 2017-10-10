@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-briefcase"></i>Package</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Packages</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addPackageModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered dataTable">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Package Name</th>
                  <th>Package Description</th>
                  <th>Package Inclusions</th>
                  <th>Package Cost (per head)</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($packageData as $packageData)
                <tr>
                  <td><img src="{{ asset('img/' . $packageData->packageImage) }}" style="width:150px;height:100px;" /></td>
                  <td>{{ $packageData->packageName }}</td>
                  <td>{{ $packageData->packageDescription }}</td>
                  <td>
                    <div id="listOfInclusions">
                    </div>
                  </td>
                  <td>{{ $packageData->packageCost }}</td>
                  <td width="180px">
      						  <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editPackageModal" onclick="getPackage(this.name);" name="{{$packageData->packageID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
          					<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletePackageModal" onclick="getPackage(this.name);" name="{{$packageData->packageID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                  
                </tr>
                @endforeach
                <!-- Enable Package Modal-->
                <div class="modal fade" id="enableModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="enable_package.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Activate Package</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="packageID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to activate this package? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enablePackageBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->

                <!-- Disable Package Modal-->
                <div class="modal fade" id="disableModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="disable_package.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Deactivate Package</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="packageID"  readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to deactivate this package? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disablePackageBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->

                
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->

          <!-- Delete Package Modal-->
                <form role="form" method="POST" action="DeletePackagePage" class="form-horizontal">
                <div class="modal fade" id="deletePackageModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Delete Package</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deletePackageID" id="deletePackageID" readonly="">
                            </div>
                          </div>
                           {!! csrf_field() !!}
                          <div>
                            <h5> Are you sure you want to delete this item? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deletePackageBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                </form>
                <!-- End Modals-->

                <!-- View Package Inclusions Modal-->
                <div class="modal fade" id="viewInclusionsModal">
                <div class="modal-dialog">
                <div class="modal-content">
                <form role="form" id="packageInclusionForm" class="form-horizontal">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Package Inclusions</h4>
                </div>

                <div class="modal-body">
                
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                      <li ><a href="#tab_1" data-toggle="tab">Dish </a></li>
                      <li ><a href="#tab_2" data-toggle="tab">Equipment </a></li>
                      <li ><a href="#tab_3" data-toggle="tab">Services</a></li>
                      <li ><a href="#tab_4" data-toggle="tab">Staff </a></li>
                    </ul>
                    <div class="tab-content">

                     <div class="tab-pane active" id="tab_1">
                      <div>
                      <strong><h4>Dish Inclusions</h4></strong><br>
                      </div>
                      <div class="dishInclusionDiv" id="dishInclusionDiv">
                      </div>
                      </div>

                      <div class="tab-pane active" id="tab_2">
                      <strong><h4>Equipment Inclusions</h4></strong><br>
                      <div class="equipmentInclusionDiv" id="equipmentInclusionDiv">
                      </div>
                      </div>

                      <div class="tab-pane active" id="tab_3">
                      <strong><h4>Service Inclusions</h4></strong><br>
                      <div class="serviceInclusionDiv" id="serviceInclusionDiv">
                      </div>
                      </div>

                      <div class="tab-pane active" id="tab_4">
                      <strong><h4>Staff Inclusions</h4></strong><br>
                      <div class="staffInclusionDiv" id="staffInclusionDiv">
                      </div>
                      </div>

                    </div>
                  </div>
                </div>
                </form>
                </div>
                </div>
                </div>
                <!-- End Modals-->        
		  
				<!-- edit package Modal-->
                <div class="modal fade" id="editPackageModal">
                <div class="modal-dialog">
                <div class="modal-content">
                <form id="editPackageForm" role="form" method="POST" action="EditPackagePage" class="form-horizontal editPackageValidator" enctype="multipart/form-data">

                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">UPDATE PACKAGE</h4>
                </div>

                <div class="modal-body">
                {!! csrf_field() !!}

                <div class="form-group">
                <div class="col-sm-4" >
                <img id="editPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                </div>
                </div>

                <div class="form-group" style="display: none;">
                <label class="col-sm-4 control-label">Package ID</label>
                <div class="col-sm-5">
                <div class = "input-group">
                <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="editPackageID" id="editPackageID" " readonly="">
                </div>
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Package Name</label>
                <div class="col-sm-5">
                <div class = "input-group">
                <span class="input-group-addon"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="editPackageName" id="editPackageName" placeholder="Package Name" data-error="This field is required">
                </div>
                </div>
                </div>

                <input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">

                <div class="form-group has-feedback">
                <label class="col-sm-4 control-label"> Description</label>
                <div class="col-sm-5">
                <div class = "input-group">
                <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                <textarea type="text" class="form-control" name="editPackageDescription" id="editPackageDescription" placeholder="Package Description"></textarea>
                </div>
                </div>
                </div>

                <div class="form-group ">
                <label class="col-sm-4 control-label"> Cost</label>
                <div class="col-sm-5">
                <div class = "input-group">
                <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="editPackageCost" id="editPackageCost" placeholder="Package Cost (per head)">
                </div>
                </div>
                </div>
                </div> 

                <div class="form-group">
                <label class="col-sm-4 control-label">Courses</label>
                <div class="col-sm-6">
                <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" id="editDishTypeInclusion" name="editDishTypeInclusion[]" style="width: 100%;">
                @foreach($dishTypeData as $editDishTypeData)
                <option value="{{ $editDishTypeData->dishTypeID }}">{{ $editDishTypeData->dishTypeName }} </option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Equipment</label>
                <div class="col-sm-6">
                <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" id="editEquipmentInclusion" name="editEquipmentInclusion[]" style="width: 100%;">
                @foreach($equipmentData as $editEquipmentData)
                <option value="{{ $editEquipmentData->equipmentID }}">{{ $editEquipmentData->equipmentName }} </option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Services</label>
                <div class="col-sm-6">
                <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" id="editServiceInclusion" name="editServiceInclusion[]" style="width: 100%;">
                @foreach($serviceData as $editServiceData)
                <option value="{{ $editServiceData->serviceID }}">{{ $editServiceData->serviceName }} </option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-4 control-label">Staff</label>
                <div class="col-sm-6">
                <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" id="editStaffInclusion" name="editStaffInclusion[]" style="width: 100%;">
                @foreach($staffData as $editStaffData)
                <option value="{{ $editStaffData->employeeTypeID }}">{{ $editStaffData->employeeTypeName }} </option>
                @endforeach
                </select>
                </div>
                </div>

                <div class="form-group has-feedback">
                <label class="col-sm-4 control-label">Package Image</label>
                <div class="col-sm-6">
                <div class="input-group">
                <div class="input-group-addon">
                <input type="file" name="editPackageImage" id="editPackageImage">
                </div>
                </div>
                </div>
                </div>

                <div class="modal-footer">
                <button type="submit" name="editPackageBtn" class="btn btn-primary">Submit</button>
                </div>
                </form>
                </div>
                </div>
                </div>
                <!-- End Modals-->
				
        <!-- addPackage Modal-->
        <form id="addPackageForm" role="form" method="POST" action="/PackagePage" class="form-horizontal" enctype="multipart/form-data">
          <div class="modal fade" id="addPackageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">ADD PACKAGE</h4>
                </div>
                
                <div class="modal-body">
                {!! csrf_field() !!}

                    <div class="form-group">
                    <div class="col-sm-4" >
                    <img id="addPhotoIcon" align="middle" src="img/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                    </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-4 control-label">Package Name</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-briefcase" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" name="addPackageName" placeholder="Package Name" data-error="This field is required">
                      </div>
                      </div>
                    </div>
                    <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label">Package Description</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                        <textarea type="text" class="form-control" name="addPackageDescription" placeholder="Package Description"></textarea>
                      </div>
                      </div>
                    </div>

                    <div class="form-group ">
                      <label class="col-sm-4 control-label">Package Cost</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" name="addPackageCost" placeholder="Package Cost (per head)">
                      </div>
                      </div>
                      </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Courses</label>
                    <div class="col-sm-6">
                    <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="addDishTypeInclusion[]" style="width: 100%;">
                      @foreach($dishTypeData as $dishTypeData)
                      <option value="{{ $dishTypeData->dishTypeID }}">{{ $dishTypeData->dishTypeName }} </option>
                      @endforeach
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Equipment</label>
                    <div class="col-sm-6">
                    <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="addEquipmentInclusion[]" style="width: 100%;">
                      @foreach($equipmentData as $equipmentData)
                      <option value="{{ $equipmentData->equipmentID }}">{{ $equipmentData->equipmentName }} </option>
                     @endforeach
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Services</label>
                    <div class="col-sm-6">
                    <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="addServiceInclusion[]" style="width: 100%;">
                      @foreach($serviceData as $serviceData)
                      <option value="{{ $serviceData->serviceID }}">{{ $serviceData->serviceName }} </option>
                     @endforeach
                    </select>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-sm-4 control-label">Staff</label>
                    <div class="col-sm-6">
                    <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="addStaffInclusion[]" style="width: 100%;">
                      @foreach($staffData as $staffData)
                        <option value="{{ $staffData->employeeTypeID }}">{{ $staffData->employeeTypeName }} </option>
                      @endforeach
                    </select>
                    </div>
                    </div>

                      <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label">Package Image</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                          <input type="file" name="addPackageImage" id="addPackageImage">
                        </div>
                        </div>
                      </div>
                    </div>
                  <div class="modal-footer">
                    <button type="submit" name="addPackageBtn" class="btn btn-primary">Submit</button>
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

<!-- Select2 -->
<script src="{{ asset('LTE/plugins/select2/select2.full.min.js') }}"></script>

<script>
  $(".select2").select2();
</script>

<script>
  $('#addPackageImage').change(function(){

  var file = this.files[0];
  var reader = new FileReader();
  reader.onload = function(){
  // alert("asdsd")

  document.getElementById('addPhotoIcon').src = this.result;
  };
  reader.readAsDataURL(file);

  var yourImg = document.getElementById('addPhotoIcon');
  if(yourImg && yourImg.style) {
  yourImg.style.height = '150px';
  yourImg.style.width = '150px';
  }
  });

  $('#editPackageImage').change(function(){

  var file = this.files[0];
  var reader = new FileReader();
  reader.onload = function(){
  // alert("asdsd")

  document.getElementById('editPhotoIcon').src = this.result;
  };
  reader.readAsDataURL(file);

  var yourImg = document.getElementById('editPhotoIcon');
  if(yourImg && yourImg.style) {
  yourImg.style.height = '150px';
  yourImg.style.width = '150px';
  }
  });
</script>


<script>
  $(function () {
    $('#packageTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });

    $('#packageInclusionTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });

    $(document).on("hidden.bs.modal", "#editPackageModal", function () {
      document.getElementById("editPackageForm").reset();
    });

    $(document).on("hidden.bs.modal", "#addPackageModal", function () {
      document.getElementById("addPackageForm").reset();
    });
    
  });
</script>

<script type="text/javascript">
    $('#addPackageForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addPackageName: {
                  validators: {
                      stringLength: {
                        min: 4,
                        max: 20,
                        message:'Package name should be at least 4 characters long, and should not exceed 20 characters.'
                      },
                      regexp: {
                        regexp: /^[a-zA-Z0-9]+([-'\s][a-zA-Z0-9]+)*$/,
                        message: 'This field should contain letters, hyphen & apostrophe only.'
                      },
                      notEmpty: {
                        message: 'This field is required.'
                      }
                  }
              },

              addPackageDescription: {
                validators: {
                        stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                    },
                  }
              },

              addPackageCost: {
                validators: {
                        stringLength: {
                        max: 9,
                        message:'Price limit reached.'
                    },
                          regexp: {
                              regexp: /^\d+(?:\.\d{1,2})?$/,
                              message: 'Invalid Input.'
                        },
                 }
              },

              addDishTypeInclusion: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

              addServiceInclusion: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

              addStaffInclusion: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

              addPackageImage: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

            }
        });
</script>


<script type="text/javascript">
    $('.editPackageValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editPackageName: {
                  validators: {
                      stringLength: {
                        min: 4,
                        max: 20,
                        message:'Package name should be at least 4 characters long, and should not exceed 20 characters.'
                      },
                      regexp: {
                        regexp: /^[a-zA-Z0-9]+([-'\s][a-zA-Z0-9]+)*$/,
                        message: 'This field should contain alphanumeric, hyphen & apostrophe only.'
                      },
                      notEmpty: {
                        message: 'This field is required.'
                      }
                  }
              },

              editPackageDesc: {
                validators: {
                        stringLength: {
                        max: 150,
                        message:'Description should not exceed 150 characters.'
                    },
                  }
              },

              editPackageCost: {
                validators: {
                        stringLength: {
                        max: 9,
                        message:'Price limit reached.'
                    },
                          regexp: {
                              regexp: /^\d+(?:\.\d{1,2})?$/,
                              message: 'Invalid Input.'
                        },
                 }
              },

              editPackageImage: {
                validators: {
                          notEmpty: {
                          message: 'This field is required.'
                      }
                 }
              },

            }
        });
</script>

<script>
      function getPackage(id){

        $.ajax({
                type: "GET",
                url:  "/RetrievePackage",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editPackageID').val(data['ss'][0]['packageID']);
                $('#deletePackageID').val(data['ss'][0]['packageID']);
                $('#editPackageName').val(data['ss'][0]['packageName']);
                $('#editPackageDescription').val(data['ss'][0]['packageDescription']);
                $('#editPackageCost').val(data['ss'][0]['packageCost']);
                document.getElementById("editPhotoIcon").src="img/" + (data['ss'][0]['packageImage']);
                var dishSelectedValues = new Array();
                // var setDishInclusion = new Array();
                for(var i = 0; i < data['dishInclusion'].length; i++){
                    dishSelectedValues[i] = data['dishInclusion'][i]['dishTypeID'];
                    // setDishInclusion[i] = data['dishInclusion'][i]['dishTypeName'];
                  }
                $('#editDishTypeInclusion').val(dishSelectedValues).trigger('change');

                var equipmentSelectedValues = new Array();
                // var setDishInclusion = new Array();
                for(var i = 0; i < data['equipmentInclusion'].length; i++){
                    equipmentSelectedValues[i] = data['equipmentInclusion'][i]['equipmentID'];
                    // setDishInclusion[i] = data['dishInclusion'][i]['dishTypeName'];
                  }
                $('#editEquipmentInclusion').val(equipmentSelectedValues).trigger('change'); 

                var staffSelectedValues = new Array();
                // var setDishInclusion = new Array();
                for(var i = 0; i < data['staffInclusion'].length; i++){
                    staffSelectedValues[i] = data['staffInclusion'][i]['employeeTypeID'];
                    // setDishInclusion[i] = data['dishInclusion'][i]['dishTypeName'];
                  }
                $('#editStaffInclusion').val(staffSelectedValues).trigger('change'); 

                var serviceSelectedValues = new Array();
                // var setDishInclusion = new Array();
                for(var i = 0; i < data['serviceInclusion'].length; i++){
                    serviceSelectedValues[i] = data['serviceInclusion'][i]['serviceID'];
                    // setDishInclusion[i] = data['dishInclusion'][i]['dishTypeName'];
                  }
                $('#editServiceInclusion').val(serviceSelectedValues).trigger('change'); 
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