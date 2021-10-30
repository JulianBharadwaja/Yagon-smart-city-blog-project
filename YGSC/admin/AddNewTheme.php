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
  $ProjectTitle = $_POST['ProjectTitle'];
  $Category = $_POST['ProjectCategory'];
  // using files global var to get img files
  $Image = $_FILES['Image']['name'];
  //Saving actual image to the desire dir.
  $Target = "../Uploads/" . basename($_FILES['Image']['name']);
  $PostText = $_POST['PostDescription'];
  $Admin = $_SESSION['UserName'];
  date_default_timezone_set("Asia/Yangon");
  //will show in seconds
  $CurrentTime = time();
  // read above time
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
  if (empty($ProjectTitle)) {
    $_SESSION['ErrorMessage'] = "Theme title cannot be empty";
    Redirect_to("AddNewTheme.php");
  } elseif (strlen($ProjectTitle) < 5) {
    $_SESSION['ErrorMessage'] = "Theme title should be greater than 5 characters";
    Redirect_to("AddNewTheme.php");
  } elseif (strlen($PostText) > 9999) {
    $_SESSION['ErrorMessage'] = "Theme's description should be less than 10000 characters.";
    Redirect_to("AddNewTheme.php");
  } else {
    global $con;
    //Query to insert posts in DB when everything is fine.
    $sql = "INSERT INTO themes(title,datetime,theme_category,author,image,tpost)";
    $sql .= "VALUES(:titlE,:datetimE,:themeCategory,:creatOr,:imaGe,:Tpost)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':titlE', $ProjectTitle);
    $stmt->bindValue(':datetimE', $DateTime);
    $stmt->bindValue(':themeCategory', $Category);
    $stmt->bindValue(':creatOr', $Admin);
    $stmt->bindValue(':imaGe', $Image);
    $stmt->bindValue(':Tpost', $PostText);

    $Execute = $stmt->execute();
    move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
    if ($Execute) {
      $_SESSION['SuccessMessage'] = "Theme with ID: " . $con->lastInsertId() . " Added Successfully";
      Redirect_to("AddNewTheme.php");
    } else {
      $_SESSION['ErrorMessage'] = "Something went wrong. Try Again";
      Redirect_to("AddNewTheme.php");
    }
  }
}
?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Themes - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4 text-danger"><i class="fas fa-newspaper"></i>&nbsp;Add New Theme</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Add New Theme</li>
        </ol>
      </div>
      <!-- MAIN AREA -->
      <section class="container py-2 mb-4">
        <div class="row">
          <div class="offset-lg-1 col-lg-10" style="min-height: 400px">
            <?php echo ErrorMessage();
            echo SuccessMessage(); ?>
            <!-- enctype is for saving the image to desire dir -->
            <form action="AddNewTheme.php" method="post" enctype="multipart/form-data">
              <div class="card bg-secondary text-light">
                <div class="card-body bg-dark">
                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Theme Title:</span> </label>
                    <input class="form-control" type="text" name="ProjectTitle" id="title" value='' placeholder="Type project title here">
                  </div>
                  <div class="form-group">
                    <label for="CategoryTitle"> <span class="FieldInfo">Choose Theme Category:</span> </label>
                    <select class="form-control" name="ProjectCategory" id="CategoryTitle">
                      <?php
                      //Fetching all the categories from category table
                      global $con;
                      $sql = "SELECT id,title FROM themes_category";
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
                    <label for="ImageSelect">
                      <span class="FieldInfo">Select Image:</span>
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
      <?php include_once 'innerTabs/Footer.php' ?>