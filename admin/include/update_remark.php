<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $remark = intval($_POST['remark']);
    $id = intval($_POST['id']); 
    $query = "UPDATE user SET remark = $remark WHERE id ='$id'";
    echo $query;
    die();

    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ii", $remark, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Remark updated successfully";
        } else {
            echo "Failed to update remark";
        }
        
        $stmt->close();
    } else {
        echo "Failed to prepare the statement";
    }
    
    $conn->close();
}
?>
