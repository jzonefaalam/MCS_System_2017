@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <style>
  .btn-space{
    margin-right: 5px;
  }
  </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <br>
      <ol class="breadcrumb">
        <li><a href="TransactionPage"><i class="fa fa-wrench"></i>Transaction</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <div class="row">
            <div class="col-md-6">
              <h2>Transaction List</h2>
            </div>
            <div class="col-md-6">
              <a class="btn btn-app" href="#" style="float:right">
                <i class="fa fa-save"></i>Button
              </a>
            </div>
          </div>
        </div>
        <!-- /Header -->
        <div class="box-body">
          <table class="table table-bordered table-striped dataTable">
            <thead>
              <tr>
                <th>Transaction #</th>
                <th>Event Name</th>
                <th>Customer</th>
                <th>Payment</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transactionData as $transactionData)
              <tr>
                <td>{{ $transactionData->transactionNumber }}</td>
                <td>{{ $transactionData->eventName }}</td>
                <td>{{ $transactionData->fullName }}</td>
                <td>{{ $transactionData->totalFee }}</td>
                <td>{{ $transactionData->transactionStatus }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /Body -->
      </div>
      <!-- /Box -->
    </section>
    <!-- /Content -->
  </div>
  <!-- /Content-wrapper -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
  @endsection