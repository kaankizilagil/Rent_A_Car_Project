<?php
	require_once('connection_db.php');
	session_start();
	echo $_SESSION['login_user'];
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale, maximum-scale=1"/>
		<title>Home Page</title>
		<link href="../css/index.css" rel="stylesheet" type="text/css" />
		<style type="text/css">
			body {
						background-color: #FFFFFF;
					 }
		</style>
	</head>
	<body>
		<div id="container">
  		<div id="header">
    		<div id="menu">
					<div id="logo_Upanel">
						<div id="logo_icon">
							<a href="../php/index.php"><img src="../images/login_logo1.png" width="50" height="40" /></a>
						</div>
					</div>
      		<div id="user_panel">
						<div id="left_Upanel">
          		<div id="left_icon">
								<a href="../php/profile.php"><img src="../images/user.png" width="50" height="40" /></a>
							</div>
						</div>
        		<div id="right_Upanel">
          		<div id="right_icon">
								<a href="../php/logout.php"><img src="../images/logout.png" width="50" height="40" /></a>
							</div>
						</div>
      		</div>
      		<ul>
        		<li><a href="../html/suv.html">S.U.V.</a></li>
        		<li><a href="../html/compact.html">COMPACT</a></li>
        		<li><a href="../html/van.html">VAN</a></li>
        		<li><a href="../html/truck.html">TRUCK</a></li>
        		<li><a href="../html/large.html">LARGE</a></li>
      		</ul>
    		</div>
  		</div>

  		<div id="clear_header"></div>
  		<div id="content">
				<!-- InstanceBeginEditable name="editable" -->
				At KK Rent-A-Car we make renting a car seamless so you can get right on your way. <br>
				See how much it costs to rent a car for the day, a weekend or a full week by starting a reservation now. <br><br>

				If you like your car, please select the date and model.<br>

			<form action="" id="datefilter" name="datefilter" method="post">
        <label for="pickup"><u>Pickup Date</u></label>
        <input type="date" id="pickup" name="pickupdate" value="" /> <br>

        <label for="return"><u>Return Date</u></label>
        <input type="date" id="return" name="returndate" value="" />

				<div>
					<label for="select_car"><u>Select Car</u></label>
					<select id="car" name="cars">
						<option value="NISSAN - X TRAIL">NISSAN - X TRAIL</option>
						<option value="MITSUBISHI - OUTLANDER">MITSUBISHI - OUTLANDER</option>
						<option value="RENAULT - KADJAR">RENAULT - KADJAR</option>
						<option value="VOLKSWAGEN - GOLF">VOLKSWAGEN - GOLF</option>
						<option value="SEAT - LEON">SEAT - LEON</option>
						<option value="RENAULT - MEGANE">RENAULT - MEGANE</option>
						<option value="TOYOTA - AURIS TOURING">TOYOTA - AURIS TOURING</option>
						<option value="SKODA - RAPID SPACEBACK">SKODA - RAPID SPACEBACK</option>
						<option value="RENAULT - CLIO SPORT TOURER">RENAULT - CLIO SPORT TOURER</option>
						<option value="FORD - RANGER">FORD - RANGER</option>
						<option value="VOLKSWAGEN - AMAROG">VOLKSWAGEN - AMAROG</option>
						<option value="GMC - SIERRA">GMC - SIERRA</option>
						<option value="MERCEDES - GLA 300">MERCEDES - GLA 300</option>
						<option value="AUDI - Q7">AUDI - Q7</option>
						<option value="BMW - X6">BMW - X6</option>
					</select>
    		</div>
			</form>

			<div>
					<?php
							if(isset($_SESSION['login_user'])) {
								?>
				 					<button type="submit" id="bookingnow" name="booking" class="styled">Booking Now</button>
								<?php
							}
							echo('<br>');
					 ?>
			</div>

			<div id="result">

			</div>
			</div>
		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/JSON2.js"></script>
		<script src="../js/index.js"></script>
	</body>
</html>
