<?php 
    session_start();
if (!(isset($_SESSION['email']))) {
    header('Location: ' . "http://localhost/Main_Project/public/pages/main.php");
    die();}
    include "./../includes/navbar.php";

    ?>
<div class='p-4 w-full flex justify-center items-center'>
    <form method="POST" class="w-full max-w-lg border-2 border-slate-500 rounded-md p-4"
        onsubmit="frontValidation(event);">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Number of pregnancies
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border   rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Pregnancies" name="0" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Glucose
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Glucose" name="1" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Blood Pressure(mm Hg)
                </label>
                <p class="text-gray-600 text-xs italic mb-2">It is the lower number in a blood pressure reading. For
                    example,
                    in a blood pressure reading of 120/80 mmHg, the diastolic pressure is 80 mmHg</p>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="BloodPressure" name="2" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Skinthickness-Triceps skinfold thickness (mm)
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="SkinThickness" name="3" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Insulin
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Insulin" name="4" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="bmi">
                    BMI: Body mass index (weight in kg/(height in m)^2)
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="bmi" name="5" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">
                <p id="bmiText" class="hidden text-gray-600 text-xs italic">Make it as long and as crazy as you'd
                    like</p>
                <div class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 my-4 rounded"
                    onclick="toggleBMIBox()">
                    Calculate BMI for me
                </div>


                <!-- for bmi box -->
                <div id="bmiBox" class="w-full max-w-lg border-2 border-slate-500 rounded-md p-4 mt-2">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="height">
                                Height (in cm):
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="height" oninput="validateInput(event)" onpaste="return false"
                                onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="weight">
                                Weight (in kg):
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="weight" oninput="validateInput(event)" onpaste="return false"
                                onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

                        </div>
                    </div>
                    <div class="flex justify-center items-center">

                        <div class="bg-gray-700 hover:bg-gray-800 text-white font-bold py-2 px-4 my-4 rounded w-1/2 flex justify-center items-center"
                            onclick="calculateBMI()">
                            Calculate
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Age: Age in years
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="Age" name="6" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

            </div>
        </div>
        <div class="flex justify-center items-center ">
            <button type="submit"
                class="bg-transparent w-1/2 hover:bg-gray-700 text-gray-800 font-semibold hover:text-white py-2 px-4 border border-gray-800 hover:border-transparent rounded">
                Submit
            </button>
        </div>
    </form>

</div>
<?php
    require_once "./prediction_algo.php";

?>
<script>
document.getElementById('bmiBox').classList.add('hidden');

function validateInput(event) {
    var input = event.target.value;
    if (!Number.isInteger(Number(input))) {
        event.target.value = input.replace(/[^\d]/g, '');
        // Or you can display an error message or take any other appropriate action
    }
    var sanitizedInput = Math.abs(input); // Get absolute value to remove negative sign

    if (input < 0) {
        event.target.value = sanitizedInput; // Update the input value without negative sign
    }
}

function validateKeyPress(event) {
    var keyCode = event.keyCode || event.which;
    var charCode = String.fromCharCode(keyCode);
    if (charCode === '.') {
        event.preventDefault();
        // Or you can display an error message or take any other appropriate action
    }
}

function toggleBMIBox() {
    var bmiBox = document.getElementById('bmiBox');
    console.log('hello');
    bmiBox.classList.toggle('hidden');
}

function calculateBMI() {
    // Get input values
    console.log('hello from clacul');
    var height = document.getElementById('height').value;
    var weight = document.getElementById('weight').value;
    console.log('hello from clacul2222222222222222');

    // Calculate BMI
    var bmi = weight / ((height / 100) ** 2);
    console.log(bmi);

    document.getElementById('bmi').value = Math.round(bmi);
    document.getElementById('bmiText').innerText = "Your bmi is " + bmi;
    document.getElementById('bmiText').classList.toggle('hidden');
    toggleBMIBox();
}

