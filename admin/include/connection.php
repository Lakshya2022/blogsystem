<?php 
$host="localhost";
$username="root";
$password="";
$dbname="blogsystem";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
	echo "connection Unsuccessfully";
	exit();
}

?>