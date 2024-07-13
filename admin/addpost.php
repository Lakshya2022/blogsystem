<?php 
  include 'include/connection.php';
  if(isset($_POST['add_post'])){
    $error="";
    $success="";
    $post_by = 'admin';
    $category_id = $_POST['category_id'];
    $subcategory_id = $_POST['sub_cat_id'];
    $postname = $_POST['post_name'];
    $posttitle = $_POST['post_title'];
    $url = $_POST['url'];
    $details = $_POST['details'];
    $tags_name = explode(',', $_POST['tags']);
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $feature = $_POST['feature'];
    $folder = "post/" . $filename;
    if(move_uploaded_file($tempname, $folder)) {
      $query="INSERT INTO blog_post (post_by,category_id,sub_category_id,post_name,post_title,url, details,image,feature) values('$post_by','$category_id','$subcategory_id','$postname','$posttitle','$url','$details','$folder','$feature')";
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
        $_SESSION['success'] = "Post Inserted Successfully.";
        header("Location:postlist.php");
        exit();
      }else{
         $_SESSION['error'] = "Post Not Inserted.";
        header("Location:addpost.php");
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
<?php include('include/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
              <!---Table..-->
        <div class="col-md-12">
          <div class="card card-primary">
             <div class="card-header">
              <h3 class="card-title">Create Post</h3>
            </div>
            <div class="card-body">
            <form action="#" method="post" enctype="multipart/form-data">
             
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Post Name</label>
                    <input type="text" name="post_name" placeholder="Enter Post Name" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Post Title</label>
                    <input type="text" name="post_title" placeholder="Enter Post Name" class="form-control">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
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
                <div class="col-md-4">
                  
                <div class="form-group">
                  <select name="sub_cat_id" class="form-control" id="subcategory_id">
                  <option>--Select Subcategory</option>
                 
                </select>
                </div>
                </div>
                 <div class="col-md-4">
                  
                <div class="form-group">
                  <select name="feature" class="form-control" id="feature">
                  <option>--Select Feature--</option>
                  <option value="new">New</option>
                  <option value="related">Related</option>
                  <option value="latested">Latested</option>
                </select>
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="images" name="image">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleInputFile">YouTube URL</label>
                  <input type="text" class="form-control" id="url" name="url" placeholder="https://www.youtube.com/watch?v=">
                  <span class="text-danger"><i class="fa fa-youtube" aria-hidden="true"></i> 

                  NOTE:https://www.youtube.com/watch?v=</span>
                    
                </div>
                </div>
                
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                  <label for="exampleInputFile">Serach Tags</label>
                  <input id="search" name="tags" class="form-control" placeholder="Enter Search Tags name" data-role="tagsinput">
              </div>
              </div> 
              <div class="col-md-12">
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
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="assets/custom/js/tags-input.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('#category_id').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "subcategoryFetch.php",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
              
                $("#subcategory_id").html(response);
                toastr.success('Subcategory Show!');
            },
        });
    }); 

});
</script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
   $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
<?php include('include/footer.php'); ?>