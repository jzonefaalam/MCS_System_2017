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
  <link rel="stylesheet" href="{{ asset('LTE/bootstrap/css/bootstrap.min.css') }}">
  <!-- End -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}">
  <!-- End -->

  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- End -->

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('LTE/dist/css/skins/_all-skins.css') }}">
  <!-- End -->
  
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datepicker/datepicker3.css') }}">
  <!-- End -->

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- End -->
  
  <!-- Bootstrap time PickeSr -->
  <link rel="stylesheet" href="{{ asset('LTE/timepicker/bootstrap-timepicker.min.css') }}">
  <!-- End -->

  <!-- Select 2-->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/select2/select2.min.css') }}">
  <!-- End -->

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.css') }}">
  <!-- End -->


  <!-- <link rel="stylesheet" href="{{ asset('LTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="{{ asset('LTE/plugins/iCheck/flat/blue.css') }}"> -->
  <!-- Morris chart -->
  <!--   <link rel="stylesheet" href="{{ asset('LTE/plugins/morris/morris.css') }}">-->  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="{{ asset('LTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}"> -->
  
</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <header class="main-header">
    <!-- Logo -->
    <a href="../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MCS</b>  </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <a style="text-align:center;" class="pull-right" href="/Logout">  Logout</a>
    </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" style="font-size: 20px">
          <li>
            <a class="@yield('activeDashboard')" href="DashboardPage">
              <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="treeview">
            <a class="@yield('activeMaintenance')">
              <i class="fa fa-wrench"></i> <span>Maintenance</span>
              <span class="pull-right-container">
                <i class="fa fa-caret-right pull-right"></i>
              </span>
            </a>
              <ul class="treeview-menu">
                <li class="active treeview">
                  <a class="@yield('activeDishPage')" href="DishPage">
                    <i class="fa fa-circle-o"></i> Dish
                    <span class="pull-right-container">
                      <i class="fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                    <ul class="treeview-menu">
                      <li>
                        <a class="@yield('activeDishListPage')" href="/DishPage">
                          <i class="fa fa-square-o"></i> Dish List
                        </a>
                      </li>
                      <li>
                        <a class="@yield('activeDishTypePage')" href="/DishTypePage">
                          <i class="fa fa-square-o"></i> Dish Type
                        </a>
                      </li>
                    </ul>
                </li>
                <li class="active treeview">
                  <a href="/EmployeePage"><i class="fa fa-circle-o"></i> Employee
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <!-- <li><a href="/EmployeePage"><i class="fa fa-square-o"></i> Employee List</a></li> -->
                    <li><a href="/EmployeeTypePage"><i class="fa fa-square-o"></i> Employee Type</a></li>
                  </ul>
                </li>
                <li>
                  <a href="/EventPage"><i class="fa fa-circle-o"></i> Event</a>
                </li>
                <li>
                  <a href="/LocationPage"><i class="fa fa-circle-o"></i> Location</a>
                </li>
                <li>
                  <a href="/PackagePage"><i class="fa fa-circle-o"></i> Packages</a>
                </li>
                <li>
                  <a href="/ServicePage"><i class="fa fa-circle-o"></i> Service
                    <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                      <a href="/ServicePage"><i class="fa fa-square-o"></i> Service List</a>
                    </li>
                    <li>
                      <a href="/ServiceTypePage"><i class="fa fa-square-o"></i> Service Type</a>
                    </li>
                  </ul>
                </li>
            </ul>
          </li>
          <li class="treeview">
            <a href="/ReservationPage">
              <i class="fa fa-file-text-o"></i> <span>Reservation</span>
            </a>
          </li>
          <li class="treeview">
            <a href="/InventoryEquipmentPage">
              <i class="fa fa-book"></i>  <span>Inventory</span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/InventoryEquipmentPage"><i class="fa fa-square-o"></i> Equipment</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="/TransactionPage">
              <i class="fa fa-file-text"></i> <span>Transactions</span>
            </a>  
          </li>
          <li class="treeview">
            <a href="/ReportPage">
              <i class="fa fa-file-text"></i> <span>Reports</span>
            </a>  
          </li>
        </ul>
      </section>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

  </div>
<!-- ./wrapper -->


<!-- Data Tables -->
<script src="{{ asset('LTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('LTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<!-- End -->

<!-- bootstrap time picker -->
<script src="{{ asset('LTE/timepicker/bootstrap-timepicker.min.js') }}"></script>
<!-- End -->

<!-- datepicker -->
<script src="{{ asset('LTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<!-- End -->

<!-- daterangepicker -->
<script src="{{ asset('LTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- End -->

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('LTE/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- End -->

<!-- jQuery 2.2.3 -->
<script src="{{ asset('LTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- End -->

<!-- jQuery UI 1.11.4 -->
<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="{{ asset('LTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script> -->
<!-- Slimscroll -->
<!-- <script src="{{ asset('LTE/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script> -->
<!-- FastClick -->
<!-- <script src="{{ asset('LTE/plugins/fastclick/fastclick.js') }}"></script> -->
<!-- AdminLTE App -->
<!-- <script src="{{ asset('LTE/dist/js/app.min.js') }}"></script> -->
@yield('script')

<!-- jvectormap -->
<!-- <script src="{{ asset('LTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script> -->
<!-- <script src="{{ asset('LTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script> -->
<!-- End -->

<!-- Morris.js charts -->
<!-- <script src="{{ asset('LTE/plugins/morris/morris.min.js') }}"></script> -->
<!-- End -->

<!-- <script src="{{ asset('LTE/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') }}"></script> -->
</body>

</html>
