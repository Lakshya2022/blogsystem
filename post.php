<?php 
  include 'include/connection.php';
  if(isset($_POST['add_post'])){
    $error="";
    $success="";
    $post_by = $_SESSION['id'];
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['sub_cat_id'];
    $postname = $_POST['post_name'];
    $posttitle = $_POST['post_title'];
    $url = $_POST['url'];
    $details = $_POST['details'];
    $post_status = '1';
    $tags_name = explode(',', $_POST['tags']);
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $feature = $_POST['feature'];
    $folder = "admin/post/" . $filename;
    if(move_uploaded_file($tempname, $folder)) {
      $query="INSERT INTO blog_post (post_by,category_id,sub_category_id,post_name,post_title,url, details,post_status,image,feature) values('$post_by','$category_id','$subcategory_id','$postname','$posttitle','$url','$details','$post_status','$folder','$feature')";
      
  
      $result=mysqli_query($conn,$query);
  
      if($result){
        $post_id = mysqli_insert_id($conn);
        $tags = $tags_name;
        foreach ($tags as $tag) {
            $tag = trim($tag);
            $tag_query = "INSERT INTO tags (post_id,tags) VALUES ('$post_id','$tag') ON DUPLICATE KEY UPDATE tags=tags";
            mysqli_query($conn, $tag_query);
            // // Get the tag ID
            // $tag_id_query = "SELECT id FROM tags WHERE name='$tag'";
            // $tag_id_result = mysqli_query($conn, $tag_id_query);
            // $tag_id_row = mysqli_fetch_assoc($tag_id_result);
            // $tag_id = $tag_id_row['id'];
  
            // // Associate the tag with the blog post in the post_tags table
            // $post_tag_query = "INSERT INTO post_tags (post_id, tag_id) VALUES ('$post_id', '$tag_id')";
            // mysqli_query($conn, $post_tag_query);
        }
        $_SESSION['success']="Post Insert Successfully.";
        header("Location:post.php");
      }else{
        $_SESSION['error']="Post Not Inserted.";
        header("Location:post.php");
        exit();
      }
    } 
    else {
       $_SESSION['error']="Image File Not Uploaded to Database.";
       header("Location:category.php");
       exit();
    }
  }
  ?>
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
                  <form action="#" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="feature" value="new">
                    <div class="row">
                      <div class="col-md-6 pb-3">
                        <div class="form-group">
                          <label>Post Name</label>
                          <input type="text" name="post_name" placeholder="Enter Post Name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6 pb-3">
                        <div class="form-group">
                          <label>Post Title</label>
                          <input type="text" name="post_title" placeholder="Enter Post Name" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pb-3">
                        <div class="form-group">
                          <select name="category_id" class="form-control" id="category_id">
                            <option>--Select Category</option>
                            <?php
                              include 'include/connection.php';
                              $i=1;
                              $query="SELECT * from category WHERE status='1'";
                              $result=mysqli_query($conn,$query);
                              while($row=mysqli_fetch_assoc($result)){
                              ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 pb-3">
                        <div class="form-group">
                          <select name="sub_cat_id" class="form-control" id="subcategory_id">
                            <option>--Select Subcategory</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 pb-3">
                        <div class="form-group">
                          <label for="exampleInputFile">Upload Post Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="images" name="image" accept="image/*" onchange="previewImage(event)">
                            </div>
                          </div>
                        </div>
                        <!-- Image preview element -->
                        <div class="form-group">
                          <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100%; height: auto;">
                        </div>
                      </div>
                      <div class="col-md-6 pb-3">
                        <div class="form-group">
                          <label for="exampleInputFile">YouTube URL</label>
                          <input type="text" class="form-control" id="url" name="url" placeholder="https://www.youtube.com/watch?v=">
                          <span class="text-danger"><i class="fa fa-youtube" aria-hidden="true"></i> 
                          NOTE:https://www.youtube.com/watch?v=</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 pb-3">
                      <div class="form-group">
                        <label for="exampleInputFile">Serach Tags</label>
                        <input id="search" name="tags" class="form-control" placeholder="Enter Search Tags name" data-role="tagsinput">
                      </div>
                    </div>
                    <div class="col-md-12 mb-4">
                      <div class="form-group">
                        <textarea id="summernote" name="details"></textarea>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" name="add_post">Add Post</button>
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
</div>
<script type="text/javascript" src="assets/custom/js/tags-input.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  function previewImage(event) {
   var file = event.target.files[0];
   if (!file.type.startsWith('image/')) {
     alert('Please select an image file.');
     event.target.value = ''; // Clear the input
     return;
   }
  
   var reader = new FileReader();
   reader.onload = function() {
     var output = document.getElementById('imagePreview');
     output.src = reader.result;
     output.style.display = 'block';
   }
   reader.readAsDataURL(file);
  }
  
  $(document).ready(function(){
  
  $('#category_id').on("change",function () {
     var categoryId = $(this).find('option:selected').val();
     $.ajax({
         url: "subcategoryFetch.php",
         type: "POST",
         data: "categoryId="+categoryId,
         success: function (response) {
           
             $("#subcategory_id").html(response);
         },
     });
  }); 
  
  });
</script>
<script type="text/javascript" src="assets/custom/js/tags-input.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
  
      $('#category_id').on("change",function () {
          var categoryId = $(this).find('option:selected').val();
          $.ajax({
              url: "admin/subcategoryFetch.php",
              type: "POST",
              data: "categoryId="+categoryId,
              success: function (response) {
                
                  $("#subcategory_id").html(response);
              },
          });
      }); 
  
  });
</script>
<?php include 'footer.php' ?>