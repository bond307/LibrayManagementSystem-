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
                <li><a href="javascipt:avoid(0)">Add Book</a></li>

            </ul>
        </div>
    </div>

    <?php
    if(isset($_POST['save_book']))
    {
     $book_name=$_POST['book_name'];
     $book_author=$_POST['book_author'];
     $book_publication=$_POST['book_publication'];
     $purchase_date=$_POST['purchase_date'];
     $book_price=$_POST['book_price'];
     $book_qty=$_POST['book_qty'];
     $available_qty=$_POST['available_qty'];

     $librarian_username=$_SESSION['librarian_username'];

     $image=explode('.', $_FILES['book_image']['name']);

     $image_ext=end($image);
     $image=date('Ymdhis').'.'.$image_ext;

     $query="INSERT INTO `books`
     (`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES 
     ('$book_name','$image',' $book_author','$book_publication','$purchase_date','$book_price','$book_qty','$available_qty',' $librarian_username')";

     $result=mysqli_query($conn,$query);

     if($result)
     {
        move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/'.$image);
        $success="Data save successfully";
    }
    else
    {
        $error="Data not save";
    }
}
?>

<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">

    <div class="col-sm-6 col-sm-offset-3">
      <?php
      if(isset($success))
      {
        ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>                   
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
            </button>

        </div>
        <?php
    }

    ?>
     <?php
                if(isset($error))
                {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>                   
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <?php
                }

                ?>
    <div class="panel">
        <div class="panel-content">
            <div class="row">
                <div class="col-md-12">

                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                        <h5 class="mb-lg">Add Book</h5>
                        <div class="form-group">
                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_name" placeholder="" name="book_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Book Image</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="book_image" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_author" class="col-sm-4 control-label">Book Author</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_author" placeholder="" name="book_author" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_publication" class="col-sm-4 control-label">Book Publication</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="book_publication" placeholder="" name="book_publication" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="purchase_date" placeholder="" name="purchase_date" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="book_price" placeholder="" name="book_price" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="book_qty" placeholder="" name="book_qty" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="available_qty" placeholder="" name="available_qty" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <button type="submit" class="btn btn-primary" name="save_book"><i class="fa fa-save"></i>Save Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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