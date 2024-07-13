<?php
// Assuming you have a database connection established
include 'connection.php';
  $postId = $_POST['post_id'];
  $status = $_POST['post_status'];
  $query = "UPDATE blog_post SET post_status = '$status' WHERE id = '$postId'";
  // echo $query;
  // die();
  $result = mysqli_query($conn,$query);
  if ($result) {
    echo "Status updated successfully!";
  } else {
    echo "Error updating status: " . $conn->error;
  }


?>
