<?php require_once("../Includes/DB.php"); ?>
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php
// using server var to get the track the current tracking url
$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
Confirm_Login();
?>
<?php
if (isset($_POST["Submit"])) {
  $Category = $_POST["CategoryTitle"];
  $Admin = $_SESSION['UserName'];
  date_default_timezone_set("Asia/Yangon");
  $CurrentTime = time();
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

  if (empty($Category)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled out";
    Redirect_to("RequestType.php");
  } elseif (strlen($Category) < 2) {
    $_SESSION["ErrorMessage"] = "Request Type should be greater than 2 characters";
    Redirect_to("RequestType.php");
  } elseif (strlen($Category) > 49) {
    $_SESSION["ErrorMessage"] = "Request Type should be less than 50 characters";
    Redirect_to("RequestType.php");
  } else {
    global $con;
    // Query to insert category in DB when everything is fine
    $sql = "INSERT INTO request_type(title,author,datetime) ";
    $sql .= "VALUES(:catEgory,:admIn,:dateTime)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':catEgory', $Category);
    $stmt->bindValue(':admIn', $Admin);
    $stmt->bindValue(':dateTime', $DateTime);
    $Execute = $stmt->execute();
    if ($Execute) {
      $_SESSION["SuccessMessage"] = "Request Type with id: " . $con->lastInsertId() . " Added Successfully";
      Redirect_to("RequestType.php");
    } else {
      $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!";
      Redirect_to("RequestType.php");
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
  <title>Request Types - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4"><i class="fas fa-newspaper"></i> Manage Request Types</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Request Types</li>
        </ol>
      </div>
      <section class="container py-2 mb-4">
        <div class="row">
          <div class="offset-lg-1 col-lg-10">
            <?php
            echo ErrorMessage();
            echo SuccessMessage();
            ?>
            <form action="RequestType.php" class="" method="post">
              <div class="card  bg-secondary text-light mb-3">
                <div class="card-header">
                  <h1>Add New Request Type</h1>
                </div>
                <div class="card-body bg-dark">
                  <div class="form-group">
                    <label for="title" class="FieldInfo"> Request Type:</label>
                    <input class="form-control" type="text" name="CategoryTitle" id="title" placeholder="Type title here..">
                  </div>
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i> Back To Dashboard</a>
                    </div>
                    <div class="col-lg-6">
                      <button type="submit" name="Submit" class="btn btn-success btn-block">
                        <i class="fas fa-check"></i> Publish
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </main>
    <?php include_once 'innerTabs/Footer.php' ?>