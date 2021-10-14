<?php
require_once 'header.php';
session_start();
if(isset($_GET['id']))
{
    $id=$_GET['id'];

    $query="SELECT * FROM `librarian` WHERE `id`='$id'";
    $data=mysqli_query($conn,$query);

    $result=mysqli_fetch_assoc($data);

}
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
            <div class="col-sm-3">
                <div class="profile-photo">
                    <div class="card" style="width:200px">

                      <img class="card-img-top" src="../images/books/<?= $result['image']?>" alt="Card image" style="width:200px;">
                  </div>
              </div>
          </div>
          <div class="col-sm-4">
              <div class="user-header-info">
                <h2 class="user-name"><?= ucwords($result['firstname'].' '.$result['lastname'])?></h2>
                <h5 class="user-position">Asst.Librarian</h5>
                <div class="user-social-media">
                    <span class="text-lg"><a href="https://www.twitter.com" class="fa fa-twitter-square"></a> <a href="https://www.facebook.com" class="fa fa-facebook-square"></a> <a href="https://www.linkedin.com" class="fa fa-linkedin-square"></a> <a href="https://www.google.com" class="fa fa-google-plus-square"></a></span>
                </div>
            </div>
        </div>
        <div class="col-sm-5"></div>
    </div>
    <br>
    <div class="panel bg-scale-0 b-primary bt-sm mt-xl">
        <div class="panel-content">
            <h4 class=""><b>Contact Information</b></h4>
            <ul class="user-contact-info ph-sm">
                <li><b><i class="color-primary mr-sm fa fa-envelope"></i></b><?= $result['email']?></li>
                <li><b><i class="color-primary mr-sm fa fa-phone"></i></b>0<?= $result['phone']?></li>
                <li><b><i class="color-primary mr-sm fa fa-globe"></i></b>Bnagladesh</li>
                <li class="mt-sm">Looking for a challenging role in a reputable organization to utilize my technical, database, and management skills for the growth of the organization as well as to enhance my knowledge about new and emerging trends in the IT sector.</li>
            </ul>
        </div>
    </div>




</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<!-- RIGHT SIDEBAR -->
<?php
require_once 'footer.php';
?>