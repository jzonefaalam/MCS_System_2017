@extends('layouts.userUI')
@section('contents')
<div class="container-fluid" align = "center">
			
				<table>
					<tr>
						<td style = "padding: 20px"> <big> <big> <big> <big> <big> <big> Margareth's Catering </big> </big> </big> </big> </big> </big> </br>
							<span class="glyphicons glyphicons-time"></span> 9:00am to 5:00 pm | Monday to Saturday </br>
							<span class="glyphicon glyphicon-map-marker"></span> B4 L5 Ph7 JP Rizal St., New San Mateo Subd., Gitnangbayan I, San Mateo, Rizal </br>
							<span class="glyphicon glyphicon-phone"></span> 696-4528 | (+63) 928-297-2321 | (+63) 907-208-3331 </br>
							<span class="glyphicon glyphicon-envelope"></span> margarethcateringservices@gmail.com </br> </br>
						
							<!-- Set height and width with CSS -->
							<div id="googleMap" style="height:350px;width:600px;"></div>

							<!-- Add Google Maps -->
							<script src="http://maps.googleapis.com/maps/api/js"></script>
							
							<script>
								var myCenter = new google.maps.LatLng(14.6955, 121.1215);

								function initialize() {
									var mapProp = {
										center:myCenter,
										zoom:12,
										scrollwheel:false,
										draggable:false,
										mapTypeId:google.maps.MapTypeId.ROADMAP
									};

									var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

									var marker = new google.maps.Marker({
										position:myCenter,
									});

									marker.setMap(map);
								}

								google.maps.event.addDomListener(window, 'load', initialize);
							</script>
						</td>
						
						<td style = "padding: 30px"> <big> <big> <big> Send us feedback! </big> </big> </big> </br> </br>
							<div class="form-group">
								<label for="pwd"> Full name: </label>
								<input type="text" class="form-control" style="width: 300px;">
							</div>
							
							<div class="form-group">
								<label for="pwd"> Email address: </label>
								<input type="email" class="form-control" style="width: 300px;">
							</div>
							
							 <div class="form-group">
							<label>Comment:</label>
							<textarea class="form-control" rows="3" placeholder="Suggestions,Comments here"></textarea>
							</div>
					
							<button type="submit" class="snip1535"> Send </a> </button> 
							</br> </br> </br> </br> </td>
				</table>
			</div>
@endsection