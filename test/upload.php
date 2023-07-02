<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded successfully
    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        // Get file details
        $fileName = $_FILES['fileToUpload']['name'];
        $fileSize = $_FILES['fileToUpload']['size'];
        $fileType = $_FILES['fileToUpload']['type'];

        // Specify the upload directory
        $uploadDir = './../images/';

        // Generate a unique name for the file
        $newFileName = uniqid() . '_' . $fileName;

        // Set the destination path
        $uploadPath = $uploadDir . $newFileName;
        echo $uploadPath;
        echo move_uploaded_file($_FILES['fileToUpload']['tmp_name'],'/images');

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadPath)) {
            // File upload was successful
            echo "File uploaded successfully.";
        } else {
            // File upload failed
            echo "Error uploading file.";
        }
    } else {
        // File upload error occurred
        echo "Error: " . $_FILES['fileToUpload']['error'];
    }
}
?>
