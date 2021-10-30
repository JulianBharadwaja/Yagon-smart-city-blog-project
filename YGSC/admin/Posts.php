<?php include_once '../Includes/DB.php' ?>
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php Confirm_Login(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Posts - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4">Post Data Tables</h1>
        <!-- BREADCRUMB FOR THE TABLE TO DASHBOARD -->
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Post Data Tables</li>
        </ol>
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
              <div class="card-body"><i class="fas fa-edit"></i>&nbsp;Add New Post</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="AddNewPost.php">Click Here!</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
              <div class="card-body"><i class="fas fa-folder-plus"></i>&nbsp;Add New Category</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="Categories.php">Click Here!</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
              <div class="card-body"><i class="fas fa-user-plus"></i>&nbsp;Add New Admin</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="Admins.php">Click Here!</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
              <div class="card-body"><i class="fas fa-check"></i>&nbsp;Approve Comments</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="#">Click Here!</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
        </div>
        <!-- DESCRIPTION FOR THE TABLE -->
        <div class="card mb-4">
          <div class="card-body">
            This Data Tables is an information about the data that is store in the database. You can also edit, delete and preview it from here.
          </div>
        </div>
        <!-- TABLE FOR THE FETECHED DATAS -->
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Data Table
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date&Time</th>
                    <th>Author</th>
                    <th>Banner</th>
                    <th>Comments</th>
                    <th>Action</th>
                    <th>Live Preview</th>
                  </tr>
                </thead>
                <tfoot class="bg-dark text-white">
                  <th>#</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Date&Time</th>
                  <th>Author</th>
                  <th>Banner</th>
                  <th>Comments</th>
                  <th>Action</th>
                  <th>Live Preview</th>
                </tfoot>
                <!-- FETCHING DATA FROM TABLE  -->
                <?php
                global $con;
                $sql = "SELECT * FROM posts";
                $stmt = $con->query($sql);
                $Sr = 0;
                while ($DataRows = $stmt->fetch()) {
                  $Id = $DataRows['id'];
                  $DateTime = $DataRows['datetime'];
                  $PostTitle = $DataRows['title'];
                  $Category = $DataRows['category'];
                  $Admin = $DataRows['author'];
                  $Image = $DataRows['image'];
                  $PostTexr = $DataRows['post'];
                  $Sr++;
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $Sr; ?></td>
                      <td class="table-info">
                        <!-- LIMITING THE TITLE WORDS IN THE UI -->
                        <?php
                        if (strlen($PostTitle) > 20) {
                          $PostTitle = substr($PostTitle, 0, 20) . "...";
                        }
                        echo $PostTitle;
                        ?>
                      </td>
                      <td>
                        <?php
                        if (strlen($Category) > 8) {
                          $Category = substr($Category, 0, 8) . "...";
                        }
                        echo $Category;
                        ?>
                      </td>
                      <td>
                        <?php
                        if (strlen($DateTime) > 11) {
                          $DateTime = substr($DateTime, 0, 11) . "...";
                        }
                        echo $DateTime;
                        ?>
                      </td>
                      <td class="table-primary">
                        <?php
                        if (strlen($Admin) > 6) {
                          $Admin = substr($Admin, 0, 6) . "...";
                        }
                        echo $Admin;
                        ?>
                      </td>
                      <td><img src="../Uploads/<?php echo $Image; ?>" width="170px"></td>
                      <td>Comments</td>
                      <td>
                        <a href="EditPost.php?id=<?php echo $Id; ?>">
                          <span class="btn btn-warning"><i class="fas fa-edit"></i></span>
                        </a>
                        <a href="DeletePost.php?id=<?php echo $Id; ?>">
                          <span class="btn btn-danger"><i class="fas fa-trash-alt"></i></span>
                        </a>
                      </td>
                      <td>
                        <a href="../FullUpdatePost.php?id=<?php echo $Id; ?>">
                          <span class="btn btn-info"><i class="fas fa-eye"></i> Live</span>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php include_once 'innerTabs/Footer.php' ?>