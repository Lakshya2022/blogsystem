<?php 
  include 'include/connection.php';
  if(isset($_POST['add_sub'])){
    $error="";
    $success="";
    $categoryId = $_POST['category_id'];
    $subcategory = $_POST['subcat_name'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "subcategory/".$filename;
    if(move_uploaded_file($tempname, $folder)) {
      $query="INSERT INTO subcategory (category_id,subcat_name,image) VALUES('$categoryId','$subcategory','$folder')";
    
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['success']="Subcategory Insert Successfully.";
        header("Location:subcategory.php");   
      }else{
        $_SESSION['error']="Subcategory Not Inserted.";
        header("Location:subcategory.php");
      }
    } 
    else {
       $_SESSION['error']="Images File Not Uploaded on Database.";
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
              <h3 class="card-title">ADD subCategory</h3>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
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
                <div class="form-group">
                  <label for="exampleInputPassword1">subCategory Name</label>
                  <input type="text"  name="subcat_name"class="form-control" id="exampleInputPassword1" placeholder="subCategory Name">
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
                <button type="submit" class="btn btn-primary" name="add_sub">Add Subcategory</button>
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
                    <th>subCategory Name</th>
                    <th>Images</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  include 'include/connection.php';
                  $query = "
                      SELECT subcategory.id, subcategory.subcat_name, category.category_name
                      FROM subcategory
                      JOIN category ON subcategory.category_id = category.id
                      WHERE subcategory.status = 1";
                  $result = mysqli_query($conn,$query);
                  while($row=mysqli_fetch_assoc($result)) {
                   ?>
                  
                  <tr>
                    


                    <td><?php echo $i; ?></td>
                   <td> <?php echo $row['category_name'] ?></td>
                   <td> <?php echo $row['subcat_name'] ?></td>
                   <td>
                    <?php if(isset($row['image']) && $row['image'] !=''):?>
                    <img src="<?php echo $row['image']?>" width="50px">
                    <?php else: ?>
                    <img src="category/no-image.jfif">
                  <?php endif; ?>
                  </td>
                  <td>
                      <div class="toggle">
                        <input type="radio" value="on" name="radio">
                        <input type="radio" value="off" name="radio" checked>
                        <div class="toggle__pointer"></div>
                      </div>
                      <?php echo $row['status']; ?></td>
                  <td>
                    <div class="d-flex">
                       <a href="edit-subcategory.php?id=<?php echo $row['id']?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                     <form action="include/delete.php" method="post">
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                          <button type="submit" class="btn btn-danger" name="subcategoryDelete"><i class="fa fa-trash"></i></button>
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