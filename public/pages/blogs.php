<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "./../includes/navbar.php";?>

<?php
include_once "./../../server/connection.php";

if (isset($_SESSION['email']) && isset($_SESSION['admin_status']) && $_SESSION['admin_status']==1) {
    //   $posts_per_page = 1;
    include './admin_pages/blogs.php';
    }else{

// Determine the current page number (default to 1)
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Set the number of posts to display per page
$posts_per_page = 4;


// Calculate the offset for the MySQL LIMIT clause
$offset = ($page - 1) * $posts_per_page;

// Get the total number of rows in the "blogs" table
$sql = "SELECT COUNT(*) AS count FROM blogs where state=1";
$result = mysqli_query($conn, $sql);
$count = mysqli_fetch_assoc($result)['count'];

// Calculate the total number of pages
$total_pages = ceil($count / $posts_per_page);

// Select a subset of rows from the "blogs" table
$sql = "SELECT * FROM blogs where state=1 ORDER BY added_date DESC LIMIT $offset, $posts_per_page ";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
      ?>
<!-- HTML code to display the current blog post -->
<section class="dark:bg-gray-800 dark:text-gray-100">
    <div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">
        <a rel="noopener noreferrer" href="#"
            class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">
            <img src="<?= $row["image"] ?>" alt=""
                class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">
            <div class="p-6 space-y-2 lg:col-span-5">
                <h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline">
                    <?= $row["title"]?></h3>
                <span class="text-xs dark:text-gray-400"><?= $row["added_date"]?></span>
                <p><?= $row["description"]?></p>
            </div>
        </a>
    </div>
</section>
<?php
  
}
?>
<div class="flex justify-center gap-5 my-5">

    <?php

  // Output the previous and next buttons
  if ($page > 1) {
	?>
    <a href="?page=<?=$page-1?>"
        class="bg-transparent hover:bg-gray-800 text-gray-800 font-semibold hover:text-white py-2 px-4 border border-gray-800 hover:border-transparent rounded">
        Previous
    </a>
    <?php
  }
  if ($page < $total_pages) {?>
    <a href="?page=<?=$page+1?>"
        class="bg-transparent hover:bg-gray-800 text-gray-800 font-semibold hover:text-white py-2 px-4 border border-gray-800 hover:border-transparent rounded">
        Next
    </a>
    <?php
  }
  ?>

</div>

<?php

} else {
  echo "0 results";
}

}

include "./../includes/footer.php";
?>