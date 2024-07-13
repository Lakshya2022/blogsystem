<?php include 'header.php' ?>
<?php 
  include 'include/connection.php';
  if(isset($_POST['register'])){
    $error="";
    $success="";
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $remark = $_POST['remark'];
   
      $query="INSERT INTO user (username,email,password,remark) values('$username','$email','$password','$remark')";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['success']="Register Successfully.";
        header("Location:login.php");
        exit();
      }else{
        $_SESSION['error']="Register Not Inserted.";
        header("Location:register.php");
        exit();
      }
  }
  ?>
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <!-- <h2 class="breadcrumb-title">@@title</h2> -->
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active">Register</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->






    <div id="main-wrapper">
        <div class="site-wrapper-reveal">

            <div class="login-register-page-area section-space--ptb_80">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6 m-auto">
                            <div class="login-content">

                                <div class="login-header mb-40">
                                    <h3 class="mb-2">Register</h3>
                                    <h5>Become a member</h5>
                                </div>

                                <form action="" method="POST">
                                    <input type="text"  name="username" placeholder="Username" required>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <input type="password" name="password" placeholder="Password" required>
                                    <div class="remember-forget-wrap">
                                        <div class="remember-wrap">
                                            <input type="checkbox" name="remark" value="0" required>
                                            <p>Agree to the <a href="#">Terms and Conditions</a></p>
                                            <span class="checkmark"></span>
                                        </div>
                                    </div>
                                    <div class="button-box mt-4">
                                        <button type="submit" name="register" class="btn-primary btn-large">Register Now</button>
                                    </div>
                                    <div class="member-register mt-5">
                                        <p> A member? <a href="login.php"> Log in now</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



  
       <?php include 'footer.php' ?>