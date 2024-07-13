<?php 
  include 'include/connection.php';
  if(isset($_POST['add_cat'])){
    $error="";
    $success="";
    $category = $_POST['category_name'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "category/" . $filename;
    if(move_uploaded_file($tempname, $folder)) {
      $query="INSERT INTO category (category_name,image) values('$category','$folder')";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['success']="Category Insert Successfully.";
        header("Location:category.php");
        exit();
      }else{
        $_SESSION['error']="Category Not Inserted.";
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">ADD Category</h3>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Category Name</label>
                  <input type="text"  name="category_name"class="form-control" id="exampleInputPassword1" placeholder="Category Name">
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
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="add_cat">Add Category</button>
              </div>
            </form>
          </div>
        </div>
        <!---Table..-->
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Category Name</th>
                    <th>Images</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  include 'include/connection.php';
                  $query="SELECT * FROM category";
                  $result = mysqli_query($conn,$query);
                  while($row=mysqli_fetch_assoc($result)) {
                   ?>
                  
                  <tr>
                    <td><?php echo $i; ?></td>
                   <td> <?php echo $row['category_name'] ?></td>
                   <td>
                    <?php if(isset($row['image']) && $row['image'] !=''):?>
                    <img src="<?php echo $row['image']?>" width="50px">
                    <?php else: ?>
                    <img src="category/no-image.jfif">
                  <?php endif; ?>
                  </td>
                  <td>
                    <div class="toggle">
                      <input type="radio" value="on" name="radio" <?php echo ($row['status'] == 1) ? 'checked' : ''; ?>>
                      <input type="radio" value="off" name="radio" <?php echo ($row['status'] == 0) ? 'checked' : ''; ?>>
                      <div class="toggle__pointer"></div>
                    </div>
                  </td>
                  <td>
                    <div class="d-flex">
                      <a href="edit-category.php?id=<?php echo $row['id']?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <form action="include/delete.php" method="post">
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                          <button type="submit" class="btn btn-danger" name="categoryDelete"><i class="fa fa-trash"></i></button>
                      </form>
                    </div>
                  </td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
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
<?php include('include/footer.php'); ?>