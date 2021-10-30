<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="Dashboard.php"><img class="logo" src="../assets/ygsc2.png" width="100" alt=""></a>
  <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
  <!-- Navbar Search-->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
  </form>
  <!-- Navbar-->
  <ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">Settings</a>
        <a class="dropdown-item" href="#">Activity Log</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="Logout.php">Logout</a>
      </div>
    </li>
  </ul>
</nav>
<div id="layoutSidenav">
  <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
        <div class="nav">
          <div class="sb-sidenav-menu-heading text-warning">Core</div>
          <!-- DASHBOARD LINK -->
          <a class="nav-link text-warning" href="Dashboard.php">
            <div class="sb-nav-link-icon text-warning"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
          </a>
          <!-- CATEGORIES AND TYPES -->
          <a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <div class="sb-nav-link-icon text-warning"><i class="fas fa-book-open"></i></div>
            Categories & Types
            <div class="sb-sidenav-collapse-arrow text-warning"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
              <a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                Categories
                <div class="sb-sidenav-collapse-arrow text-warning"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link text-warning" href="Categories.php"><i class="fas fa-newspaper"></i>Post</a>
                  <a class="nav-link text-warning" href="EventCategories.php"><i class="fas fa-calendar-week"></i>Event</a>
                  <a class="nav-link text-warning" href="ProjectCategories.php"><i class="fas fa-puzzle-piece"></i>Project</a>
                  <a class="nav-link text-warning" href="RequestCategories.php"><i class="fas fa-question-circle"></i>Request</a>
                  <a class="nav-link text-warning" href="ThemeCategories.php"><i class="fas fa-chalkboard"></i>Theme</a>
                </nav>
              </div>
              <a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                Types
                <div class="sb-sidenav-collapse-arrow text-warning"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                <nav class="sb-sidenav-menu-nested nav">
                  <a class="nav-link text-warning" href="EventType.php"><i class="far fa-file"></i>Event</a>
                  <a class="nav-link text-warning" href="ProjectType.php"><i class="fas fa-tags"></i>Project</a>
                  <a class="nav-link text-warning" href="RequestType.php"><i class="fas fa-circle-notch"></i> Request</a>
                </nav>
              </div>
            </nav>
          </div>
          <!-- MANAGING SITES -->
          <a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
            <div class="sb-nav-link-icon text-warning"><i class="fas fa-columns"></i></div>
            Managing Sites
            <div class="sb-sidenav-collapse-arrow text-warning"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link text-warning" href="Admins.php"><i class="fas fa-user-shield"></i>&nbsp;Admins</a>
              <a class="nav-link text-warning" href="AddNewPost.php"><i class="fas fa-newspaper"></i>&nbsp;Posts</a>
              <a class="nav-link text-warning" href="AddNewRequest.php"></i><i class="fas fa-clipboard-check"></i>&nbsp;Requests</a>
              <a class="nav-link text-warning" href="AddNewEvent.php"><i class="fas fa-calendar-week"></i>&nbsp;Events</a>
              <a class="nav-link text-warning" href="AddNewProject.php"><i class="fas fa-puzzle-piece"></i>&nbsp;Projects</a>
              <a class="nav-link text-warning" href="AddNewTheme.php"><i class="fas fa-chalkboard"></i>&nbsp;Themes</a>
            </nav>
          </div>
          <!-- TABLES -->
          <a class="nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
            <div class="sb-nav-link-icon text-warning"><i class="fas fa-table"></i></div>
            Tables
            <div class="sb-sidenav-collapse-arrow text-warning"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link text-warning" href="Posts.php" class="nav-link"><i class="fas fa-newspaper"></i> Posts</a>
              <a class="nav-link text-warning" href="Themes.php" class="nav-link"><i class="fas fa-chalkboard"></i> Themes</a>
              <a class="nav-link text-warning" href="Requests.php" class="nav-link"><i class="fas fa-question-circle"></i> Requests</a>
              <a class="nav-link text-warning" href="Projects.php" class="nav-link"><i class="fas fa-puzzle-piece"></i> Projects</a>
              <a class="nav-link text-warning" href="Events.php" class="nav-link"><i class="fas fa-calendar-week"></i> Events</a>
            </nav>
          </div>
          <!-- LIVE VIEWS -->
          <a class=" nav-link collapsed text-warning" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
            <div class="sb-nav-link-icon text-warning"><i class="fas fa-lightbulb"></i></div>
            Live
            <div class="sb-sidenav-collapse-arrow text-warning"><i class="fas fa-angle-down"></i></div>
          </a>
          <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link text-warning" href="../index.php"><i class="fas fa-blog"></i> Live Blogs</a>
              <a class="nav-link text-warning" href="../Events.php"><i class="fas fa-calendar-week"></i> Live Events</a>
              <a class="nav-link text-warning" href="../Projects.php"><i class="fas fa-puzzle-piece"></i> Live Projects</a>
              <a class="nav-link text-warning" href="../Requests.php"><i class="fas fa-network-wired"></i> Live Requests</a>
              <a class="nav-link text-warning" href="../Themes.php"><i class="fas fa-calendar-week"></i> Live Theme</a>
            </nav>
          </div>
        </div>
      </div>
      <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <?php echo $_SESSION['UserName']; ?>
      </div>
    </nav>
  </div>