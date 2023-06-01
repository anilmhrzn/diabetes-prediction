<?php
session_start();
if (isset($_SESSION['email'])) {
    header('Location: ' . "http://localhost/Main_Project/public/pages/main.php");
    die();
}
include './../includes/navbar.php';
?>

<div class='lg:flex'>
    <div class='lg:w-1/2 xl:max-w-screen-sm'>
        <div class='mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl'>
            <h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Log in</h2>
            <div class='mt-12'>
                <form action='./../../server/check_user.php' method='POST'>
                    <div>
                        <div class='text-sm font-bold text-gray-700 tracking-wide'>Email Address</div>
                        <input class='w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500' name='email' type='' placeholder='mike@gmail.com'>
                    </div>
                    <div class='mt-8'>
                        <div class='flex justify-between items-center'>
                            <div class='text-sm font-bold text-gray-700 tracking-wide'>
                                Password
                            </div>
                            <div>
                                <a class="text-xs font-display font-semibold text-indigo-600 hover:text-indigo-800
                                        cursor-pointer" name='password'>
                                    Forgot Password?
                                </a>
                            </div>
                        </div>
                        <input class='w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500' type='password' placeholder='Enter your password'>
                    </div>
                    <div class='mt-10'>
                        <button class="bg-indigo-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-indigo-600
                                shadow-lg">
                            Log In
                        </button>
                    </div>
                </form>
                <div class='mt-12 text-sm font-display font-semibold text-gray-700 text-center'>
                    Don't have an account ? <a href="./signup.php" class="cursor-pointer text-indigo-600 hover:text-indigo-800">Sign up</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-screen">
        <img src="./../images/diet4.jpg" alt="">
    </div>
</div>

<?php
include "./../includes/footer.php";
?>