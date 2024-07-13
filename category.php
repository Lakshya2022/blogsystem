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
                    $query="SELECT * FROM category WHERE id=$id";
                    $result = mysqli_query($conn,$query);
                    if($row=mysqli_fetch_assoc($result)) {
                     ?>
            <li class="breadcrumb-item active"><?php echo $row['category_name'] ?></li>
        <?php } ?>
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
    <!-- Blog Details Wrapper Start -->
    <div class="blog-details-wrapper section-space--ptb_80">
      <div class="container">
        <div class="row row--17">
                   <?php
                    $i=1;
                    $id=$_GET['id'];
                    include 'include/connection.php';
                    $query="SELECT blog_post.*, subcategory.id AS subcategory_id, 
                    subcategory.subcat_name,category.category_name,user.id AS user_id,user.username FROM blog_post JOIN subcategory ON blog_post.sub_category_id = subcategory.id
                  JOIN category ON subcategory.category_id = category.id
                  JOIN user ON blog_post.post_by = user.id WHERE category.id=$id";
                    $result = mysqli_query($conn,$query);
                     if ($result->num_rows > 0) {
                    while($row=mysqli_fetch_assoc($result)) {
                     ?>
          <div class="col-lg-4 col-md-6 col-sm-6">
            <!-- Single Following Post Start -->
            <div class="single-following-post" data-aos="fade-up">
              <a href="single-blog.php?id=<?php echo $row['id']; ?>" class="following-post-thum">
              <img src="/<?php    echo $row['image']; ?>" alt="">
              </a>
              <div class="following-post-content">
                <div class="following-blog-post-top">
                  <div class="trending-blog-post-category">
                  </div>
                    <a href="#" class="business"><?php  echo $row['category_name']; ?></a>
                  </div>
                  <div class="following-blog-post-author">
                    By <a href="single-blog.php?id=<?php echo $row['id']; ?>"></a><?php echo $row['username']; ?></a>
                  </div>
                </div>
                <h5 class="following-blog-post-title">
                  <a href="single-blog.php?id=<?php echo $row['id']; ?>"><?php echo $row['post_title']; ?>
                  </a>
                </h5>
                <div class="following-blog-post-meta">
                  <div class="post-meta-left-side">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#"> <?php $createdAt = $row['created_at'];
                        $timestamp = strtotime($createdAt);
                        $formattedDate = date('j F Y', $timestamp);
                        echo $formattedDate; ?></a>
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
          <?php } }else {?>
            <div class="error-404-area">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <div class="error-404-content text-center">
                                <div class="banner" data-aos="fade-up">
                                    <img src="assets/images/banners/error-404.webp" alt="">
                                </div>
                                <div class="error-text" data-aos="fade-up">
                                    <h5>This Page is Not Found.</h5>
                                    <h2>We are sorry for this error.
                                        Can’t find this page.</h2>

                                    <div class="button-box mt-30" data-aos="fade-up">
                                        <a href="index.html" class="btn-large btn-primary"><i class="icofont-long-arrow-left mr-2"></i> Back To Home </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="error-area-shap">
                    <img src="assets/images/shap/error-shap.png" alt="">
                </div>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
    <!-- Blog Details Wrapper End -->
    <!-- Trending Topic Area Start -->
    <div class="trending-topic-area bg-gray section-space--ptb_80">
      <div class="container">
        <!-- Newsletter Subscribe Area Start -->
        <div class="newsletter-subscribe-inner section-space--mt_80" data-aos="fade-up">
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