function frontValidation(event) {
    var elem0 = document.getElementsByName('0')[0];
    var elem1 = document.getElementsByName('1')[0];
    var elem2 = document.getElementsByName('2')[0];
    var elem3 = document.getElementsByName('3')[0];
    var elem4 = document.getElementsByName('4')[0];
    var elem5 = document.getElementsByName('5')[0];
    var elem6 = document.getElementsByName('6')[0];
    var newElement = document.createElement("p");
    newElement.textContent = "Cannot be empty";
    newElement.classList.add("text-red-600", "text-xs", "italic");

    var isValid = true; // Flag variable
    if (elem6.value.trim() === "") {
        if (document.getElementById("elem6") === null) {
            newElement.id = "elem6";
            elem6.insertAdjacentHTML("afterend", newElement.outerHTML);
        }
        elem6.focus();
        elem6.classList.add("border-red-600")
        isValid = false;
    } else {
        if (document.getElementById("elem6") !== null) {
            document.getElementById("elem6").remove();
            elem6.classList.remove("border-red-600")
        }

    }
    if (elem5.value.trim() === "") {
        if (document.getElementById("elem5") === null) {
            newElement.id = "elem5";
            elem5.insertAdjacentHTML("afterend", newElement.outerHTML);
        }
        elem5.focus();
        elem5.classList.add("border-red-600")
        isValid = false;
    } else {
        if (document.getElementById("elem5") !== null) {
            document.getElementById("elem5").remove();
            elem5.classList.remove("border-red-600")
        }

    }
    if (elem4.value.trim() === "") {
        if (document.getElementById("elem4") === null) {
            newElement.id = "elem4";
            elem4.insertAdjacentHTML("afterend", newElement.outerHTML);
        }
        elem4.focus();
        elem4.classList.add("border-red-600")
        isValid = false;
    } else {
        if (document.getElementById("elem4") !== null) {
            document.getElementById("elem4").remove();
            elem4.classList.remove("border-red-600")
        }

    }
    if (elem3.value.trim() === "") {
        if (document.getElementById("elem3") === null) {
            newElement.id = "elem3";
            elem3.insertAdjacentHTML("afterend", newElement.outerHTML);
        }
        elem3.focus();
        elem3.classList.add("border-red-600")
        isValid = false;
    } else {
        if (document.getElementById("elem3") !== null) {
            document.getElementById("elem3").remove();
            elem3.classList.remove("border-red-600")
        }

    }
    if (elem2.value.trim() === "") {
        if (document.getElementById("elem2") === null) {
            newElement.id = "elem2";
            elem2.insertAdjacentHTML("afterend", newElement.outerHTML);
        }
        elem2.focus();
        elem2.classList.add("border-red-600")
        isValid = false;
    } else {
        if (document.getElementById("elem2") !== null) {
            document.getElementById("elem2").remove();
            elem2.classList.remove("border-red-600")
        }

    }
    if (elem1.value.trim() === "") {
        if (document.getElementById("elem1") === null) {
            newElement.id = "elem1";
            elem1.insertAdjacentHTML("afterend", newElement.outerHTML);
        }
        elem1.focus();
        elem1.classList.add("border-red-600")
        isValid = false;
    } else {
        if (document.getElementById("elem1") !== null) {
            document.getElementById("elem1").remove();
            elem1.classList.remove("border-red-600")
        }

    }
    if (elem0.value.trim() === "") {
        if (document.getElementById("elem0") === null) {
            newElement.id = "elem0";
            elem0.insertAdjacentHTML("afterend", newElement.outerHTML);
        }
        elem0.focus();
        elem0.classList.add("border-red-600")
        isValid = false;
    } else {
        if (document.getElementById("elem0") !== null) {
            document.getElementById("elem0").remove();
            elem0.classList.remove("border-red-600")
        }

    }
    if (!isValid) {
        event.preventDefault(); // Prevent form submission
    }

}
</script>
<?php 
include "./../includes/footer.php"

?>
<!-- <p class="text-gray-600 text-xs italic">It is the lower number in a blood pressure reading. For example, in a blood pressure reading of 120/80 mmHg, the diastolic pressure is 80 mmHg</p>  -->