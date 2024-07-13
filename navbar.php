  <?php 
  session_start();
if(isset($_POST['loginIn'])){
  $error="";
  $UserEmail = $_POST['email'];
  $UserPassword = $_POST['password'];
  $password = md5($UserPassword);
  $query="SELECT * FROM user Where email='$UserEmail' AND password='$password'";    
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result)==1){
    $_SESSION['email']=$row['email'];
    $_SESSION['id']=$row['id'];
    header("Location:dashboard.php");
  }else{
    $_SESSION['error']="Incorrect Email or Password";
    header("Location:index.php");
    echo "<h1>Invalid email or password.</h1>";
  }
}
?>
  <!--========  header area =========-->
  <header class="header">
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
            <ul class="header-top-menu-list">
              <li><a href="#">Help</a></li>
              <li><a href="#">Status</a></li>
              <li><a href="#">Writers</a></li>
            </ul>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 order-3 order-lg-2">
            <div class="header-top-contact-info">
              <div class="header-top-single-contact-item">
                <div class="header-top-contact-icon">
                  <img src="assets/images/icons/contact-call.png" alt="">
                </div>
                <div class="header-top-contact-text text-size-small">
                  <a href="tel:970262-1413">(970) 262-1413</a>
                </div>
              </div>
              <div class="header-top-single-contact-item">
                <div class="header-top-contact-icon">
                  <img src="assets/images/icons/contact-emaill.png" alt="">
                </div>
                <div class="header-top-contact-text">
                  <a href="mailto:address@gmail.com">address@gmail.com</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
            <div class="header-top-right-side">
              <p>Bangladesh</p>
              <div class="wayder">
                <span class="wayder-icon"><img src="assets/images/icons/wayder.png" alt=""></span>
                <span class="wayder-text">28° C</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-mid-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-3 col-md-2 col-5">
            <div class="logo">
              <a href="index.html">
              <img src="assets/images/logo/logo.png" alt="">
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 d-md-block d-none">
            <div class="header-add-banner text-center">
              <a href="#">
                <img src="assets/images/banners/header-add-banner.jpg" alt="">
                <h6 class="header-add-text">All Food Item
                  <span>50% Off</span>
                </h6>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-7">
            <div class="header-mid-right-side">
              <a href="javascript:void(0)" id="search-overlay-trigger" class="single-action-item">
              <img src="assets/images/icons/search.png" alt="">
              </a>
              <a href="#" class="single-action-item">
              <img src="assets/images/icons/notification.png" alt="">
              </a>
              <a href="#" class="single-action-item">
              <img src="assets/images/icons/bookmark.png" alt="">
              </a>
              <?php if (isset($_SESSION['email'])) {?>
                <a href="dashboard.php" class="single-action-item">
              <img src="assets/images/icons/user.png" alt="">
              </a>
   <?php }else{ ?>
         <a href="#" class="single-action-item"  data-bs-toggle="modal" data-bs-target="#loginModel">
              <img src="assets/images/icons/user.png" alt="">
              </a>
        
              <?php } ?>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom-area">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4 col-9">
            <ul class="social-share-area mt-15 mb-15">
              <li><a href="#"><i class="icofont-facebook"></i></a></li>
              <li><a href="#"><i class="icofont-skype"></i></a></li>
              <li><a href="#"><i class="icofont-twitter"></i></a></li>
              <li><a href="#"><i class="icofont-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-8 col-3">
            <div class="main-menu-area text-end">
              <nav class="navigation-menu">
                <ul>
                  <li class="">
                    <a href="index.php"><span>Home</span></a>
                  </li>
                  <li>
                    <a href="about-us.php"><span>About</span></a>
                  </li>
                  <li class="has-children">
                    <a href="#"><span>Category</span></a>
                    <ul class="submenu" style="  max-height: 350px;overflow-y: auto;">
                      <?php
                        $i=1;
                        include 'include/connection.php';
                        $query="SELECT * FROM category";
                        $result = mysqli_query($conn,$query);
                        while($row=mysqli_fetch_assoc($result)) {
                         ?>
                      <li><a href="category.php?id=<?php echo $row['id']; ?>"><span><?php echo $row['category_name']; ?></span></a> </li>
                      <hr>
                      <?php } ?>
                    </ul>
                  </li>
                  <li><a href="contact-us.php"><span>Contact </span></a></li>
                </ul>
              </nav>
            </div>
            <!-- mobile menu -->
            <div class="mobile-menu-right">
              <div class="mobile-navigation-icon d-block d-lg-none" id="mobile-menu-trigger">
                <i></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

<!-- Modal -->
<div class="modal fade" id="loginModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="Login fs-5" id="exampleModalLabel">login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
                                   <div class="mb-3">
                                     <label for="recipient-name" class="col-form-label">Email:</label>
                                    <input type="email" name="email" placeholder="Email Address" class="form-control" required>
                                    </div>
          <div class="mb-3">
              <label for="message-text" class="col-form-label">Password:</label>
                                    <input type="password" name="password" placeholder="Password"  class="form-control" required>
                                  </div>
                                    <div class="remember-forget-wrap">
                                        <div class="remember-wrap">
                                            <input type="checkbox" name="remark" value="0" required>
                                            <p>Agree to the <a href="#">Terms and Conditions</a></p>
                                            <span class="checkmark"></span>
                                        </div>
                                    </div>
                                    <div class="button-box mt-4">
                                        <button type="submit" name="loginIn" class="btn-primary btn-large">Log in Now</button>
                                    </div>
                                    <div class="member-register mt-5">
                                        <p> A member? <a href="register.php"> Register in now</a></p>
                                    </div>
                                </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>