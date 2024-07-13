<?php include 'header.php' ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
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
                    <h3 class="mb-2">My Post List </h3>
                    <h5>Become a member</h5>
                  </div>
                    <div class="card-body">
              <table id="example1" class="display table table-bordered table-striped">
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
                    $post_by=$_SESSION['id'];
                    include 'include/connection.php';
                    $query="SELECT blog_post.*, subcategory.id AS subcategory_id, subcategory.subcat_name, category.category_name FROM blog_post JOIN subcategory ON blog_post.sub_category_id = subcategory.id JOIN category ON subcategory.category_id = category.id WHERE blog_post.post_by = '$post_by'";
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
                          echo "Pending";
                        } elseif ($row['post_status'] == 2) {
                          echo "Cancel";
                        } elseif ($row['post_status'] == 3) {
                          echo "Success";
                        } else {
                          echo "Unknown Status";
                        }
                      ?>
                    </td>

                    <td>
                      <div class="d-flex">
                        <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
  new DataTable('table.display');
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