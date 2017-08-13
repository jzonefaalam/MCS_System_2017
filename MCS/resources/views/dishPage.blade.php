@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
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

      <!--DELETE Modal-->
                <form role="form" method="POST" action="/DeleteDishPage" class="form-horizontal">
                <div class="modal fade" id="deleteDishModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="deleteDishID" id="deleteDishID" readonly="">
                            </div>
                          </div>
                          {!! csrf_field() !!}
                          <div>
                            <h5> Are you sure you want to delete item? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deleteDishBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                </form>
      <!-- End Modals-->

        <!-- Update Dish Modal-->
        <form role="form" method="POST" action="EditDishPage" class="form-horizontal editDishValidator" enctype="multipart/form-data">
         <div class="modal fade" id="editDishModal">
           <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">UPDATE DISH</h4>
                  </div>
                      
                  
                  <div class="modal-body">
                  {!! csrf_field() !!}
                  <div class="form-group" style="display: none;">
                    <label class="col-sm-4 control-label">Dish ID</label>
                    <div class="col-sm-6">
                      <div class = "input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-list" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" id="editDishID" name="editDishID" readonly="">
                      </div>
                    </div>
                  </div>
        
                  <div class="form-group">
                      <div class="col-sm-4" >
                        <img id="photoIcon" align="middle" src="images/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-4 control-label">Dish Name</label>
                    <div class="col-sm-6">
                      <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="editDishName" id="editDishName" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Price</label>
                    <div class="col-sm-6">
                      <div class = " input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <input type="text" class="form-control" name="editDishPrice" id="editDishPrice" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-4 control-label"> Description</label>
                    <div class="col-sm-6 ">
                      <div class = "input-group">
                        <div class="input-group-addon">
                        <i class="fa fa-quote-right" aria-hidden="true"></i>
                        </div>
                        <textarea type="text" required class="form-control" name="editDishDesc" id="editDishDesc"></textarea>
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
                        <select class="form-control" name="editDishType" id="editDishType">
                          @foreach($addDishData as $dishTypeData)
                          <option value="{{ $dishTypeData->dishTypeID }}">{{ $dishTypeData->dishTypeName }} </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
      
                  <div class="form-group has-feedback">
                    <label class="col-sm-4 control-label">Image</label>
                    <div class="col-sm-6">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <input type="file" name="editDishImage" id="editDishImage">
                        </div>
                      </div>
                    </div>
                  </div>
      

                  <div class="modal-footer">
                    <button type="submit" name="editDishBtn" class="btn btn-primary">Save</button>
                  </div>
                  </div>
      
            </div>                   
           </div>
         </div>
         </form>
        <!-- End Modals-->

        <!-- Add Dish Modal-->
        <div class="panel-body">
          <form id="addDishForm" role="form" method="POST" action="/DishPage" class="form-horizontal" enctype="multipart/form-data">
                {!! csrf_field() !!}
            <div class="modal fade" id="addDishModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">NEW DISH</h4>
                    </div>
                    <div class="modal-body">

                    <input type="text" name="addDishID" id="addDishID" value = "{{ $dishNewID }}" hidden>

                    {!! csrf_field() !!}

                    <div class="form-group">
                      <div class="col-sm-4" >
                        <img id="photoIcon" align="middle" src="images/imageIcon.png" class="img-responsive" style="width:150px;margin-left:220px;border-radius:50%;height:150px; "/>
                      </div>
                    </div>

                      <div class="form-group">
                        <label class="col-sm-4 control-label">Dish Name</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-cutlery" aria-hidden="true"></i></div>
                         <input type="text" class="form-control" name="addDishName" id="addDishName" placeholder="Dish Name" data-error="This field is required">
                         </div>
                        </div>
                      </div>

                      <div class="form-group ">
                        <label class="col-sm-4 control-label"> Price</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                         <input type="text" class="form-control" name="addDishPrice" placeholder="Dish Price" id="addDishPrice">
                        </div>
                        </div>
                      </div>

                      <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label"> Description</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                         <textarea type="text" class="form-control" id="addDishDesc" name="addDishDesc" placeholder="Dish Description"></textarea>
                        </div>
                        </div>
                      </div>

                      <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label"> Type</label>
                        <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-navicon" aria-hidden="true"></i></div>
                         <select class="form-control tyty" name="addDishType" id="addDishType">
                             @foreach($addDishData as $dishTypeData)
                              <option value="{{ $dishTypeData->dishTypeID }}">{{ $dishTypeData->dishTypeName }} </option>
                             @endforeach
                         </select>
                        </div>
                        </div>
                      </div>


                    <input type="hidden" id="token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <label class="col-sm-4 control-label">Dish Image</label>
                       <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                          <input type="file" name="addDishImage" id="addDishImage">
                        </div>
                        </div>
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



        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Dish List</h2>
              </div>
              <div class="col-md-6">
                <a class="btn btn-app" data-target="#addDishModal" data-toggle="modal" style="float:right">
                  <i class="fa fa-save"></i> ADD
                </a>
              </div>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered dataTable" id="dishTable">
              <thead>
                <tr>
                  <th style="width:150px;">Image</th>
                  <th style="width:200px;">Name</th>
                  <th style="width:250px;">Description</th>
                  <th style="width:100px;">Cost</th>
                  <th style="width:110px;">Type</th>
                  <th style="width:190px;">Actions</th>
                  <th style="width:150px;">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dishData as $dishData)
                <tr>
                  <td><img src="{{ asset('images/' . $dishData->dishImage) }}"  style="width:150px;height:100px;" /></td>
                  <td>{{ $dishData->dishName }}</td>
                  <td>{{ $dishData->dishDescription }}</td>
                  <td>{{ $dishData->dishCost }}</td>
                  <td>{{ $dishData->dishTypeName }}</td>
                  <td>
                    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#editDishModal" onclick="editdishget(this.name);" name="{{$dishData->dishID}}"><i class="fa fa-wrench fa-fw"></i> Update</a>
                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteDishModal" onclick="editdishget(this.name);" name="{{$dishData->dishID}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                  <td>
                  <?php if (( $dishData->dishAvailability )==0): ?> 
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Disable</button>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                      <li>
                        <a data-toggle="modal" data-target="#enableDishModal" onclick="editdishget(this.name);" name="{{$dishData->dishID}}">Enable</a>
                      </li>
                      </ul>
                      </div>
                  <?php endif ?>

                  <?php if (( $dishData->dishAvailability )==1): ?> 
                      <div class="btn-group">
                      <button type="button" class="btn btn-default">Enable</button>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                      <li>
                        <a data-toggle="modal" data-target="#disableDishModal" onclick="editdishget(this.name);" name="{{$dishData->dishID}}">Disable</a>
                      </li>
                      </ul>
                      </div>
                  <?php endif ?>
                </td>
                  
                </tr>
                @endforeach
                <!-- Enable Package Modal--> 
              <form role="form" method="POST" action="/EnableDish" class="form-horizontal">
                <div class="modal fade" id="enableDishModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">

                          {!! csrf_field() !!}
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Dish ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="enableDishID" id="enableDishID" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5>Are you sure you want to activate this menu?</h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="enableDishBtn" class="btn btn-default text-left" >Yes</button>
                            <button data-dismiss="modal" class="btn btn-default text-left" >No</button>
                            <!-- <script>
                              $('#enableModal').modal('hide');
                            </script> -->
                          </div>

                        </div>
                          
                    </div>
                  </div>
                </div>
                </form>
                <!-- End Modals-->

                <!-- Disable Package Modal-->
                <div class="modal fade" id="disableDishModal">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="/DisableDish" class="form-horizontal">
                        <div class="modal-body">
                          {!! csrf_field() !!}
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Dish ID</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="disableDishID" id="disableDishID" readonly="">
                            </div>
                          </div>
                          <div>
                            <h5> Are you sure you want to deactive this dish? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="disableDishBtn" class="btn btn-primary">Yes</button>
                            <button data-dismiss="modal" class="btn btn-primary">No</button>
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



      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

    <script>
  $(function () {
    $('#dishTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script>
      <script>
        $('#addDishImage').change(function(){

          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function(){
            // alert("asdsd")

              document.getElementById('photoIcon').src = this.result;
              };
          reader.readAsDataURL(file);

          var yourImg = document.getElementById('photoIcon');
          if(yourImg && yourImg.style) {
          yourImg.style.height = '150px';
          yourImg.style.width = '150px';
        }
            });

          $('#editDishImage').change(function(){

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
        function editdishget(id){
          $.ajax({
                  type: "GET",
                  url:  "/RetrieveDish",
                  data: 
                  {
                      sdid: id
                  },
                  success: function(data){
                  $('#editDishID').val(data['ss'][0]['dishID']);
                  $('#deleteDishID').val(data['ss'][0]['dishID']);
                  $('#editDishName').val(data['ss'][0]['dishName']);
                  $('#editDishDesc').val(data['ss'][0]['dishDescription']);
                  $('#editDishPrice').val(data['ss'][0]['dishCost']);
                  $('#disableDishID').val(data['ss'][0]['dishID']);
                  $('#enableDishID').val(data['ss'][0]['dishID']);
                  var opty = document.getElementById('editDishType').options;
                  
                    for(var i =0; i<opty.length; i++){
                      if(opty[i].value==data['ss'][0]['dishTypeID']){
                      $('#editDishType').val(data['ss'][0]['dishTypeID']) ;
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
      $('#addDishForm').bootstrapValidator({
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                addDishName: {
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
                        }
                    }

                },
                 addDishDesc: {
                      validators: {
                          stringLength: {
                            max: 20,
                            message:'Middle name should not exceed 20 characters.'
                          },
                            regexp: {
                                  regexp: /^[a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                                  message: 'This field should contain letters only.'
                          
                          }
                      }
                  }
                },
                addDishPrice: {
                      validators: {
                      regexp: {
                              regexp: /^\d+(?:\.\d{1,2})?$/,
                              message: 'Invalid Input.'
                      },
                      stringLength: {
                          max: 9,
                          message:'Price limit reached'
                      },
                          notEmpty: {
                          message: 'This field is required.'
                      }
                  }
                }
                }
            });
      </script>

      <script type="text/javascript">
      $('.editDishValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editDishName: {
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
               editDishDesc: {
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
                }
              },
              editDishPrice: {
                    validators: {
                    regexp: {
                            regexp: /^\d+(?:\.\d{1,2})?$/,
                            message: 'Invalid Input.'
                    },
                    stringLength: {
                        max: 9,
                        message:'Price limit reached'
                    },
                        notEmpty: {
                        message: 'This field is required.'
                    },
                }
              }
              }
          });
      </script>

@endsection