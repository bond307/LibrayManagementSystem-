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
                <li><a href="test.php">Books</a></li>

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
      <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <form class="" method="post" action="">
                        <div class="row pt-md">
                            <div class="form-group col-sm-9 col-lg-10">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" id="lefticon" placeholder="Search" name="books">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <div class="form-group col-sm-3  col-lg-2 ">
                                <button type="submit" class="btn btn-primary btn-block" name="search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST['search']))
        {
           $search_result=$_POST['books'];
           ?>
           <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <?php

                            $query="SELECT * FROM `Books` WHERE `book_name` LIKE '%$search_result%' ";

                            $result=mysqli_query($conn,$query);
                            $row_count=mysqli_num_rows($result);
                            if($row_count>0)
                            {
                                ?>

                            <?php

                            while( $row=mysqli_fetch_assoc($result)){
                                ?>
                                <div class="col-sm-3 col-md-2">
                                    <img style="width: 80%; height: 140px;" src="../images/books/<?= $row['book_image'];?>" alt="">
                                    <br>
                                    <p><b><?= $row['book_name'];?></b></p>
                                    <span><b>Available:<?= $row['available_qty']?></b></span>
                                </div>

                                <?php
                            } ?>


                                <?php
                            }
                            else
                            {
                                echo "<h2>Books Not Found!</h2>";
                            }
                            ?>


                        </div>
                    </div>
                </div>
            </div> 
           <?php
        } 
        else
        {
            ?>
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <?php

                            $query="SELECT * FROM `Books`";

                            $result=mysqli_query($conn,$query);

                            while( $row=mysqli_fetch_assoc($result)){
                                ?>
                                <div class="col-sm-3 col-md-2">
                                    <img style="width: 80%; height: 140px;" src="../images/books/<?= $row['book_image'];?>" alt="">
                                    <br>
                                    <p><b><?= $row['book_name'];?></b></p>
                                    <span><b>Available:<?= $row['available_qty']?></b></span>
                                </div>

                                <?php
                            } ?>

                        </div>
                    </div>
                </div>
            </div> 
            <?php
        }


    ?>

</div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<!-- RIGHT SIDEBAR -->
<?php
require_once 'footer.php';
?>