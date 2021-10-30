 <?php require_once('../Includes/DB.php'); ?>
 <?php require_once('../Includes/Functions.php'); ?>
 <?php require_once('../Includes/Sessions.php'); ?>
 <?php
  if (isset($_GET['id'])) {
    $SearchQueryParameter = $_GET['id'];
    global $con;
    $sql = "UPDATE comments SET status='ON', approvedby='$Admin' WHERE id='$SearchQueryParameter'";
    $Execute = $con->query($sql);
    if ($Execute) {
      $_SESSION['SuccessMessage'] = "Comment Approved Successfully !";
      Redirect_to("Comments.php");
      // echo "Approved!";
    } else {
      $_SESSION['ErrorMessage'] = "Something Went Wrong. Please Try Again!";
      Redirect_to("Comments.php");
      // echo "No!";
    }
  }
  ?>
  