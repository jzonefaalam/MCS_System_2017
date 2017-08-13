@extends('layouts.userUI')
@section('contents')
<div class="container">

        <div class="row">
            <div class="box" style ="background-color:black">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
							 <li data-target="#carousel-example-generic" data-slide-to="3"></li>
							  <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/cb.jpg" alt= "" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/sp.jpg" alt="" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/pas.jpeg" alt="" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/bt.jpg" alt="" style ="height:465px;width:460px">
                            </div>
							<div class="item">
                                <img class="img-responsive img-full" src="img/le.jpg" alt="" style ="height:465px;width:460px">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name" style ="color:white">Margareth Catering Services</h1>
                    <hr class="tagline-divider">
					<button type = "submit" class = "btn-info"><a href="Reservation.html" style ="text-decoration:none; color:white"> Make a Reservation </a> </button>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
@endsection