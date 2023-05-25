<?php
include_once "./connection.php";
// Select all users from the "users" table
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Fetch all rows and return as JSON
$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}
echo json_encode($rows);
// echo mb_convert_encoding($rows,'UTF-8','auto');
// Close connection
mysqli_close($conn);
?>
