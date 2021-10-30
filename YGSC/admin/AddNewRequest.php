<?php require_once("../Includes/DB.php"); ?>
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php
// using server var to get the track the current tracking url
$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
Confirm_Login();
?>
<?php
if (isset($_POST['Submit'])) {
  $RequestTitle = $_POST['RequestTitle'];
  $Category = $_POST['RequestCategory'];
  $Type = $_POST['RequestType'];
  // using files global var to get img files
  $Image = $_FILES['Image']['name'];
  //Saving actual image to the desire dir.
  $Target = "../Uploads/" . basename($_FILES['Image']['name']);
  $PostText = $_POST['PostDescription'];
  $RequestUser = $_POST['RequestUser'];
  $UserJob = $_POST['UserJob'];
  $Location = $_POST['Location'];
  $Admin = $_SESSION['UserName'];
  date_default_timezone_set("Asia/Yangon");
  //will show in seconds
  $CurrentTime = time();
  // read above time
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
  if (empty($RequestTitle)) {
    $_SESSION['ErrorMessage'] = "Request title cannot be empty";
    Redirect_to("AddNewRequest.php");
  } elseif (strlen($RequestTitle) < 5) {
    $_SESSION['ErrorMessage'] = "Request title should be greater than 5 characters";
    Redirect_to("AddNewRequest.php");
  } elseif (strlen($PostText) > 9999) {
    $_SESSION['ErrorMessage'] = "Post's description should be less than 10000 characters.";
    Redirect_to("AddNewRequest.php");
  } else {
    global $con;
    //Query to insert posts in DB when everything is fine.
    $sql = "INSERT INTO requests(title,datetime,request_type,request_category,request_user,user_job,job_location,creator,image,rpost)";
    $sql .= "VALUES(:titlE,:datetimE,:requestType,:requestCategory,:requestUser,:userJob,:jobLocation,:creatOr,:imaGe,:RpOst)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':titlE', $RequestTitle);
    $stmt->bindValue(':datetimE', $DateTime);
    $stmt->bindValue(':requestType', $Type);
    $stmt->bindValue(':requestCategory', $Category);
    $stmt->bindValue(':requestUser', $RequestUser);
    $stmt->bindValue(':userJob', $UserJob);
    $stmt->bindValue(':jobLocation', $Location);
    $stmt->bindValue(':creatOr', $Admin);
    $stmt->bindValue(':imaGe', $Image);
    $stmt->bindValue(':RpOst', $PostText);

    $Execute = $stmt->execute();
    move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
    if ($Execute) {
      $_SESSION['SuccessMessage'] = "Request with ID: " . $con->lastInsertId() . " Added Successfully";
      Redirect_to("AddNewRequest.php");
    } else {
      $_SESSION['ErrorMessage'] = "Something went wrong. Try Again";
      Redirect_to("AddNewRequest.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Add New Request - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4 text-danger"><i class="fas fa-newspaper"></i>&nbsp;Add New Request</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Add New Request</li>
        </ol>
      </div>
      <!-- MAIN AREA -->
      <section class="container py-2 mb-4">
        <div class="row">
          <div class="offset-lg-1 col-lg-10" style="min-height: 400px">
            <?php echo ErrorMessage();
            echo SuccessMessage(); ?>
            <!-- enctype is for saving the image to desire dir -->
            <form action="AddNewRequest.php" method="post" enctype="multipart/form-data">
              <div class="card bg-secondary text-light">
                <div class="card-body bg-dark">
                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Request Title:</span> </label>
                    <input class="form-control" type="text" name="RequestTitle" id="title" value='' placeholder="Type project title here">
                  </div>
                  <div class="form-group">
                    <label for="RequestType"> <span class="FieldInfo">Choose Request Type:</span> </label>
                    <select class="form-control" name="RequestType" id="RequestType">
                      <?php
                      //Fetching all the categories from category table
                      global $con;
                      $sql = "SELECT id,title FROM request_type";
                      $stmt = $con->query($sql);
                      while ($DataRows = $stmt->fetch()) {
                        $Id = $DataRows['id'];
                        $RequestType = $DataRows['title'];
                      ?>
                        <option><?php echo $RequestType; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="CategoryTitle"> <span class="FieldInfo">Choose Request Category:</span> </label>
                    <select class="form-control" name="RequestCategory" id="CategoryTitle">
                      <?php
                      //Fetching all the categories from category table
                      global $con;
                      $sql = "SELECT id,title FROM request_category";
                      $stmt = $con->query($sql);
                      while ($DataRows = $stmt->fetch()) {
                        $Id = $DataRows['id'];
                        $CategoryName = $DataRows['title'];
                      ?>
                        <option><?php echo $CategoryName; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="usertitle"> <span class="FieldInfo">Requested User:</span> </label>
                    <input class="form-control" type="text" name="RequestUser" id="usertitle" value='' placeholder="Type request user name here">
                  </div>
                  <div class="form-group">
                    <label for="userJob"> <span class="FieldInfo">User Occupation:</span> </label>
                    <input class="form-control" type="text" name="UserJob" id="userJob" value='' placeholder="Type request user job here">
                  </div>
                  <div class="form-group">
                    <label for="Location"> <span class="FieldInfo">University Name / Company Name:</span> </label>
                    <input class="form-control" type="text" name="Location" id="Location" value='' placeholder="Type job  here">
                  </div>
                  <div class="form-group">
                    <label for="ImageSelect">
                      <span class="FieldInfo">Select Image</span>
                    </label>
                    <div class="custom-file">
                      <input class="custom-file-input" type="file" name="Image" id='ImageSelect'>
                      <label for="ImageSelect" class="custom-file-label">Select Image</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Post"> <span class="FieldInfo">Post:</span> </label>
                    <textarea class="form-control" name="PostDescription" id="Post" cols="80" rows="8"></textarea>
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
          </div>
        </div>
      </section>

      <!-- MAIN AREA END -->
    </main>
    <?php include_once 'innerTabs/Footer.php' ?>