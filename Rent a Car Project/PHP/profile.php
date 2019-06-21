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

				<?php
					if(isset($_SESSION['login_user'])) {

						$user = $_SESSION['login_user'];

						$sql = "SELECT * FROM BOOKING WHERE E_Mail = '$user'";

						$result = mysqli_query($connection,$sql);

						if($result){
							if (mysqli_num_rows($result) > 0) {
            		while($row = mysqli_fetch_assoc($result)) {
               		echo '<div class="result-inner">
													<div class="result-cell">Chassis No: '.$row['Chassis_No'].' </div>
													<div class="result-cell">Pickup Date: '.$row['Pickup_Date'].' </div>
													<div class="result-cell">Return Date: '.$row['Return_Date'].' </div>
													<div class="result-cell">Total Price: '.$row['Total_Price'].' </div>
												</div>';
            		}
         			}

							else {
            			echo "No Results.";
         			}
						}

						else {
							echo "Not Find.";
						}
					}
				?>
			</div>

		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/JSON2.js"></script>
		<script src="../js/index.js"></script>
	</body>
</html>
