<?php include 'header.php' ?>

<!--======== End of header area  =========-->
<div id="main-wrapper">
  <div class="site-wrapper-reveal">
    <!-- Hero Area Start -->
    <div class="hero-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero-inner-area">
              <!-- Hero Category Area Start -->
              <div class="hero-category-area">
              <?php
                  $i=1;
                  include 'include/connection.php';
                  $query="SELECT * FROM category  LIMIT 3";
                  $result = mysqli_query($conn,$query);
                  while($row=mysqli_fetch_assoc($result)) {
                   ?>
                <a href="category.php?id=<?php echo $row['id'] ?>" class="single-hero-category-item" data-aos="fade-up">
                 
                  <?php if(isset($row['image']) && $row['image'] !=''):?>
                    <img src="admin/<?php echo $row['image']?>" width="50px">
                    <?php else: ?>
                    <img src="admin/category/no-image.jfif">
                    <?php endif; ?>
                  <div class="hero-category-inner-box">
                    <h3 class="title"></h3><?php echo $row['category_name']; ?></h3>
                    <i class="icon icofont-long-arrow-right"></i>
                  </div>
                </a>
                
              <?php } ?>
              </div>
              <!-- Hero Category Area End -->
              <!-- Hero Banner Area Start -->
              <div class="hero-banner-area" data-aos="fade-up">
                <a href="blog-details.html">
                <img src="assets/images/hero/hero-01.jpg" alt="">
                </a>
              </div>
              <!-- Hero Banner Area End -->
              <div class="hero-blog-post">
                <?php
                  $i=1;
                  include 'include/connection.php';
                  $query="SELECT blog_post.*, 
       subcategory.id AS subcategory_id, 
       subcategory.subcat_name, 
       category.category_name, 
       user.id AS user_id, 
       user.username -- or user.name, depending on your table structure
