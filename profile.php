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
        header("Location:index.php");
        exit();
    } else {
        // Set an error message in the session if the registration fails
        $_SESSION['error'] = "Registration not successful.";
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
            <li class="breadcrumb-item active">Profile</li>
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
          <div class="col-lg-12 m-auto">
            <div class="row">
                <div class="col-md-4 ">
            <div>
                 <?php include 'include/menu.php' ?>
            </div>
            </div>
            <div class="col-md-8">
            <div class="login-content">
              <div class="login-header mb-40">
                <h3 class="mb-2">profile</h3>
                <h5>Become a member</h5>
              </div>
               <?php
                  $post_by=$_SESSION['id'];
                   $query="SELECT * FROM user WHERE id = '$post_by'";
                    $result = mysqli_query($conn,$query);
                    if($row=mysqli_fetch_assoc($result)) {
                ?>
              <form action="" method="POST">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row pb-3">
                      <div class="col-md-6">
                        <input type="text"  name="username" placeholder="Username" class="form-control" required value="<?php echo $row['username'] ?>">
                      </div>
                      <div class="col-md-6">
                        <input type="email" name="email" placeholder="Email Address" class="form-control" required value="<?php echo $row['email'] ?>">
                      </div>
                    </div>
                    <div class="row pb-3">
                      <div class="col-md-6">
                        <input type="text"  name="mobile_no" placeholder="Mobile Number" class="form-control" required value="<?php echo $row['mobile_no'] ?>">
                      </div>
                      <div class="col-md-6">
                        <input type="date" name="dob" placeholder="DOB" class="form-control" required value="<?php echo $row['dob'] ?>">
                      </div>
                    </div>
                    <div class="row pb-3">
                      <div class="col-md-6">
                        <input type="text"  name="occupation" placeholder="Occupation" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                        <textarea type="date" name="address" placeholder="Address" class="form-control" required>
                        </textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="col-md-6">
                      <input type="file"  name="occupation" placeholder="Cccupation" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="button-box mt-4">
                  <button type="submit" name="register" class="btn-primary btn-large">Update Now</button>
                </div>
                <div class="member-register mt-5">
                  <p> A member? <a href="login.php"> Log in now</a></p>
                </div>
              </form>
            <?php } ?>
            </div>
            </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'footer.php' ?>