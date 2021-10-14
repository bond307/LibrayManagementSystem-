<?php
require_once 'header.php';

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
                <li><a href="issue-book.php">Issue Book</a></li>

            </ul>
        </div>
    </div>
    <?php

    if(isset($_POST['issue_book']))
    {
        $student_id=$_POST['student_id'];
        $book_id=$_POST['book_id'];
        $book_issue_date=$_POST['book_issue_date'];

        $query="INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date`) 
        VALUES ('$student_id','$book_id','$book_issue_date')";

        $result=mysqli_query($conn,$query);
        mysqli_query($conn,"UPDATE `books` SET `available_qty`=`available_qty`-1 WHERE  `id`='$book_id';");

        if($result)  
        {

            echo "<script>alert('Book Issue successfully!')</script>";
        }
        else
        {
            echo "<script>alert('Book not Issue!')</script>";
        }
    }
    ?>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
       <div class="col-md-6 col-sm-offset-3">
          <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post" class="form-inline">
                            <h5 class="mb-md ">Issue Book</h5>
                            <div class="form-group">                               
                               <select name="student_id" id="student_id" class="form-control">
                                   <option value="">Select</option>
                                   <?php
                                   $result=mysqli_query($conn,"SELECT * FROM students WHERE `status`='1'");
                                   while ($row=mysqli_fetch_assoc($result)) 
                                   { 
                                    ?>
                                    <option value="<?= $row['id'];?>">
                                        <?= ucwords($row['fname'].' '.$row['lname'].' - ('.$row['roll'].')')?>                                   
                                    </option>
                                    <?php
                                } ?>

                            </select>
                        </div>   
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="search">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            if(isset($_POST['search']))
            {
                $id=$_POST['student_id'];

                $result=mysqli_query($conn,"SELECT * FROM `students` WHERE `id`='$id' AND `status`='1'");
                $row=mysqli_fetch_assoc($result);
                ?>
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="name">Student Name</label>
                                        <input type="text" class="form-control" id="name" value="<?=ucwords($row['fname'].' '.$row['lname']);?>" readonly>
                                        <input type="hidden" name="student_id" value="<?= $row['id'];?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="book_id">Book Name</label>                               
                                        <select name="book_id" id="book_id" class="form-control">
                                           <option value="">Select</option>
                                           <?php
                                           $result=mysqli_query($conn,"SELECT * FROM `books` WHERE `available_qty` > 0");
                                           while ($row=mysqli_fetch_assoc($result)) 
                                           { 
                                            ?>
                                            <option value="<?= $row['id'];?>">
                                                <?= $row['book_name'];?>                                   
                                            </option>
                                            <?php
                                        } ?>

                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="book_issue_date">Book Issue Date</label>
                                    <input type="text" id="book_issue_date" name="book_issue_date" class="form-control" value="<?= date('Y-m-d');?>"readonly>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="issue_book">Save Issue Book</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php

        }
        ?>
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