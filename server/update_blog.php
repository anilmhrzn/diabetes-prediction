<?php
$responseMessage = 'sucess';
include './connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the values from the AJAX request
    $blogTitle = $_POST['blogTitle'];
    $added_date = $_POST['added_date'];
    $image = $_POST['image'];
    $blogDescription = $_POST['blogDescription'];
    $idOfBlog = $_POST['idOfBlog'];
    if ($image) {
        $imageName = $image['name'];
        $imageType = $image['type'];
        $imageSize = $image['size'];
        $imageTmpPath = $image['tmp_name'];
        $response = array(
            'status' => 'success',
            'message' => 'Blog  successfully',
            'data' => array(
                'imageName' => $imageName,
                'imageType' => $imageType,
                'imageSize' => $imageSize,
                'imageSize' => $imageSize,
                'imageTmpPath' => $imageTmpPath,
               
            )
        );

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
    $response = array(
        'status' => 'success',
        'message' => 'Blog updated successfully',
        'data' => array(
            'title' => $blogTitle,
            'description' => $blogDescription
        )
    );

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
    // if (isset($_FILES['image'])) {
    //     $image = $_FILES['image'];
    //     // $stmt = $conn->prepare("INSERT INTO user (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    //     $stmt = $connection->prepare("UPDATE blogs SET title = ?,image= ?, added_date= ?, description = ? WHERE id = ?");
    //     $stmt->bind_param("ssi", $blogTitle, $image, $added_date, $blogDescription, $idOfBlog);
    //     // $stmt = $conn->prepare("UPDATE `mero_diet_planner`.`blogs` SET `title`="."'$blogTitle'"." , `image` = 'http://localhost/Main_Project/image/hello.avif'". "`added_date`=   WHERE (`id` = '1')");

    //     // Check if there was an error during the upload
    //     if ($image['error'] !== UPLOAD_ERR_OK) {
    //         $errorMessage = 'An error occurred during the file upload.';
    //     } else {
    //         // The file was uploaded successfully

    //         // Get the details of the uploaded image
    //         $imageName = $image['name'];
    //         $imageType = $image['type'];
    //         $imageSize = $image['size'];
    //         $imageTmpPath = $image['tmp_name'];

    //         // Validate and process the uploaded image
    //         // ...
    //         // Validate file type
    //         $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    //         if (!in_array($fileType, $allowedTypes)) {
    //             $response = array(
    //                 'status' => 'success',
    //                 'message' => 'Error: Invalid file type. Only JPEG, PNG, and GIF files are allowed.'
    //             );
    //             header('Content-Type: application/json');
    //             echo json_encode($response);
    //             // echo "Error: Invalid file type. Only JPEG, PNG, and GIF files are allowed.";
    //             exit;
    //         }

    //         // Validate file size (in this example, limit to 2MB)
    //         $maxFileSize = 2 * 1024 * 1024; // 2MB
    //         if ($fileSize > $maxFileSize) {
    //             $response = array(
    //                 'status' => 'success',
    //                 'message' => 'Error: File size exceeds the maximum limit of 2MB.'
    //             );
    //             header('Content-Type: application/json');
    //             echo json_encode($response);
    //             // echo "Error: File size exceeds the maximum limit of 2MB.";
    //             exit;
    //         }


    //         // Example: Move the uploaded image to a specific directory
    //         $targetDirectory = './../images/';
    //         $targetPath = $targetDirectory . $imageName;
    //         $imageURL = 'http://localhost/Main_Project/images/' . $imageName;

    //         if (move_uploaded_file($imageTmpPath, $targetPath) && $stmt->execute() === TRUE) {

    //             $response = array(
    //                 'status' => 'success',
    //                 'message' => 'sucessfully updated',
    //                 'data' => array(
    //                     'imageURL' => $imageURL
    //                 )
    //             );
    //             header('Content-Type: application/json');
    //             echo json_encode($response);
    //             exit;
    //             // The file was moved to the target directory successfully

    //             // Perform any additional actions, such as storing the image path in the database
    //             // ...

    //             // Output a success message or redirect to a success page
    //             // ...
    //         }
    //     }
    // } else {
    //     $response = array(
    //         'status' => 'success',
    //         'message' => 'Error:  No image file was uploaded.'
    //     );
    //     header('Content-Type: application/json');
    //     echo json_encode($response);
    //     // echo "Error: File size exceeds the maximum limit of 2MB.";
    //     exit;
    //     // No image file was uploaded

    //     // Handle the error, such as displaying an error message or redirecting back to the upload form
    //     // ...
    // }

    // Perform any necessary processing or validation with the received data
    // $response = array(
    //     'status' => 'success',
    //     'message' => 'Blog updated successfully',
    //     'data' => array(
    //         'title' => $blogTitle,
    //         'description' => $blogDescription
    //     )
    // );

    // header('Content-Type: application/json');
    // echo json_encode($response);
    // exit;

}
