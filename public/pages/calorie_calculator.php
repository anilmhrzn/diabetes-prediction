<?php 
    include "./../includes/navbar.php";
    ?>
<div class='p-4 w-full flex justify-center items-center  '>
    <form class="w-full max-w-lg border-2 border-slate-500 rounded-md p-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Number of pregnancies
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="myInput" oninput="validateInput(event)" onpaste="return false"
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
                    id="myInput" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Blood Pressure(mm Hg)
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="myInput" oninput="validateInput(event)" onpaste="return false"
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
                    id="bmi" oninput="validateInput(event)" onpaste="return false"
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
                    id="myInput" oninput="validateInput(event)" onpaste="return false"
                    onkeypress="return validateKeyPress(event)" type="number" placeholder="0">

            </div>
        </div>
        <!-- <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Password
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="password" placeholder="******************">
                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd
                    like</p> 
            </div>
        </div> -->

        <div class="flex justify-center items-center ">

            <button class="bg-transparent w-1/2 hover:bg-gray-700 text-gray-800 font-semibold hover:text-white py-2 px-4 border border-gray-800 hover:border-transparent rounded">
                Submit
            </button>
        </div>
    </form>

</div>
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
    document.getElementById('bmiText').innerText = "Your bmi is "+bmi;
    document.getElementById('bmiText').classList.toggle('hidden');

    // Display the result
    //   var bmiResult = document.getElementById('bmiResult');
    //   bmiResult.textContent = 'Your BMI: ' + bmi.toFixed(2);
    //   bmiResult.style.display = 'block';
    // bmiBox.classList.toggle('hidden');
    toggleBMIBox();
}
</script>
<?php 
include "./../includes/footer.php"

?>