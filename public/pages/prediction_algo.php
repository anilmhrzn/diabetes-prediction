<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// step 1
function load_dataset($filename)
{
    $dataset = array();
    if (($handle = fopen($filename, "r")) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $dataset[] = $row;
        }
        fclose($handle);
    }
    return $dataset;
}

$dataset = load_dataset('./pima-indians-diabetesdata.csv');



// step 2
function str_to_float($dataset)
{
    foreach ($dataset as &$row) {
        foreach ($row as &$value) {
            $value = (float) $value;
        }
    }
}

function split_dataset($dataset, $split_ratio)
{
    $split = (int) (count($dataset) * $split_ratio);
    shuffle($dataset);
    $training_set = array_slice($dataset, 0, $split);
    $testing_set = array_slice($dataset, $split);
    return array($training_set, $testing_set);
}

str_to_float($dataset);
list($training_set, $testing_set) = split_dataset($dataset, 0.7);



// step 3
function separate_by_class($dataset)
{
    $separated = array();
    foreach ($dataset as $row) {
        $class = $row[count($row) - 1];
        if (!isset($separated[$class])) {
            $separated[$class] = array();
        }
        $separated[$class][] = $row;
    }
    return $separated;
}

function calculate_class_probabilities($dataset)
{
    $separated = separate_by_class($dataset);
    $total_rows = count($dataset);
    $class_probabilities = array();
    foreach ($separated as $class => $rows) {
        $class_probabilities[$class] = count($rows) / $total_rows;
    }
    return $class_probabilities;
}

function calculate_mean($numbers)
{
    return array_sum($numbers) / count($numbers);
}

function calculate_stdev($numbers)
{
    $mean = calculate_mean($numbers);
    $variance = 0.0;
    foreach ($numbers as $number) {
        $variance += pow($number - $mean, 2);
    }
    $variance /= count($numbers) - 1;
    return sqrt($variance);
}

function calculate_attribute_probabilities($dataset)
{
    $separated = separate_by_class($dataset);
    $attribute_probabilities = array();
    foreach ($separated as $class => $rows) {
        $attribute_probabilities[$class] = array();
        for ($i = 0; $i < count($rows[0]) - 1; $i++) {
            $values = array_column($rows, $i);
            $mean = calculate_mean($values);
            $stdev = calculate_stdev($values);
            $attribute_probabilities[$class][] = array('mean' => $mean, 'stdev' => $stdev);
        }
    }
    return $attribute_probabilities;
}

$class_probabilities = calculate_class_probabilities($training_set);
$attribute_probabilities = calculate_attribute_probabilities($training_set);



// step 4
function calculate_probability($x, $mean, $stdev)
{
    $exponent = exp(-pow($x - $mean, 2) / (2 * pow($stdev, 2)));
    return (1 / (sqrt(2 * M_PI) * $stdev)) * $exponent;
}

function calculate_class_probabilities_given_attributes($class_probabilities, $attribute_probabilities, $input)
{
    $probabilities = array();
    foreach ($class_probabilities as $class => $class_probability) {
        $probability = $class_probability;
        for ($i = 0; $i < count($input); $i++) {
            $mean = $attribute_probabilities[$class][$i]['mean'];
            $stdev = $attribute_probabilities[$class][$i]['stdev'];
            $x = $input[$i];
            $probability *= calculate_probability($x, $mean, $stdev);
        }
        $probabilities[$class] = $probability;
    }
    return $probabilities;
}

function predict($class_probabilities, $attribute_probabilities, $input)
{
    $probabilities = calculate_class_probabilities_given_attributes($class_probabilities, $attribute_probabilities, $input);
    arsort($probabilities);
    return key($probabilities);
}
// define the input fields and their types
$fields = array(
    array('label' => 'Pregnancies', 'type' => 'number'),
    array('label' => 'Glucose', 'type' => 'number'),
    array('label' => 'BloodPressure', 'type' => 'number'),
    array('label' => 'SkinThickness', 'type' => 'number'),
    array('label' => 'Insulin', 'type' => 'number'),
    array('label' => 'BMI', 'type' => 'number'),
    array('label' => 'Age', 'type' => 'number')
);

// initialize input array with null values
$input = array_fill(0, count($fields), null);

