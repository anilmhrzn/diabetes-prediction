<!-- component -->
<!-- TODO: ui only completed complete others -->
<a class="w-100 flex justify-center items-center my-2" href="./edit_blogs.php?id=null">
    <div
        class=" w-1/2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex justify-center items-center my-2">

        <!-- 
      <button class=" w-1/2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add New Blog 
      </button> -->
        <!-- <a class="x-tooltip mr-2" href="./edit_blogs.php?id=<?php
      // $row['id']
       ?>"> -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 text-yellow-500">
            <path
                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                stroke-linecap="round" stroke-linejoin="round" />
        </svg>

        <!-- </a> -->
        <span>

            Add New Blogs
        </span>
    </div>

</a>
<?php
// Set the number of items per page and the current page
$itemsPerPage = 10;
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentpage - 1) * $itemsPerPage;

// Query to fetch the data with pagination
$query = "SELECT * FROM mero_diet_planner.blogs LIMIT $offset, $itemsPerPage";

// Execute the query and fetch the results
// Assuming you have a database connection established
$result = mysqli_query($conn, $query);
?>
<div class="w-full rounded-lg border border-gray-200 shadow-md p-5 overflow-x-auto">
    <table class="border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Image</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Added Date</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Description</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">State</th>
                <!-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Role</th> -->
                <!-- <th scope="col" class="px-6 py-4 font-medium text-gray-900">Team</th> -->
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Options</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="text-sm">
                        <div class="font-medium text-gray-700"><?= $row['title'] ?></div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="relative h-10 w-30">
                        <img class="h-full w-full object-cover object-center" src="<?= $row['image'] ?>" alt="">
                    </div>
                </td>
                <td class="px-6 py-4"><?= $row['added_date'] ?></td>
                <td class="px-6 py-4">
                    <div class="w-30 h-10 overflow-hidden">
                        <?= $row['description'] ?>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <?php
if ($row['state']) {
    ?>
                    <span
                        class="cursor-pointer underline inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600"
                        onclick="updateState(<?=$row['id']?>, 0)">
                        <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                        Active
                    </span>
                    <?php
} else {
    ?>
                    <span
                        class="cursor-pointer underline inline-flex items-center gap-1 rounded-full px-2 py-1 text-xs font-semibold text-red-600"
                        onclick="updateState(<?=$row['id']?>, 1)">
                        <div class="h-1.5 w-1.5 rounded-full bg-red-600"></div>
                        Inactive
                    </span>
                    <?php
}
?>

                    <script>
                    function updateState(id, newState) {
                        // Send an AJAX request to update the state in the database
                        $.ajax({
                            url: 'http://localhost/Main_Project/server/update_state.php',
                            type: 'POST',
                            data: {
                                id: id,
                                newState: newState
                            },
                            success: function(response) {
                                location.reload();
                                alert('State changed sucessfully')
                                // Handle the response from the server
                                // Update the UI if needed
                            }
                        });
                    }
                    </script>

                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end gap-4">
                        <a x-data="{ tooltip: 'Delete' }" href="#" onclick="confirmDelete(<?=$row['id']?>)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a>

                        <script>
                        function confirmDelete(blogId) {
                            if (confirm("Are you sure you want to delete this blog?")) {
                                deleteBlog(blogId);
                            }
                        }

                        function deleteBlog(blogId) {
                            // Send an AJAX request to delete the blog
                            $.ajax({
                                url: 'http://localhost/Main_Project/server/delete_blog.php',
                                type: 'POST',
                                data: {
                                    id: blogId
                                },
                                success: function(response) {
                                    // Handle the response from the server
                                    if (response === 'success') {
                                        // Optional: Update the UI or display a success message
                                        alert('Blog deleted successfully');
                                        // Reload the page to reflect the changes
                                        location.reload();
                                    } else {
                                        // Optional: Handle errors or display an error message
                                        alert('Failed to delete the blog');
                                    }
                                }
                            });
                        }
                        </script>


                        <a x-data="{ tooltip: 'Edit' }" href="./edit_blogs.php?id=<?= $row['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="h-6 w-6" x-tooltip="tooltip">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php

// Query to count the total number of rows in the table
$countQuery = "SELECT COUNT(*) AS total FROM mero_diet_planner.blogs";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalItems = $countRow['total'];

// Calculate the total number of pages
$totalPages = ceil($totalItems / $itemsPerPage);

// // Display the pagination links
// echo '<div class="mt-4">';
// echo '<ul class="flex space-x-2">';
// for ($i = 1; $i <= $totalPages; $i++) {
//     echo '<li><a href="?page=' . $i . '" class="px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors duration-300">' . $i . '</a></li>';
// }
// echo '</ul>';
// echo '</div>';

// Display the pagination links
echo '<div class="flex justify-center my-4">';
echo '<div class="space-x-2">';
for ($i = 1; $i <= $totalPages; $i++) {
    $isActive = ($i == $currentpage) ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-600';
    echo '<a href="?page=' . $i . '" class="px-3 py-2 rounded-lg ' . $isActive . '">' . $i . '</a>';
}
echo '</div>';
echo '</div>';
// echo '<div class="h-40">ehloo</div>'
?>