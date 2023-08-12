<?php if($_POST){

include "./connection.php";

// Prepare and bind statement
$stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

// Set parameters
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password for security

// Execute statement
if ($stmt->execute() === TRUE) {
  header("Location:http://localhost/Main_Project/public/pages/login.php");
}else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
}?>
