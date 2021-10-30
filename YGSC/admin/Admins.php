<?php include_once '../Includes/DB.php' ?>
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php
// using server var to get the track the current tracking url
$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
Confirm_Login();
?>
<?php
if (isset($_POST["Submit"])) {
  $UserName = $_POST["Username"];
  $Name = $_POST['Name'];
  $Password = $_POST["Password"];
  $ConfirmPassword = $_POST['ConfirmPassword'];
  $Admin = $_SESSION['UserName'];
  date_default_timezone_set("Asia/Yangon");
  $CurrentTime = time();
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

  if (empty($UserName) || empty($Password) || empty($ConfirmPassword)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled out";
    Redirect_to("Admins.php");
  } elseif (strlen($Password) < 4) {
    $_SESSION["ErrorMessage"] = "Password should be greater than 3 characters";
    Redirect_to("Admins.php");
  } elseif ($Password !== $ConfirmPassword) {
    $_SESSION["ErrorMessage"] = "Password and Confirm Password should match each other!";
    Redirect_to("Admins.php");
  } elseif (CheckUserNameExistsOrNot($UserName)) {
    $_SESSION["ErrorMessage"] = "Users already exist! Please try again with new name";
    Redirect_to("Admins.php");
  } else {
    global $con;
    // Query to insert category in DB when everything is fine
    $sql = "INSERT INTO admins(datetime,username,password,aname,addedby) ";
    $sql .= "VALUES(:dateTime,:userName,:passWord,:aName,:addBy)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':dateTime', $DateTime);
    $stmt->bindValue(':userName', $UserName);
    $stmt->bindValue(':passWord', $Password);
    $stmt->bindValue(':aName', $Name);
    $stmt->bindValue(':addBy', $Admin);
    $Execute = $stmt->execute();
    if ($Execute) {
      $_SESSION["SuccessMessage"] = "Admin with id: " . $con->lastInsertId() . " Added Successfully";
      Redirect_to("Admins.php");
    } else {
      $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!";
      Redirect_to("Admins.php");
    }
  }
} //Ending of Submit Button If-Condition 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Admins - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <!-- INCLUDING NAVBAR FILE -->
  <?php include_once 'innerTabs/Nav.php' ?>
  <!-- MAIN AREA STARTED -->
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-users"></i> Manage Admins</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Admins</li>
        </ol>
      </div>
      <section class="container py-2 mb-4">
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <!-- CHECKING ERROR OR SUCCESS FOR THE ADMIN ADDING FUNCTION -->
            <?php
            echo ErrorMessage();
            echo SuccessMessage();
            ?>
            <!-- FORM FOR THE ADDING NEW ADMINS -->
            <form action="Admins.php" method="post">
              <div class="card bg-secondary text-light">
                <div class="card-header">
                  <h1>Add New Admin</h1>
                </div>
                <div class="card-body bg-dark">
                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Username: </span> </label>
                    <input class="form-control" type="text" name="Username" id="username" value=''>
                  </div>
                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Name: </span> </label>
                    <input class="form-control" type="text" name="Name" id="Name" value=''>
                    <small class="text-muted">Optional</small>
                  </div>
                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Password: </span> </label>
                    <input class="form-control" type="password" name="Password" id="password" value=''>
                  </div>
                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Confirm Password:</span> </label>
                    <input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword" value=''>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <button type="submit" name="Submit" class="btn btn-success btn-block"><i class="fas fa-check"></i>Publish</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <h2>Existing Admins</h2>
            <table class="table table-striped table-hover">
              <thead class="thead-dark">
                <tr>
                  <th>No. </th>
                  <th>Date&Time</th>
                  <th>Userame</th>
                  <th>Admin Name</th>
                  <th>Action</th>
                </tr>
              </thead>


              <?php
              global $con;
              $sql = "SELECT * FROM admins ORDER BY id desc";
              $Execute = $con->query($sql);
              $SrNo = 0;
              while ($DataRows = $Execute->fetch()) {
                $Id = $DataRows["id"];
                $DateTime = $DataRows['datetime'];
                $UserName = $DataRows["username"];
                $AdminName = $DataRows['aname'];
                $SrNo++;
              ?>
                <tbody>
                  <tr>
                    <td><?php echo htmlentities($SrNo); ?></td>
                    <td><?php echo htmlentities($DateTime); ?></td>
                    <td><?php echo htmlentities($UserName); ?></td>
                    <td><?php echo htmlentities($AdminName); ?></td>
                    <td><a class="btn btn-danger" href="DeleteAdmins.php?id=<?php echo $Id; ?>">Delete</a></td>
                  </tr>
                </tbody>
              <?php

              }
              ?>
            </table>
          </div>
        </div>
      </section>
    </main>
    <!-- INCLUDING FOOTER -->
    <?php include_once 'innerTabs/Footer.php' ?>