<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a file was uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tempFilePath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        
        // Specify the target directory to save the uploaded file
        $targetDirectory = '/uploads';
        
        // Generate a unique filename to avoid conflicts
        $targetFileName = uniqid() . '_' . $fileName;
        
        // Build the absolute path to the target directory
        $targetPath = $targetDirectory . $targetFileName;
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($tempFilePath, $targetPath)) {
            $imageURL = 'http://localhost/Main_Project/' . $targetPath;
            
            $response = array(
                'status' => 'success',
                'data' => array(
                    'imageURL' => $imageURL
                )
            );
            
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    }
}

// If an error occurs or the upload fails, return an error response
$response = array(
    'status' => 'error',
    'message' => 'Failed to upload image'
);

header('Content-Type: application/json');
echo json_encode($response);
exit;
?>