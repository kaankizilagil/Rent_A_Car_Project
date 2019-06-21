<?php
  require_once('connection_db.php');
  session_start();

  if(isset($_POST['create_account_button']))
  {
    $First_Name = mysqli_real_escape_string($connection,$_POST['firstname']);
    $Second_Name = mysqli_real_escape_string($connection,$_POST['secondname']);
    $E_Mail = mysqli_real_escape_string($connection,$_POST['email']);
    $Mobile = mysqli_real_escape_string($connection,$_POST['mobile']);
    $Password = mysqli_real_escape_string($connection,$_POST['password']);
    $Re_Password = mysqli_real_escape_string($connection,$_POST['re-password']);

    $query = "SELECT * FROM USERS WHERE E_Mail = '$E_Mail'";

    $result = mysqli_query($connection,$query);

    if($result)
    {
      if(mysqli_num_rows($result) > 0)
      {
        echo '<script language="javascript">';
        echo 'alert("Email already exists.")';
        echo '</script>';
      }

      else
      {
        if($Password == $Re_Password)
        {
          $sql = "INSERT INTO USERS VALUES('$First_Name','$Second_Name','$E_Mail','$Mobile','$Password')";

          $result = mysqli_query($connection,$sql);

          $_SESSION['message']="You are now logged in";
          $_SESSION['firstname']=$First_Name;

          header("location:login_index.php");
        }

        else
        {
          echo '<script language="javascript">';
          echo 'alert("Password do not match.")';
          echo '</script>';

          $_SESSION['message']="The two password do not match.";
        }
      }
    }
  }
?>
