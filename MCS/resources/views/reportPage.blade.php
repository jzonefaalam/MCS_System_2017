@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <br>
        <ol class="breadcrumb">
          <li><a href="/Reports"><i class="fa fa-wrench"></i> Reports</a></li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="box box-primary">
          <!-- box header -->
          <div class="box-header with-border">
            <div class="row">
              <div class="col-md-6">
                <h2>Reports Lsasist</h2>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="row">

              <div class="col-md-6">
                <h4> Transactions </h4>
                <a class="btn btn-app" style="width: 120px; height: 80px;" onclick="printMonthlyTransactions();">
                  <i class="fa fa-print" ></i>  Monthly Transactions
                </a>
                <a class="btn btn-app" style="width: 120px; height: 80px;" onclick="printYearlyTransactions();">
                      <i class="fa fa-print" ></i> Yearly Transactions
                </a>
                <a class="btn btn-app" style="width: 120px; height: 80px;" onclick="printAllTransactions();">
                      <i class="fa fa-print" ></i>  All Transactions
                </a>
              </div>
              <div class="col-md-6">
                <h4> Purchase Order Report </h4>
                <a class="btn btn-app" style="width: 120px; height: 80px;" onclick="printMonthlyTransactions();">
                  <i class="fa fa-print" ></i>  Monthly Transactions
                </a>
                <a class="btn btn-app" style="width: 120px; height: 80px;" onclick="printYearlyTransactions();">
                      <i class="fa fa-print" ></i> Yearly Transactions
                </a>
                <a class="btn btn-app" style="width: 120px; height: 80px;" onclick="printAllTransactions();">
                      <i class="fa fa-print" ></i>  All Transactions
                </a>
              </div>

            </div>

            

          </div>
          <!-- /.box-body -->
        </div>
          <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<script>
  function printMonthlyTransactions(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveMonthlyTransaction",
      success: function(data){
        var totalAmount = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Sales Report for the Month of ' +currentMonth+ '</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>') ;
        frameDoc.document.write('<th> Client Info</th>');
        frameDoc.document.write('<th> Service Acquired </th>');
        frameDoc.document.write('<th> Amount </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['transactionData'].length; i++) { 
          var packagePrice = data['transactionData'][i]['packageCost'] * data['transactionData'][i]['guestCount'];
          packagePrice = packagePrice.toFixed(2);
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['transactionData'][i]['eventDate']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['fullName']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['packageName']+ ' for ' +data['transactionData'][i]['guestCount']+ ' People' + '</td>');
          frameDoc.document.write('<td>'+data['transactionData'][i]['totalFee']+ '</td>');
          frameDoc.document.write('</tr>');
          var transactionFee = parseFloat(data['transactionData'][i]['totalFee']);
          totalAmount = totalAmount + transactionFee;
        }
        // alert(totalAmount);
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>' +totalAmount +'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();

        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printYearlyTransactions(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    $.ajax({
      type: "GET",
      url:  "/RetrieveYearlyTransaction",
      success: function(data){
        var totalAmount = 0;
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Sales Report for Year ' +yyyy+ '</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>') ;
        frameDoc.document.write('<th> Client Info</th>');
        frameDoc.document.write('<th> Service Acquired </th>');
        frameDoc.document.write('<th> Amount </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['transactionData'].length; i++) { 
          var packagePrice = data['transactionData'][i]['packageCost'] * data['transactionData'][i]['guestCount'];
          packagePrice = packagePrice.toFixed(2);
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['transactionData'][i]['eventDate']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['fullName']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['packageName']+ ' for ' +data['transactionData'][i]['guestCount']+ ' People' + '</td>');
          frameDoc.document.write('<td>'+data['transactionData'][i]['totalFee']+ '</td>');
          frameDoc.document.write('</tr>');
          var transactionFee = parseFloat(data['transactionData'][i]['totalFee']);
          totalAmount = totalAmount + transactionFee;
        }
        // alert(totalAmount);
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>' +totalAmount +'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();

        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script>
  function printAllTransactions(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if (mm == 1){
      currentMonth = "January";
    }
    if (mm == 2){
      currentMonth = "February";
    }
    if (mm == 3){
      currentMonth = "March";
    }
    if (mm == 4){
      currentMonth = "April";
    }
    if (mm == 5){
      currentMonth = "May";
    }
    if (mm == 6){
      currentMonth = "June";
    }
    if (mm == 7){
      currentMonth = "July";
    }
    if (mm == 8){
      currentMonth = "August";
    }
    if (mm == 9){
      currentMonth = "September";
    }
    if (mm == 10){
      currentMonth = "October";
    }
    if (mm == 11){
      currentMonth = "November";
    }
    if (mm == 12  ){
      currentMonth = "December";
    }
    var currentMonth;
    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    
    var today = dd+'/'+mm+'/'+yyyy;
    var totalAmount = 0;
    $.ajax({
      type: "GET",
      url:  "/RetrieveAllTransaction",
      success: function(data){
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        frameDoc.document.write('<html><body> <div >');
        frameDoc.document.write('<image src = "logo.png" align = "pullcenter" width = "130" height = "100" style ="padding-left:10px"­> ');
        frameDoc.document.write('<p align = "Center">Margareth Catering Services </br>');
        frameDoc.document.write('B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>');
        frameDoc.document.write('696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>');
        frameDoc.document.write('margarethcateringservices@gmail.com </p></br></br>');
        frameDoc.document.write('<p align="right" >' +today+ '</p>');
        frameDoc.document.write('<p align= "center" style ="font-weight:bold;font-size:16pt">Sales Report of Margareth`s Catering Services</p>');
        frameDoc.document.write('<table border="1" style="width:100%;">');
        frameDoc.document.write('<tr>');
        frameDoc.document.write('<th> Event Date</th>') ;
        frameDoc.document.write('<th> Client Info</th>');
        frameDoc.document.write('<th> Service Acquired </th>');
        frameDoc.document.write('<th> Amount </th>');
        frameDoc.document.write('</tr>');
        for (i = 0; i < data['transactionData'].length; i++) { 
          var packagePrice = data['transactionData'][i]['packageCost'] * data['transactionData'][i]['guestCount'];
          packagePrice = packagePrice.toFixed(2);
          frameDoc.document.write('<tr style ="text-align:center">');
          frameDoc.document.write('<td>' +data['transactionData'][i]['eventDate']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['fullName']+ '</td>');
          frameDoc.document.write('<td>' +data['transactionData'][i]['packageName']+ ' for ' +data['transactionData'][i]['guestCount']+ ' People' + '</td>');
          frameDoc.document.write('<td>'+data['transactionData'][i]['totalFee']+ '</td>');
          frameDoc.document.write('</tr>');
          var transactionFee = parseFloat(data['transactionData'][i]['totalFee']);
          totalAmount = totalAmount + transactionFee;
        }
        // alert(totalAmount);
        frameDoc.document.write('<tr style ="text-align:center">');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>  </td>');
        frameDoc.document.write('<td>TOTAL</td>');
        frameDoc.document.write('<td>' +totalAmount +'</td>');
        frameDoc.document.write('</tr>');
        frameDoc.document.write('</table></br>')
        frameDoc.document.write('</html>')
        frameDoc.document.close();
        setTimeout(function () {
          window.frames["frame1"].focus();
          window.frames["frame1"].print();
          frame1.remove();
        }, 500);
      }, 
      error: function(xhr)
      {
        alert($.parseJSON(xhr.responseText)['error']['message']);
      }                
    });
  }
</script>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
@endsection