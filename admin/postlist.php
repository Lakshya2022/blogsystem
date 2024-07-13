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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Post Details</th>
                    <th>Category Name</th>
                    <th>Subcategory Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
                    include 'include/connection.php';
                    $query="SELECT blog_post.*, subcategory.id AS subcategory_id, subcategory.subcat_name, category.category_name FROM blog_post JOIN subcategory ON blog_post.sub_category_id = subcategory.id JOIN category ON subcategory.category_id = category.id WHERE blog_post.status = 1";
                    $result = mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($result)) {
                     ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td>
                      <?php if(isset($row['image']) && $row['image'] !=''):?>
                      <img src="<?php echo $row['image']?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                      <?php else: ?>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      <?php endif; ?>
                      <?php echo $row['post_name'] ?>
                    </td>
                    <td>
                    <?php echo $row['category_name'] ?>
                    </td>
                    <td>
                      <?php echo $row['subcat_name'] ?>
                    </td>
                    <td>
                       <?php
                        if ($row['post_status'] == 1) {
                         echo '<span class="badge bg-success">Pending</span>';
                        } elseif ($row['post_status'] == 2) {
                          echo '<span class="badge bg-info">Check Status</span>';
                        } elseif ($row['post_status'] == 3) {
                          echo '<span class="badge bg-dart">Decline</span>';
                        } elseif ($row['post_status'] == 4) {
                          echo '<span class="badge bg-danger">Delete Post</span>';
                        } elseif ($row['post_status'] == 5) {
                          echo '<span class="badge bg-success">Approved</span>';
                        } else {
                          echo "Unknown Status";
                        }
                      ?>
                    </td>
                    <td>
                    <form id="statusForm_<?php echo $row['id']; ?>" method="POST">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                      <select name="post_status" class="statusSelect" data-post-id="<?php echo $row['id']; ?>">
                        <option value="1" <?php if ($row['post_status'] == 1) echo "selected"; ?>>Pending</option>
                        <option value="2" <?php if ($row['post_status'] == 2) echo "selected"; ?>>Check Content</option>
                        <option value="3" <?php if ($row['post_status'] == 3) echo "selected"; ?>>Declined</option>
                        <option value="4" <?php if ($row['post_status'] == 4) echo "selected"; ?>>Delete Post</option>
                        <option value="5" <?php if ($row['post_status'] == 5) echo "selected"; ?>>Approved</option>
                      </select>
                    </form>
                      </select>
                    </form>
                  

                  
                      <div class="d-flex">
                       <a href="edit-post.php?id=<?php echo $row['id']?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                      <form action="include/delete.php" method="post">
                          <input type="hidden" name="id" value="<?php echo $row['id']?>">  
                          <button type="submit" class="btn btn-danger" name="postDelete"><i class="fa fa-trash"></i></button>
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
<script>
$(document).ready(function() {
  $('.statusSelect').change(function() {
    var postId = $(this).data('post-id');
    var status = $(this).val();
    var formData = {
      post_id: postId,
      post_status: status
    };
    
    $.ajax({
      type: 'POST',
      url: 'include/update_status.php',
      data: formData,
      success: function(response) {
       toastr.success('Status updated successfully!');
       window.location.reload();
             },
      error: function(xhr, status, error) {
        toastr.error('An error occurred while updating the status.');
      }
    });
  });
});
</script>

<?php include('include/footer.php'); ?>