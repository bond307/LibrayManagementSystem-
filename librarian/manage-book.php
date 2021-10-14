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
        <li><a href="javascipt:avoid(0)">Manage Books</a></li>

      </ul>
    </div>
  </div>
  <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
  <div class="row animated fadeInUp">
   <div class="col-sm-12">
    <h4 class="section-subtitle"><b>Books</b></h4>
    <div class="panel">
      <div class="panel-content">
        <div class="table-responsive">
          <table id="basic-table" class="data-table table table-striped nowrap table-hover table--bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Book Name</th>
                <th>Book Image</th>
                <th>Author Name</th>
                <th>Publication Name</th>
                <th>Purchase Date</th>
                <th>Book Price</th>
                <th>Book Quantity</th>
                <th>Available Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result=mysqli_query($conn,"SELECT * FROM books");
              while ($row=mysqli_fetch_assoc($result))
              {
               ?>
               <tr>
                <td><?= $row['book_name'];?></td>
                <td><img style="width: 50px;height: 70px;" src="../images/books/<?= $row['book_image'];?>" alt=""></td>
                <td><?= $row['book_author_name'];?></td>
                <td><?= $row['book_publication_name'];?></td>  
                <td><?= date('d-M-Y',strtotime($row['book_purchase_date']));?></td>
                <td><?= number_format($row['book_price'],2);?></td>
                <td><?= $row['book_qty'];?></td>
                <td><?= $row['available_qty'];?></td>
                <td>              
                  <a href="javascipt:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'];?>"><i class="fa fa-eye"></i></a>

                  <a href="javascipt:avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'];?>"> <i class="fa fa-pencil"></i></a>

                  <a href="delete.php?bookdelete=<?= base64_encode($row['id']);?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete!?');"><i class="fa fa-trash"></i></a>
                </td>

              </tr>

              <?php
            } 
            ?>

          </tbody>                                  
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php
$result=mysqli_query($conn,"SELECT * FROM books");
while ($row=mysqli_fetch_assoc($result))
{
 ?>
 <!-- Modal -->
 <div class="modal fade" id="book-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-error-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header state modal-danger">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-error-label"><i class="fa fa-book"></i>Book Info</h4>
      </div>
      <div class="modal-body">
       <table class="table table-bordered">
         <tr>
           <th>Book Name</th>
           <td><?= $row['book_name'];?></td>
         </tr>
         <tr>
           <th>Book Image</th>
           <td><img style="width: 50px;" src="../images/books/<?= $row['book_image'];?>" alt=""></td>

         </tr>
         <tr>
           <th>Author Name</th>
           <td><?= $row['book_author_name'];?></td>

         </tr>
         <tr>
          <th>Publication Name</th>
          <td><?= $row['book_publication_name'];?></td>  

        </tr>
        <tr>
         <th>Purchase Date</th> 
         <td><?= date('d-M-Y',strtotime($row['book_purchase_date']));?></td>

       </tr>
       <tr>
        <th>Book Price</th> 
        <td><?= number_format($row['book_price'],2);?></td>

      </tr> 
      <tr>
       <th>Book Quantity</th> 
       <td><?= $row['book_qty'];?></td>

     </tr>
     <tr>
      <th>Available Quantity</th>
      <td><?= $row['available_qty'];?></td> 
    </tr>
  </table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<?php
} 
?>


<?php
$result=mysqli_query($conn,"SELECT * FROM books");
while ($row=mysqli_fetch_assoc($result))
{
  $id=$row['id'];
  $update_query=mysqli_query($conn,"SELECT * FROM `books` WHERE `id`='$id'");
  $row=mysqli_fetch_assoc($update_query);


  ?>
  <!-- Modal -->
  <div class="modal fade" id="book-update-<?= $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="modal-error-label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header state modal-danger">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modal-error-label"><i class="fa fa-book"></i>Update Book Info</h4>
        </div>
        <div class="modal-body">
          <div class="panel">
            <div class="panel-content">
              <div class="row">
                <div class="col-md-10">
                  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="book_name" placeholder="" name="book_name" required value="<?= $row['book_name'];?>">
                        
                        <input type="hidden" class="form-control" id="book_id" name="book_id" value="<?= $row['id'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="book_author" class="col-sm-4 control-label">Book Author</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="book_author" placeholder="" name="book_author" required value="<?= $row['book_author_name'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="book_publication" class="col-sm-4 control-label">Book Publication</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="book_publication" placeholder="" name="book_publication" required value="<?= $row['book_publication_name'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                      <div class="col-sm-8">
                        <input type="date" class="form-control" id="purchase_date" placeholder="" name="purchase_date" required value="<?= $row['book_purchase_date'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="book_price" placeholder="" name="book_price" required value="<?= $row['book_price'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="book_qty" placeholder="" name="book_qty" required value="<?= $row['book_qty'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" id="available_qty" placeholder="" name="available_qty" required value="<?= $row['available_qty'];?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-8">
                        <button type="submit" class="btn btn-primary" name="update_book"><i class="fa fa-save"></i>Update</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <?php
} 
?>

<?php
if(isset($_POST['update_book']))
{
 $book_id=$_POST['book_id'];
 $book_name=$_POST['book_name'];
 $book_author=$_POST['book_author'];
 $book_publication=$_POST['book_publication'];
 $purchase_date=$_POST['purchase_date'];
 $book_price=$_POST['book_price'];
 $book_qty=$_POST['book_qty'];
 $available_qty=$_POST['available_qty'];
 $librarian_username=$_SESSION['librarian_username'];

 $query="UPDATE `books` SET 
 `book_name`='$book_name',
 `book_author_name`='$book_author',
 `book_publication_name`='$book_publication',
 `book_purchase_date`='$purchase_date',
 `book_price`='$book_price',
 `book_qty`='$book_qty',
 `available_qty`='$available_qty',
 `librarian_username`='$librarian_username' WHERE `id`='$book_id'";

 $result=mysqli_query($conn,$query);

 if($result)
 {

   ?>
        <script type="text/javascript">
           
           alert("Book Info. Update successfully");
           javascipt:history.go(-1);

        </script>

        <?php
  
  
 
}
else
{
    ?>
        <script type="text/javascript">
           
           alert("Book Info. Not Update successfully");
            
        </script>

        <?php 
 
}
}
?>

<!-- RIGHT SIDEBAR -->
<?php require_once 'footer.php'; ?>


        