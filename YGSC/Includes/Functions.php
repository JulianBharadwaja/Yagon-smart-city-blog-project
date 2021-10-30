<?php require_once("DB.php") ?>
<?php
ob_start();
require_once('DB.php');
function Redirect_to($New_Location)
{
  header('Location:' . $New_Location);
  exit;
}
ob_end_flush();

function CheckUserNameExistsOrNot($Username)
{
  global $con;
  $sql = "SELECT username FROM admins WHERE username=:userName";
  $stmt = $con->prepare($sql);

  $stmt->bindValue(":userName", $Username);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result == 1) {
    return true;
  } else {
    return false;
  }
}

function Login_Attempt($UserName, $Password) {
  global $con;
  $sql = "SELECT * FROM admins WHERE username=:userName AND password=:passWord LIMIT 1";
  $stmt = $con->prepare($sql);
  $stmt->bindValue(':userName', $UserName);
  $stmt->bindValue(':passWord', $Password);
  $stmt->execute();
  $Result = $stmt->rowcount();
  if ($Result == 1) {
    // fetching each data requested from the session
    return $Found_Account=$stmt->fetch();
  } else {
    return null;
  }
}

// DEFINING THIS FUNCTION FOR PROTECTING TO OTHERS TO ENTER THE ADMIN PAGE
function Confirm_Login()
{
  if (isset($_SESSION['User_ID'])) {
    return true;
  } else {
    $_SESSION['ErrorMessage'] = "Login Required ";
    Redirect_to("Login.php");
  }
}

// ALL POST 
function TotalPosts()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM posts";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalEventPosts()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM events";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalProjectPost()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM projects";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalRequestPost()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM requests";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

// ALL CATEGORIES
function TotalCategories()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM category";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalEventCategories()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM event_category";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalProjectCategories()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM event_category";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalRequestCategories()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM request_category";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

// ALL TYPES
function TotalEventType()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM event_type";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalProjectType()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM project_type";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

function TotalRequestType()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM request_type";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalPosts = array_shift($TotalRows);
  echo $TotalPosts;
}

//Total Admins function
function TotalAdmins()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM admins";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalAdmins = array_shift($TotalRows);
  echo $TotalAdmins;
}

// All comments
function TotalComments()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM comments";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalComments = array_shift($TotalRows);
  echo $TotalComments;
}

function TotalEventComments()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM comments_events";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalComments = array_shift($TotalRows);
  echo $TotalComments;
}

function TotalProjectComments()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM comments_projects";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalComments = array_shift($TotalRows);
  echo $TotalComments;
}

function TotalRequestComments()
{
  global $con;
  $sql = "SELECT COUNT(*) FROM comments_requests";
  $stmt = $con->query($sql);
  $TotalRows = $stmt->fetch();
  $TotalComments = array_shift($TotalRows);
  echo $TotalComments;
}
// approving commeting section
function ApproveCommentsAccordingToPost($PostId)
{
  global $con;
  $sqlApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
  $stmtApprove = $con->query($sqlApprove);
  $RowTotal = $stmtApprove->fetch();
  $Total = array_shift($RowTotal);
  return $Total;
}

function ApproveCommentsAccordingToEventPost($PostId)
{
  global $con;
  $sqlApprove = "SELECT COUNT(*) FROM comments_events WHERE event_id='$PostId' AND status='ON'";
  $stmtApprove = $con->query($sqlApprove);
  $RowTotal = $stmtApprove->fetch();
  $Total = array_shift($RowTotal);
  return $Total;
}

function ApproveCommentsAccordingToProjectPost($PostId)
{
  global $con;
  $sqlApprove = "SELECT COUNT(*) FROM comments_projects WHERE project_id='$PostId' AND status='ON'";
  $stmtApprove = $con->query($sqlApprove);
  $RowTotal = $stmtApprove->fetch();
  $Total = array_shift($RowTotal);
  return $Total;
}

// disapproving commenting section
function DisApproveCommentsAccordingToPost($PostId)
{
  global $con;
  $sqlDisApprove = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='OFF'";
  $stmtDisApprove = $con->query($sqlDisApprove);
  $RowTotal = $stmtDisApprove->fetch();
  $Total = array_shift($RowTotal);
  return $Total;
}

function DisApproveCommentsAccordingToEventPost($PostId)
{
  global $con;
  $sqlDisApprove = "SELECT COUNT(*) FROM comments_events WHERE event_id='$PostId' AND status='OFF'";
  $stmtDisApprove = $con->query($sqlDisApprove);
  $RowTotal = $stmtDisApprove->fetch();
  $Total = array_shift($RowTotal);
  return $Total;
}

function DisApproveCommentsAccordingToProjectPost($PostId)
{
  global $con;
  $sqlDisApprove = "SELECT COUNT(*) FROM comments_projects WHERE project_id='$PostId' AND status='OFF'";
  $stmtDisApprove = $con->query($sqlDisApprove);
  $RowTotal = $stmtDisApprove->fetch();
  $Total = array_shift($RowTotal);
  return $Total;
}
?>