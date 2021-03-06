  <?php
  include "dbcon.php";
?>
<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Margareths Catering Service</title>
    <link rel="icon" type="image/gif" href="ggg.png"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="dist_1/css/bootstrapValidator.css"/>
  <!-- sweetalert -->
  <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
  </head>

  <body class="hold-transition skin-black sidebar-mini">

	<?php
		$message = isset($_GET['message'])?intval($_GET['message']):0;
		
		if($message == 1) {
			echo "<script> swal('Data insertion failed!', ' ', 'error'); </script>";
		}
		
		if($message == 2) {
			echo "<script> swal('Added succesfully!', ' ', 'success'); </script>";
		}
		
		if($message == 3) {
			echo "<script> swal('Data update failed!', ' ', 'error'); </script>";
		}
		
		if($message == 4) {
			echo "<script> swal('Updated succesfully!', ' ', 'success'); </script>";
		}
		
		if($message == 5) {
			echo "<script> swal('Data deletion failed!', ' ', 'error'); </script>";
		}
		
		if($message == 6) {
			echo "<script> swal('Deleted succesfully!', ' ', 'success'); </script>";
		}

    if($message == 7) {
      echo "<script> swal('Data insertion failed!', 'Image file is invalid!', 'error'); </script>";
    }

    if($message == 8) {
      echo "<script> swal('Data insertion failed!', 'Image file size is invalid!', 'error'); </script>";
    }

    if($message == 9) {
      echo "<script> swal('Data insertion failed!', 'Package is already existing!', 'error'); </script>";
    }

	?>

    <div class="wrapper">
      <header class="main-header">
      <!-- Logo -->
      <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src ="logo2.png" width="50%" > </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Margareth's</b>Catering</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a  class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Administrator</span>
              </a>
              <ul class="dropdown-menu">
              <!-- User image -->
                <li class="user-header">
                  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p> Alexander Pierce - Web Developer<small>Member since Nov. 2012</small></p>
                </li>
              </ul>
            </li>
            <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-times"></i></a>
            </li>
          </ul>
        </div>
      </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" style="font-size: 20px">
            
             <li class="treeview">
              <a href="dashboard.php">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i> <span>Maintenance</span>
                <span class="pull-right-container">
                  <i class="fa fa-caret-right pull-right"></i>
                </span>
              </a>
                <ul class="treeview-menu">
                  <li class="active treeview">
                    <a href="menu.php"><i class="fa fa-circle-o"></i> Dish
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="menu.php"><i class="fa fa-square-o"></i> Dish List</a></li>
                      <li><a href="menu_type.php"><i class="fa fa-square-o"></i> Dish Type</a></li>
                    </ul>
                  </li>
                  <li class="active treeview">
                    <a href="employee.php"><i class="fa fa-circle-o"></i> Employee
                      <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="employee.php"><i class="fa fa-square-o"></i> Employee List</a></li>
                      <li><a href="employee_type.php"><i class="fa fa-square-o"></i> Employee Type</a></li>
                    </ul>
                  </li><li><a href="equipment.php"><i class="fa fa-circle-o"></i> Equipment</a></li>
                  <li><a href="event.php"><i class="fa fa-circle-o"></i> Event</a></li>
                  <li><a href="location.php"><i class="fa fa-circle-o"></i> Location</a></li>
                  <li><a href="package.php"><i class="fa fa-circle"></i> Packages</a></li>
                  <li><a href="service.php"><i class="fa fa-circle-o"></i> Services</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-calendar"></i> <span>Schedule</span>
              </a>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-file-text-o"></i> <span>Reservation</span>
              </a>
            </li>

          </ul>
        </section>
      <!-- /.sidebar -->
      </aside>
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
                  <i class="fa fa-save"></i> ADD PACKAGE
                </a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-stripped table-bordered">
              <thead>
                <tr>
                  <th>Image</th>
                  <th>Package Name</th>
                  <th>Package Description</th>
                  <th>Package Cost</th>
                  <th>Package Inclusion</th>
                  <th>Actions</th>
                  <th>Toggle</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $query = "SELECT * FROM packagetbl where packageStatus = 1";
                  $result = mysqli_query($connect,$query);
                  while($row=mysqli_fetch_array($result)):
                    $packageID=$row['packageID'];
                    $packageName=$row['packageName'];
                    $packageCost=$row['packageCost'];
                    $packageInclusion=$row['packageInclusion'];
                    $packageDescription=$row['packageDescription'];
                    $packageAvail = $row['packageAvailability'];
                    $packageImage = $row['imageName'];
                ?>
                <tr>
                  <td width="150px"><?php echo "<img alt='Image Not Available' width='150' src='images/".$row['imageName']."'"; ?></td>
                  <td><?php echo $packageName;?></td>
                  <td><?php echo $packageDescription;?></td>
                  <td width="100px"><?php echo $packageCost;?></td>
                  <td><?php echo $packageInclusion;?></td>
                  <td width="180px">
						 
						 <a class="btn btn-success btn-sm" 
							data-id="<?php echo $packageID; ?>"  
							data-name="<?php echo $packageName; ?>"  
							data-desc="<?php echo $packageDescription; ?>" 
							data-cost="<?php echo $packageCost; ?>" 
							onclick=" 
                $('#editPackageID').val($(this).data('id'));  
                $('#editPackageName').val($(this).data('name')); 
                $('#tempName').val($(this).data('name'));
								$('#editPackageDesc').val($(this).data('desc'));  
								$('#editPackagePrice').val($(this).data('cost'));  						
								$('#editPackageModal').modal('show')" 
							data-toggle="modal"><i class="fa fa-wrench"></i> Update</a>
					
                   <a class="btn btn-danger btn-sm" data-toggle="modal" href="#deletePackageModal<?php echo $row['packageID'];?>"><i class="fa fa-trash fa-fw"></i> Delete</a>
                  </td>
                  <td width="100px">
                  <?php
                    if($packageAvail==0){
                    ?>
                      <a class="btn btn-info btn-sm" data-toggle="modal" href="#enableModal<?php echo $row['packageID'];?>"><i class="fa fa-cog fa-fw"></i> Enable</a>
                    <?php
                    } else{ 
                    ?>
                      <a class="btn btn-warning btn-sm" data-toggle="modal" href="#disableModal<?php echo $row['packageID'];?>"><i class="fa fa-cog fa-fw"></i> Disable</a>
                    <?php
                      }
                    ?>
                 </td> 
                </tr>

                <!-- Enable Package Modal-->
                <div class="modal fade" id="enableModal<?php echo $row['packageID']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="enable_package.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Activate Package</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="packageID" value="<?php echo $row['packageID']?>" readonly="">
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
                <div class="modal fade" id="disableModal<?php echo $row['packageID']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="disable_package.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Deactivate Package</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="packageID" value="<?php echo $row['packageID']?>" readonly="">
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

                <!-- Delete Package Modal-->
                <div class="modal fade" id="deletePackageModal<?php echo $row['packageID']?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form role="form" method="POST" action="deleteItems.php" class="form-horizontal">
                        <div class="modal-body">
                          <div class="form-group" style="display: none;">
                            <label class="col-sm-4 control-label">Delete Package</label>
                            <div class="col-sm-5 input-group">
                              <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                              <input type="text" class="form-control" name="packageID" value="<?php echo $row['packageID']?>" readonly="">
                            </div>
                          </div>

                          <div>
                            <h5> Are you sure you want to delete this package? </h5>
                          </div>

                          <div style="text-align: center;">
                            <button type="submit" name="deletePackageBtn" class="btn btn-default">Yes</button>
                            <button data-dismiss="modal" class="btn btn-default">No</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modals-->

                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
		  
				<!-- edit package Modal-->
                    <div class="modal fade" id="editPackageModal<?php echo $row['packageID']?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                        <form id="editPackageForm" role="form" method="POST" action="editItems.php" class="form-horizontal" enctype="multipart/form-data">
                          
						  <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">UPDATE PACKAGE</h4>
                          </div>
						  
                          <div class="modal-body">
						  
                            <div class="form-group" style="display: none;">
                              <label class="col-sm-4 control-label">Package ID</label>
                              <div class="col-sm-5">
							  <div class = "input-group">
                               <span class="input-group-addon"><i class="fa fa-list" aria-hidden="true"></i></span>
                               <input type="text" class="form-control" name="editPackageID" id="editPackageID" value="<?php echo $row['packageID']?>" readonly="">
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
                      <label class="col-sm-4 control-label">Package Inclusions</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-navicon" aria-hidden="true"></i>
                          </div>
                          <select multiple class="form-control" name="editPackageInclusion[]" id="editPackageInclusion[]">
                              <?php  
                              $gettypes = "SELECT * FROM coursetypetbl where dishTypeStatus = 1";
                              $results = $connect->query($gettypes);
                              if($results->num_rows >0)
                                while($gettypes = mysqli_fetch_array($results)):
                              ?>
                              <option value="<?php echo $gettypes['dishTypeName'] ?>">
                              <?php echo $gettypes['dishTypeName'] ?>
                              </option>
                              <?php
                              endwhile;
                              ?>
                          </select>
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
          <div class="modal fade" id="addPackageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel">ADD PACKAGE</h4>
                </div>
                <form id="addPackageForm" role="form" method="POST" action="addItems.php" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
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
                        <textarea type="text" class="form-control" name="addPackageDesc" placeholder="Package Description"></textarea>
                      </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label class="col-sm-4 control-label">Package Cost</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                         <div class="input-group-addon">
                         <i class="fa fa-rouble" aria-hidden="true"></i></div>
                        <input type="text" class="form-control" name="addPackagePrice" placeholder="Package Cost">
                      </div>
                      </div>
                      </div>

                      <div class="form-group has-feedback">
                      <label class="col-sm-4 control-label">Package Inclusions</label>
                      <div class="col-sm-6">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-navicon" aria-hidden="true"></i>
                          </div>
                          <select multiple class="form-control" name="addPackageInclusion[]" id="addPackageInclusion[]">
                              <?php  
                              $gettypes = "SELECT * FROM coursetypetbl where dishTypeStatus = 1";
                              $results = $connect->query($gettypes);
                              if($results->num_rows >0)
                                while($gettypes = mysqli_fetch_array($results)):
                              ?>
                              <option value="<?php echo $gettypes['dishTypeName'] ?>">
                              <?php echo $gettypes['dishTypeName'] ?>
                              </option>
                              <?php
                              endwhile;
                              ?>
                          </select>
                        </div>
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
              </form>
            </div>
          </div>
        <!-- End Modals-->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->
    

    <!--                                                          JAVASCRIPTS                                          -->
    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/validator.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>

    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>

	<script src="bootstrap/js/bootstrap.min.js"></script>
	
  <script type="text/javascript">
      
      $(document).ready(function() {
          $('#addPackageForm').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            
            fields: {
              addPackageName: {
                validators: {
                  regexp: {
				  regexp: /^[0-9a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'Please supply a valid package name.'
                  },
                  notEmpty: {
                    message: 'Please supply the package name.'
                  },
                  remote: {
                    url: 'checkpackagename.php',
                    message: 'This package already exists!'
                  }
                }
              },
        
              addPackageDesc: {
                validators: {
                  stringLength: {
                    max: 50,
                    message: 'The system allows 50 characters only.'
                  }
                }
              },

              'addPackageInclusion[]': {
                validators: {
                  choice: {
                    min: 1,
                    max: 100,
                    message: 'Please select atleast one (1) dish type.'
                  }
                }
              },
        
              addPackagePrice: {
                validators: {
                  regexp: {
                    regexp: /^\d{0,6}(\.\d{0,2})?$/,
                    message: 'Invalid input.'
                  },
                  stringLength: {
                    max: 8,
                    message: 'Maximum price length is 6 digits.'
                  },
                  notEmpty: {
                    message: 'Please supply the package cost.'
                  }
                }
              },
            }
          })
        });
        </script>

  <script type="text/javascript">
      
      $(document).ready(function() {
          $('#editPackageForm').bootstrapValidator({
            feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
            },
            
            fields: {

              editPackageName: {
                validators: {
                  regexp: {
          regexp: /^[0-9a-zA-Z]+([-'\s][a-zA-Z]+)*$/,
                    message: 'Please supply a valid package name.'
                  },
                  notEmpty: {
                    message: 'Please supply the package name.'
                  }
                }
              },
        
              editPackageDesc: {
                validators: {
                  stringLength: {
                    max: 50,
                    message: 'The system allows 50 characters only.'
                  },
                }
              },

              'editPackageInclusion[]': {
                validators: {
                  choice: {
                    min: 1,
                    max: 100,
                    message: 'Please select atleast one (1) dish type.'
                  }
                }
              },
        
              editPackagePrice: {
                validators: {
                  regexp: {
                    regexp: /^\d{0,6}(\.\d{0,2})?$/,
                    message: 'Invalid input.'
                  },
                  stringLength: {
                    max: 8,
                    message: 'Maximum price length is 6 digits.'
                  },
                  notEmpty: {
                    message: 'Please supply the package cost.'
                  }
                }
              }
            }
          })
        });
        </script>

    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script><!-- 
    <script type="text/javascript" src="vendor/jquery/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist_1/js/bootstrapValidator.js"></script>
     -->
  </body>

</html>