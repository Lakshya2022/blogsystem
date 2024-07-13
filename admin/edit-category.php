<?php 
  include 'include/connection.php';
  if(isset($_POST['update_cat'])){
    $error="";
    $success="";
    $id=$_POST['id'];
    $category = $_POST['category_name'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "category/" . $filename;
    if(move_uploaded_file($tempname, $folder)) {
      $query="UPDATE category  set category_name='$category',image='$folder' WHERE id='$id'";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['success']="Category Updated Successfully.";
        header("Location:category.php");
        exit();
      }else{
        $_SESSION['error']="Category Updated Inserted.";
        header("Location:category.php");
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
        <div class="col-md-6">
         <?php 
              if(isset($_SESSION['success'])){
                  $success = $_SESSION['success']; 
              ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?php echo $success; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              <?php 
              } else if(isset($_SESSION['error'])){ 
                  $error = $_SESSION['error']; 
              ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?php echo $error; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              <?php 
              }
              ?>

            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Category</h3>
            </div>
            <?php
                  $i=1;
                  include 'include/connection.php';
                  $id=$_GET['id'];
                  $query="SELECT * FROM category WHERE id='$id'";
                  $result = mysqli_query($conn,$query);
                  if($row=mysqli_fetch_assoc($result)) {
                   ?>
            <form action="#" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Category Name</label>
                  <input type="text"  name="category_name"class="form-control" id="exampleInputPassword1" placeholder="Category Name"  value="<?php echo $row['category_name']; ?>">
                </div>
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
                  <img src="<?php echo $row['image']?>" width="50px">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="update_cat">Update Category</button>
              </div>
            </form>
          <?php } ?>
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
<?php include('include/footer.php'); ?>