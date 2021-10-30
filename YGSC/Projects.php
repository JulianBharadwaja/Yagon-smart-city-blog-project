<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php require_once("Includes/Sessions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project - Yangon Smart City</title>

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
        <form action="Projects.php">
          <input type="text" name="Search" placeholder="Search here" style="padding: 15px; min-width: 270px; border-radius:20px; border:none; outline:none; font-size: 16px;">
          <button name="SearchButton" class="btn">Explore</button>
        </form>
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
          // FILTER SYSTEM FOR SEARCH BUTTON AND ALL POST WITHOUT SEARCH
          global $con;
          if (isset($_GET['SearchButton'])) {
            $Search = $_GET["Search"];
            // GRABBING DATA FROM POSTS TABLE FROM DATABASE
            $sql = "SELECT * FROM projects WHERE datetime LIKE :search OR title LIKE :search OR category LIKE :search OR POST LIKE :search";
            $stmt = $con->prepare($sql);
            // USED % SINCE I USED LIKE SQL
            $stmt->bindValue(':search', '%' . $Search . '%');
            $stmt->execute();
          } elseif (isset($_GET["page"])) {
            $Page = $_GET["page"];
            $ShowPostFrom = 0;
            if ($Page == 0 || $Page < 1) {
              $ShowPostFrom = 0;
            } else {
              $ShowPostFrom = ($Page * 5) - 5;
            }

            $sql = "SELECT * FROM projects ORDER BY id desc LIMIT $ShowPostFrom, 5";
            $stmt = $con->query($sql);
          } elseif (isset($_GET['category'])) {
            $Category = $_GET['category'];
            $sql = "SELECT * FROM projects WHERE project_category='$Category' ORDER BY id desc ";
            $stmt = $con->query($sql);
          } else {
            $sql = "SELECT * FROM projects ORDER BY id desc LIMIT 0, 5";
            $stmt = $con->query($sql);
          }
          while ($DataRows = $stmt->fetch()) {
            // FETCHING ALL THE DATA FROM DB
            $PostId = $DataRows["id"];
            $DateTime = $DataRows["datetime"];
            $PostTitle = $DataRows["title"];
            $Category = $DataRows["project_category"];
            $Type = $DataRows["project_type"];
            $Admin = $DataRows["creator"];
            $Image = $DataRows["image"];
            $Location = $DataRows["location"];
            $PostDescription = $DataRows["ppost"];
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
                <a href="#"><?php echo htmlentities($PostTitle); ?></a>
                <p>Project Category: <?php echo htmlentities($Category); ?></p>
                <p>Project Type: <?php echo htmlentities($Type); ?></p>
                <p>
                  <?php if (strlen($PostDescription) > 150) {
                    $PostDescription = substr($PostDescription, 0, 150) . "....";
                    echo htmlentities($PostDescription);
                  } else {
                    echo htmlentities($PostDescription);
                  }
                  ?>
                </p>
                <a class="btn post-btn" href="FullProjectPost.php?id=<?php echo $PostId; ?>">Read More &nbsp; <i class="fas fa-arrow-right"></i></a>
              </div>
            </div>
            <hr>
            <!-- CLOSING WHILE LOPP -->
          <?php } ?>

          <div class="pagination flex-row">
            <!-- CREATING BACKWARD BUTTON -->
            <?php if (isset($Page)) {
              if ($Page > 1) {
            ?>
                <a href="Projects.php?page=<?php echo $Page - 1; ?>"><i class="fas fa-chevron-left"></i></a>
            <?php }
            } ?>
            <?php
            global $con;
            $sql = "SELECT COUNT(*) FROM projects";
            $stmt = $con->query($sql);
            $RowPagination = $stmt->fetch();
            $TotalPosts = array_shift($RowPagination);
            // echo $TotalPosts."<br/>";
            $PostPagination = $TotalPosts / 5;
            $PostPagination = ceil($PostPagination);
            // echo $PostPagination;
            ?>
            <a href="Projects.php?page=" class="pages">0</a>
            <?php
            for ($i = 1; $i <= $PostPagination; $i++) {
              if (isset($Page)) {
                if ($i == $Page) {
            ?>
                  <a href="Projects.php?page=<?php echo $i; ?>" class="pages"><?php echo $i; ?></a>
                <?php } else { ?>
                  <a href="Projects.php?page=<?php echo $i; ?>" class="pages"><?php echo $i; ?></a>
                <?php
                } ?>
            <?php }
            } ?>
            <!-- CREATING FORWARD BUTTON -->
            <?php if (isset($Page) && !empty($Page)) {
              if ($Page + 1 <= $PostPagination) {
            ?>
                <a href="Projects.php?page=<?php echo $Page + 1; ?>"><i class="fas fa-chevron-right"></i></a>
              <?php }
            } else { ?>
              <a href="Projects.php?page=2"><i class="fas fa-chevron-right"></i></a>
            <?php } ?>
          </div>
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