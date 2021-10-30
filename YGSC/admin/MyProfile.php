<?php require_once('../Includes/DB.php'); ?>
<?php require_once('../Includes/Functions.php'); ?>
<?php require_once('../Includes/Sessions.php'); ?>
<?php $_SESSION["TrackingURL"] = $_SERVER["PHP_SELF"];
Confirm_Login();  ?>
<?php
// Fetching the existing admin data
$AdminId = $_SESSION['User_ID'];
global $con;
$sql = "SELECT * FROM admins WHERE id='$AdminId'";
$stmt = $con->query($sql);
while ($DataRows = $stmt->fetch()) {
  $ExistingName = $DataRows['aname'];
  $ExistingUsername = $DataRows['username'];
  $ExistingHeadline = $DataRows['aheadline'];
  $ExistingBio = $DataRows['abio'];
  $ExistingImage = $DataRows['aimage'];
}
if (isset($_POST['Submit'])) {
  $AName = $_POST['Name'];
  $AHeadline = $_POST['Headline'];
  $ABio = $_POST['Bio'];
  // using files global var to get img files
  $Image = $_FILES['Image']['name'];
  $Target = "../Uploads/" . basename($_FILES['Image']['name']);
  if (strlen($AHeadline) > 30) {
    $_SESSION['ErrorMessage'] = "Headline should be less than 12 characters!";
    Redirect_to("MyProfile.php");
  } elseif (strlen($ABio) > 500) {
    $_SESSION['ErrorMessage'] = "Bio should be less than 500 characters!";
    Redirect_to("MyProfile.php");
  } else {
    global $con;
    //Query to UPDATE Admin Data in DB when everything is fine.
    if (!empty($Image)) {
      $sql = "UPDATE admins 
            SET aname='$AName', aheadline ='$AHeadline',  abio ='$ABio', aimage ='$Image' 
            WHERE id='$AdminId'";
    } else {
      $sql = "UPDATE admins 
            SET aname='$AName', aheadline ='$AHeadline',  abio ='$ABio' 
            WHERE id='$AdminId'";
    }


    $Execute = $con->query($sql);
    move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
    if ($Execute) {
      $_SESSION['SuccessMessage'] = "Details Updated Successfully!";
      Redirect_to("MyProfile.php");
    } else {
      $_SESSION['ErrorMessage'] = "Something went wrong. Try Again";
      Redirect_to("MyProfile.php");
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
  <title>Posts - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        <h1 class="mt-4">Post Data Tables</h1>
        <!-- BREADCRUMB FOR THE TABLE TO DASHBOARD -->
        <section class="container py-2 mb-4">
          <div class="row">
            <!-- Left Area -->
            <div class="col-md-3">
              <div class="card">
                <div class="card-header bg-dark text-light">
                  <h3 class="lead"><?php echo $ExistingName; ?></h3>
                </div>
                <div class="card-body">
                  <img class="block img-fluid mb-3" src="../Uploads/<?php echo $ExistingImage; ?>" alt="">
                  <div class="">
                    <?php echo $ExistingBio; ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- Right Area -->
            <div class="col-md-9" style="min-height: 400px">
              <?php echo ErrorMessage();
              echo SuccessMessage(); ?>
              <!-- enctype is for saving the image to desire dir -->
              <form action="MyProfile.php" method="post" enctype="multipart/form-data">
                <div class="card bg-dark text-light">
                  <div class="card-header bg-secondary text-light">
                    <h4 class="head">Edit Profile</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <input class="form-control" type="text" name="Name" id="title" value='' placeholder="Your name">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="text" name="Headline" id="title" value='' placeholder="Headline">
                      <small class="text-muted">Add a professional headline like, 'Engineer' at XYZ or 'Doctor'</small>
                      <span class="text-danger">Not more than 30 characters</span>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="Bio" id="Post" cols="80" rows="8" placeholder="Bio"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="ImageSelect">
                        <span class="FieldInfo">Select Image</span>
                      </label>
                      <div class="custom-file">
                        <input class="custom-file-input" type="file" name="Image" id='ImageSelect' value="">
                        <label for="ImageSelect" class="custom-file-label">Select Image</label>
                      </div>
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

      </div>
    </main>
    <?php include_once 'innerTabs/Footer.php' ?>