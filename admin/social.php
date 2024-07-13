<?php 
  include 'include/connection.php';
  if(isset($_POST['add_cat'])){
    $error="";
    $success="";
    $social_name = $_POST['name'];
    $social_icon = $_POST['icon'];
    $social_link = $_POST['link'];
   
      $query="INSERT INTO socials (name,icon,link) values('$social_name','$social_icon','$social_link')";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['success']="Social Icon Insert Successfully.";
        header("Location:social.php");
        exit();
      }else{
        $_SESSION['error']="Social Icon Not Inserted.";
        header("Location:social.php");
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
              <h3 class="card-title">Social Links</h3>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="social_name">Social Name</label>
                  <input type="text"  name="name"class="form-control" id="social_name" placeholder="Category Name">
                </div>
                <div class="form-group">
                  <label for="social_icon">Social Icon</label>
                  <input type="text"  name="icon"class="form-control" id="social_icon" placeholder="fa fa-trash">
                </div>
                <div class="form-group">
                  <label for="social_icon">Social Links</label>
                  <input type="text"  name="link"class="form-control" id="social_icon" placeholder="fa fa-trash">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="add_cat">Social Link Add</button>
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
                    <th>Social Name</th>
                    <th>Social Icon</th>
                    <th>Social Link</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  include 'include/connection.php';
                  $query="SELECT * FROM socials";
                  $result = mysqli_query($conn,$query);
                  while($row=mysqli_fetch_assoc($result)) {
                   ?>
                  
                  <tr>
                    <td><?php echo $i; ?></td>
                   <td> <?php echo $row['name'] ?></td>
                   <td><i class="<?php echo $row['icon'] ?>"></i></td>
                   <td> <?php echo $row['link'] ?></td>
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