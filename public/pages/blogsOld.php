<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "navbar.php";
 	include_once "./../server/connection.php"  ;
	// Select all rows from the "blogs" table
$sql = "SELECT * FROM blogs";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   ?>
   
<section class="dark:bg-gray-800 dark:text-gray-100">
	<div class="container max-w-6xl p-6 mx-auto space-y-6 sm:space-y-12">
		<a rel="noopener noreferrer" href="#" class="block max-w-sm gap-3 mx-auto sm:max-w-full group hover:no-underline focus:no-underline lg:grid lg:grid-cols-12 dark:bg-gray-900">

		<!-- Put here image src as $row["title"] -->
			<img src="https://img.freepik.com/free-photo/portrait-smiling-handsome-male-doctor-man_171337-5055.jpg?w=360" alt="" class="object-cover w-full h-64 rounded sm:h-96 lg:col-span-7 dark:bg-gray-500">
			<div class="p-6 space-y-2 lg:col-span-5">
				<h3 class="text-2xl font-semibold sm:text-4xl group-hover:underline group-focus:underline"><?= $row["title"]?></h3>
				<span class="text-xs dark:text-gray-400"><?= $row["added_date"]?></span>
				<p><?= $row["description"]?></p>
			</div>
		</a>
		
		
</section>

<?php
 }
 ?>
 <div class="flex justify-center">
			<button type="button" class="px-6 py-3 text-sm rounded-md hover:underline dark:bg-gray-900 dark:text-gray-400">Load more posts...</button>
		</div>
	</div>
 <?php
} else {
  echo "0 results";
}
?>

<?php 
include "footer.php"

?>










<!-- impsection -->
<!-- <div class="grid justify-center grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
			<a rel="noopener noreferrer" href="#" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
				<img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?1">
				<div class="p-6 space-y-2">
					<h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu laoreet repudiare legendos</h3>
					<span class="text-xs dark:text-gray-400">January 21, 2021</span>
					<p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea, ei vocent delicata indoctum pri.</p>
				</div>
			</a>
			
		</div> -->






















<!-- 
<a rel="noopener noreferrer" href="#" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
				<img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?2">
				<div class="p-6 space-y-2">
					<h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu laoreet repudiare legendos</h3>
					<span class="text-xs dark:text-gray-400">January 22, 2021</span>
					<p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea, ei vocent delicata indoctum pri.</p>
				</div>
			</a>
			<a rel="noopener noreferrer" href="#" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900">
				<img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?3">
				<div class="p-6 space-y-2">
					<h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu laoreet repudiare legendos</h3>
					<span class="text-xs dark:text-gray-400">January 23, 2021</span>
					<p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea, ei vocent delicata indoctum pri.</p>
				</div>
			</a>
			<a rel="noopener noreferrer" href="#" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900 hidden sm:block">
				<img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?4">
				<div class="p-6 space-y-2">
					<h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu laoreet repudiare legendos</h3>
					<span class="text-xs dark:text-gray-400">January 24, 2021</span>
					<p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea, ei vocent delicata indoctum pri.</p>
				</div>
			</a>
			<a rel="noopener noreferrer" href="#" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900 hidden sm:block">
				<img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?5">
				<div class="p-6 space-y-2">
					<h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu laoreet repudiare legendos</h3>
					<span class="text-xs dark:text-gray-400">January 25, 2021</span>
					<p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea, ei vocent delicata indoctum pri.</p>
				</div>
			</a>
			<a rel="noopener noreferrer" href="#" class="max-w-sm mx-auto group hover:no-underline focus:no-underline dark:bg-gray-900 hidden sm:block">
				<img role="presentation" class="object-cover w-full rounded h-44 dark:bg-gray-500" src="https://source.unsplash.com/random/480x360?6">
				<div class="p-6 space-y-2">
					<h3 class="text-2xl font-semibold group-hover:underline group-focus:underline">In usu laoreet repudiare legendos</h3>
					<span class="text-xs dark:text-gray-400">January 26, 2021</span>
					<p>Mei ex aliquid eleifend forensibus, quo ad dicta apeirian neglegentur, ex has tantas percipit perfecto. At per tempor albucius perfecto, ei probatus consulatu patrioque mea, ei vocent delicata indoctum pri.</p>
				</div>
			</a> -->