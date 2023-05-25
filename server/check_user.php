<?php
 session_start(); // Start a new session or resume an existing one
include "./connection.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the email and password from the form
  $email = $_POST["email"];
  $password = $_POST["password"];

  // Prepare a SQL query to select a user with the given email
  $query = "SELECT * FROM user WHERE email = '$email'";

  // Execute the query
  $result = mysqli_query($conn, $query);

  // Check if a matching user was found
  if (mysqli_num_rows($result) == 1) {
    // Get the hashed password from the database
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row["password"];

    // Check if the user-entered password matches the hashed password
    if (password_verify($password, $hashed_password)) {
      // Login successful, redirect to the home page
     
    $_SESSION['email'] =$row["email"] ;
      header("Location: http://localhost/Main_Project/public/pages/main.php", true, 301);
      // TODO pass name here and say welcome to user 
      exit;
    }
  }

  // Login failed, display an error message
  echo "Invalid email or password.";
}

// Close the database connection
mysqli_close($conn);
?>
