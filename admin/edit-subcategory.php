<?php 
  include 'include/connection.php';
  if(isset($_POST['update_subcat'])){
    $error="";
    $success="";
    $id=$_POST['id'];
    $category = $_POST['category_id'];
    $subcategory = $_POST['subcat_name'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "category/" . $filename;
    if(move_uploaded_file($tempname, $folder)) {
      $query="UPDATE subcategory  set category_id='$category',subcat_name='$subcategory',image='$folder' WHERE id='$id'";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['success']="Subcategory Updated Successfully.";
        header("Location:subcategory.php");
        exit();
      }else{
        $_SESSION['error']="Subcategory Updated Inserted.";
        header("Location:subcategory.php");
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
        
            
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Subcategory</h3>
            </div>
            <?php
              $i=1;
              include 'include/connection.php';
              $id=$_GET['id'];
              $query="SELECT * FROM subcategory WHERE id='$id'";
              $result = mysqli_query($conn,$query);

              if($row=mysqli_fetch_assoc($result)) {
              ?>
            <form action="#" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select name="category_id" class="form-control" id="category_id">
                  <option>--Select Category</option>
                  <?php
                    include 'include/connection.php';
                    $i=1;
                    $categoryQuery="SELECT * from category WHERE status='1'";
                    $results=mysqli_query($conn,$categoryQuery);
                    while($rows=mysqli_fetch_assoc($results)){
                    ?>
                   <option value="<?php echo $rows['id']; ?>" <?php echo $row['id'] == 'selected' ? 'selected' : ''; ?>><?php echo $rows['category_name']; ?></option>

                  <?php } ?>
                </select>
              </div>
                <div class="form-group">
                  <label for="subcategoryName">Subcategory Name</label>
                  <input type="text" name="subcat_name" class="form-control" id="subcategoryName" placeholder="Subcategory Name" value="<?php echo $row['subcat_name']; ?>">
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
                <button type="submit" class="btn btn-primary" name="update_subcat">Update Subcategory</button>
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