<?php include 'header.php' ?>
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
            <?php
              $i=1;
              $id=$_GET['id'];
              include 'include/connection.php';
              $query="SELECT * FROM blog_post WHERE id=$id";
              $result = mysqli_query($conn,$query);
              if($row=mysqli_fetch_assoc($result)) {
               ?>
            <li class="breadcrumb-item active"><?php echo $row['post_title'] ?></li>
            <?php } ?>
          </ul>
          <!-- breadcrumb-list end -->
        </div>
      </div>
    </div>
  </div>
</div>
<div id="main-wrapper">
  <div class="site-wrapper-reveal">
    <!-- Blog Details Wrapper Start -->
    <div class="blog-details-wrapper section-space--ptb_80">
      <div class="container">
        <div class="row row--17">
          <?php
            $i=1;
            $id=$_GET['id'];
            include 'include/connection.php';
            $query="SELECT blog_post.*, 
            subcategory.id AS subcategory_id, 
            subcategory.subcat_name, 
            category.category_name,
             user.id AS user_id, 
              user.username
            FROM blog_post 
            JOIN subcategory ON blog_post.sub_category_id = subcategory.id 
            JOIN category ON subcategory.category_id = category.id 
            JOIN user ON blog_post.post_by = user.id
            WHERE blog_post.id=$id";
            
                   $result = mysqli_query($conn,$query);
                    if ($result->num_rows > 0) {
                   if($row=mysqli_fetch_assoc($result)) {}}
                    ?>
          <div class="blog-details-col-8">
            <!-- blog details Post Start -->
            <div class="blog-details-post-wrap">
              <div class="blog-details-thum">
                <img src="admin/<?php echo $row['image']; ?>" alt="">
              </div>
              <div class="blog-details-post-content">
                <div class="blog-details-meta-box">
                  <div class="post-meta-left-side mb-2">
                    <div class="trending-blog-post-category">
                      <a href="#"><?php echo $row['category_name']; ?></a>
                    </div>
                    <div class="following-blog-post-author">
                      By <a href="single-blog.php?id=<?php echo $row['id']; ?>"></a><?php    echo $row['username']; ?></a>
                    </div>
                  </div>
                  <div class="post-mid-side mb-2">
                    <span class="post-meta-left-side">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#"> <?php $createdAt = $row['created_at'];
                        $timestamp = strtotime($createdAt);
                        $formattedDate = date('j F Y', $timestamp);
                        echo $formattedDate; ?></a>
                    </span>
                    </span>
                    <span>10 min read</span>
                  </div>
                  <div class="post-meta-right-side mb-2">
                    <a href="#"><img src="assets/images/icons/small-bookmark.png" alt="" /></a>
                    <a href="#"><img src="assets/images/icons/heart.png" alt="" /></a>
                  </div>
                </div>
                <h3 class="following-blog-post-title">
                  <a href="#"><?php   echo $row['post_title']; ?>
                  </a>
                </h3>
                <div class="post-details-text">
                  <p><?php   echo $row['details']; ?>
                  </p>
                  
                  <div class="video-banner-area video-popup mb-4">
                    <a href="https://www.youtube.com/watch?v=<?php echo $row['url']; ?>" class="video-link mt-30">
                      <div class="single-popup-wrap">
                        <img class="img-fluid" src="assets/images/blog/blog-details-video.webp" alt="">
                        <div class="ht-popup-video video-button">
                          <div class="video-mark">
                            <div class="wave-pulse wave-pulse-1"></div>
                            <div class="wave-pulse wave-pulse-2"></div>
                          </div>
                          <div class="video-button__two">
                            <div class="video-play">
                              <span class="video-play-icon"></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                 
                  <div class="blog-details-tag-and-share-area">
                    <div class="post-tag">
                     <?php
                      $i=1;
                      $id=$_GET['id'];
                      include 'include/connection.php';
                      $query="SELECT * FROM tags WHERE post_id=$id";
                      $result = mysqli_query($conn,$query);
                      while($row=mysqli_fetch_assoc($result)) {
                       ?>
                      <a href="#" class="btn-medium <?php echo $row['tags']; ?>"><?php echo $row['tags']; ?></a>
                  <?php } ?>
                    </div>
                    <ul class="social-share-area">
                      <li><a href="#"><i class="icofont-facebook"></i></a></li>
                      <li><a href="#"><i class="icofont-skype"></i></a></li>
                      <li><a href="#"><i class="icofont-twitter"></i></a></li>
                      <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                    </ul>
                  </div>
                </div>
                <!-- Related Post Area Start -->
                <div class="related-post-area section-space--pt_60">
                  <div class="row">
                    <div class="col-lg-8 col-7">
                      <div class="section-title mb-30">
                        <h3 class="title">Related Post</h3>
                      </div>
                    </div>
                    <div class="col-lg-4 col-5">
                      <div class="related-post-slider-navigation text-end">
                        <div class="related-post-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                        <div class="related-post-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
                      </div>
                    </div>
                  </div>
                  <!-- Swiper -->
                  <div class="swiper-container related-post-slider-active">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <!-- Single Following Post Start -->
                        <div class="single-related-post">
                          <div class="related-post-thum">
                            <img src="assets/images/blog/01.jpg" alt="">
                          </div>
                          <div class="following-post-content">
                            <div class="following-blog-post-top">
                              <div class="trending-blog-post-category">
                                <a href="#">Business</a>
                              </div>
                              <div class="following-blog-post-author">
                                By <a href="#">Kathy Ramirez</a>
                              </div>
                            </div>
                            <h5 class="following-blog-post-title">
                              <a href="#">Customize your WooCommerce
                              store with countless design
                              </a>
                            </h5>
                            <div class="following-blog-post-meta">
                              <div class="post-meta-left-side">
                                <span class="post-date">
                                <i class="icofont-ui-calendar"></i> 
                                <a href="#">03 April, 2023</a>
                                </span>
                                <span>10 min read</span>
                              </div>
                              <div class="post-meta-right-side">
                                <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                                <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Single Following Post End -->
                      </div>
                      <div class="swiper-slide">
                        <!-- Single Following Post Start -->
                        <div class="single-related-post">
                          <div class="related-post-thum">
                            <img src="assets/images/blog/02.jpg" alt="">
                          </div>
                          <div class="following-post-content">
                            <div class="following-blog-post-top">
                              <div class="trending-blog-post-category">
                                <a href="#">Business</a>
                              </div>
                              <div class="following-blog-post-author">
                                By <a href="#">Kathy Ramirez</a>
                              </div>
                            </div>
                            <h5 class="following-blog-post-title">
                              <a href="#">Customize your WooCommerce
                              store with countless design
                              </a>
                            </h5>
                            <div class="following-blog-post-meta">
                              <div class="post-meta-left-side">
                                <span class="post-date">
                                <i class="icofont-ui-calendar"></i> 
                                <a href="#">03 April, 2023</a>
                                </span>
                                <span>10 min read</span>
                              </div>
                              <div class="post-meta-right-side">
                                <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                                <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Single Following Post End -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Related Post Area End -->
                <!-- Comment Area Start -->
                <div class="comment-area section-space--pt_60">
                  <div class="section-title">
                    <h3 class="title">Leave a comment</h3>
                  </div>
                  <form action="#" class="comment-form-area">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="single-input">
                          <input type="text" placeholder="Name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="single-input">
                          <input type="email" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="single-input">
                          <textarea name="textarea" placeholder="Massage"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="submit-button text-center">
                          <button class="btn-large btn-primary" type="submit"> Submit Now <i class="icofont-long-arrow-right"></i></button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- Comment Area End -->
              </div>
            </div>
            <!-- blog details Post End -->
          </div>
           <?php
                  $post_by=$_SESSION['id'];
                   $query="SELECT * FROM user WHERE id = '$post_by'";
                    $result = mysqli_query($conn,$query);
                    if($row=mysqli_fetch_assoc($result)) {
                ?>
          <div class="blog-details-col-4">
            <div class="following-author-area">
              <div class="author-image">
                <img src="assets/images/author/author-01.png" alt="">
              </div>
              <div class="author-title">
                <h4><a href="#"><?php echo $row['username']; ?></a></h4>
                <p>Author, Dingcode</p>
              </div>
              <div class="author-details">
                <p>Lorem psum has been industry
                  standard dumy text since the when
                  and scrambled make specimen
                  book has survived.
                </p>
                <div class="author-post-share">
                  <ul class="social-share-area">
                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                    <li><a href="#"><i class="icofont-skype"></i></a></li>
                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                    <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                  </ul>
                </div>
                <div class="button-box">
                  <a href="profile.php" class="btn">View Profile <i class="icofont-long-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <!-- Hero Category Area Start -->
            <div class="blog-details-category-area mt-5">
              <a class="single-hero-category-item">
                <img src="assets/images/catagory/technology.jpg" alt="">
                <div class="hero-category-inner-box">
                  <h3 class="title">Business</h3>
                  <i class="icon icofont-long-arrow-right"></i>
                </div>
              </a>
              <a class="single-hero-category-item">
                <img src="assets/images/catagory/travel.jpg" alt="">
                <div class="hero-category-inner-box">
                  <h3 class="title">Travel</h3>
                  <i class="icon icofont-long-arrow-right"></i>
                </div>
              </a>
              <a class="single-hero-category-item">
                <img src="assets/images/catagory/medical.jpg" alt="">
                <div class="hero-category-inner-box">
                  <h3 class="title">Food</h3>
                  <i class="icon icofont-long-arrow-right"></i>
                </div>
              </a>
              <a class="single-hero-category-item">
                <img src="assets/images/catagory/web.jpg" alt="">
                <div class="hero-category-inner-box">
                  <h3 class="title">Tech</h3>
                  <i class="icon icofont-long-arrow-right"></i>
                </div>
              </a>
            </div>
            <!-- Hero Category Area End -->
            <!-- Latest Post Area Start -->
            <div class="latest-post-inner-wrap mt-5">
              <div class="latest-post-header">
                <div class="section-title">
                  <h4>Latest Post</h4>
                </div>
                <div class="latest-post-slider-navigation">
                  <div class="latest-post-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                  <div class="latest-post-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
                </div>
              </div>
              <div class="swiper-container latest-post-slider-active">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="latest-post-box">
                      <!-- Single Latest Post Start -->
                      <div class="single-latest-post">
                        <div class="latest-post-thum">
                          <a href="#">
                          <img src="assets/images/latest-post/01.jpg" alt="">
                          </a>
                        </div>
                        <div class="latest-post-content">
                          <h6 class="title"><a href="#!">All of these amazing
                            features come at...</a>
                          </h6>
                          <div class="latest-post-meta">
                            <span class="post-date">
                            <i class="icofont-ui-calendar"></i> 
                            <a href="#">03-04-2023</a>
                            </span>
                            <span>10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!-- Single Latest Post End -->
                      <!-- Single Latest Post Start -->
                      <div class="single-latest-post">
                        <div class="latest-post-thum">
                          <a href="#">
                          <img src="assets/images/latest-post/02.jpg" alt="">
                          </a>
                        </div>
                        <div class="latest-post-content">
                          <h6 class="title"><a href="#!">Customize your
                            WooCommerce store</a>
                          </h6>
                          <div class="latest-post-meta">
                            <span class="post-date">
                            <i class="icofont-ui-calendar"></i> 
                            <a href="#">03-04-2023</a>
                            </span>
                            <span>10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!-- Single Latest Post End -->
                      <!-- Single Latest Post Start -->
                      <div class="single-latest-post">
                        <div class="latest-post-thum">
                          <a href="#">
                          <img src="assets/images/latest-post/03.jpg" alt="">
                          </a>
                        </div>
                        <div class="latest-post-content">
                          <h6 class="title"><a href="#!">With WooLentor's drag
                            -and-drop interface...</a>
                          </h6>
                          <div class="latest-post-meta">
                            <span class="post-date">
                            <i class="icofont-ui-calendar"></i> 
                            <a href="#">03-04-2023</a>
                            </span>
                            <span>10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!-- Single Latest Post End -->
                      <!-- Single Latest Post Start -->
                      <div class="single-latest-post">
                        <div class="latest-post-thum">
                          <a href="#">
                          <img src="assets/images/latest-post/04.jpg" alt="">
                          </a>
                        </div>
                        <div class="latest-post-content">
                          <h6 class="title"><a href="#!">All of these amazing
                            features come at...</a>
                          </h6>
                          <div class="latest-post-meta">
                            <span class="post-date">
                            <i class="icofont-ui-calendar"></i> 
                            <a href="#">03-04-2023</a>
                            </span>
                            <span>10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!-- Single Latest Post End -->
                      <!-- Single Latest Post Start -->
                      <div class="single-latest-post">
                        <div class="latest-post-thum">
                          <a href="#">
                          <img src="assets/images/latest-post/05.jpg" alt="">
                          </a>
                        </div>
                        <div class="latest-post-content">
                          <h6 class="title"><a href="#!">WooCommerce comes
                            with an intuitive...</a>
                          </h6>
                          <div class="latest-post-meta">
                            <span class="post-date">
                            <i class="icofont-ui-calendar"></i> 
                            <a href="#">03-04-2023</a>
                            </span>
                            <span>10 min read</span>
                          </div>
                        </div>
                      </div>
                      <!-- Single Latest Post End -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Latest Post Area End -->
            <!-- Stay In Touch Area Start -->
            <div class="stay-in-touch-area mt-5">
              <div class="section-title">
                <h3>Stay In Touch</h3>
              </div>
              <div class="stay-in-touch-box">
                <div class="single-touch-col">
                  <a href="#!" class="single-touch facebook">
                    <div class="touch-socail-icon">
                      <i class="icofont-facebook"></i>
                    </div>
                    <p class="touch-title">5,685K</p>
                  </a>
                </div>
                <div class="single-touch-col">
                  <a href="#!" class="single-touch twitter">
                    <div class="touch-socail-icon">
                      <i class="icofont-twitter"></i>
                    </div>
                    <p class="touch-title">6,97K+</p>
                  </a>
                </div>
                <div class="single-touch-col">
                  <a href="#!" class="single-touch behance">
                    <div class="touch-socail-icon">
                      <i class="icofont-behance"></i>
                    </div>
                    <p class="touch-title">6,97K+</p>
                  </a>
                </div>
                <div class="single-touch-col">
                  <a href="#!" class="single-touch youtube">
                    <div class="touch-socail-icon">
                      <i class="icofont-youtube-play"></i>
                    </div>
                    <p class="touch-title">5,685K</p>
                  </a>
                </div>
                <div class="single-touch-col">
                  <a href="#!" class="single-touch dribbble">
                    <div class="touch-socail-icon">
                      <i class="icofont-dribbble"></i>
                    </div>
                    <p class="touch-title">6,97K+</p>
                  </a>
                </div>
                <div class="single-touch-col">
                  <a href="#!" class="single-touch linkedin">
                    <div class="touch-socail-icon">
                      <i class="icofont-linkedin"></i>
                    </div>
                    <p class="touch-title">6,97K+</p>
                  </a>
                </div>
              </div>
            </div>
            <!-- Stay In Touch Area End -->
            <div class="following-add-banner mt-5">
              <a href="#">
              <img src="assets/images/banners/home-following-banner.png" alt="">
              </a>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </div>
    <!-- Blog Details Wrapper End -->
    <!-- Trending Topic Area Start -->
    <div class="trending-topic-area bg-gray section-space--ptb_80">
      <div class="container">
        <!-- Newsletter Subscribe Area Start -->
        <div class="newsletter-subscribe-inner section-space--mt_80">
          <div class="row align-items-center">
            <div class="col-lg-3">
              <div class="section-title mb-4">
                <h3>Subscribe For Newsletter</h3>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="newsletter-input-box">
                <input class="newsletter-input" type="text" placeholder="Enter your email">
                <div class="button-box">
                  <a href="#" class="btn-primary btn-large">Subscribe Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="newsletter-inner-image">
            <img class="newsletter-image-01" src="assets/images/shap/1-newsletter.png" alt="">
            <img class="newsletter-image-02" src="assets/images/shap/2-newsletter.png" alt="">
          </div>
        </div>
        <!-- Newsletter Subscribe Area End -->
      </div>
    </div>
    <!-- Trending Topic Area End -->
  </div>
</div>
<?php include 'footer.php'; ?>