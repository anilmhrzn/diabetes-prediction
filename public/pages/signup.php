<?php
	 include "./../includes/navbar.php";
	 ?>
<div class="lg:flex">
    <div class="lg:w-1/2 xl:max-w-screen-sm">

        <!-- <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none"> -->
        <div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-10 xl:px-24 xl:max-w-2xl">
		<h2 class="text-center pt-4 text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Create an Account!</h2>
            <!-- <h3 class="pt-4 text-2xl text-center">Create an Account!</h3> -->
            <form action="./../server/insert_users.php" method="POST" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                <div class="mb-4 md:flex md:justify-between">
                    <div class="mb-4 md:mr-2 md:mb-0">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="first_name">
                            First Name
                        </label>
                        <input
                            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="first_name" name="first_name" type="text" placeholder="First Name" />
                        <p class="text-xs italic text-red-500 hidden" id="error_first_name"></p>

                    </div>
                    <div class="md:ml-2">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="last_name">
                            Last Name
                        </label>
                        <input
                            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="last_name" name="last_name" type="text" placeholder="Last Name" />
                        <p class="text-xs italic text-red-500 hidden" id="error_last_name"></p>

                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                        Email
                    </label>
                    <input
                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        id="email" name="email" type="email" placeholder="Email" />
                    <p class="text-xs italic text-red-500 hidden" id="error_email"></p>

                </div>
                <div class="mb-4 md:flex md:justify-between">
                    <div class="mb-4 md:mr-2 md:mb-0">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700  rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="password" type="password" placeholder="******************" />
                        <p class="text-xs italic text-red-500 hidden" id="error_password"></p>

                    </div>
                    <div class="md:ml-2">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                            Confirm Password
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="c_password" type="password" placeholder="******************" />
                        <p class="text-xs italic text-red-500 hidden" id="error_c_password"></p>

                    </div>
                </div>
                <div class="mb-6 text-center">
                    <button
                        class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                        type="submit">
                        Register Account
                    </button>
                </div>
                <hr class="mb-6 border-t" />
                <div class="text-center">
                    <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
                <div class="text-center">
                    <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="./login.php">
                        Already have an account? Login!
                    </a>
                </div>
            </form>
          

        </div>
    </div>
    <div class="hidden lg:flex items-center justify-center bg-indigo-100 flex-1 h-screen">
        <img src="./../images/diet4.jpg" alt="">
    </div>
</div>

<script>
document.querySelector("form").addEventListener("submit", function(event) {
    if (!validateForm()) {
        event.preventDefault();
    }
});

function validateForm() {
    // Get form elements
    var firstName = document.getElementById("first_name");
    var lastName = document.getElementById("last_name");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("c_password");
    var error_first_name = document.getElementById("error_first_name");
    var error_last_name = document.getElementById("error_last_name");
    var error_email = document.getElementById("error_email");
    var error_password = document.getElementById("error_password");
    var error_c_password = document.getElementById("error_c_password");




    // Validate first name
    if (firstName.value == "") {
        error_first_name.classList.remove("hidden")
        error_first_name.innerHTML = "Please enter your first name."
        firstName.classList.add("border")
        firstName.classList.add("border-red-500")
        firstName.focus();
        return false;
    } else {
        error_first_name.classList.add("hidden")
        firstName.classList.remove("border")
        firstName.classList.remove("border-red-500")

    }

    // Validate last name
    if (lastName.value == "") {
        error_last_name.classList.remove("hidden")
        error_last_name.innerHTML = "Please enter your last name."
        lastName.classList.add("border")
        lastName.classList.add("border-red-500")
        lastName.focus();
        return false;
    } else {
        error_last_name.classList.add("hidden")
        lastName.classList.remove("border")
        lastName.classList.remove("border-red-500")

    }

    // Validate email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
        error_email.classList.remove("hidden")
        error_email.innerHTML = "Please enter valid email address."
        email.classList.add("border")
        email.classList.add("border-red-500")
        email.focus();
        return false;
    } else {
        error_email.classList.add("hidden")
        email.classList.remove("border")
        email.classList.remove("border-red-500")

    }

    // Validate password
    if (password.value.length < 8) {
        error_password.classList.remove("hidden")
        error_password.innerHTML = "Password must be at least 8 characters long."
        password.classList.add("border")
        password.classList.add("border-red-500")
        password.focus();
        return false;
    } else {
        error_password.classList.add("hidden")
        password.classList.remove("border")
        password.classList.remove("border-red-500")

    }
    //   TODO:complete this

    // Validate confirm password
    if (password.value != confirmPassword.value) {
        error_c_password.classList.remove("hidden")
        error_c_password.innerHTML = "Password doesnot match"
        confirmPassword.classList.add("border")
        confirmPassword.classList.add("border-red-500")
        confirmPassword.focus();
        return false;
    } else {
        error_c_password.classList.add("hidden")
        confirmPassword.classList.remove("border")
        confirmPassword.classList.remove("border-red-500")

    }

    // Return true if all validations pass
    return true;
}
</script>
<?php
	 include "./../includes/footer.php";
	 ?>