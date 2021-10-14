    <?php
    require_once('../dbcon.php');
    session_start();

    if(isset($_SESSION['student_login']))
    {
        header("location:index.php");
    }

    if(isset($_POST['student_register']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $roll=$_POST['roll'];
        $reg=$_POST['reg'];
        $phone=$_POST['phone'];
        

        $input_errors=array();


        if(empty($fname))
        {
            $input_errors['fname']="First name is required!";

        }
        if(empty($lname))
        {
            $input_errors['lname']="Last name is required!";
        }
        if(empty($email))
        {
            $input_errors['email']="Email is required!";
        }
        if(empty($username))
        {
            $input_errors['username']="Username is required!";
        }
        if(empty($password))
        {
            $input_errors['password']="Password is required!";
        }
        if(empty($fname))
        {
            $input_errors['fname']="First name is required!";
        }
        if(empty($roll))
        {
            $input_errors['roll']="Roll is required!";
        }
        if(empty($reg))
        {
            $input_errors['reg']="Reg.No is required!";
        }
        if(empty($phone))
        {
            $input_errors['phone']="Phone Number is required!";
        }


        if(count($input_errors)==0)
        {

            $password_hash=password_hash($password, PASSWORD_DEFAULT);

            $email_check=mysqli_query($conn,"SELECT * FROM `students` WHERE `email`='$email'");

            $email_check_row=mysqli_num_rows($email_check);

            if($email_check_row==0)
            {

               $username_check=mysqli_query($conn,"SELECT * FROM `students` WHERE `username`='$username'");

               $username_check_row=mysqli_num_rows($username_check); 
               if($username_check_row ==0)
               {

                if(strlen($username)>3)
                {
                    if(strlen($password)>4)
                    {
                        $query="INSERT INTO `students` 
                        (`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `status`, `phone`) VALUES 
                        ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone')";

                        $result=mysqli_query($conn,$query);
                        if($result)
                        {
                          $success="Registration successfully";
                      }
                      else
                      {
                       $error="Something Wrong";
                   }

               }
               else
               {
                
                   $password_exits="password must be 5 characters!";
               }

           }
           else
           {
               $username_exits="Username must be 4 characters!";
           }
       }
       else
       {
        $username_exits="This Username Already Exits!";
    }
}

else
{
    $email_exits="This Email Already Exits!";
}


}





        //  $sql = "INSERT INTO students (fname,lname,roll,reg,email,username,password,status,phone)
        // VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0',$phone')";
        // $conn->exec($sql);
        // echo "New record created successfully";


}
?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">
                <h1 class="text-center">LMS</h1>
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

                <?php
                if(isset($email_exits))
                {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $email_exits ?>                   
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <?php
                }

                ?>

                <?php
                if(isset($username_exits))
                {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $username_exits ?>                   
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <?php
                }

                ?>

                <?php
                if(isset($password_exits))
                {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $password_exits ?>                   
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <?php
                }

                ?>

            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">

                        <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control"  placeholder="First Name" name="fname"
                                    value="<?= isset($fname)?$fname:''?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php if(isset($input_errors['fname'])){ echo '<span class="input-error">'.$input_errors['fname'].'</span>';}?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= isset($lname)?$lname:''?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php if(isset($input_errors['lname'])){ echo '<span class="input-error">'.$input_errors['lname'].'</span>';}?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= isset($email)?$email:''?>">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <?php if(isset($input_errors['email'])){ echo '<span class="input-error">'.$input_errors['email'].'</span>';}?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder=" Username" name="username" value="<?= isset($username)?$username:''?>">
                                    <i class="fas fa-user-nurse"></i>
                                </span>
                                <?php if(isset($input_errors['username'])){ echo '<span class="input-error">'.$input_errors['username'].'</span>';}?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="password" class="form-control" placeholder=" Password" name="password">
                                    <i class="fa fa-key"></i>
                                </span>
                                <?php if(isset($input_errors['password'])){ echo '<span class="input-error">'.$input_errors['password'].'</span>';}?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder=" Roll" name="roll" pattern="[0-9]{6}" value="<?= isset($roll)?$roll:''?>">
                                    <i class="far fa-id-card"></i>                         
                                </span>
                                <?php if(isset($input_errors['roll'])){ echo '<span class="input-error">'.$input_errors['roll'].'</span>';}?>
                            </div>
                            <div class="form-group">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder=" Reg.No" name="reg"  pattern="[0-9]{6}" value="<?= isset($reg)?$reg:''?>">
                                    <i class="far fa-registered"></i>                       </span>
                                    <?php if(isset($input_errors['reg'])){ echo '<span class="input-error">'.$input_errors['reg'].'</span>';}?>
                                </div>
                                <div class="form-group">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control" placeholder=" 01*********" name="phone" pattern="01[1|3|4|5|6|7|8|9][0-9]{8}" value="<?= isset($phone)?$phone:''?>">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <?php if(isset($input_errors['phone'])){ echo '<span class="input-error">'.$input_errors['phone'].'</span>';}?>
                                </div>

                                <div class="form-group">
                                   <input type="submit" name="student_register" value="Register" class="btn btn-primary btn-block">
                               </div>
                               <div class="form-group text-center">
                                Have an account?, <a href="sign-in.php">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="../assets/javascripts/template-script.min.js"></script>
    <script src="../assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
</body>
</html>
