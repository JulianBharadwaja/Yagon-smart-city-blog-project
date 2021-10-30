 <?php require_once('../Includes/DB.php'); ?>
 <?php require_once('../Includes/Functions.php'); ?>
 <?php require_once('../Includes/Sessions.php'); ?>
 <?php
  //GET THE EXISTING PAGE NAME 
  $_SESSION['TrackingURL'] = $_SERVER["PHP_SELF"];
  //echo $_SESSION['TrackingURL'];
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
   <title>Manage Comments - Yangon Smart City</title>
   <link href="css/styles.css" rel="stylesheet" />
   <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
 </head>

 <body class="sb-nav-fixed">
   <?php include_once 'innerTabs/Nav.php' ?>
   <div id="layoutSidenav_content">
     <main>
       <div class="container-fluid">
         <h1 class="mt-4"><i class="fas fa-comments"></i> Manage Comments</h1>
         <ol class="breadcrumb mb-4">
           <li class="breadcrumb-item active">Manage Comments</li>
         </ol>
       </div>
       <!-- MAIN AREA STARTS -->
       <section class="container py-2 mb-4">
         <div class="row" style="min-height:30px;">
           <div class="col-lg-12" style="min-height: 400px;">
             <?php echo ErrorMessage();
              echo SuccessMessage(); ?>
             <!-- UNAPPROVE POST COMMENT SECTION -->
             <h2>Un-Approved Post's Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Approve</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["post_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td><a class="btn btn-success" href="ApproveComment.php?id=<?php echo $CommentId; ?>">Approve</a></td>
                     <td><a class="btn btn-danger" href="DeleteComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullUpdatePost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
             <!-- UNAPPROVE Event COMMENT SECTION -->
             <h2>Un-Approved Event's Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Approve</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments_events WHERE status='OFF' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["event_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td><a class="btn btn-success" href="ApproveEventComment.php?id=<?php echo $CommentId; ?>">Approve</a></td>
                     <td><a class="btn btn-danger" href="DeleteEventComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullEventPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
             <!-- UNAPPROVE REQUEST COMMENT SECTION -->
             <h2>Un-Approved Request's Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Approve</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments_requests WHERE status='OFF' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["request_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td><a class="btn btn-success" href="ApproveRequestComment.php?id=<?php echo $CommentId; ?>">Approve</a></td>
                     <td><a class="btn btn-danger" href="DeleteRequestComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullRequestPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
             <!-- UNAPPROVE Project COMMENT SECTION -->
             <h2>Un-Approved Project's Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Approve</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments_projects WHERE status='OFF' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["project_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td><a class="btn btn-success" href="ApproveProjectComment.php?id=<?php echo $CommentId; ?>">Approve</a></td>
                     <td><a class="btn btn-danger" href="DeleteProjectComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullProjectPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
             <!-- Approved Post COMMENT SECTION -->
             <h2>Approved Post Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Revert</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["post_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td style="min-width: 140px;"><a class="btn btn-warning" href="DisApproveComment.php?id=<?php echo $CommentId; ?>">Disapprove</a></td>
                     <td><a class="btn btn-danger" href="DeleteComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullUpdatePost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
             <!-- Approved Event COMMENT SECTION -->
             <h2>Approved Event Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Revert</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments_events WHERE status='ON' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["event_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td style="min-width: 140px;"><a class="btn btn-warning" href="DisApproveEventComment.php?id=<?php echo $CommentId; ?>">Disapprove</a></td>
                     <td><a class="btn btn-danger" href="DeleteEventComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullEventPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
             <!-- Approved Request Post COMMENT SECTION -->
             <h2>Approved Request Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Revert</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments_requests WHERE status='ON' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["request_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td style="min-width: 140px;"><a class="btn btn-warning" href="DisApproveRequestComment.php?id=<?php echo $CommentId; ?>">Disapprove</a></td>
                     <td><a class="btn btn-danger" href="DeleteRequestComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullRequestPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
             <!-- Approved Project COMMENT SECTION -->
             <h2>Approved Project Comments</h2>
             <table class="table table-striped table-hover">
               <thead class="thead-dark">
                 <tr>
                   <th>No. </th>
                   <th>Date&Time</th>
                   <th>Name</th>
                   <th>Comment</th>
                   <th>Revert</th>
                   <th>Delete</th>
                   <th>Details</th>
                 </tr>
               </thead>
               <?php
                global $con;
                $sql = "SELECT * FROM comments_projects WHERE status='ON' ORDER BY id desc";
                $Execute = $con->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                  $CommentId = $DataRows["id"];
                  $DateTimeOfComment = $DataRows['datetime'];
                  $CommenterName = $DataRows["name"];
                  $CommentContent = $DataRows['comment'];
                  $CommentPostId = $DataRows["project_id"];
                  $SrNo++;
                ?>
                 <tbody>
                   <tr>
                     <td><?php echo htmlentities($SrNo); ?></td>
                     <td><?php echo htmlentities($DateTimeOfComment); ?></td>
                     <td><?php echo htmlentities($CommenterName); ?></td>
                     <td><?php echo htmlentities($CommentContent); ?></td>
                     <td style="min-width: 140px;"><a class="btn btn-warning" href="DisApproveProjectsComment.php?id=<?php echo $CommentId; ?>">Disapprove</a></td>
                     <td><a class="btn btn-danger" href="DeleteProjectComment.php?id=<?php echo $CommentId; ?>">Delete</a></td>
                     <td style="min-width: 140px;"><a class="btn btn-primary" href="../FullProjectPost.php?id=<?php echo $CommentPostId; ?>" target="_blank">Live Preview</a></td>
                   </tr>
                 </tbody>
               <?php

                }
                ?>
             </table>
           </div>
         </div>
       </section>
       <!-- MAIN AREA ENDS -->
     </main>

     <?php include_once 'innerTabs/Footer.php' ?>