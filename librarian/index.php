<?php
require_once 'header.php';

$query="SELECT * FROM `students`";
$data=mysqli_query($conn,$query);
$row=mysqli_num_rows($data);



$query_librarian="SELECT * FROM `librarian`";
$data_librarian=mysqli_query($conn,$query_librarian);
$row_librarian=mysqli_num_rows($data_librarian);

$query_books="SELECT * FROM `books`";
$data_books=mysqli_query($conn,$query_books);
$row_books=mysqli_num_rows($data_books);

$book_qty=mysqli_query($conn,"SELECT SUM(`book_qty`) as total FROM `books`");
$qty=mysqli_fetch_assoc($book_qty);

$available_qty=mysqli_query($conn,"SELECT SUM(`available_qty`) as total FROM `books`");
$a_qty=mysqli_fetch_assoc($available_qty);

?>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                  <div class="row">
                    <!--BOX Style 1-->
                    
                    <!--BOX Style 1-->
                      <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="manage-book.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?php echo $row_books . '('. $qty['total'].'-'.$a_qty['total'].')';?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?php echo $row;?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Students</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="librarian.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?php echo $row_librarian;?> </h1>
                                    <h4 class="subtitle color-darker-1">Total Librarian</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
            <!-- RIGHT SIDEBAR -->
     <?php
     require_once 'footer.php';
     ?>