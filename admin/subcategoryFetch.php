<?php 
include 'include/connection.php'; // Ensure you include the .php extension

$categoryId = mysqli_real_escape_string($conn, $_POST['categoryId']); // Sanitize input

$query = "SELECT * FROM subcategory WHERE category_id='$categoryId'";
$result = mysqli_query($conn, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['id'] . "'>" . $row['subcat_name'] . "</option>";
    }
} else {
    echo "Error: " . mysqli_error($conn); // Debugging output
}
?>
