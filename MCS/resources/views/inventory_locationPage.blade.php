@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="menu.php"><i class="fa fa-wrench"></i> Maintenance</a></li>
          <li class="active"><a href = "#"><i class="fa fa-map-pin"></i>Location</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Locations</h2>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Location Name</th>
                  <th>Location Description</th>
                  <th>Location Address</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($locationData as $locationData)
                <tr>
                  <td><img src="{{ asset('images/' . $locationData->locationImage) }}"  style="width:150px;height:100px;" /></td>
                  <td> {{ $locationData->locationName }} </td>
                  <td> {{ $locationData->locationDescription }} </td>
                  <td width="130px"> {{ $locationData->locationAddress }} </td>                  
                  <td width="250px">
                  <?php if (($locationData->locationAvailability)==0): ?>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default">Disable</button>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                      <li>
                        <a data-toggle="modal" data-target="#enableLocationModal" onclick="getLocation(this.name);" name="{{$locationData->locationID}}">Enable</a>
                      </li>
                      </ul>
                      </div>
                  <?php endif ?>
                  <?php if (($locationData->locationAvailability)==1): ?>
                    <div class="btn-group">
                      <button type="button" class="btn btn-default">Enable</button>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      <span class="caret"></span>
                      <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                      <li>
                        <a data-toggle="modal" data-target="#disableLocationModal" onclick="getLocation(this.name);" name="{{$locationData->locationID}}">Disable</a>
                      </li>
                      </ul>
                      </div>
                  <?php endif ?>
        						
                  </td>
                  
                </tr>
                @endforeach
		  
                    <!-- ENABLE LOCATION Modal-->

                      <form id="editLocationForm" role="form" method="POST" action="/EnableLocation" class="form-horizontal">
                      <div class="modal fade" id="enableLocationModal">
                      <div class="modal-dialog">
                      <div class="modal-content">

                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">UPDATE LOCATION</h4>
                      </div>

                      <div class="modal-body">

                      {!! csrf_field() !!}

                      <div class="form-group" style="display:none;">
                      <label class="col-sm-4 control-label">Location ID</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="enableLocationID" id="enableLocationID" readonly="">
                      </div>
                      </div>
                      </div>

                      <div>
                        <h5> Are you sure you want to enable this item? </h5>
                      </div>

                      </div>
                      <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      </div>
                      </div>
                    </div>
                    </form>
                    <!-- End Modals-->

                    <!-- DISABLE LOCATION Modal-->
                      <form id="editLocationForm" role="form" method="POST" action="/DisableLocation" class="form-horizontal">
                      <div class="modal fade" id="disableLocationModal">
                      <div class="modal-dialog">
                      <div class="modal-content">

                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">UPDATE LOCATION</h4>
                      </div>

                      <div class="modal-body">

                      {!! csrf_field() !!}

                      <div class="form-group" style="display:none;">
                      <label class="col-sm-4 control-label">Location ID</label>
                      <div class="col-sm-5">
                      <div class = "input-group">
                      <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                      <input type="text" class="form-control" name="disableLocationID" id="disableLocationID" readonly="">
                      </div>
                      </div>
                      </div>

                      <div>
                        <h5> Are you sure you want to disable this item? </h5>
                      </div>

                      </div>
                      <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                      </div>
                      </div>
                    </div>
                    </form>
                    <!-- End Modals-->

        <!-- addlocation Modal-->
                    <div class="modal fade" id="addLocationModal">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form id="addLocationForm" role="form" method="POST" action="/LocationPage" class="form-horizontal addLocationValidator" enctype="multipart/form-data">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">ADD LOCATION</h4>
                          </div>
                          <div class="modal-body">
                          {!! csrf_field() !!}
                            <div class="form-group">
                              <label class="col-sm-4 control-label">Location Name</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-signs" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationName" placeholder="Location Name"
                                data-error="This field is required">
                              </div>
                              </div>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label"> Description</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                                <textarea type="text" class="form-control" name="addLocationDescription" placeholder="Location Description"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label"> Address</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-map-o" aria-hidden="true"></i></div>
                                <textarea type="text" class="form-control" name="addLocationAddress" placeholder="Location Address"></textarea>
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Person</label>
                             <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-user" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactPerson" placeholder="Full Name">
                                </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label">Contact Number</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-phone" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationContactNumber" placeholder="Contact Number">
                              </div>
                            </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Capacity</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-users" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationCapacity" placeholder="Location Capacity">
                              </div>
                              </div>
                            </div>
                            <div class="form-group ">
                              <label class="col-sm-4 control-label"> Fee</label>
                              <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                                <input type="text" class="form-control" name="addLocationFee" placeholder="Location Fee">
                              </div>
                            </div>
                            </div>

                            <div class="form-group has-feedback">
                              <label class="col-sm-4 control-label">Location Image</label>
                             <div class="col-sm-6">
                              <div class="input-group">
                               <div class="input-group-addon">
                                <input type="file" name="addLocationImage">
                              </div>
                              </div>
                            </div>


                          </div>
                          <div class="modal-footer">
                            <button type="submit" name="addLocationBtn" class="btn btn-primary">Submit</button>
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
      function getLocation(id){
        $.ajax({
                type: "GET",
                url:  "/RetrieveLocation",
                data: 
                {
                    sdid: id
                },
                success: function(data){
                $('#enableLocationID').val(data['ss'][0]['locationID']);
                $('#disableLocationID').val(data['ss'][0]['locationID']);
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
    $('.editLocationValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              editLocationName: {
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
               editLocationAddress: {
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
                editLocationDesc: {
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
                editLocationContactPerson: {
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
                editLocationContactNumber: {
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
                editLocationCapacity: {
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
                editLocationPrice: {
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
              }
          });
      </script>

      <script type="text/javascript">
    $('.addLocationValidator').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              addLocationName: {
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
               addLocationAddress: {
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
                addLocationDescription: {
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
                addLocationContactPerson: {
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
                addLocationContactNumber: {
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
                addLocationCapacity: {
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
                addLocationFee: {
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
              }
          });
      </script>
@endsection