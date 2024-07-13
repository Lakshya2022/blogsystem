<?php 	
session_start();
 include 'connection.php';
 if(isset($_POST['categoryDelete'])){
 	$id=$_POST['id'];
 	$query="DELETE FROM category WHERE id='$id'";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['error']="Category Delete Successfully.";
        header("Location:../category.php");
        exit();
      }else{
        $_SESSION['error']="Category Not Deleted.";
        header("Location:../category.php");
        exit();
      }
 }
 // Subcategory
 if(isset($_POST['subcategoryDelete'])){
 	$id=$_POST['id'];
 	$query="DELETE FROM subcategory WHERE id='$id'";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['error']="Subcategory Delete Successfully.";
        header("Location:../subcategory.php");
      }else{
        $_SESSION['error']="Subcategory Not Deleted.";
        header("Location:../subcategory.php");
      }
 }
 // postdelete
 if(isset($_POST['postDelete'])){
  $id=$_POST['id'];
  $query="DELETE FROM blog_post WHERE id='$id'";
      $result=mysqli_query($conn,$query);
      if($result){
        $_SESSION['error']="post Delete Successfully.";
        header("Location:../postlist.php");
      }else{
        $_SESSION['error']="post Not Deleted.";
        header("Location:../postlist.php");
      }
 }
 ?>