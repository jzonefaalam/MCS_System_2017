<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dashboard</title>

  
  
  <link href='css/bootstrap.css' rel='stylesheet' />
    <link href='css/rotating-card.css' rel='stylesheet' />
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap3/css/font-awesome.css" rel="stylesheet" />
    
  <link href="assets/css/gsdk.css" rel="stylesheet" />   
    <link href="assets/css/demo.css" rel="stylesheet" /> 
<link rel="stylesheet" type="text/css" href="style.css">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="background.css">
  <link href="assets/css/gsdk-base.css" rel="stylesheet" />
    <!--     Font Awesome     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
</head>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<body>
 <div id="navbar-full">
    <div id="navbar">
    <!--    
        navbar-default can be changed with navbar-ct-blue navbar-ct-azzure navbar-ct-red navbar-ct-green navbar-ct-orange  
        -->
        <nav class="navbar navbar-fixed-top navbar-transparent navbar-ct-green " role="navigation">
          
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Auction<sup>3</sup></a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="products.php">Buy product</a></li>
                        <li><a href="sellproduct.php">Sell product</a></li>
                      
                      </ul>
                </li>
                
                <li>
                    <a href="javascript:void(0);" data-toggle="search" class="hidden-xs"><i class="fa fa-search"></i></a>
                </li>
              </ul>
               <form class="navbar-form navbar-left navbar-search-form" role="search">                  
                 <div class="form-group">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                 </div> 
              </form>
              <ul class="nav navbar-nav navbar-right">
                    
                    <li><a class="btn btn-default btn-simple" href="registration.php" >Register</a></li>
                    <li><a class="btn btn-default btn-round" href="index.php">Sign in</a></li>
               </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
         <div class='blurred-container'>

        <div class="motto">
        <div class="border no-right-border">1</div><div class="border no-right-border">2</div><div class="border">3</div>
            <div style="margin-left: -30px">Auction!</div>
            
            
            
        </div>
        <div class="img-src" style="background-image: url('assets/img/bg1.jpg')"></div>
        <div class='img-src blur' style="background-image: url('assets/img/bg1-blur.jpg')"></div>
    </div>
    </div><!--  end navbar -->

</div> <!-- end menu-dropdown -->

             


<div class="main"><br>
  <div class="container">
        <div class="row">
        <div class="col-sm-12">
          <div class="col-md-6 col-md-offset-3">
   <div class="panel panel-success";">
   <div class="panel panel-heading">
     <h3 ><center>Log-in</center></h3>
     </div>
     <div class="panel-body panel">
       <form action="dashboard.php" method="POST">
           <div class="col-md-8 col-md-offset-2">
                      
          <div class="form-group form-animate-text">
              <input type="email" class="form-text"  name="fname" required>
              <span class="bar"></span>
              <label>Email Address<sup style="color: red">*</sup></label>
            </div>
            </div>
             <div class="col-md-8 col-md-offset-2">
                      
          <div class="form-group form-animate-text">
              <input type="Password" class="form-text"  name="fname" required>
              <span class="bar"></span>
              <label>Password<sup style="color: red">*</sup></label>
            </div>
            </div>
            <div>
            <div class="col-md-3 col-md-offset-2">
            <br>
              <a href="registration.php" class="btn btn-warning btn-fill">Register</a>
            </div>  
            <div class="col-md-3 col-md-offset-2 ">
            <br>
              <button class="btn btn-success btn-fill">Sign-in</button>
            </div>  </div>
            <div class="col-md-12 col-md-offset-4">
              
            <br>
              
            
            <div class="fb-share-button" data-href="https://123auction.000webhostapp.com/index.php" data-layout="button" data-size="large" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore btn btn-info btn-fill btn-wd" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2F123auction.000webhostapp.com%2Findex.php&amp;src=sdkpreparse">Share<i class="fa fa-facebook-square" aria-hidden="true"></i></a></div>

            </div>
            
       </form>
     </div>
   </div>
   </div>
        </div>
        </div><!-- end row -->
    </div> 
<div class="container">
<div class="col-md-12">

  
</div>
<!-- end main --></div>
</div>
  <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="assets/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>

  <script src="bootstrap3/js/bootstrap.js" type="text/javascript"></script>
  <script src="assets/js/gsdk-checkbox.js"></script>
  <script src="assets/js/gsdk-radio.js"></script>
  <script src="assets/js/gsdk-bootstrapswitch.js"></script>
  <script src="assets/js/get-shit-done.js"></script>
    <script src="assets/js/custom.js"></script>
<script src="scripts.js"></script>  
    <script src="assets/js/custom.js"></script>
      

<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
  <script src="assets/js/wizard.js"></script>
<script type="text/javascript">
  function validateFirstStep(){
    
}

function validateSecondStep(){
   
}

function validateThirdStep(){
    //code here for third step
    
    
}
</script>

</body>


 
  

  
</html>