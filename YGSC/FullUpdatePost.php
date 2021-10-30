<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>

<!-- CHANGING THE HEADER LOCATION SINCE THERE IS ERROR. THE ERROR IS HEADER ALREADY SEND... BY CHANGING THE LOCATION OF THE CONDITION OF PHP TO THE TOP.  -->
<?php
global $con;
$PostIdFromURL = $_GET['id'];
if (!isset($PostIdFromURL)) {
  $_SESSION['ErrorMessage'] = "Bad Request!";
  Redirect_to("index.php");
}
?>
<?php
if (isset($_POST["Submit"])) {
  $Name = $_POST["CommenterName"];
  $Email = $_POST["CommenterEmail"];
  $Comment = $_POST["CommenterThoughts"];
  date_default_timezone_set("Asia/Yangon");
  $CurrentTime = time();
  $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);

  if (empty($Name) || empty($Email) || empty($Comment)) {
    $_SESSION["ErrorMessage"] = "All fields must be filled out";
    Redirect_to("FullUpdatePost.php?id=$PostIdFromURL");
  } elseif (strlen($Comment) > 500) {
    $_SESSION["ErrorMessage"] = "Comment length should be lesser than 500 characters";
    Redirect_to("FullUpdatePost.php?id=$PostIdFromURL");
  } else {
    // Query to insert comment in DB when everything is fine
    global $con;
    // Query to insert category in DB when everything is fine
    $sql = "INSERT INTO comments(datetime,name,email,comment,approvedby,status,post_id)";
    $sql .= "VALUES(:dateTime,:naME,:eMail,:coMMent,'pending','OFF',:postIdFromURL)";
    $stmt = $con->prepare($sql);
    $stmt->bindValue(':dateTime', $DateTime);
    $stmt->bindValue(':naME', $Name);
    $stmt->bindValue(':eMail', $Email);
    $stmt->bindValue(':coMMent', $Comment);
    $stmt->bindValue(':postIdFromURL', $PostIdFromURL);
    $Execute = $stmt->execute();
    if ($Execute) {
      $_SESSION["SuccessMessage"] = "Comment Submitted Successfully";
      Redirect_to("FullUpdatePost.php?id=$PostIdFromURL");
    } else {
      $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!";
      Redirect_to("FullUpdatePost.php?id=$PostIdFromURL");
    }
  }
} //Ending of Submit Button If-Condition 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Updates - Yangon Smart City</title>

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/801298c5dd.js" crossorigin="anonymous"></script>

  <!-- --------- Owl-Carousel ----------------- -->
  <link rel="stylesheet" href="./css/owl.carousel.min.css">
  <link rel="stylesheet" href="./css/owl.theme.default.min.css">

  <!-- ------------ AOS Library ------------------------- -->
  <link rel="stylesheet" href="./css/aos.css">

  <!-- Custom Style   -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" type="text/css" href="css/preloader.css">
</head>

<body>
  <!-- Preloader -->
  <div class="loader_bg">
    <div class="loader"></div>
  </div>
  <!-- ----------------------------  Navigation ---------------------------------------------- -->
  <?php include_once "basic/nav.php" ?>
  <!-- ------------x---------------  Navigation --------------------------x------------------- -->

  <!----------------------------- Main Site Section ------------------------------>

  <main>

    <!------------------------ Site Title ---------------------->

    <section class="site-title">
      <div class="site-background" data-aos="fade-up" data-aos-delay="100">
        <h3>Tours & Travels</h3>
        <h1>Amazing Place on Earth</h1>
        <button class="btn">Explore</button>
      </div>
    </section>

    <!------------x----------- Site Title ----------x----------->

    <!-- ---------------------- Site Content -------------------------->

    <section class="container">
      <div class="site-content">
        <div class="posts">
          <?php
          // CHECKING SESSION MESSAGE FROM FULL POST FOR VALIDATION
          echo ErrorMessage();
          echo SuccessMessage();
          $sql = "SELECT * FROM posts WHERE id='$PostIdFromURL'";
          $stmt = $con->query($sql);
          while ($DataRows = $stmt->fetch()) {
            // FETCHING ALL THE DATA FROM DB
            $PostId = $DataRows["id"];
            $DateTime = $DataRows["datetime"];
            $PostTitle = $DataRows["title"];
            $Category = $DataRows["category"];
            $Admin = $DataRows["author"];
            $Image = $DataRows["image"];
            $PostDescription = $DataRows["post"];
          ?>
            <!-- OUTPUTING DATA FROM TABLE INTO HTML -->
            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">
              <div class="post-title">
                <a style="text-decoration: underline;"><?php echo htmlentities($PostTitle); ?></a>
              </div>
              <div class="post-image">
                <div>
                  <img src="Uploads/<?php echo htmlentities($Image); ?>" class="img" alt="blog1">
                </div>
                <div class="post-info flex-row">
                  <span><i class="fas fa-user text-gray"></i>&nbsp;&nbsp;<?php echo htmlentities($Admin); ?></span>
                  <span><i class="fas fa-calendar-alt text-gray"></i>&nbsp;&nbsp;<?php echo htmlentities($DateTime); ?></span>
                  <span>2 Commets</span>
                </div>
              </div>
              <div class="post-title">
                <p><?php echo htmlentities($PostDescription); ?></p>
              </div>
            </div>
            <!-- CLOSING WHILE LOPP -->
          <?php } ?>
          <!-- COMMENT DISPLAY SECTION -->
          <br><br>
          <h2 class="comment-display-h">Comments</h2>
          <?php
          global $con;
          $sql = "SELECT * FROM comments WHERE post_id='$PostIdFromURL' AND status='ON'";
          $stmt = $con->query($sql);
          while ($DataRows = $stmt->fetch()) {
            $CommentDate = $DataRows["datetime"];
            $CommenterName = $DataRows['name'];
            $CommentContent = $DataRows['comment'];

          ?>
            <div class="comment-display mgb3">
              <div class="img-box">
                <img src="assets/user.png" alt="user">
              </div>
              <div class="comment-content">
                <h3><?php echo htmlentities($CommenterName); ?></h3>
                <p><?php echo htmlentities($CommentDate); ?></p>
                <p><?php echo htmlentities($CommentContent); ?></p>
              </div>
            </div>
          <?php } ?>
          <!-- COMMENT FORM SECTION -->
          <form action="FullUpdatePost.php?id=<?php echo $PostIdFromURL; ?>" method="post">
            <div class="contact-box">
              <h2>Share Your Thoughts About This Post</h2>
              <input type="text" class="field" name="CommenterName" placeholder="Your Name" value="">
              <input type="text" class="field" name="CommenterEmail" placeholder="Your Email" value="">
              <textarea placeholder="Message" name="CommenterThoughts" class="field"></textarea>
              <button type="submit" name="Submit" class="commentSub">Comment</button>
            </div>
          </form>

        </div>
        <!---------------x------------- Main Site Section ---------------x-------------->


        <!-- --------------------------- Footer ---------------------------------------- -->

        <?php include_once "basic/footer.php" ?>

        <!-- -------------x------------- Footer --------------------x------------------- -->

        <!-- Loader file -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
          setTimeout(function() {
            $('.loader_bg').fadeToggle();
          }, 1500);
        </script>
        <!-- Jquery Library file -->
        <script src="js/Jquery3.5.1.min.js"></script>

        <!-- Owl Carousel  -->
        <script src="js/owl.carousel.min.js"></script>

        <!-- ------------ AOS js Library  ------------------------- -->
        <script src="./js/aos.js"></script>

        <!-- Custom JavaScript file -->
        <script src="js/script.js"></script>
</body>

</html>