<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "./../../server/connection.php";

if (isset($_POST['update'])) {
    // echo "hell ";
    $id = $_POST['id'];
    $title = $_POST['title'];
    $added_date = $_POST['added_date'];
    $description = $_POST['description'];
    // if ($id == 'null') {
    //     echo $id;
    //     print_r($_POST);
    // }    // echo 'sdjlfk';
    // print_r($_POST);
    // Check if a new image file is uploaded
    // Check if a new image file is uploaded
    if ($_FILES['new_image']['error'] === 0) {
        $image = uploadImage($_FILES['new_image']); // Function to handle image upload and return the file path

        if ($image) {
            // Get the current image path from the database
            $currentImage = $_POST['image'];

            if ($id == 'null') {

                // Insert query
                $sql = "INSERT INTO blogs (title, image, added_date, description) VALUES ('$title', '$image', '$added_date', '$description')";
                if (mysqli_query($conn, $sql)) {
                    $last_insert_id = mysqli_insert_id($conn);
                    echo "New record created successfully. Last inserted ID is: " . $last_insert_id;
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                //     echo '<script type="text/javascript">

                //     window.onload = function () { alert("hehe"); }

                // </script>';

                // Prepare the update statement
                $stmt = $conn->prepare("UPDATE blogs SET title=?, image=?, added_date=?, description=? WHERE id=?");

                // Bind parameters to the prepared statement
                $stmt->bind_param("ssssi", $title, $image, $added_date, $description, $id);


                // Execute the update statement
                if ($stmt->execute()) {
                    // echo "Record updated successfully.";
                    // echo "<script>alert('Record updated successfully.')</script>";

                    echo '<script type="text/javascript">

                    window.onload = function () { alert("Record updated successfully.' . $stmt->execute() . '"); }

                </script>';
                    // Delete the previous image
                    if (!empty($currentImage)) {
                        deleteFile($currentImage);
                    }
                } else {
                    echo "Error updating record: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        // Prepare the update statement without updating the image field
        $stmt = $conn->prepare("UPDATE blogs SET title=?, added_date=?, description=? WHERE id=?");

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssi", $title, $added_date, $description, $id);

        // Execute the update statement
        if ($stmt->execute()) {
            // echo "Record updated successfully.";
            echo '<script type="text/javascript">

            window.onload = function () { alert("Record updated successfully."); }

</script>';
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}
/**
 * Deletes a file from the server.
 *
 * @param string $filePath The path of the file to be deleted.
 * @return bool True if the file is successfully deleted, false otherwise.
 */

function deleteFile($filePath)
{
    // echo $filePath;
    if (file_exists($filePath)) {
        if (unlink($filePath)) {
            return true;
        } else {
            echo "Error deleting file: Unable to unlink file.";
            return false;
        }
    } else {
        echo "Error deleting file: File does not exist.";
        return false;
    }
}


function uploadImage($file)
{
    $targetDirectory = "./../../images/"; // Specify the directory where you want to store uploaded images
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = uniqid() . '.' . $fileExtension; // Generate a unique filename

    // Specify the allowed file extensions
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    // Check if the uploaded file has a valid extension
    if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
        echo "Invalid file format. Allowed formats: " . implode(', ', $allowedExtensions);
        return false;
    }

    // Specify the maximum file size (in bytes)
    $maxFileSize = 5 * 1024 * 1024; // 5MB

    // Check if the file size exceeds the maximum limit
    if ($file['size'] > $maxFileSize) {
        echo "File size exceeds the maximum limit of 5MB.";
        return false;
    }

    // Create the target directory if it doesn't exist
    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0755, true);
    }

    $targetPath = $targetDirectory . $fileName;

    // Move the uploaded file to the target path
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        // echo $targetPath;
        return $targetPath;
    } else {
        echo "Error uploading file.";
        return false;
    }
}

// Check if form is submitted

if ($_GET) {
    // echo 'hello';
    include './../includes/navbar.php';

    // include "./../../server/connection.php";

?>
<div class="bg-gray-200">
    <!-- This is an example component -->
    <a href="./blogs.php">
        <div
            class="bg-gray-800 inline-flex text-white mt-1 ml-1 rounded-l-md border-r border-gray-100 py-2 hover:bg-gray-900 hover:text-white px-3">
            <div class="flex flex-row align-middle">
                <svg class="w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="ml-2">Back</p>
            </div>
        </div>

    </a>

    <div class="container mx-auto p-4">
        <!-- <h1 class="text-2xl font-bold mb-4">Edit Blog</h1> -->
        <?php
            // if($_GET['id']=='null'){
            //     echo 'hell';
            ?>

        <?php
            // }
            $sql = "SELECT * FROM blogs WHERE id=" . $_GET['id'];
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
        <form method="post" action="" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md"
            enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" name="title" value="<?php if (isset($row['id'])) echo $row['title']; ?>"
                    class="w-full border border-gray-400 rounded-md py-2 px-3 focus:outline-none focus:border-blue-400">
            </div>


            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                <input type="hidden" name="image" value="<?php if (isset($row['id'])) {
                                                                    echo $row['image'];
                                                                }  ?>">

                <img src="<?php if (isset($row['id']))  echo $row['image']; ?>" alt="Current Image"
                    class="mb-2 rounded-md shadow">
                <input type="file" name="new_image" class="mb-2">

                <p class="text-sm text-gray-600">Upload a new image or leave it empty to keep the current image.</p>
            </div>
            <div class="mb-4">
                <label for="added_date" class="block text-gray-700 font-bold mb-2">Added Date:</label>
                <input type="text" name="added_date" value="<?php if (isset($row['id']))  echo $row['added_date']; ?>"
                    id="datepicker"
                    class="border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <script>
                // Initialize Flatpickr
                flatpickr("#datepicker", {
                    dateFormat: "Y-m-d", // Customize the date format as per your requirement
                    // You can add more options and customize the behavior of the date picker here
                });
                </script>
                <!-- <input type="text" name="added_date" value="<?php if (isset($row['id']))  echo $row['added_date']; ?>" class="w-full border border-gray-400 rounded-md py-2 px-3 focus:outline-none focus:border-blue-400"> -->
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                <textarea name="description"
                    class="w-full border border-gray-400 rounded-md py-2 px-3 focus:outline-none focus:border-blue-400"><?php if (isset($row['id']))  echo $row['description']; ?></textarea>
            </div>

            <div class="flex justify-end">
                <input type="submit" name="update" value="Update"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 cursor-pointer">
            </div>
        </form>
        <?php

    }
        ?>


    </div>
</div>
<?php





    include './../includes/footer.php';
    ?>