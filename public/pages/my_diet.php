<?php 
  session_start();
  if (!(isset($_SESSION['email']))) {
      header('Location: ' . "http://localhost/Main_Project/public/pages/main.php");
      die();
    }
    include "./../includes/navbar.php";
    ?>
  <section class="bg-gray-900 text-white h-screen">
  <div
    class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center"
  >
    <div class="mx-auto max-w-3xl text-center">
      <h1
        class="bg-gradient-to-r from-green-300 via-blue-500 to-purple-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl"
      >
        Get diet

        <span class="sm:block pb-2"> Control your diabetes. </span>
      </h1>

      <!-- <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo
        tenetur fuga ducimus numquam ea!
            </p> -->

      <div class="mt-8 flex flex-wrap justify-center gap-4">
        <!-- <a
          class="block w-full rounded border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-white focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
          href="/get-started"
        >
          Get Started
        </a> -->
        <a href="#"
	class="group relative inline-block overflow-hidden rounded border border-gray-100 bg-gray-200  px-12 py-3 text-sm font-medium text-slate-800 hover:text-blue-600 focus:outline-none focus:ring active:bg-indigo-600 active:text-white">
	<span class="ease absolute left-0 top-0 h-0 w-0 border-t-2 border-blue-600 transition-all duration-200 group-hover:w-full"></span>
	<span class="ease absolute right-0 top-0 h-0 w-0 border-r-2 border-blue-600 transition-all duration-200 group-hover:h-full"></span>
	<span class="ease absolute bottom-0 right-0 h-0 w-0 border-b-2 border-blue-600 transition-all duration-200 group-hover:w-full"></span>
	<span class="ease absolute bottom-0 left-0 h-0 w-0 border-l-2 border-blue-600 transition-all duration-200 group-hover:h-full"></span>
	Get Started
</a>
        <!-- <a
          class="block w-full rounded border border-blue-600 px-12 py-3 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
          href="/Main_Project/public/pages/about_us.php"
        >
          Learn More
        </a> -->
      </div>
    </div>
  </div>
</section>


<?php 
include "./../includes/footer.php"

?>