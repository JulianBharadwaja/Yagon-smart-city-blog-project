 <?php require_once('../Includes/DB.php'); ?>
 <?php require_once('../Includes/Functions.php'); ?>
 <?php require_once('../Includes/Sessions.php'); ?>
 <?php
  if (isset($_GET['id'])) {
    $SearchQueryParameter = $_GET['id'];
    global $con;
    $sql = "DELETE FROM admins WHERE id='$SearchQueryParameter'";
    $Execute = $con->query($sql);
    if ($Execute) {
      $_SESSION['SuccessMessage'] = "Admin Deleted Successfully !";
      Redirect_to("Admins.php");
      // echo "Approved!";
    } else {
      $_SESSION['ErrorMessage'] = "Something Went Wrong. Please Try Again!";
      Redirect_to("Admins.php");
      // echo "No!";
    }
  }


  ?>