FROM blog_post
JOIN subcategory ON blog_post.sub_category_id = subcategory.id
JOIN category ON subcategory.category_id = category.id
JOIN user ON blog_post.post_by = user.id
WHERE post_status NOT IN (3, 4)
ORDER BY post_name DESC
LIMIT 2";
                  $result = mysqli_query($conn,$query);
                  while($row=mysqli_fetch_assoc($result)) {
                   ?>
                <!-- Single-hero-blog-post Start -->
                <div class="single-hero-blog-post" data-aos="fade-up">
                  <div class="hero-blog-post-top">
                    <div class="hero-blog-post-category">
                      <a href="#" class="tech"><?php echo $row['category_name'] ?></a>
                    </div>
                    <div class="hero-blog-post-author">
                      By <a href="#"><?php echo $row['username']; ?></a>
                    </div>
                  </div>
                  <h3 class="hero-blog-post-title">
                    <a href="blog-details.html"><?php echo $row['post_name']; ?>
                    </a>
                  </h3>
                  <p class="post-short-details">
                    <?php $details=$row['details']; 
                    $words = explode(' ', $details);
                    $words = array_slice($words, 0, 20);
                    $limitedDetails = implode(' ', $words);
                    echo $limitedDetails;?>
                  </p>
                  <div class="hero-blog-post-meta">
                    <div class="post-meta-left-side">
                      <span class="post-date">
                      <i class="icofont-ui-calendar"></i> 
                      <a href="#">
                        <?php $createdAt = $row['created_at'];
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
                <!-- Single-hero-blog-post End -->
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Hero Area End -->
    <!-- Trending Article Area Start -->
    <div class="trending-article-area section-space--ptb_80">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-7">
            <div class="section-title mb-40">
              <h3>Trending Article</h3>
            </div>
          </div>
          <div class="col-lg-4 col-5">
            <div class="trending-slider-navigation text-end">
              <div class="trending-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
              <div class="trending-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <!-- Swiper -->
            <div class="swiper-container trending-slider-active">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="trending-article-row">
                    <!-- Trending Article Left Side Start -->
                    <div class="trending-article-left-side">
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/1-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="fashion">Fashion</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">Customize your WooCommerce
                            store with countless design
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/2-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="tech">Tech</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">All of these amazing features
                            come at an affordable price!
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/3-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="food">Food</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">Make your store stand out from
                            the others by converting..
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                    </div>
                    <!-- Trending Article Left Side End -->
                    <!-- Trending Article Right Side Start -->
                    <div class="trending-article-right-side">
                      <div class="large-banner-trending-article" data-aos="fade-up">
                        <div class="trending-large-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/4-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-large-post-content">
                          <!-- Trending Single Item Start -->
                          <article class="trending-single-item">
                            <div class="trending-post-content">
                              <div class="trending-blog-post-top">
                                <div class="trending-blog-post-category">
                                  <a href="#" class="health">Health</a>
                                </div>
                                <div class="trending-blog-post-author">
                                  By <a href="#">Kathy Ramirez</a>
                                </div>
                              </div>
                              <h5 class="trending-blog-post-title">
                                <a href="blog-details.html">With WooLentor's drag-and-drop
                                interface for creating custom...
                                </a>
                              </h5>
                              <div class="trending-blog-post-meta">
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
                          </article>
                          <!-- Trending Single Item End -->
                          <!-- Trending Single Item Start -->
                          <article class="trending-single-item">
                            <div class="trending-post-content">
                              <div class="trending-blog-post-top">
                                <div class="trending-blog-post-category">
                                  <a href="#" class="doctor">Doctor</a>
                                </div>
                                <div class="trending-blog-post-author">
                                  By <a href="#">Kathy Ramirez</a>
                                </div>
                              </div>
                              <h5 class="trending-blog-post-title">
                                <a href="blog-details.html">WooCommerce comes with an
                                intuitive drag-and-drop...
                                </a>
                              </h5>
                              <div class="trending-blog-post-meta">
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
                          </article>
                          <!-- Trending Single Item End -->
                        </div>
                      </div>
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-large-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/5-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="business">Business</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">Customize your WooCommerce
                            store with countless design
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                    </div>
                    <!-- Trending Article Right Side End -->
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="trending-article-row">
                    <!-- Trending Article Left Side Start -->
                    <div class="trending-article-left-side">
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/1-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="fashion">Fashion</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">Customize your WooCommerce
                            store with countless design
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/2-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="tech">Tech</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">All of these amazing features
                            come at an affordable price!
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/3-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="food">Food</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">Make your store stand out from
                            the others by converting..
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                    </div>
                    <!-- Trending Article Left Side End -->
                    <!-- Trending Article Right Side Start -->
                    <div class="trending-article-right-side">
                      <div class="large-banner-trending-article" data-aos="fade-up">
                        <div class="trending-large-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/4-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-large-post-content">
                          <!-- Trending Single Item Start -->
                          <article class="trending-single-item">
                            <div class="trending-post-content">
                              <div class="trending-blog-post-top">
                                <div class="trending-blog-post-category">
                                  <a href="#" class="health">Health</a>
                                </div>
                                <div class="trending-blog-post-author">
                                  By <a href="#">Kathy Ramirez</a>
                                </div>
                              </div>
                              <h5 class="trending-blog-post-title">
                                <a href="blog-details.html">With WooLentor's drag-and-drop
                                interface for creating custom...
                                </a>
                              </h5>
                              <div class="trending-blog-post-meta">
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
                          </article>
                          <!-- Trending Single Item End -->
                          <!-- Trending Single Item Start -->
                          <article class="trending-single-item">
                            <div class="trending-post-content">
                              <div class="trending-blog-post-top">
                                <div class="trending-blog-post-category">
                                  <a href="#" class="doctor">Doctor</a>
                                </div>
                                <div class="trending-blog-post-author">
                                  By <a href="#">Kathy Ramirez</a>
                                </div>
                              </div>
                              <h5 class="trending-blog-post-title">
                                <a href="blog-details.html">WooCommerce comes with an
                                intuitive drag-and-drop...
                                </a>
                              </h5>
                              <div class="trending-blog-post-meta">
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
                          </article>
                          <!-- Trending Single Item End -->
                        </div>
                      </div>
                      <!-- Trending Single Item Start -->
                      <article class="trending-single-item" data-aos="fade-up">
                        <div class="trending-large-post-thum">
                          <a href="blog-details.html">
                          <img src="assets/images/trending/5-trending-img.jpg" alt="">
                          </a>
                        </div>
                        <div class="trending-post-content">
                          <div class="trending-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="business">Business</a>
                            </div>
                            <div class="trending-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="trending-blog-post-title">
                            <a href="blog-details.html">Customize your WooCommerce
                            store with countless design
                            </a>
                          </h5>
                          <div class="trending-blog-post-meta">
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
                      </article>
                      <!-- Trending Single Item End -->
                    </div>
                    <!-- Trending Article Right Side End -->
                  </div>
                </div>
              </div>
            </div>
            <!-- Swiper End -->
          </div>
        </div>
      </div>
    </div>
    <!-- Trending Article Area End -->
    <!-- From Following Area Start -->
    <div class="from-following-area  section-space--ptb_80">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="from-following-hader-area" data-aos="fade-up">
              <div class="section-title">
                <h3>From Following</h3>
              </div>
              <div class="following-slider-navigation text-end">
                <div class="following-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                <div class="following-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Swiper -->
        <div class="swiper-container following-slider-active">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="row row--17">
                <div class="from-following-left-side col">
                  <div class="row row--17">
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/01.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="health">Health</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">Customize your WooCommerce
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
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/02.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="lifestyle">Lifestyle</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">WooCommerce comes with an intuitive
                            drag-and-drop interface.
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
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/03.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="lifestyle">Lifestyle</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">All of these amazing features come at an
                            affordable price!
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
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/04.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="health">Health</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">Make your store stand out from the others
                            by converting more shoppers into buyers!
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
                <div class="from-following-right-side col">
                  <div class="following-author-area" data-aos="fade-up">
                    <div class="author-image">
                      <img src="assets/images/author/author-01.png" alt="">
                    </div>
                    <div class="author-title">
                      <h4><a href="#">Antonio Lucas</a></h4>
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
                        <a href="#" class="btn">View Profile <i class="icofont-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="following-add-banner" data-aos="fade-up">
                    <a href="#">
                    <img src="assets/images/banners/home-following-banner.png" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="row row--17">
                <div class="from-following-left-side col">
                  <div class="row row--17">
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/01.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="health">Health</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">Customize your WooCommerce
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
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/02.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="lifestyle">Lifestyle</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">WooCommerce comes with an intuitive
                            drag-and-drop interface.
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
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/03.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="lifestyle">Lifestyle</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">All of these amazing features come at an
                            affordable price!
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
                    <div class="col-md-6 col-sm-6">
                      <!-- Single Following Post Start -->
                      <div class="single-following-post" data-aos="fade-up">
                        <div class="following-post-thum">
                          <img src="assets/images/blog/04.jpg" alt="">
                        </div>
                        <div class="following-post-content">
                          <div class="following-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#" class="health">Health</a>
                            </div>
                            <div class="following-blog-post-author">
                              By <a href="#">Kathy Ramirez</a>
                            </div>
                          </div>
                          <h5 class="following-blog-post-title">
                            <a href="blog-details.html">Make your store stand out from the others
                            by converting more shoppers into buyers!
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
                <div class="from-following-right-side col">
                  <div class="following-author-area" data-aos="fade-up">
                    <div class="author-image">
                      <img src="assets/images/author/author-01.png" alt="">
                    </div>
                    <div class="author-title">
                      <h4><a href="#">Antonio Lucas</a></h4>
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
                        <a href="#" class="btn">View Profile <i class="icofont-long-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="following-add-banner" data-aos="fade-up">
                    <a href="#">
                    <img src="assets/images/banners/home-following-banner.png" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- From Following Area End -->
    <div class="bg-gray-1">
      <!-- Trending Topic Area Start -->
      <div class="trending-topic-area section-space--ptb_80">
        <div class="container">
          <div class="row align-items-center">
            <div class="trending-topic-section-title">
              <h3>Trending Topic</h3>
              <div class="trending-topic-navigation mt-30">
                <div class="trending-topic-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                <div class="trending-topic-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
              </div>
            </div>
            <div class="trending-topic-item-wrap">
              <div class="swiper-container trending-topic-slider-active">
                <div class="swiper-wrapper">
                  <div class="swiper-slide" data-aos="fade-up">
                    <div class="single-trending-topic-item">
                      <a href="category-grid.html">
                        <img src="assets/images/topic/01_topic.jpg" alt="">
                        <h4 class="title">Travel</h4>
                      </a>
                    </div>
                  </div>
                  <div class="swiper-slide" data-aos="fade-up">
                    <div class="single-trending-topic-item">
                      <a href="category-grid.html">
                        <img src="assets/images/topic/02_topic.jpg" alt="">
                        <h4 class="title">Food</h4>
                      </a>
                    </div>
                  </div>
                  <div class="swiper-slide" data-aos="fade-up">
                    <div class="single-trending-topic-item">
                      <a href="category-grid.html">
                        <img src="assets/images/topic/03_topic.jpg" alt="">
                        <h4 class="title">Design</h4>
                      </a>
                    </div>
                  </div>
                  <div class="swiper-slide" data-aos="fade-up">
                    <div class="single-trending-topic-item">
                      <a href="category-grid.html">
                        <img src="assets/images/topic/04_topic.jpg" alt="">
                        <h4 class="title">Technology</h4>
                      </a>
                    </div>
                  </div>
                  <div class="swiper-slide" data-aos="fade-up">
                    <div class="single-trending-topic-item">
                      <a href="category-grid.html">
                        <img src="assets/images/topic/05_topic.jpg" alt="">
                        <h4 class="title">Marketing</h4>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Newsletter Subscribe Area Start -->
          <div class="newsletter-subscribe-inner section-space--mt_80">
            <div class="row align-items-center">
              <div class="col-lg-3">
                <div class="section-title mb-4">
                  <h3>Subscribe For Newsletter</h3>
                </div>
              </div>
              <div class="col-lg-9">
                <div class="newsletter-input-box" data-aos="fade-up">
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
    <!-- Featured Video Area Start -->
    <div class="featured-video-area section-space--ptb_80">
      <div class="container">
        <div class="row row--17">
          <div class="featured-video-col-8">
            <div class="featured-video-haader">
              <div class="section-title">
                <h3>Featured Video</h3>
              </div>
              <ul class="featured-video-list nav" data-aos="fade-up">
                <li class="featured-video-list-item">
                  <a href="#" class="featured-video-link active" data-bs-toggle="tab" data-bs-target="#travel">Travel</a>
                </li>
                <li class="featured-video-list-item">
                  <a href="#" class="featured-video-link" data-bs-toggle="tab" data-bs-target="#lifestyle">Lifestyle</a>
                </li>
                <li class="featured-video-list-item">
                  <a href="#" class="featured-video-link" data-bs-toggle="tab" data-bs-target="#food">Food</a>
                </li>
                <li class="featured-video-list-item">
                  <a href="#" class="featured-video-link" data-bs-toggle="tab" data-bs-target="#health">Health</a>
                </li>
              </ul>
            </div>
            <div class="featured-video-wrap">
              <div class="tab-content">
                <div class="tab-pane fade show active" id="travel">
                  <div class="row row--17">
                    <div class="col-lg-7">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup" data-aos="fade-up">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/01_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3><a href="blog-details.html">All of these amazing features come
                            at an affordable price!</a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup" data-aos="fade-up">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/02_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3>
                            <a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                    <div class="col-lg-5">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup" data-aos="fade-up">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/03_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Customize your WooCommerce
                            store with countless design</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup" data-aos="fade-up">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/04_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup" data-aos="fade-up">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/05_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">With WooLentor's drag-and-drop
                            interface for creating custom...</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="lifestyle">
                  <div class="row row--17">
                    <div class="col-lg-7">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/01_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3><a href="blog-details.html">All of these amazing features come
                            at an affordable price!</a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/02_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3>
                            <a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                    <div class="col-lg-5">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/03_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Customize your WooCommerce
                            store with countless design</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/04_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/05_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">With WooLentor's drag-and-drop
                            interface for creating custom...</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="food">
                  <div class="row row--17">
                    <div class="col-lg-7">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/01_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3><a href="blog-details.html">All of these amazing features come
                            at an affordable price!</a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/02_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3>
                            <a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                    <div class="col-lg-5">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/03_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Customize your WooCommerce
                            store with countless design</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/04_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/05_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">With WooLentor's drag-and-drop
                            interface for creating custom...</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="health">
                  <div class="row row--17">
                    <div class="col-lg-7">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/01_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3><a href="blog-details.html">All of these amazing features come
                            at an affordable price!</a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/02_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                              <span class="read-time">10 min read</span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h3>
                            <a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h3>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                    <div class="col-lg-5">
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/03_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Customize your WooCommerce
                            store with countless design</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/04_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">Create a custom checkout page in
                            minutes and Increase your sales...
                            </a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                      <!-- Single Featured Video Item Start -->
                      <div class="single-featured-video-item video-popup">
                        <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="video-link  mt-30">
                          <div class="single-popup-wrap">
                            <img src="assets/images/featured-video/05_featured-video.jpg" alt="">
                            <div class="ht-popup-video video-button">
                              <div class="video-button__two">
                                <div class="video-play-sm">
                                  <span class="video-play-icon"></span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <div class="featured-video-content">
                          <div class="featured-blog-post-top">
                            <div class="trending-blog-post-category">
                              <a href="#">Business</a>
                            </div>
                            <div class="post-meta-left-side">
                              <span class="post-date">
                              <i class="icofont-ui-calendar"></i> 
                              <a href="#">03 April, 2023</a>
                              </span>
                            </div>
                            <div class="post-meta-right-side">
                              <a href="#"><img src="assets/images/icons/small-bookmark.png" alt=""></a>
                              <a href="#"><img src="assets/images/icons/heart.png" alt=""></a>
                            </div>
                          </div>
                          <h5><a href="blog-details.html">With WooLentor's drag-and-drop
                            interface for creating custom...</a>
                          </h5>
                        </div>
                      </div>
                      <!-- Single Featured Video Item End -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="latest-post-col-4">
            <!-- Latest Post Area Start -->
            <div class="latest-post-inner-wrap">
              <div class="latest-post-header" data-aos="fade-up">
                <div class="section-title">
                  <h4>Latest Post</h4>
                </div>
                <div class="latest-post-slider-navigation">
                  <div class="latest-post-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                  <div class="latest-post-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
                </div>
              </div>
              <div class="swiper-container latest-post-slider-active" data-aos="fade-up">
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
                          <h6 class="title"><a href="blog-details.html">All of these amazing
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
                          <h6 class="title"><a href="blog-details.html">Customize your
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
                          <h6 class="title"><a href="blog-details.html">With WooLentor's drag
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
                          <h6 class="title"><a href="blog-details.html">All of these amazing
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
                          <h6 class="title"><a href="blog-details.html">WooCommerce comes
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
            <div class="stay-in-touch-area">
              <div class="section-title" data-aos="fade-up">
                <h3>Stay In Touch</h3>
              </div>
              <div class="stay-in-touch-box" data-aos="fade-up">
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
          </div>
        </div>
      </div>
    </div>
    <!-- Featured Video Area End -->
    <!-- Recent Reading List Area Start -->
    <div class="recent-reading-list-area section-space--pb_80">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="recent-reading-header">
              <div class="section-title">
                <h3>Recent Reading List</h3>
              </div>
              <div class="recent-reading-slider-navigation mt-2 mb-2">
                <div class="recent-reading-button-prev navigation-button"><i class="icofont-long-arrow-left"></i></div>
                <div class="recent-reading-button-next navigation-button"><i class="icofont-long-arrow-right"></i></div>
              </div>
              <div class="recent-article-date">
                <span>View by Date</span> <a class="date-button" href="#"><i class="icofont-ui-calendar"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-container recent-reading-slider-active">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/01_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">Create beautiful designs that will help convert...</a></h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/02_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">Make your store stand out
                    from the others by...</a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/03_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">With WooLentor's drag-
                    and-drop interface for...</a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
            </div>
            <div class="swiper-slide">
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/04_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">With WooLentor's drag-
                    and-drop interface for...
                    </a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/05_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">WooCommerce comes
                    with an intuitive drag
                    </a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/06_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">Create beautiful designs
                    that will help convert...</a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
            </div>
            <div class="swiper-slide">
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/07_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">WooCommerce comes
                    with an intuitive drag
                    </a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/08_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">Create beautiful designs
                    that will help convert...</a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
              <!-- Single Recent Reading Post Start -->
              <div class="single-recent-reading-post" data-aos="fade-up">
                <a class="recent-reading-post-thum" href="blog-details.html">
                <img src="assets/images/recent-reading-list/09_reading-list.jpg" alt="">
                </a>
                <div class="recent-reading-post-content">
                  <div class="recent-reading-post-author">
                    By <a href="#">Kathy Ramirez</a>
                  </div>
                  <h6 class="title"><a href="blog-details.html">Make your store stand out
                    from the others by...</a>
                  </h6>
                  <div class="recent-reading-post-meta">
                    <span class="post-date">
                    <i class="icofont-ui-calendar"></i> 
                    <a href="#">03-04-2023</a>
                    </span>
                    <span>10 min read</span>
                  </div>
                </div>
              </div>
              <!-- Single Recent Reading Post End -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Recent Reading List Area End -->
    <!-- Bottom Add Banner Area Start -->
    <div class="bottom-add-banner-area section-space--pb_80">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <a href="#" class="bottom-add-banner-box" data-aos="fade-up">
              <img src="assets/images/banners/bottom-add-banner.jpg" alt="">
              <h6 class="bottom-add-text">All Food Item
                <span>50% Off</span>
              </h6>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bottom Add Banner Area End -->
  </div>
</div>
<?php include 'footer.php' ?>