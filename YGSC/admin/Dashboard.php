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
    <title>Dashboard - Yangon Smart City</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once 'innerTabs/Nav.php' ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <?php echo ErrorMessage();
                echo SuccessMessage(); ?>
                <h1 class="mt-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                <!-- BREADCRUMB FOR THE TABLE TO DASHBOARD -->
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Post Data Tables</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body"><i class="fas fa-edit"></i>&nbsp;Edit Your Profile</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="MyProfile.php">Click Here!</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><i class="fas fa-check"></i>&nbsp;Approve Comments</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="Comments.php">Click Here!</a>
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
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><i class="fas fa-folder-plus"></i>&nbsp;Add New Update</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="AddNewPost.php">Click Here!</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body"><i class="fas fa-calendar-week"></i>&nbsp;Add New Event</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="AddNewEvent.php">Click Here!</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body"><i class="fas fa-puzzle-piece"></i>&nbsp;Add New Projects</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="AddNewProject.php">Click Here!</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-white mb-4" style="background-color: firebrick;">
                            <div class="card-body"><i class="fas fa-question-circle"></i>&nbsp;Add New Requests</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="AddNewRequest.php">Click Here!</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card text-white mb-4" style="background-color: #bada55;">
                            <div class="card-body"><i class="fas fa-chalkboard"></i>&nbsp;Add New Theme</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="AddNewTheme.php">Click Here!</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DESCRIPTION FOR THE TABLE -->
                <div class="card mb-4">
                    <div class="card-body">
                        The Data Tables below are information about the data that is store in the database. Green color show that show on comments' column are approve and red color shows unapprove.
                    </div>
                </div>
                <!-- UPDATE TABLE FOR THE FETECHED DATAS -->
                <section class="container py-2 mb-4">
                    <div class="row">
                        <?php echo ErrorMessage();
                        echo SuccessMessage(); ?>
                        <!-- LEFT SIDE AREA START -->
                        <div class="col-lg-2 d-none d-md-block">
                            <div class="card text-center bg-warning text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Posts
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fab fa-readme"></i>
                                        <?php
                                        TotalPosts();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-warning text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Categories
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-folder"></i>
                                        <?php
                                        TotalCategories();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-warning text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Admin
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-users"></i>
                                        <?php
                                        TotalAdmins();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-warning text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Comments
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-comments"></i>
                                        <?php
                                        TotalComments();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- LEFT SIDE AREA END -->
                        <!-- RIGHT SIDE AREA START -->
                        <div class="col-lg-10">
                            <h1>Top Posts</h1>
                            <table class="table table-hover">
                                <thead class="bg-warning  text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Date&Time</th>
                                        <th>Author</th>
                                        <th>Comments</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <?php
                                $SrNo = 0;
                                global $con;
                                $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
                                $stmt = $con->query($sql);
                                while ($DataRows = $stmt->fetch()) {
                                    $PostId = $DataRows['id'];
                                    $DateTime = $DataRows['datetime'];
                                    $Author = $DataRows['author'];
                                    $Title = $DataRows['title'];
                                    $SrNo++;

                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $SrNo; ?></td>
                                            <td><?php echo $Title; ?></td>
                                            <td><?php echo $DateTime; ?></td>
                                            <td><?php echo $Author; ?></td>
                                            <td>

                                                <?php
                                                $Total = ApproveCommentsAccordingToPost($PostId);
                                                if ($Total > 0) { ?>
                                                    <span class="badge badge-success">
                                                    <?php
                                                    echo $Total;
                                                }

                                                    ?>
                                                    </span>

                                                    <?php
                                                    $TotalDanger = DisApproveCommentsAccordingToPost($PostId);
                                                    if ($TotalDanger > 0) { ?>
                                                        <span class="badge badge-danger">
                                                        <?php
                                                        echo $TotalDanger;
                                                    }
                                                        ?>
                                                        </span>
                                            </td>
                                            <td>
                                                <a target="_blank" href="../FullUpdatePost.php?id=<?php echo $PostId;  ?>"> <span class="btn btn-info">Preview</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- RIGHT SIDE AREA END -->
                    </div>
                </section>
                <!-- ENDS UPDATE TABLE FOR THE FETECHED DATAS -->
                <!-- EVENT TABLE FOR THE FETECHED DATAS -->
                <section class="container py-2 mb-4">
                    <div class="row">
                        <!-- LEFT SIDE AREA START -->
                        <div class="col-lg-2 d-none d-md-block">
                            <div class="card text-center bg-secondary text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Posts
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fab fa-readme"></i>
                                        <?php
                                        TotalEventPosts();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-secondary text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Categories
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-folder"></i>
                                        <?php
                                        TotalEventCategories();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-secondary text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Types
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-cogs"></i>
                                        <?php
                                        TotalEventType();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-secondary text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Comments
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-comments"></i>
                                        <?php
                                        TotalEventComments();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- LEFT SIDE AREA END -->
                        <!-- RIGHT SIDE AREA START -->
                        <div class="col-lg-10">
                            <h1>Top Event Posts</h1>
                            <table class="table table-hover">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Date&Time</th>
                                        <th>Author</th>
                                        <th>Comments</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <?php
                                $SrNo = 0;
                                global $con;
                                $sql = "SELECT * FROM events ORDER BY id desc LIMIT 0,5";
                                $stmt = $con->query($sql);
                                while ($DataRows = $stmt->fetch()) {
                                    $PostId = $DataRows['id'];
                                    $DateTime = $DataRows['datetime'];
                                    $Author = $DataRows['creator'];
                                    $Title = $DataRows['title'];
                                    $SrNo++;

                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $SrNo; ?></td>
                                            <td><?php echo $Title; ?></td>
                                            <td><?php echo $DateTime; ?></td>
                                            <td><?php echo $Author; ?></td>
                                            <td>

                                                <?php
                                                $Total = ApproveCommentsAccordingToEventPost($PostId);
                                                if ($Total > 0) { ?>
                                                    <span class="badge badge-success">
                                                    <?php
                                                    echo $Total;
                                                }

                                                    ?>
                                                    </span>

                                                    <?php
                                                    $TotalDanger = DisApproveCommentsAccordingToEventPost($PostId);
                                                    if ($TotalDanger > 0) { ?>
                                                        <span class="badge badge-danger">
                                                        <?php
                                                        echo $TotalDanger;
                                                    }
                                                        ?>
                                                        </span>
                                            </td>
                                            <td>
                                                <a target="_blank" href="../FullUpdatePost.php?id=<?php echo $PostId;  ?>"> <span class="btn btn-info">Preview</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- RIGHT SIDE AREA END -->
                    </div>
                </section>
                <!-- ENDS EVENT TABLE FOR THE FETECHED DATAS -->
                <!-- PROJECT TABLE FOR THE FETECHED DATAS -->
                <section class="container py-2 mb-4">
                    <div class="row">
                        <?php echo ErrorMessage();
                        echo SuccessMessage(); ?>
                        <!-- LEFT SIDE AREA START -->
                        <div class="col-lg-2 d-none d-md-block">
                            <div class="card text-center bg-info text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Posts
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fab fa-readme"></i>
                                        <?php
                                        TotalProjectPost();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-info text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Categories
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-folder"></i>
                                        <?php
                                        TotalProjectCategories();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-info text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Types
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-cogs"></i>
                                        <?php
                                        TotalProjectType();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center bg-info text-white mb-3">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Comments
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-comments"></i>
                                        <?php
                                        TotalProjectComments();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- LEFT SIDE AREA END -->
                        <!-- RIGHT SIDE AREA START -->
                        <div class="col-lg-10">
                            <h1>Top Project Posts</h1>
                            <table class="table table-hover">
                                <thead class="bg-info text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Date&Time</th>
                                        <th>Author</th>
                                        <th>Comments</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <?php
                                $SrNo = 0;
                                global $con;
                                $sql = "SELECT * FROM projects ORDER BY id desc LIMIT 0,5";
                                $stmt = $con->query($sql);
                                while ($DataRows = $stmt->fetch()) {
                                    $PostId = $DataRows['id'];
                                    $DateTime = $DataRows['datetime'];
                                    $Author = $DataRows['creator'];
                                    $Title = $DataRows['title'];
                                    $SrNo++;

                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $SrNo; ?></td>
                                            <td><?php echo $Title; ?></td>
                                            <td><?php echo $DateTime; ?></td>
                                            <td><?php echo $Author; ?></td>
                                            <td>

                                                <?php
                                                $Total = ApproveCommentsAccordingToProjectPost($PostId);
                                                if ($Total > 0) { ?>
                                                    <span class="badge badge-success">
                                                    <?php
                                                    echo $Total;
                                                }

                                                    ?>
                                                    </span>

                                                    <?php
                                                    $TotalDanger = DisApproveCommentsAccordingToProjectPost($PostId);
                                                    if ($TotalDanger > 0) { ?>
                                                        <span class="badge badge-danger">
                                                        <?php
                                                        echo $TotalDanger;
                                                    }
                                                        ?>
                                                        </span>
                                            </td>
                                            <td>
                                                <a target="_blank" href="../FullUpdatePost.php?id=<?php echo $PostId;  ?>"> <span class="btn btn-info">Preview</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- RIGHT SIDE AREA END -->
                    </div>
                </section>
                <!-- ENDS PROJECT TABLE FOR THE FETECHED DATAS -->
                <!-- REQUEST TABLE FOR THE FETECHED DATAS -->
                <section class="container py-2 mb-4">
                    <div class="row">
                        <?php echo ErrorMessage();
                        echo SuccessMessage(); ?>
                        <!-- LEFT SIDE AREA START -->
                        <div class="col-lg-2 d-none d-md-block">
                            <div class="card text-center text-white mb-3" style="background-color: firebrick;">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Posts
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fab fa-readme"></i>
                                        <?php
                                        TotalRequestPost();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center text-white mb-3" style="background-color: firebrick;">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Categories
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-folder"></i>
                                        <?php
                                        TotalRequestCategories();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center text-white mb-3" style="background-color: firebrick;">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Types
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-cogs"></i>
                                        <?php
                                        TotalRequestType();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="card text-center text-white mb-3" style="background-color: firebrick;">
                                <div class="card-body">
                                    <h1 class="lead">
                                        Comments
                                    </h1>
                                    <h4 class="display-5">
                                        <i class="fas fa-comments"></i>
                                        <?php
                                        TotalRequestComments();
                                        ?>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <!-- LEFT SIDE AREA END -->
                        <!-- RIGHT SIDE AREA START -->
                        <div class="col-lg-10">
                            <h1>Top Request Posts</h1>
                            <table class="table table-hover">
                                <thead class="text-white" style="background-color: firebrick;">
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Date&Time</th>
                                        <th>Author</th>
                                        <th>Comments</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <?php
                                $SrNo = 0;
                                global $con;
                                $sql = "SELECT * FROM requests ORDER BY id desc LIMIT 0,5";
                                $stmt = $con->query($sql);
                                while ($DataRows = $stmt->fetch()) {
                                    $PostId = $DataRows['id'];
                                    $DateTime = $DataRows['datetime'];
                                    $Author = $DataRows['creator'];
                                    $Title = $DataRows['title'];
                                    $SrNo++;

                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $SrNo; ?></td>
                                            <td><?php echo $Title; ?></td>
                                            <td><?php echo $DateTime; ?></td>
                                            <td><?php echo $Author; ?></td>
                                            <td>

                                                <?php
                                                $Total = ApproveCommentsAccordingToProjectPost($PostId);
                                                if ($Total > 0) { ?>
                                                    <span class="badge badge-success">
                                                    <?php
                                                    echo $Total;
                                                }

                                                    ?>
                                                    </span>

                                                    <?php
                                                    $TotalDanger = DisApproveCommentsAccordingToProjectPost($PostId);
                                                    if ($TotalDanger > 0) { ?>
                                                        <span class="badge badge-danger">
                                                        <?php
                                                        echo $TotalDanger;
                                                    }
                                                        ?>
                                                        </span>
                                            </td>
                                            <td>
                                                <a target="_blank" href="../FullUpdatePost.php?id=<?php echo $PostId;  ?>"> <span class="btn btn-info">Preview</span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                        <!-- RIGHT SIDE AREA END -->
                    </div>
                </section>
                <!-- ENDS REQUEST TABLE FOR THE FETECHED DATAS -->
            </div>
        </main>
        <?php include_once 'innerTabs/Footer.php' ?>