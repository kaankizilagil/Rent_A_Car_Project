<html>
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="../css/login_index.css">
  </head>

  <body>

    <?php
      require_once('connection_db.php');
      session_start();

      if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myemail = $_POST['email'];
        $mypassword = $_POST['password'];

        $sql = "SELECT E_Mail FROM USERS WHERE E_Mail = '$myemail' and Password = '$mypassword'";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1) {
          $_SESSION['login_user'] = $myemail;
          echo "<script>window.location='index.php';</script>";
        }
        else {
          echo "Your Login Name or Password is invalid";
        }
      }
    ?>

    <div class="login-box">

      <img src="../images/login_logo1.png" class="avatar" alt="Avatar Image">

      <h1>Login Here</h1>

      <form action="../php/login_index.php" method="post">

        <label for="email">E-Mail</label>
        <input type="text" id="email" name="email" placeholder="E-Mail">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password">

        <input type="submit" name="login_button" value="Login">

        <br>
        <a href="../html/create_account.html">Create An Account</a>

      </form>

    </div>
  </body>
</html>
