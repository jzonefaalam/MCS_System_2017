@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-car"></i>serviceType</a></li>
      </ol>
    </section>

<br>
    <section class="content">
          <div class="box box-primary">

            <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Service Type</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addServiceTypeModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
            <div class="box-body">
              <table id="serviceTypeTable" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                  <th width="250px">Name</th>
                  <!-- <th width="400px">Description</th> -->
                  <th width="100px">Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($serviceTypeData as $serviceTypeData)
                  <tr>
                    <td>{{ $serviceTypeData->serviceTypeName }}</td>
                    <!-- <td>{{ $serviceTypeData->serviceTypeDescription }}</td> -->
                    <td>
                      <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editServiceTypeModal" onclick="getServiceTypeData(this.name);" name="{{$serviceTypeData->serviceTypeID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                      <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteServiceTypeModal" onclick="getServiceTypeData(this.name);" name="{{$serviceTypeData->serviceTypeID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            </div>

             <!--DELETE Modal-->
                <form role="form" method="POST" action="DeleteServiceTypePage" class="form-horizontal">
                <div class="modal fade" id="deleteServiceTypeModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                          <div class="form-group" style="display:none;">
                            <label class="col-sm-4 control-label">Delete Service Type</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteServiceTypeID" id="deleteServiceTypeID" readonly="">
                            </div>
                          </div>
                          {!! csrf_field() !!}
                          <div>
                            <h5> Are you sure you want to activate this item? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteServiceTypeBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                </form>
                <!-- End Modals-->

                <!-- Update Modal -->
                <form id = "editServiceTypeForm" role="form" method="POST" action="/EditServiceTypePage" class="form-horizontal">
                <div class="modal fade" id="editServiceTypeModal">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title" id="myModalLabel">UPDATE Service Type</h4>
                          </div>
                          
                          <div class="modal-body">
                          {!! csrf_field() !!}

                      <div class="form-group" style="display:none;">
                      <label class="col-sm-4 control-label">Service Type ID</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editServiceTypeID" id="editServiceTypeID" readonly="">
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label"> Name</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="editServiceTypeName" id="editServiceTypeName" required>
                      </div>
                      </div>
                      </div>

                      <input type="text" class="form-control" name="tempName" id="tempName" style="display: none;">

                      <!-- <div class="form-group">
                      <label class="col-sm-4 control-label"> Description</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="editServiceTypeDesc" id="editServiceTypeDesc" required></textarea>
                      </div>
                      </div>
                      </div> -->

                                  
                      </div>
                      <div class="modal-footer">
                      <button type="submit" name="editServiceTypeBtn" class="btn btn-default">Submit</button>
                      </div>
                      </div>
                  </div>
                </div>
                </form>
                        <!-- End Modals -->
						
                     <!-- addserviceType Modal-->
                      <div class="panel-body">
                      <form id = "addserviceTypeForm" role="form" method="POST" action="/ServiceTypePage" class="form-horizontal">
                      <div class="modal fade" id="addServiceTypeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">ADD Service Type</h4>
                      </div>
                      <div class="modal-body">
                      {!! csrf_field() !!}
                      <div class="form-group">
                      <label class="col-sm-4 control-label">Service Type Name</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-car" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="addServiceTypeName" placeholder="Service Type Name" required>
                      </div>
                      </div>
                      </div>

                      <!-- div class="form-group">
                      <label class="col-sm-4 control-label"> Description</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-quote-right" aria-hidden="true"></i></span>
                      <textarea type="text" class="form-control" name="addServiceTypeDescription" placeholder="Service Type Description" required></textarea>
                      </div>
                      </div>
                      </div> -->

                      </div>
                      <div class="modal-footer">
                      <button type="submit" name="addserviceTypeBtn" class="btn btn-primary">Submit</button>
                      </div>
                      </div>
                      </div>
                      </div>
                      </form>
                      </div>
                     <!-- End Modals-->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
   <script>
  $(function () {
    $('#serviceTypeTable').DataTable({
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
      function getServiceTypeData(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveServiceType",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editServiceTypeID').val(data['ss'][0]['serviceTypeID']);
                $('#deleteServiceTypeID').val(data['ss'][0]['serviceTypeID']);
                $('#editServiceTypeName').val(data['ss'][0]['serviceTypeName']);
                // $('#editServiceTypeDesc').val(data['ss'][0]['serviceTypeDescription']);
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