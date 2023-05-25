<?php 
session_start();
// session_destroy();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./../css/output-style.css">
    <!-- <link rel="stylesheet" href="./../css/output-2style.css"> -->
    <script src="./../css/jquery.js"></script>

</head>

<body class="flex flex-col min-h-screen">

    <main class="flex-grow">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                        <!-- Mobile menu button-->
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            id="menu-toggle" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                           
                            <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex flex-shrink-0 items-center">
                            <!-- <span  class="text-green-700">DiabFriend</span> -->
                            <button style="font-family: 'Dancing Script', cursive;"  class="bg-orange-500  text-green-700 font-bold p-1 rounded text-2xl">
                            DiabFriend
</button>
                            <!-- <img class="block h-16 w-auto lg:hidden"
                                src="./../../images/jzfpariq-removebg-preview.png"
                                alt="Your Company">
                            <img class="hidden h-16 w-auto lg:block"
                                src="./../../images/jzfpariq-removebg-preview.png"
                                alt="Your Company"> -->
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <a href="./../pages/main.php"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    id="dashboard-link">Dashboard</a>

                                <a href="./../pages/blogs.php"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    id="blogs-link">Blogs</a>

                                <a href="./../pages/about_us.php"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    id="about-us-link">About Us</a>
                                <a href="./../pages/reviews.php"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    id="reviews-link">Reviews</a>
                                <?php
                            if (isset($_SESSION['email'])) {?>
                                <a href="./../pages/calorie_calculator.php"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    id="calorie-calculator-link">Check for Diabetes</a>
                                <a href="./../pages/my_diet.php"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    id="my-diet-link">My Diet</a>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div
                        class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <button type="button"
                            class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative ml-3" onmouseenter="show_profile_card('profile_card') "
                            onclick="toggleFunctions('profile_card')">
                            <!-- onmouseover="show_profile_card()" onmouseout="hide_profile_card()" -->
                            <div>
                                <button type="button"
                                    class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                </button>
                            </div>
                            <?php
                            if (isset($_SESSION['email'])) {?>
                            <div id="profile_card"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                                onmouseleave="hide_profile_card('profile_card')">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block  px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-0">Your Profile</a>
                                <a href="http://localhost/Main_Project/public/settings/settings.php"
                                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-1">Settings</a>
                                <a href="./logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Log out</a>
                            </div>
                            <?php
                            } else {?>
                            <div id="profile_card"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1"
                                onmouseleave="hide_profile_card('profile_card')">
                                <!-- Active: "bg-gray-100", Not Active: "" -->

                                <a href="./../pages/login.php"
                                    class="block  px-4 py-2 text-sm text-gray-700 hover:underline" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">Login</a>
                                <a href="./../pages/signup.php"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:underline" role="menuitem"
                                    tabindex="-1" id="user-menu-item-1">Register</a>
                                <!-- <a href="./about_us.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" id="about-us-link">About Us</a> -->

                            </div>
                            <?php
}
?>


                        </div>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div class="sm:hidden" id="mobile-menu">
                    <div class="space-y-1 px-2 pb-3 pt-2">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="./../pages/main.php"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                            id="mobile-dashboard-link">Dashboard</a>

                        <a href="./../pages/blogs.php"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                            id="mobile-blogs-link">Blogs</a>

                        <a href="./../pages/about_us.php"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                            id="mobile-about-us-link">About Us</a>

                        <a href="./../pages/reviews.php"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                            id="mobile-reviews-link">Reviews</a>
                        <?php
                            if (isset($_SESSION['email'])) {?>
                        <a href="./../pages/calorie_calculator.php"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                            id="mobile-calorie-calculator-link">Check for Diabetes</a>
                        <a href="./../pages/my_diet.php"
                            class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium"
                            id="mobile-my-diet-link">My Diet</a>
                        <?php
                            }?>
                    </div>
                </div>
        </nav>