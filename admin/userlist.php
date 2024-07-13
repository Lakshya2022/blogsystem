<?php include('include/header.php'); ?>
<style type="text/css">
  .switch {
    display: inline-block;
    position: relative;
    width: 50px;
    height: 25px;
    border-radius: 20px;
    background: #dfd9ea;
    transition: background 0.28s cubic-bezier(0.4, 0, 0.2, 1);
    vertical-align: middle;
    cursor: pointer;
}
.switch::before {
    content: '';
    position: absolute;
    top: 1px;
    left: 2px;
    width: 22px;
    height: 22px;
    background: #fafafa;
    border-radius: 50%;
    transition: left 0.28s cubic-bezier(0.4, 0, 0.2, 1), background 0.28s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.28s cubic-bezier(0.4, 0, 0.2, 1);
}
.switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(128,128,128,0.1);
}
input:checked + .switch {
    background: #72da67;
}
input:checked + .switch::before {
    left: 27px;
    background: #fff;
}
input:checked + .switch:active::before {
    box-shadow: 0 2px 8px rgba(0,0,0,0.28), 0 0 0 20px rgba(0,150,136,0.2);
}
</style>
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
                    <th>User Details</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Date of Birth</th>
                    <th>Ocupation</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
                    include 'include/connection.php';
                    $query="SELECT * FROM user WHERE status = 1";
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
                      <?php echo $row['username'] ?>
                    </td>
                    <td>
                    <?php echo $row['email'] ?>
                    </td>
                    <td>
                      <?php echo $row['mobile_no'] ?>
                    </td>
                    <td>
                      <?php echo $row['dob'] ?>
                    </td>
                      <td>
                      <?php echo $row['occupation'] ?>
                    </td> 
                     <td>
                      <?php echo $row['address'] ?>
                    </td>
                    <td>
                      <?php
  $remark = $row['remark']; // Assuming $row['remark'] is either 0 or 1
  $Userid = $row['id']; // Assuming $row['id'] contains the user's ID
  ?>
  <div class="content">
      <input type="checkbox" hidden="hidden" id="username" value="<?php echo $remark; ?>" <?php echo $remark == 1 ? 'checked' : ''; ?> data-id="<?php echo $Userid; ?>">
      <label class="switch" for="username" onclick="toggleSwitch()"></label>
  </div>

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
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
  $(document).ready(function() {
    const switchInput = $('#username');

    // Initialize the switch based on the input value
    if (switchInput.val() == 1) {
        switchInput.prop('checked', true);
    } else {
        switchInput.prop('checked', false);
    }
});
function toggleSwitch() {
    const switchInput = $('#username');
    const id = switchInput.data('id'); // Properly get the data-id attribute value
    const newState = switchInput.prop('checked') ? 0 : 1; // Toggle state
    switchInput.prop('checked', !switchInput.prop('checked'));

    // Perform AJAX request to update the server
    $.ajax({
        type: 'POST',
        url: 'include/update_remark.php',
        data: { 
          id: id,
          remark: newState
        },
        success: function(response) {
            console.log('Remark updated successfully');
        },
        error: function(xhr, status, error) {
            console.error('Failed to update remark:', error);
        }
    });
}

</script>
<?php include('include/footer.php'); ?>