// if the form was submitted, process the input and make a prediction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // validate input and populate input array
    // echo $field[];
    $errors = array();
    foreach ($fields as $i => $field) {
        if ($field['label'] === 'DiabetesPedigreeFunction') {
            continue; // skip this field
        }
        $value = $_POST[$i];
        if (!is_numeric($value)) {
            $errors[] = "{$field['label']} must be a number";
        } else {
            $input[$i] = floatval($value);
        }
    }

    // if there are no validation errors, make a prediction
    if (empty($errors)) {
        // predicting 100 times and giveing output which comes maxium no of times
        // $predictions = array();
        // for ($times = 0; $times < 100; $times++) {
            $prediction = predict($class_probabilities, $attribute_probabilities, $input);
            echo $prediction;
            // ;
            // $predictions[] = $prediction;
        // }

        // Count the occurrences of each prediction value
        // $occurrences = array_count_values($predictions);

        // // Find the prediction value with the maximum occurrences
        // $maxValue = max($occurrences);
        // $maxPrediction = array_search($maxValue, $occurrences);
?>

<!-- this is for modal -->

<div class="relative flex justify-center items-center">

    <!-- <button onclick="showMenu(true)" class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 focus:outline-none absolute z-0 top-48 py-2 px-7 bg-gray-800 text-white rounded text-base hover:bg-black">Open</button> -->

    <div id="menu" class="w-full h-full bg-gray-900 bg-opacity-80 top-0 fixed sticky-0">
        <div class="2xl:container  2xl:mx-auto py-48 px-4 md:px-28 flex justify-center items-center">
            <div
                class="w-96 md:w-auto dark:bg-gray-800 relative flex flex-col justify-center items-center bg-white py-16 px-4 md:px-24 xl:py-24 xl:px-36">
                <div role="banner">
                </div>
                <div class="mt-12">
                    <h1 role="main"
                        class="text-3xl dark:text-white lg:text-4xl font-semibold leading-7 lg:leading-9 text-center text-gray-800">
                        <!-- We use cookies -->
                        <?php
            if($prediction==1){
                echo "Oh no!";
            }else{
                echo "Great!";
            }
            ?>
                    </h1>
                </div>
                <div class="mt">
                    <p class="mt-6 sm:w-80 text-base dark:text-white leading-7 text-center text-gray-800">
                        <!-- Please, accept these sweeties to continue enjoying our site! -->
                        <?php
            if($prediction==1){
                echo "According to the information you have given you have diabetes";
            }else{
                // echo "Great!";
                echo "According to the information you have given you don't have diabetes";

            }
            ?>
                    </p>
                </div>
                <!-- Mmm... Sweet! -->
                <?php
            if($prediction==1){?>
                <a href="http://localhost/Main_Project/public/pages/my_diet.php"
                    class="w-full dark:text-gray-800 dark:hover:bg-gray-100 dark:bg-white sm:w-auto mt-14 text-base leading-4 text-center text-white py-6 px-16 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 bg-gray-800 hover:bg-black">
                    <?="What should i do?"?>
                </a>
                
                <?php
            }else{?>
            
            <button onclick="showMenu(true)"
            class="w-full dark:text-gray-800 dark:hover:bg-gray-100 dark:bg-white sm:w-auto mt-14 text-base leading-4 text-center text-white py-6 px-16 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 bg-gray-800 hover:bg-black">
            <?="Okay i got it!"?>
        </button>
            
            <?php
            }
            ?>

                <p
                    class="mt-6 dark:text-white dark:hover:border-white text-base leading-none focus:outline-none hover:border-gray-800 focus:border-gray-800 border-b border-transparent text-center text-gray-800">
                    <?php
            if($prediction==1){
                echo "Kindly consider following our carefully crafted diet plan for optimal results.";
            }else{
                echo "But be careful no one is immune to diabetes,a gentle reminder of the lurking possibility of diabetes.";
            }
            ?>
                </p>
                <button onclick="showMenu(true)"
                    class="text-gray-800 dark:text-gray-400 absolute top-8 right-8 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                    aria-label="close">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.66667" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
let menu = document.getElementById("menu");
const showMenu = (flag) => {
    menu.classList.toggle("hidden");
};
</script>
<?php
    } else {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}