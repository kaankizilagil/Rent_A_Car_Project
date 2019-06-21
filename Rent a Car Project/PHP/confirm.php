<?php
    require_once('connection_db.php');
    session_start();

    if(isset($_SESSION['login_user'])) {

      $email = $_SESSION['login_user'];
      $chassisNo = intval($_POST['chassisNo']);
      $pickupdate = $_POST['pickupDate'];
      $returndate = $_POST['returnDate'];
      $totalprice = intval($_POST['totalPrice']);

      $query = "INSERT INTO BOOKING VALUES('$email','$chassisNo','$pickupdate','$returndate','$totalprice')";

      $result = mysqli_query($connection,$query);

      if($result) {
        echo json_encode("Added");
      }

      else {
        echo json_encode("No Added");
      }
    }

    else {
      echo json_encode("No Login");
    }
?>
