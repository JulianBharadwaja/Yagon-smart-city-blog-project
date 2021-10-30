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
global $con;
$sql = "SELECT * FROM events WHERE id = '$SearchQueryParameter'";
$stmtPost = $con->query($sql);
while ($DataRows = $stmtPost->fetch()) {
  $TitleToBeDelete = $DataRows['title'];
  $CategoryToBeDelete = $DataRows['event_category'];
  $TypeToBeDelete = $DataRows['event_type'];
  $LocationToBeDelete = $DataRows['location'];
  $ImageToBeDelete = $DataRows['image'];
  $PostToBeDelete = $DataRows['epost'];
}
if (isset($_POST['Submit'])) {

  global $con;
  $sql = "DELETE FROM posts WHERE id='$SearchQueryParameter'";
  //Query to delete posts in DB when everything is fine.
  $Execute = $con->query($sql);
  if ($Execute) {
    $Target_Path_To_DELETE_Image = "Uploads/$ImageToBeDelete";
    unlink($Target_Path_To_DELETE_Image);
    $_SESSION['SuccessMessage'] = "Post Deleted Successfully";
    Redirect_to("Events.php");
  } else {
    $_SESSION['ErrorMessage'] = "Something went wrong. Try Again";
    Redirect_to("Events.php");
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
  <title>Delete Events - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4 text-danger"><i class="fas fa-newspaper"></i>&nbsp;Delete Event Post</h1>
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item active">Delete Event Post</li>
        </ol>
      </div>
      <!-- MAIN AREA -->
      <section class="container py-2 mb-4">
        <div class="row">
          <div class="offset-lg-1 col-lg-10" style="min-height: 400px">
            <?php echo ErrorMessage();
            echo SuccessMessage();
            ?>


            <!-- enctype is for saving the image to desire dir -->
            <form action="DeletePost.php?id=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
              <div class="card bg-secondary text-light">
                <div class="card-body bg-dark">

                  <div class="form-group">
                    <label for="title"> <span class="FieldInfo">Event Title:</span> </label>
                    <input disabled class="form-control" type="text" name="PostTitle" id="title" value='<?php echo $TitleToBeDelete; ?>' placeholder="Type title here">
                  </div><br>

                  <div class="form-group">
                    <span class="FieldInfo">Existing Category: </span>
                    <?php echo $CategoryToBeDelete; ?> <br><br>
                  </div>
                  <div class="form-group">
                    <span class="FieldInfo">Existing Image: </span>
                    <img class="mb-1" src="../Uploads/<?php echo $ImageToBeDelete; ?>" alt="" width="170px" height="70px"> <br>

                  </div>
                  <div class="form-group">
                    <label for="Post"> <span class="FieldInfo">Post:</span> </label>
                    <textarea disabled class="form-control" name="PostDescription" id="Post" cols="80" rows="8"><?php echo $PostToBeDelete; ?></textarea>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 mb-2">
                      <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>Back to Dashboard</a>
                    </div>
                    <div class="col-lg-6 mb-2">
                      <button type="submit" name="Submit" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Delete</button>
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