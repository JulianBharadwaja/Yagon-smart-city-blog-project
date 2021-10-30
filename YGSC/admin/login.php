<?php require_once("../Includes/DB.php"); ?>
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php
if(isset($_SESSION['User_ID'])){
  Redirect_to("Dashboard.php");
}
if (isset($_POST['Submit'])) {
  $UserName = $_POST['Username'];
  $Password = $_POST['Password'];
  if (empty($UserName) || empty($Password)) {
    $_SESSION["ErrorMessage"] = "All field must be fill out!";
    Redirect_to('login.php');
  } else {
    // code for checking username and password from DB
    $Found_Account = Login_Attempt($UserName, $Password);
    if ($Found_Account) {
      $_SESSION['User_ID'] = $Found_Account['id'];
      $_SESSION['UserName'] = $Found_Account["username"];
      $_SESSION['AdminName'] = $Found_Account["aname"];
      $_SESSION["SuccessMessage"] = "Welcome " . $_SESSION['AdminName'];
      if (isset($_SESSION["TrackingURL"])){
        Redirect_to($_SESSION['TrackingURL']);
      } else {
        Redirect_to('Dashboard.php');
      }
    } else {
      $_SESSION["SuccessMessage"] = "Incorrect Username/Password";
      Redirect_to('login.php');
    }
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Animated Login Form</title>

  <!-- Custom Style   -->
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/preloader.css">

  <!-- Google Font Style   -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <!-- <div class="loader_bg">
    <div class="loader"></div>
  </div> -->
  <img class="wave" src="../assets/login/wave.png">
  <div class="container">
    <div class="img">
      <img src="../assets/login/personailze.svg">
    </div>
    <div class="login-content">
      <form action="login.php" method="post">
        <img src="../assets/login/avatar.svg">
        <h2 class="title">Welcome</h2>
        <p><?php echo ErrorMessage();
            echo SuccessMessage();
            ?></p>
        <div class="input-div one">
          <div class="i">
            <i class="fas fa-user"></i>
          </div>
          <div class="div">
            <h5>Username</h5>
            <input type="text" class="input" name="Username">
          </div>
        </div>
        <div class="input-div pass">
          <div class="i">
            <i class="fas fa-lock"></i>
          </div>
          <div class="div">
            <h5>Password</h5>
            <input type="password" class="input" name="Password">
          </div>
        </div>
        <a href="#">Forgot Password?</a>
        <input name="Submit" type="submit" class="btn" value="Login">
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    setTimeout(function() {
      $('.loader_bg').fadeToggle();
    }, 1500);
  </script>
  <script src="./js/login.js"></script>
</body>

</html>