<?php
// Assuming you have established a database connection
include "./connection.php";
if (isset($_POST['id']) && isset($_POST['newState'])) {
    $id = $_POST['id'];
    $newState = $_POST['newState'];

    // Prepare and execute the UPDATE query
    $stmt = $conn->prepare("UPDATE blogs SET state = ? WHERE id = ?");
    $stmt->bind_param("ii", $newState, $id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        echo "State updated successfully.";
    } else {
        echo "No rows were updated.";
    }

    $stmt->close();
}

$conn->close();
?>
