<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// include_once "./../server/connection.php"  ;
include_once "./../../server/connection.php";

// Get the offset value from the request
$offset = $_POST['offset'];

// Select 2 rows from the "blogs" table starting from the specified offset value
$sql = "SELECT * FROM blogs LIMIT 2 OFFSET $offset";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    // Generate HTML for the blog post using the data from the current row
    $html = '<section class="dark:bg-gray-800 dark:text-gray-100">';
    $html .= '<div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">';
    $html .= '<a rel="noopener noreferrer" href="#" class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">';
    $html .= '<img src="' . $row["image"] . '" alt="" class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">';
    $html .= '<div class="p-6 space-y-2 lg:col-span-5">';
    $html .= '<h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">' . $row["title"] . '</h3>';
    $html .= '<span class="text-xs dark:text-gray-400">' . $row["added_date"] . '</span>';
    $html .= '<p>' . $row["description"] . '</p>';
    $html .= '</div></a></section>';

    // Echo the HTML for the current blog post
    echo $html;
  }
} else {
  echo "0 results";
}
?>
