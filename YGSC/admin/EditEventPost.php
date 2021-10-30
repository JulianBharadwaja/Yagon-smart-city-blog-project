<?php require_once('../Includes/DB.php'); ?>
<?php require_once('../Includes/Functions.php'); ?>
<?php require_once('../Includes/Sessions.php'); ?>
<?php
// using server var to get the track the current tracking url
$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
Confirm_Login();
?>
<?php
$SearchQueryParameter = $_GET['id'];
if (isset($_POST['Submit'])) {
  $PostTitle = $_POST['PostTitle'];
  $Category = $_POST['Category'];
  $Type = $_POST['Type'];
  $Location = $_POST['Location'];
  // using files global var to get img files
  $Image = $_FILES['Image']['name'];
  //Saving actual image to the desire dir.
  $Target = "../Uploads/" . basename($_FILES['Image']['name']);
  $PostText = $_POST['PostDescription'];
  $Admin = "Julian";
  date_default_timezone_set("Asia/Yangon");
  //will show in seconds
  $CurrentTime = time();
  // read above time
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
  if (empty($PostTitle)) {
    $_SESSION['ErrorMessage'] = "Title cannot be empty";
    Redirect_to("Projects.php");
  } elseif (strlen($PostTitle) < 5) {
    $_SESSION['ErrorMessage'] = "Post title should be greater than 5 characters";
    Redirect_to("Projects.php");
  } elseif (strlen($PostText) > 9999) {
    $_SESSION['ErrorMessage'] = "Post's description should be less than 10000 characters.";
    Redirect_to("Projects.php");
  } else {
    global $con;
    //Query to UPDATE posts in DB when everything is fine.
    if (!empty($Image)) {
      $sql = "UPDATE projects 
            SET title='$PostTitle', project_type='$Type', project_category='$Category', location ='$Location',  image ='$Image', ppost ='$PostText' 
            WHERE id='$SearchQueryParameter'";
    } else {
      $sql = "UPDATE projects 
            SET title='$PostTitle', project_type ='$Type', project_category ='$Category', location ='$Location', ppost ='$PostText' 
            WHERE id='$SearchQueryParameter'";
    }


    $Execute = $con->query($sql);
    move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
    if ($Execute) {
      $_SESSION['SuccessMessage'] = "Post Updated Successfully";
      Redirect_to("Projects.php");
    } else {
      $_SESSION['ErrorMessage'] = "Something went wrong. Try Again";
      Redirect_to("Projects.php");
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
  <title>Edit Event Posts - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4 text-danger"><i class="fas fa-calendar-week"></i>&nbsp;Edit Event Post</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Edit Event</li>
        </ol>
      </div>
      <!-- MAIN AREA -->
      <section class="container py-2 mb-4">
        <div class="row">
          <div class="offset-lg-1 col-lg-10" style="min-height: 400px">
            <?php echo ErrorMessage();
            echo SuccessMessage();
            global $con;
            $sql = "SELECT * FROM events WHERE id = '$SearchQueryParameter'";
            $stmtPost = $con->query($sql);
            while ($DataRows = $stmtPost->fetch()) {
              $TitleToBeUpdated = $DataRows['title'];
              $CategoryToBeUpdated = $DataRows['event_category'];
              $TypeToBeUpdated = $DataRows['event_type'];
              $LocationToBeUpdated = $DataRows['location'];
              $TimeToBeUpdated = $DataRows['time'];
              $FeesToBeUpdated = $DataRows['fees'];
              $ImageToBeUpdated = $DataRows['image'];
              $PostToBeUpdated = $DataRows['epost'];
            }
            ?>


            <!-- enctype is for saving the image to desire dir -->
            <form action="EditProjectPost.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
              <div class="card bg-secondary text-light">
                <div class="card-body bg-dark">

                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Event Title:</span> </label>
                    <input class="form-control" type="text" name="PostTitle" id="title" value='<?php echo $TitleToBeUpdated; ?>'>
                  </div><br>
                  <div class="form-group">
                    <label for="location"> <span class="FieldInfo">Project Location:</span> </label>
                    <input class="form-control" type="text" name="Location" id="location" value='<?php echo $LocationToBeUpdated; ?>'>
                  </div>
                  <div class="form-group">
                    <label for="time"> <span class="FieldInfo">Project Location:</span> </label>
                    <input class="form-control" type="text" name="Time" id="time" value='<?php echo $TimeToBeUpdated; ?>'>
                  </div>
                  <div class="form-group">
                    <span class="FieldInfo">Existing Fee: </span>
                    <?php echo $FeesToBeUpdated; ?> <br><br>
                    <label for="EventFee"> <span class="FieldInfo">Choose Fee Type:</span> </label>
                    <select class="form-control" name="EventFee" id="EventFee">
                      <option value="Free">Free</option>
                      <option value="Paid">Paid</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <span class="FieldInfo">Existing Category: </span>
                    <?php echo $CategoryToBeUpdated; ?> <br><br>
                    <label for="CategoryTitle"> <span class="FieldInfo">Choose Category:</span> </label>
                    <select class="form-control" name="Category" id="CategoryTitle">
                      <?php
                      //Fetching all the categories from category table
                      global $con;
                      $sql = "SELECT id,title FROM project_category";
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
                    <span class="FieldInfo">Existing Type: </span>
                    <?php echo $TypeToBeUpdated; ?> <br><br>
                    <label for="TypeTitle"> <span class="FieldInfo">Choose Type:</span> </label>
                    <select class="form-control" name="Type" id="TypeTitle">
                      <?php
                      //Fetching all the categories from category table
                      global $con;
                      $sql = "SELECT id,title FROM event_type";
                      $stmt = $con->query($sql);
                      while ($DataRows = $stmt->fetch()) {
                        $Id = $DataRows['id'];
                        $TypeName = $DataRows['title'];
                      ?>
                        <option><?php echo $TypeName; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <span class="FieldInfo">Existing Image: </span>
                    <img class="mb-1" src="../Uploads/<?php echo $ImageToBeUpdated; ?>" alt="" width="170px" height="70px"> <br>
                    <label for="ImageSelect">
                      <span class="FieldInfo">Select Image</span>
                    </label>
                    <div class="custom-file">
                      <input class="custom-file-input" type="file" name="Image" id='ImageSelect' value="">
                      <label for="ImageSelect" class="custom-file-label">Select Image</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Post"> <span class="FieldInfo">Post:</span> </label>
                    <textarea class="form-control" name="PostDescription" id="Post" cols="80" rows="8"><?php echo $PostToBeUpdated; ?></textarea>
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