<?php
// Assuming you have established a database connection
include "./connection.php";
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the DELETE query
    $stmt = $conn->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
}

$conn->close();
?>