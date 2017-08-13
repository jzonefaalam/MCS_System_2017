@extends('layouts.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="/DishPage"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-cutlery"></i>Dish</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">

        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Reservation List</h2>
              </div>
              <div class="col-md-12">
              	<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Reservation ID</th>
                  <th>Event Name</th>
                  <th>Customer Name</th>
                  <th width="130 px">Date</th>
                  <th>Package</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservationData as $reservationData)
                <tr>
                  <td> Reservation ID </td>
                  <td>{{ $reservationData->eventName }}</td>
                  <td>{{ $reservationData->fullName }}</td>
                  <td>{{ $reservationData->eventDate }} <span><a class="btn btn-info btn-sm pull-right" data-toggle="modal"><i class="fa fa-calendar fa-fw"></i></a></span></td>
                  <td>{{ $reservationData->packageName }}</td>  
                  <td> Not Available</td> 	
                  <td>
                  <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailModal" onclick="getReservationDetail(this.name);" name="{{$reservationData->reservationID}}"><i class="fa fa-wrench fa-fw"></i> More Details</a>
                  </td>
                </tr>
              @endforeach
                </tbody>
              </table>
              </div>
            </div>
          </div>
        <!-- Edit Modal -->
        <div class="panel-body">
          <form id="addDish" role="form" method="POST" action="/EditReservation" class="form-horizontal addDishValidator">
                {!! csrf_field() !!}
            <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">EDIT RESERVATION</h4>
                    </div>
                    <div class="modal-body">

                      {!! csrf_field() !!}
                      <div class="form-group" style="display: none;">
                      <label class="col-sm-4 control-label">Reservation ID</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <div class="input-group-addon">
                      <i class="fa fa-list" aria-hidden="true"></i>
                      </div>
                      <input type="text" class="form-control" id="editReservationID" name="editReservationID">
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Date</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <div class="input-group-addon">
                      <i class="fa fa-list" aria-hidden="true"></i>
                      </div>
                      <input type="text" class="form-control" id="editReservationDate" name="editReservationDate">
                      </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label"> Package Availed</label>
                      <div class="col-sm-6">
                      <div class = "input-group">
                      <div class="input-group-addon">
                      <i class="fa fa-navicon" aria-hidden="true"></i>
                      </div>
                      <select class="form-control" name="editReservationPackage" id="editReservationPackage">
                      @foreach($addReservationData as $reservationData)
                      <option value="{{ $reservationData->packageID }}">{{ $reservationData->packageName }} </option>
                      @endforeach
                      </select>
                      </div>
                      </div>
                      </div>

                      <div class="form-group" style="text-align:center;">
                      <label class="control-label" > Inclusions</label>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Equipment</label>
                      <div class="col-sm-6">
                      <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="equipmentInclusion[]" style="width: 100%;">
                     
                      </select>
                      </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-4 control-label">Services</label>
                      <div class="col-sm-6">
                      <select class="input-group select2" multiple="multiple" data-placeholder="Select Inclusion" name="equipmentInclusion[]" style="width: 100%;">
                     
                      </select>
                      </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="addDishBtn" id="addDishBtn" class="btn btn-primary" onclick="btnsave()">Save</button>
                    </div>
                </div>
              </div>
            </form>
          </div>
        <!-- End Modals-->
        </div>
          <!-- /.box -->



      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
<script>
$(function () {
$("#example1").DataTable();
$('#example2').DataTable({
"paging": true,
"lengthChange": false,
"searching": false,
"ordering": true,
"info": true,
"autoWidth": false
});
});
</script>

<script>
      function getReservationDetail(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveReservation",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#editReservationID').val(data['ss'][0]['reservationID']);
                $('#editReservationDate').val(data['ss'][0]['eventDate']);
                var opty = document.getElementById('editReservationPackage').options;
                
                  for(var i =0; i<opty.length; i++){
                    if(opty[i].value==data['ss'][0]['packageID']){
                    $('#editReservationPackage').val(data['ss'][0]['packageID']) ;
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


@endsection