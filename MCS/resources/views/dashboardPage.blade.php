@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="/DashboardPage"><i class="fa fa-wrench"></i> Dashboard</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <div class="box-body">
            <!-- Other Items -->
            <div class="col-md-6">
              <!-- Info Boxes Style 2 -->
                  <!-- <div class="info-box bg-yellow">
                    <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Inventory</span>
                      <span class="info-box-number">5,200</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 50%"></div>
                      </div>
                      <span class="progress-description">
                            50% Increase in 30 Days
                          </span>
                    </div> -->
                    <!-- /.info-box-content -->
                  <!-- </div> -->
              <!-- /.info-box -->
                 <!--  <div class="info-box bg-green">
                    <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Reservation</span>
                      <span class="info-box-number">92,050</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 20%"></div>
                      </div>
                      <span class="progress-description">
                            20% Increase in 30 Days
                          </span>
                    </div> -->
                    <!-- /.info-box-content -->
                  <!-- </div> -->
              <!-- /.info-box -->
                  <!-- <div class="info-box bg-red">
                    <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Downloads</span>
                      <span class="info-box-number">114,381</span>

                      <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                      </div>
                      <span class="progress-description">
                            70% Increase in 30 Days
                          </span>
                    </div>
                    <!-- /.info-box-content -->
                  <!-- </div> -->
              <!-- /.info-box -->
            </div>
            <!-- Notifications -->
            <div class="col-md-6">
              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>

                  <h3 class="box-title">NOTIFICATIONS</h3>

                  <div class="box-tools pull-right">
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered table-striped dataTable" id="notificationTable">
                      <thead>
                      <tr>
                        <th width="150px">Notifs</th>
                      </tr>
                      </thead>
                      <tbody>
                        @foreach($dashboardData as $dashboardData)
                        <tr>
                          <td>
                            <a href="DishPage">{{ $dashboardData -> eventName}}</a>
                            <small class="label label-danger pull-right"><i class="fa fa-clock-o"></i> {{ $dashboardData -> eventTime }}</small>
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
              </div>
              <!-- /.box -->
            </div>

        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script>
  $(function () {
    $('#notificationTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
</script>
@endsection