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
                  <th>Package Cost</th>
                  <th>Inclusions</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($packageData as $packageData)
                <tr>
                  <td><img src="{{ asset('images/' . $packageData->packageImage) }}" style="width:150px;height:100px;" /></td>
                  <td>{{ $packageData->packageName }}</td>
                  <td>{{ $packageData->packageDescription }}</td>
                  <td>{{ $packageData->packageCost }}</td>
                  <td> <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewInclusionsModal" onclick="getPackageInclusion(this.name);" name="{{$packageData->packageID}}"><i class="fa fa-wrench fa-fw"></i> View Inclusions</a></td>
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
                <form   role="form" class="form-horizontal" enctype="multipart/form-data">

                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Package Inclusions</h4>
                </div>

                <div class="modal-body">

                <table class="table table-stripped table-bordered dataTable" id="packageInclusionTable">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Package Name</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
              
                </div>
                <div class="modal-footer">
                <button type="submit" name="editPackageBtn" class="btn btn-primary">Close</button>
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
                        <form id="editPackageForm" role="form" method="POST" action="EditPackagePage" class="form-horizontal" enctype="multipart/form-data">
                          
						  <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">UPDATE PACKAGE</h4>
                          </div>
						  
                          <div class="modal-body">
						                            {!! csrf_field() !!}
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
                                <textarea type="text" class="form-control" name="editPackageDesc" id="editPackageDesc" placeholder="Package Description"></textarea>
                              </div>
							               </div>
                            </div>
							
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Cost</label>
                              <div class="col-sm-5">
							  <div class = "input-group">
                                <span class="input-group-addon"><i class="fa fa-rouble" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="editPackagePrice" id="editPackagePrice" placeholder="Package Cost">
                              </div>
                            </div>
                          </div>
						                </div> 

                    <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label">Package Image</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                          <input type="file" name="editPackageImage">
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
                        <input type="text" class="form-control" name="addPackageCost" placeholder="Package Cost">
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
                    <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="equipmentInclusion[]" style="width: 100%;">
                      @foreach($equipmentData as $equipmentData)
                      <option value="{{ $equipmentData->equipmentID }}">{{ $equipmentData->equipmentName }} </option>
                     @endforeach
                    </select>
                    </div>
                    </div>

                    

                    

                      <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label">Package Image</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                          <input type="file" name="addPackageImage">
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
  $(function () {
    $('#packageTable').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });

    // $('#packageInclusionTable').DataTable({
    //   "paging": false,
    //   "lengthChange": true,
    //   "searching": true,
    //   "ordering": false,
    //   "info": true,
    //   "autoWidth": true
    // });
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
                $('#editPackageDesc').val(data['ss'][0]['packageDescription']);
                $('#editPackagePrice').val(data['ss'][0]['packageCost']);
                $('#editPackageInclusion').val(data['ss'][0]['packageInclusion']);
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
      function getPackageInclusion(id){
          alert(id);
          var tblSDet = $('#packageInclusionTable');
          tblSDet.clear();
          tblSDet.draw(true);
          alert('adasxxxx');
        $.ajax({
                type: "GET",
                url:  "/RetrievePackageInclusion",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                    var dishTypeName = null;
                    var dishTypeStatus = null;
                    for(i=0; i<data['ss'].length; i++){
                      dishTypeName=data['ss'][i]['dishTypeName'];
                      dishTypeStatus=data['ss'][i]['dishTypeStatus'];
                      tblSDet.row.add([
                        dishTypeName
                      ]).draw(true);
                    }

                },
                error: function(xhr)
                {
                    alert('adsasxx');
                    alert($.parseJSON(xhr.responseText)['error']['message']);
                }                
            });
      }

    </script>
    @endsection