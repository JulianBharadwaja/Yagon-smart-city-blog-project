<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Themes - Yangon Smart City</title>

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
          global $con;
          $sql = "SELECT * FROM themes";
          $stmt = $con->query($sql);

          while ($DataRows = $stmt->fetch()) {
            // FETCHING ALL THE DATA FROM DB
            $PostId = $DataRows["id"];
            $DateTime = $DataRows["datetime"];
            $PostTitle = $DataRows["title"];
            $Category = $DataRows["theme_category"];
            $Admin = $DataRows["author"];
            $Image = $DataRows["image"];
            $PostDescription = $DataRows["tpost"];
          ?>
            <!-- OUTPUTING DATA FROM TABLE INTO HTML -->
            <div class="post-content" data-aos="zoom-in" data-aos-delay="200">

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
                <a href="FullThemePost.php?id=<?php echo $PostId; ?>"><?php echo htmlentities($PostTitle); ?></a>
                <p>
                  <?php if (strlen($PostDescription) > 150) {
                    $PostDescription = substr($PostDescription, 0, 150) . "....";
                    echo htmlentities($PostDescription);
                  } else {
                    echo htmlentities($PostDescription);
                  }
                  ?>
                </p>
                <a class="btn post-btn" href="FullThemePost.php?id=<?php echo $PostId; ?>">Read More &nbsp; <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <hr>
            <!-- CLOSING WHILE LOPP -->
          <?php } ?>

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