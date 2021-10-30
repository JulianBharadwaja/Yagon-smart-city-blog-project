<?php include_once '../Includes/DB.php' ?>
<?php require_once("../Includes/Functions.php"); ?>
<?php require_once("../Includes/Sessions.php"); ?>
<?php
// using server var to get the track the current tracking url
$_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
Confirm_Login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Requests - Yangon Smart City</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
  <?php include_once 'innerTabs/Nav.php' ?>
  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid">
        <h1 class="mt-4">Request Data Tables</h1>
        <!-- BREADCRUMB FOR THE TABLE TO DASHBOARD -->
        <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Request Data Tables</li>
        </ol>
        <div class="row">
          <div class="col-xl-6 col-md-6">
            <div class="card bg-primary text-white mb-4">
              <div class="card-body"><i class="fas fa-edit"></i>&nbsp;Add New Request</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="AddNewRequest.php">Click Here!</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6">
            <div class="card bg-warning text-white mb-4">
              <div class="card-body"><i class="fas fa-folder-plus">&nbsp;</i>Add New Request Category</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small text-white stretched-link" href="RequestCategories.php">Click Here!</a>
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
        <?php
        echo ErrorMessage();
        echo SuccessMessage();
        ?>
        <!-- TABLE FOR THE FETECHED DATAS -->
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
                    <th>Type</th>
                    <th>Date&Time</th>
                    <th>Admin</th>
                    <th>Author</th>
                    <th>Comments</th>
                    <th>Action</th>
                    <th>Live Preview</th>
                  </tr>
                </thead>
                <tfoot class="bg-dark text-white">
                  <th>#</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Type</th>
                  <th>Date&Time</th>
                  <th>Admin</th>
                  <th>Author</th>
                  <th>Comments</th>
                  <th>Action</th>
                  <th>Live Preview</th>
                </tfoot>
                <!-- FETCHING DATA FROM TABLE  -->
                <?php
                global $con;
                $sql = "SELECT * FROM requests";
                $stmt = $con->query($sql);
                $Sr = 0;
                while ($DataRows = $stmt->fetch()) {
                  $Id = $DataRows['id'];
                  $DateTime = $DataRows['datetime'];
                  $RequestTitle = $DataRows['title'];
                  $Category = $DataRows['request_category'];
                  $Type = $DataRows['request_type'];
                  $Admin = $DataRows['creator'];
                  $Author = $DataRows['request_user'];
                  $Image = $DataRows['image'];
                  $PostTexr = $DataRows['rpost'];
                  $Sr++;
                ?>
                  <tbody>
                    <tr>
                      <td><?php echo $Sr; ?></td>
                      <td class="table-info">
                        <!-- LIMITING THE TITLE WORDS IN THE UI -->
                        <?php
                        if (strlen($RequestTitle) > 20) {
                          $RequestTitle = substr($RequestTitle, 0, 20) . "...";
                        }
                        echo $RequestTitle;
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
                        if (strlen($Type) > 15) {
                          $Type = substr($Type, 0, 15) . "...";
                        }
                        echo $Type;
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
                      <td class="table-primary">
                        <?php
                        if (strlen($Author) > 6) {
                          $Author = substr($Author, 0, 6) . "...";
                        }
                        echo $Author;
                        ?>
                      </td>
                      <td>Comments</td>
                      <td>
                        <a href="EditRequestPost.php?id=<?php echo $Id; ?>">
                          <span class="btn btn-warning"><i class="fas fa-edit"></i></span>
                        </a>
                        <a href="DeleteRequestPost.php?id=<?php echo $Id; ?>">
                          <span class="btn btn-danger"><i class="fas fa-trash-alt"></i></span>
                        </a>
                      </td>
                      <td>
                        <a href="../FullRequestPost.php?id=<?php echo $Id; ?>">
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