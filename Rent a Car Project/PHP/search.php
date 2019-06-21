<?php
	require_once('connection_db.php');
	session_start();

	if(isset($_SESSION['login_user'])) {

		if($_SERVER["REQUEST_METHOD"] == "POST") {

			$StartDate = $_POST['pickupdate'];
			$EndDate = $_POST['returndate'];
			$CarModel = $_POST['cars'];
      $Form_Data = array();

			$query = "SELECT C.Price FROM BOOKING B, CARS C WHERE C.Car_Model = '$CarModel' AND C.Chassis_No = B.Chassis_No AND
				       (('$StartDate' >= B.Pickup_Date AND '$StartDate'<= B.Return_Date) OR ('$EndDate' >= B.Pickup_Date AND '$EndDate'<= B.Return_Date))";

			$result = mysqli_query($connection,$query);

			if($result) {
				$count = mysqli_num_rows($result);

				if($count >= 1) {
					$Form_Data['success'] = false;
				}

				else {
					$Form_Data['success'] = true;

					$query2 = "SELECT * FROM CARS WHERE Car_Model ='$CarModel'";

					$result2 = mysqli_query($connection,$query2);

					if($result2) {
						$count2 = mysqli_num_rows($result2);

						if($count2 >= 1) {
							while ($row=mysqli_fetch_row($result2)){
								$Form_Data['Chassis_No'] = $row[0];
								$Form_Data['Car_Model'] = $row[1];
								$Form_Data['Motor_cc'] = $row[2];
								$Form_Data['Motor_hp'] = $row[3];
								$Form_Data['Transmission'] = $row[4];
								$Form_Data['Price'] = $row[5];
							};
						}
					}
					mysqli_free_result($result2);
				}
			}
      echo json_encode($Form_Data);
		}
		
    else {
      echo 'No Result.';
    }
	}

	else {
		echo 'User, Does Not Entry.';
	}
?>
